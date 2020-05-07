<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Property;
use App\Type;
use App\Status;
use App\User;
use App\Post;
use App\Comment;
use App\CommentReply;
use App\Feature;
use Auth;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function __construct()
      {
        //its just a dummy data object.
        $types = type::all();
        $statuses = Status::all();
        $properties = Property::all();
        foreach ($types as $type) {
            $type_name = $type->type;
            $type_id = $type->id;
            
            if ($type_name == "House") {
                $houses = Property::where('type_id', $type_id)->count();
            }
            if ($type_name == "Apartment") {
                $apartments = Property::where('type_id', $type_id)->count();
            }
            if ($type_name == "Office") {
                $offices = Property::where('type_id', $type_id)->count();
            }
            
        }
            
        // Sharing is caring
      
        View::share('types', $types);
        View::share('statuses', $statuses);
        View::share('properties', $properties);
        View::share('phouses',$houses);
        View::share('papartments',$apartments);
        View::share('poffices',$offices);
        
      }
    public function index($value='')
    {
        
        $properties = Property::where('property_status',1)->get();
        $types = Type::all();
        $statuses = Status::all();
        $recent_properties = Property::orderBy('id', 'desc')->take(5)->get();
        $listing_houses = 0; $listing_apartments = 0; $listing_offices = 0; $listing_villas = 0;
        foreach ($types as $type) {
            $type_name = $type->type;
            $type_id = $type->id;
            if ($type_name == "House") {
                $listing_houses = Property::where('type_id', $type_id)->count();
            }
            if ($type_name == "Apartment") {
                $listing_apartments = Property::where('type_id', $type_id)->count();
            }
            if ($type_name == "Office") {
                $listing_offices = Property::where('type_id', $type_id)->count();
            }
            if ($type_name == "Villa") {
                $listing_villas = Property::where('type_id', $type_id)->count();
            }      
        }
        $listing_sale = 0; $listing_rent = 0; $agent = 0;
        foreach ($statuses as  $status) {
            $status_name = $status->status;
            $status_id = $status->id;
            if ($status_name == "For Sale") {
                $listing_sale = Property::where('status_id', $status_id)->count();
            }
            if ($status_name == "For Rent") {
                $listing_rent = Property::where('status_id', $status_id)->count();
            }
        }
        $our_agents = User::where('id','!=',1)->get();
        $agents = User::where('id','!=',1)->get();
        $agent = count($agents);
        $posts = Post::orderBy('id', 'desc')->take(3)->get();
    	return view('frontend.index',compact('properties','types','statuses','recent_properties','listing_houses','listing_apartments','listing_offices','listing_villas','listing_sale','listing_rent','agent','our_agents','posts'));
    }
    public function property($value='')
    {
    	$properties = Property::paginate(2);
    
        return view('frontend.property' ,compact('properties'));
    }
    public function propertyDetail($id)
    {   
        $feature = Feature::all();
        $property = Property::find($id);
        return view('frontend.property_detail',compact('property','feature'));
    }
    public function agent($value='')
    {
        $agents = User::where('id','!=',1)->get();
    	return view('frontend.agent', compact('agents'));
    }
    public function blog(Request $request)
    {
        if ($request->type_id) {
            $posts = Post::where('type_id',$request->type_id)->get();
        }else{
            $posts = Post::all();
        }
        $popular_posts = Post::orderBy('id', 'desc')->take(3)->get();
    	return view('frontend.blog', compact('posts','popular_posts'));
    }
    public function blogDetail($id)
    {
        $post = Post::find($id);
        $popular_posts = Post::orderBy('id', 'desc')->take(3)->get();
        return view('frontend.blog_detail', compact('post','popular_posts'));
    }
    public function Comment(Request $request)
    {
        if ($request->property_id) {       
            Comment::create([
            'property_id' => $request->property_id,
            'user_id' => Auth::user()->id,
            'comment' => $request->comment,
            ]);
        }elseif ($request->post_id) {
            Comment::create([
            'post_id' => $request->post_id,
            'user_id' => Auth::user()->id,
            'comment' => $request->comment,
            ]);
        }
        return response()->json(['success'=>'Commented Successfully.']);
    }
    public function commentReply(Request $request)
    {
        CommentReply::create([
            'comment_id' => $request->comment_id,
            'user_id' => Auth::user()->id,
            'comment' => $request->comment,
        ]);
        return response()->json(['success'=>'Commented Successfully.']);
    }
    public function getComment(Request $request)
    {
        if ($request->property_id) {
            $id = $request->property_id;
            $comments = DB::table('comments')
                ->join('users','users.id','=','comments.user_id')
                ->select('comments.*','users.*','users.id as u_id','comments.id as c_id')
                ->where('comments.property_id','=', $id)
                ->get();
                $reply_comments = DB::table('comment_replies')
                ->join('users','users.id','=','comment_replies.user_id')
                ->join('comments','comments.id','=','comment_replies.comment_id')
                ->select('users.*','comment_replies.*','comments.id as c_id','comment_replies.id as c_reply_id')
                ->orderBy('comment_replies.id','asc')
                ->where('comments.property_id','=', $id)
                ->get();
        }elseif ($request->post_id) {
            $id = $request->post_id;
            $comments = DB::table('comments')
                ->join('users','users.id','=','comments.user_id')
                ->select('comments.*','users.*','users.id as u_id','comments.id as c_id')
                ->where('comments.post_id','=', $id)
                ->get();
                $reply_comments = DB::table('comment_replies')
                ->join('users','users.id','=','comment_replies.user_id')
                ->join('comments','comments.id','=','comment_replies.comment_id')
                ->select('users.*','comment_replies.*','comments.id as c_id','comment_replies.id as c_reply_id')
                ->orderBy('comment_replies.id','asc')
                ->where('comments.post_id','=', $id)
                ->get();
        }
        return response()->json([
            'comments'=>$comments,
            'reply_comments'=>$reply_comments,
        ]);
    }
    public function homeSearch(Request $request)
    {

        $status = $request->status;
        $type = $request->type;
        $bedroom = $request->bedroom;
        $bathroom = $request->bathroom;
        $keyword = $request->keyword;

        $search_properties = DB::table('properties')
        ->join('statuses','statuses.id','=','properties.status_id')
        ->join('types','types.id','=','properties.type_id')
        ->join('users','users.id','=','properties.agent_id')
        ->join('locations','locations.property_id','=','properties.id')
        ->join('galleries','galleries.property_id','=','properties.id')
        ->where([
            ['status_id', '=', $status],
            ['type_id', '=', $type],
            ['bedroom', '=', $bedroom],
            ['bathroom', '=', $bathroom],
            ['keyword', 'like', "%$keyword%"],
        ])->orWhere([
            ['status_id', '=', $status],
            ['type_id', '=', $type],
            ['bedroom', '=', $bedroom],
        ])->orWhere([
            ['status_id', '=', $status],
            ['type_id', '=', $type],
            ['bathroom', '=', $bathroom],
        ])->orWhere([
            ['status_id', '=', $status],
            ['type_id', '=', $type],
            ['keyword', 'like', "%$keyword%"],
        ])->select('properties.*','properties.id as p_id','locations.*','galleries.*','statuses.*','types.*','users.*')
        ->get();
        return $search_properties;
    }
    public function blogSearch(Request $request)
    {
        $keyword = $request->keyword;
        $search_blogs = DB::table('posts')
        ->join('types','types.id','=','posts.type_id')
        ->join('users','users.id','=','posts.user_id')
        ->where([
            ['context', 'like', "%$keyword%"],
        ])->orWhere([
            ['title', 'like', "%$keyword%"],
        ])
        ->select('posts.*','posts.id as p_id','posts.image as p_image','types.*','users.*')
        ->get();
        return $search_blogs;
    }


    public function types($id)
    {   
        if($type_id = $id){
            $properties=DB::table('properties')
            ->join('statuses','statuses.id','=','properties.status_id')
            ->join('types','types.id','=','properties.type_id')
            ->join('users','users.id','=','properties.agent_id')
            ->join('locations','locations.property_id','=','properties.id')
            ->join('galleries','galleries.property_id','=','properties.id')
            ->where('properties.type_id','=',$type_id)
            ->select('properties.*','properties.id as p_id','locations.*','galleries.*','statuses.*','types.*','users.*')
            ->get();
        }
         // dd($properties);
        return view('frontend.property_type' ,compact('properties'));
    }


    public function propertySearch(Request $request)
    {
        
        // dd($request); 
        $status = $request->status;
        $type = $request->type;
        $bedroom = $request->bedroom;
        $bathroom = $request->bathroom;
        $keyword = $request->keyword;
        // echo $status."=>".$type."=>".$bedroom."=>".$bathroom."=>".$keyword;
        // die();


        $properties = DB::table('properties')
        ->join('statuses','statuses.id','=','properties.status_id')
        ->join('types','types.id','=','properties.type_id')
        ->join('users','users.id','=','properties.agent_id')
        ->join('locations','locations.property_id','=','properties.id')
        ->join('galleries','galleries.property_id','=','properties.id')
        ->where([
            ['status_id', '=', $status],
            ['type_id', '=', $type],
            ['bedroom', '=', $bedroom],
            ['bathroom', '=', $bathroom],
                
        ])->orWhere([
            ['status_id', '=', $status],
            ['type_id', '=', $type],
            ['bedroom', '=', $bedroom],
            ['bathroom', '=', $bathroom],
             ['keyword', 'like', "%$keyword%"],    
        ])->orWhere([
            ['status_id', '=', $status],
            ['type_id', '=', $type],
            ['bedroom', '=', $bedroom],
        ])->orWhere([
            ['status_id', '=', $status],
            ['type_id', '=', $type],
            ['bedroom', '=', $bedroom],
            ['keyword', 'like', "%$keyword%"],
        ])->orWhere([
            ['status_id', '=', $status],
            ['type_id', '=', $type],
            ['bathroom', '=', $bathroom],
            ['keyword', 'like', "%$keyword%"],
        ])->orWhere([
            ['status_id', '=', $status],
            ])

        ->select('properties.*','properties.id as p_id','locations.*','galleries.*','statuses.*','types.*','users.*')
        ->get();

        // dd($properties);
      
        return view('frontend.property_type' ,compact('properties'));
    }

     public function getMaps()
    {
        $location= Location::all();
        return $location;
    }


}
