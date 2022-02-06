@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			
			<hr>

			@foreach($users as $user)
            <div class="clearfix">
			<div class="profile-user">

				@if($user->image)
				<div class="container-avatar">
					<img src="{{ route('user.avatar',['filename'=>$user->image]) }}" class="avatar" />
				</div>
				@endif

				<div class="user-info">
					<h2>{{'@'.$user->nick}}</h2>
					<h3>{{$user->name .' '. $user->surname}}</h3>
					<p>{{'Joined: '.\FormatTime::LongTimeFilter($user->created_at)}}</p>
					<a href="{{ route('profile', ['id' => $user->id])}}" class="btn btn-success">View Profile</a>
				</div>
                </div>

				<div class="clearfix"></div>
				<hr>
			</div>
			@endforeach

			<!-- PAGINACION -->
			<div class="clearfix"></div>
			{{$users->links()}}
        </div>

    </div>
</div>
@endsection

