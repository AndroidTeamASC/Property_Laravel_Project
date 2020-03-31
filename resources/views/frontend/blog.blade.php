@extends('frontend/blog_template')
@section('context')
    <div class="col-lg-8 col-md-12" id="search_blogs">
        @foreach($posts as $post)
        <div class="blog-1">
            <div class="blog-photo">
                <img src="{{asset($post->image)}}" alt="blog-img" class="img-fluid" style="height: 350px">
                <div class="date-box">
                    {{$post->created_at->diffForHumans()}}
                </div>
            </div>
            <div class="detail">
                <h2>
                    <a href="{{route('blog_detail', $post->id)}}">{{$post->title}}</a>
                </h2>
                <div class="post-meta clearfix">
                    <span><a href="#" tabindex="0"><i class="fa fa-user"></i>{{$post->user->name}}</a></span>
                    @php
                        $comments = $post->comments;
                        $length = count($comments);
                        if($length == 0){   
                            $comment = 0;
                        }else{
                            $comment = $length;
                        }
                    @endphp

                    <span><a href="#" tabindex="0"><i class="fa fa-comment"></i>{{$comment}}</a></span>
                    <span><a href="#" tabindex="0"><i class="fa fa-heart-o"></i>27</a></span>
                </div>
                <p class="text-justify">{{ Str::limit($post->context, 250) }}</p>
                <a href="{{route('blog_detail', $post->id)}}" class="read-more">Read more</a>
            </div>
        </div>
        @endforeach
    </div>
@endsection
