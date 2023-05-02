@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="mt-3 text-white mx-0 mx-lg-5 blog">
            <p class="fs-2 text-center">@lang('blog.blog')</p>
            @if (Auth::check())
            <div class="row">
                <div class="col-12 text-end">
                    <span id="add-post" class="text-end mx-3 background-add"><i class="fa-solid fa-plus fa-xl text-end" style="color: #ffffff;"></i></span>
                </div>
            </div>
            @endif
            @foreach($posts as $post)
                <div id="post">
                    <p class="text-start mx-4 mb-2 fs-5">{{$post->date}}</p>
                    <div id="comm" class="publication mx-4 text-white">
                        <p class="text-start mx-2 mb-2 fs-5">{{$post->author}}</p>
                        <p class="mx-2">{{$post->text}}</p>
                        <div class="text-end me-2">
                            @if (Auth::check())
                            <span>Удалить</span>
                            <span id="lala">Изменить</span>
                            @endif
                            @if($comments->has($post->id))
                                <i id="renderComments"  data-post-id="{{$post->id}}" class="fa-regular fa-comment fa-xl mx-1" style="color: #ffffff;"></i>
                                <span id="countComments" class="text-warning">{{$comments->get($post->id)}}</span>
                            @else
                                <i id="open" class="fa-regular fa-comment fa-xl mx-1" style="color: #ffffff;"></i>
                                <span class="text-warning">0</span>
                            @endif

                            @if($likes->has($post->id))
                                <i  class="fa-regular fa-thumbs-up fa-xl mx-1 like" data-post-id="{{$post->id}}" style="color: #ffffff;"></i>
                                <span id="countLikes"  class="text-warning">{{$likes->get($post->id)}}</span>
                            @else
                                <i   id="like" class="fa-regular fa-thumbs-up fa-xl mx-1" style="color: #ffffff;"></i>
                                <span id="countLikes"  class="text-warning" data-post-id="{{$post->id}}">0</span>
                            @endif
                            @if($dislikes->has($post->id))
                                <i class="fa-regular fa-thumbs-down fa-xl mx-1 dislike" data-post-id="{{$post->id}}" style="color: #f2f2f2;"></i>
                                <span id="countDisLikes">{{$dislikes->get($post->id)}}</span>
                            @else
                                <i class="fa-regular fa-thumbs-down fa-xl mx-1 dislike" data-post-id="{{$post->id}}" style="color: #f2f2f2;"></i>
                                <span id="countDisLikes">0</span>
                            @endif
                        </div>
                    </div>
                </div>

            @endforeach



        </div>
    </div>


@endsection
