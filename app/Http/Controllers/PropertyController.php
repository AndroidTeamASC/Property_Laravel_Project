<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\Type;
use App\Feature;
use App\Tag;
use App\Property;
use App\Transportation;
use App\Location;
use App\Floor;
use App\Gallery;
use App\Attachment;
use App\Neighborhood;
use App\School;
use App\Fact;
use Auth;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::where('agent_id','=',Auth::id())->get();
        return view("backend.property.index", compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::all();
        $types = Type::all();
        $features = Feature::all();
        $tags = Tag::all();
        $transportations = Transportation::all();
        return view("backend.property.create", compact('statuses','types','features','tags','transportations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "status" => "required",
            "type" => "required",
            "title" => "required|min:3|max:100",
            "bedroom" => "required|min:1",
            "bathroom" => "required|min:1",
            "land_area" => "required|min:1|max:30",
            "building_area" => "required|min:1|max:30",
            "address" => "required|min:5|max:100",
            "longitude" => "required|min:1|max:30",
            "latitude" => "required|min:1|max:30",
        ]);
        if ($request->price) {
            $price = $request->price;
        }else if ($request->keep_price == '0') {
            $price = $request->keep_price;
        }
        $agent_id = Auth::id();
        $property = Property::create([
            "status_id" => intval($request->status) ,
            "type_id" => intval($request->type) ,
            "agent_id" => $agent_id,
            "title" => $request->title ,
            "bedroom" => $request->bedroom ,
            "bathroom" => $request->bathroom ,
            "land_area" => $request->land_area,
            "building_area" => $request->building_area ,
            "price" => $price ,
            "feature_id" => json_encode($request->feature) ,
            "tag_id" => json_encode($request->tag) ,
            "garage" => $request->garage ,
            "build_year" => $request->build_year ,
            "description" => $request->description,
            "keyword" => $request->keyword ,
            "embed_code" => $request->embed_code ,
        ]);
        $property_id = $property->id;
        Location::create([
            "property_id" => $property_id ,
            "address" => request('address') ,
            "longitude" => request('longitude') ,
            "latitude" => request('latitude') ,
        ]);

        $floor_array=array();
        if ($request->file('floor')) {
            $floor = $request->file('floor');
            if($floor){
                foreach ($floor as $floor_item) {
                    $name=uniqid().time().'.'.$floor_item->getClientOriginalExtension();
                    $floor_item->move(public_path('image/floor'),$name);
                    $path='image/floor/'.$name;
                    $floor_array[]=$path;
                }
            }
            Floor::Create([
                "property_id" => $property_id ,
                "floor_image" => json_encode($floor_array),
            ]);
        }

        $gallery_array=array();
        if ($request->file('gallery')) {
            $gallery = $request->file('gallery');
            if($gallery){
                foreach ($gallery as $gallery_item) {
                    $name=uniqid().time().'.'.$gallery_item->getClientOriginalExtension();
                    $gallery_item->move(public_path('image/gallery'),$name);
                    $path='image/gallery/'.$name;
                    $gallery_array[]=$path;
                }
            }
            Gallery::Create([
                "property_id" => $property_id,
                "gallery_image" => json_encode($gallery_array),
            ]);
        }

        $attachment_array=array();
        if ($request->file('attachment')) {
            $attachment = $request->file('attachment');
            if($attachment){
                foreach ($attachment as $attachment_item) {
                    $name=uniqid().time().'.'.$attachment_item->getClientOriginalExtension();
                    $attachment_item->move(public_path('image/attachment'),$name);
                    $path='image/attachment/'.$name;
                    $attachment_array[]=$path;
                }
            }
            Attachment::Create([
                "property_id" => $property_id,
                "file" => json_encode($attachment_array),
            ]);
        }
        if ($request->neighborhood_array) {
            $neighborhood_obj = json_decode($request->neighborhood_array);
            $neighborhood_array = $neighborhood_obj->neighborhoodList;
            foreach ($neighborhood_array as $value) {
              Neighborhood::create([
                "property_id" => $property_id,
                "place" => $value->place ,
                "duration" => intval($value->min),
                "transportation_id" => intval($value->transportation_id),
            ]);  
            }
        }
        if ($request->school_array) {
            $school_obj = json_decode($request->school_array);
            $school_array = $school_obj->schoolList;
            foreach ($school_array as $value) {
                School::create([
                    "property_id" => $property_id,
                    "rating" => intval($value->rating),
                    "school_name" => $value->name,
                    "grade" => $value->grade,
                    "distance" => $value->distance,
                ]);
            }
        }

        if ($request->fact_array) {
            $fact_obj = json_decode($request->fact_array);
            $fact_array = $fact_obj->factList;
            foreach ($fact_array as $value) {
                Fact::create([
                    "property_id" => $property_id ,
                    "fact" => $value->fact,
                ]);
            }
        }

        return response()->json(['success'=>'Property saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $property = Property::find($id);
        $features = Feature::all();
        $tags = Tag::all();
        $transportations = Transportation::all();
        return view('backend.property.detail', compact('property','features','tags','transportations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $statuses = Status::all();
        $types = Type::all();
        $features = Feature::all();
        $tags = Tag::all();
        $transportations = Transportation::all();
        $property = Property::find($id);
        $property_id = $property->id;
        $location = Location::where('property_id',$property_id)->get();
        $location = $location[0];
        $floors = Floor::where('property_id',$property_id)->get();
        $attachments = Attachment::where('property_id',$property_id)->get();
        $attachments = $attachments;
        $galleries = Gallery::where('property_id',$property_id)->get();
        $galleries = $galleries;
        $neighborhoods = Neighborhood::where('property_id',$property_id)->get();
        return view('backend.property.edit', compact('property','statuses','types','features','tags','transportations','location','floors','attachments','galleries','neighborhoods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            "status" => "required",
            "type" => "required",
            "title" => "required|min:3|max:100",
            "bedroom" => "required|min:1",
            "bathroom" => "required|min:1",
            "land_area" => "required|min:1|max:30",
            "building_area" => "required|min:1|max:30",
            "price" => "required",
            "address" => "required|min:5|max:100",
            "longitude" => "required|min:1|max:30",
            "latitude" => "required|min:1|max:30",
        ]);
        if ($request->embed_code) {
            $embed_code = $request->embed_code;
        }elseif ($request->old_embed_code) {
            $embed_code = $request->old_embed_code;
        }

        $property_id = $request->property_id;
        $property = Property::find($property_id);
        $property->status_id = intval($request->status);
        $property->type_id = intval($request->type);
        $property->title = $request->title;
        $property->bedroom = $request->bedroom;
        $property->bathroom = $request->bathroom;
        $property->land_area = $request->land_area;
        $property->building_area = $request->building_area;
        $property->price = $request->price;
        $property->feature_id = json_encode($request->feature);
        $property->tag_id = json_encode($request->tag);
        $property->garage = $request->garage;
        $property->build_year = $request->build_year;
        $property->description = $request->description;
        $property->keyword = $request->keyword;
        $property->embed_code = $embed_code;
        $property->save();

        /*$property_id = $property->id;*/
        Location::where('property_id', '=', $property_id)
            ->update(array(
                'property_id' => $property_id,
                'address' => $request->address,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
        ));

        $floor_array=array();
        if ($request->file('floor') || $request->old_floor) {
            if ($request->file('floor')) {
                $floor = $request->file('floor');
                if($floor){
                    foreach ($floor as $floor_item) {
                        $name=uniqid().time().'.'.$floor_item->getClientOriginalExtension();
                        $floor_item->move(public_path('image/floor'),$name);
                        $path='image/floor/'.$name;
                        $floor_array[]=$path;
                    }
                    $path = json_encode($floor_array);
                }
            }else{
                $path = $request->old_floor;
            }
            $floors = Floor::where('property_id', $property_id)->get();
            foreach ($floors as $floor) {
                $floor->delete();
            }
            Floor::updateOrCreate([
                "property_id" => $property_id ,
                "floor_image" => $path,
            ]);
        }

        $gallery_array=array();
        if ($request->file('gallery') || $request->old_gallery) {
            if ($request->file('gallery')) {
                $gallery = $request->file('gallery');
                if($gallery){
                    foreach ($gallery as $gallery_item) {
                        $name=uniqid().time().'.'.$gallery_item->getClientOriginalExtension();
                        $gallery_item->move(public_path('image/gallery'),$name);
                        $path='image/gallery/'.$name;
                        $gallery_array[]=$path;
                    }
                    $path = json_encode($gallery_array);
                }
            }else{
                $path = $request->old_gallery;
            }
            $galleries = Gallery::where('property_id', $property_id)->get();
            foreach ($galleries as $gallery) {
                $gallery->delete(); 
            }
            Gallery::updateOrCreate([
                "property_id" => $property_id ,
                "gallery_image" => $path,
            ]);
        }

        $attachment_array=array();
        if ($request->file('attachment') || $request->old_attachment) {
            if ($request->file('attachment')) {
                $attachment = $request->file('attachment');
                if($attachment){
                    foreach ($attachment as $attachment_item) {
                        $name=uniqid().time().'.'.$attachment_item->getClientOriginalExtension();
                        $attachment_item->move(public_path('image/attachment'),$name);
                        $path='image/attachment/'.$name;
                        $attachment_array[]=$path;
                    }
                    $path = json_encode($attachment_array);
                }
            }else{
                $path = $request->old_attachment;
            }
            $attachments = Attachment::where('property_id', $property_id)->get();
            foreach ($attachments as $attachment) {
                $attachment->delete(); 
            }
            Attachment::updateOrCreate([
                "property_id" => $property_id ,
                "file" => $path,
            ]);
        }

        $neighborhoods = Neighborhood::where('property_id', $property_id)->get();
            foreach ($neighborhoods as $neighborhood) {
            $neighborhood->delete(); 
        }

        if (count(json_decode($request->old_neighborhood_array)) != null) {
            $old_neighborhood_array = json_decode($request->old_neighborhood_array);
            foreach ($old_neighborhood_array as $value) {
                Neighborhood::create([
                "property_id" => $property_id,
                "place" => $value->place ,
                "duration" => intval($value->duration),
                "transportation_id" => intval($value->transportation_id),
            ]);  
            }
        }

        if (json_decode($request->new_neighborhood_array)->newNeighborhoodList) {
            $new_neighborhood_obj = json_decode($request->new_neighborhood_array);
            $new_neighborhood_array = $new_neighborhood_obj->newNeighborhoodList;
            foreach ($new_neighborhood_array as $value) {
              Neighborhood::create([
                "property_id" => $property_id,
                "place" => $value->place ,
                "duration" => intval($value->min),
                "transportation_id" => intval($value->transportation_id),
            ]);  
            }
        }

        $schools = School::where('property_id', $property_id)->get();
            foreach ($schools as $school) {
            $school->delete(); 
        }

        if (count(json_decode($request->old_school_array)) != null) {
            $old_school_array = json_decode($request->old_school_array);
            foreach ($old_school_array as $value) {
                School::create([
                    "property_id" => $property_id,
                    "rating" => intval($value->rating),
                    "school_name" => $value->school_name,
                    "grade" => $value->grade,
                    "distance" => $value->distance,
                ]);
            }
        }

        if (json_decode($request->new_school_array)->newSchoolList) {
            $new_school_obj = json_decode($request->new_school_array);
            $new_school_array = $new_school_obj->newSchoolList;
            foreach ($new_school_array as $value) {
                School::create([
                    "property_id" => $property_id,
                    "rating" => intval($value->rating),
                    "school_name" => $value->name,
                    "grade" => $value->grade,
                    "distance" => $value->distance,
                ]);
            }
        }

        $facts = Fact::where('property_id', $property_id)->get();
            foreach ($facts as $fact) {
            $fact->delete(); 
        }

        if (count(json_decode($request->old_fact_array)) != null) {
            $old_fact_array = json_decode($request->old_fact_array);
            foreach ($old_fact_array as $value) {
                Fact::create([
                    "property_id" => $property_id ,
                    "fact" => $value->fact,
                ]);
            }
        }
        if (json_decode($request->new_fact_array)->newFactList) {
            $new_fact_obj = json_decode($request->new_fact_array);
            $new_fact_array = $new_fact_obj->newFactList;
            foreach ($new_fact_array as $value) {
                Fact::create([
                    "property_id" => $property_id ,
                    "fact" => $value->fact,
                ]);
            }
        }

        return response()->json(['success'=>'Property Update successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property_id = $id;

        $attachments = Attachment::where('property_id', $property_id)->get();
        foreach ($attachments as $attachment) {
         $attachment->delete(); 
        }

        $facts = Fact::where('property_id', $property_id)->get();
        foreach ($facts as $fact) {
         $fact->delete(); 
        }

        $floors = Floor::where('property_id', $property_id)->get();
        foreach ($floors as $floor) {
         $floor->delete(); 
        }

        $galleries = Gallery::where('property_id', $property_id)->get();
        foreach ($galleries as $gallery) {
         $gallery->delete(); 
        }

        $locations = Location::where('property_id', $property_id)->get();
        foreach ($locations as $location) {
         $location->delete(); 
        }

        $neighborhoods = Neighborhood::where('property_id', $property_id)->get();
        foreach ($neighborhoods as $neighborhood) {
         $neighborhood->delete(); 
        }

        $schools = School::where('property_id', $property_id)->get();
        foreach ($schools as $school) {
         $school->delete(); 
        }

        $property= Property::find($id);
        $property->delete();
        return redirect()->route('admin.property.index');
    }

    public function getNeighborhoodById(Request $request)
    {
        $property_id = $request->property_id;
        $neighborhoods = Neighborhood::where('property_id',$property_id)->get();
        return $neighborhoods;
    }
    public function getSchoolById(Request $request)
    {
        $property_id = $request->property_id;
        $schools = School::where('property_id',$property_id)->get();
        return $schools;
    }
    public function getFactById(Request $request)
    {
        $property_id = $request->property_id;
        $facts = Fact::where('property_id',$property_id)->get();
        return $facts;
    }
     public function getMap()
    {
        $location= Location::all();
        return $location;
    }
   
}
