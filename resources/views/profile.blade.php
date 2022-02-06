@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			
			<div>
			
				
				
				<div class="clearfix"><h2>Gallery Images</h2></div>
				<hr>
			</div>
			
			<div class="clearfix"></div>
			
			@foreach($user->images as $image)
				@include('includes.image',['image'=>$image])
			@endforeach

	
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