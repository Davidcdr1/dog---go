@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')
            @foreach($images as $image)
            <div class="card pub_image">
                <div class="card-header">
                    @if($image->user->image)
                    <div class="container-avatar">
                    <img src="{{ route('user.avatar',['filename'=>$image->user->image]) }}" class="avatar" />
                    </div>
                    @endif
                    <div class="data-user">
                        <a href="{{route('profile', ['id' =>$image->user->id])}}">
                            {{$image->user->name}}
                            <span class="nickname">
                                {{' @'.$image->user->nick}}
                            </span>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="image-container">
                        <img src="{{route('image.file',['filename' => $image->image_path])}}" alt="">
                    </div>
                   
                    <div class="description">
                        <span class="nickname">{{'@'.$image->user->nick}}</span>
                        <span class="nickname date">{{' | '.\FormatTime::LongTimeFilter($image->created_at)}}</span>
                        <p>{{$image->description}}</p>
                    </div>
                    <div class="likes">
                      
                       <!--comprobar si el usuario le dio like a la imagen-->
                       <?php $user_like = false; ?>
                       @foreach($image->likes as $like)
                       @if($like->user->id == Auth::user()->id)
                       <?php $user_like = true; ?>
                       @endif
                       @endforeach

                       @if($user_like)
                       <img src="{{asset('images/heart-red.png')}}" data-id="{{$image->id}}" class="btn-dislike" alt="">
                       @else
                        <img src="{{asset('images/heart-black.png')}}" data-id="{{$image->id}}" class="btn-like" alt="">
                        @endif
                        <span class="number_likes">{{count($image->likes)}}</span>
                    </div>
                    <a class="btn btn-sm btn-warning btn-comments" href="{{route('image.detail', ['id' =>$image->id])}}">
                        Comments ({{count($image->comments)}})
                    </a>
                </div>
            </div>
            @endforeach

            <!-- paginacion -->
            <div class="clearfix"></div>
            {{$images->links()}}
        </div>

    </div>
</div>
@include('footer')
@endsection

    
<style>
    .card {
        background-color: #bc986a !important;
    }
    .pub_image .nickname {
        color: black !important;
    }
    a {
        color: black !important;
        text-decoration: none;
        background-color: transparent;
    }
    .likes {
        padding: 10px;
    }
</style>