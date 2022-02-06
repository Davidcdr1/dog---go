@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<h1>Favorite Images</h1>
			<hr/>
			
			@foreach($likes as $like)
				@include('includes.image',['image'=>$like->image])
			@endforeach
			
			<!-- PAGINACION -->
			<div class="clearfix"></div>
			{{$likes->links()}}
        </div>
    </div>
</div>
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