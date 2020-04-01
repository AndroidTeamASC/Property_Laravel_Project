<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Post;
use App\Type;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $posts = Post::orderBy('id', 'desc')->take(3)->get();
        $types = Type::all();
        $houses = 0; $apartments = 0; $offices =0; $villas =0;
        foreach ($types as $type) {
            $type_name = $type->type;
            $type_id = $type->id;
            
            if ($type_name == "House") {
                $houses = Post::where('type_id', $type_id)->count();
            }
            if ($type_name == "Apartment") {
                $apartments = Post::where('type_id', $type_id)->count();
            }
            if ($type_name == "Office") {
                $offices = Post::where('type_id', $type_id)->count();
            }
            if ($type_name == "Villa") {
                $villas = Post::where('type_id', $type_id)->count();
            }      
        }
        View::share('popular_posts', $posts,$types,$houses,$apartments,$offices,$villas);
        View::share('types',$types);
        View::share('houses',$houses);
        View::share('apartments',$apartments);
        View::share('offices',$offices);
        View::share('villas',$villas);
    }
}
