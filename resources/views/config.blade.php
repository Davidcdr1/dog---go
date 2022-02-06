@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- @include('includes.message')  -->
            @if(session('message'))
            <div class="alert alert-success">
                {{ session('message')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">Edit Profile</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('update') }}" enctype="multipart/form-data" aria-label="Configuración de mi cuenta">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>
                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ Auth::user()->surname }}" required autocomplete="surname" autofocus>
                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nick" class="col-md-4 col-form-label text-md-right">{{ __('Nick') }}</label>
                            <div class="col-md-6">
                                <input id="nick" type="text" class="form-control @error('nick') is-invalid @enderror" name="nick" value="{{ Auth::user()->nick }}" required autocomplete="nick" autofocus>
                                @error('nick')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ Auth::user()->country }}" required autocomplete="country" autofocus>
                                @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ Auth::user()->city }}" required autocomplete="city">
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="biography" class="col-md-4 col-form-label text-md-right">{{ __('Biography') }}</label>
                            <div class="col-md-6">
                                <input id="biography" type="text" class="form-control @error('biography') is-invalid @enderror" name="biography" value="{{ Auth::user()->biography }}" required autocomplete="biography">
                                @error('biography')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namedog" class="col-md-4 col-form-label text-md-right">{{ __('Name Dog') }}</label>
                            <div class="col-md-6">
                                <input id="namedog" type="text" class="form-control @error('namedog') is-invalid @enderror" name="namedog" value="{{ Auth::user()->namedog }}" required autocomplete="namedog">
                                @error('namedog')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="breed" class="col-md-4 col-form-label text-md-right">{{ __('Breed') }}</label>
                            <div class="col-md-6">
                                <input id="breed" type="text" class="form-control @error('breed') is-invalid @enderror" name="breed" value="{{ Auth::user()->breed }}" required autocomplete="breed">
                                @error('breed')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="genre" class="col-md-4 col-form-label text-md-right">{{ __('Genre') }}</label>
                            <div class="col-md-6">
                                <input id="genre" type="text" class="form-control @error('genre') is-invalid @enderror" name="genre" value="{{ Auth::user()->genre }}" required autocomplete="genre">
                                @error('genre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="biographydog" class="col-md-4 col-form-label text-md-right">{{ __('Biography Dog') }}</label>
                            <div class="col-md-6">
                                <input id="biographydog" type="text" class="form-control @error('biographydog') is-invalid @enderror" name="biographydog" value="{{ Auth::user()->biographydog }}" required autocomplete="biographydog">
                                @error('biographydog')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image_path" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>
                            <div class="col-md-6">
                                @include('includes.avatar')
                                <input id="image_path" type="file" class="form-control @error('image_path') is-invalid @enderror" name="image_path" value="">
                                @error('image_path')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image_profile" class="col-md-4 col-form-label text-md-right">{{ __('Image Profile') }}</label>
                            <div class="col-md-6">
                            @include('includes.imageprofile')
                                <input id="image_profile" type="file" class="form-control @error('image_profile') is-invalid @enderror" name="image_profile" value="">
                                @error('image_profile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image_profilep" class="col-md-4 col-form-label text-md-right">{{ __('Image Profile Dog') }}</label>
                            <div class="col-md-6">
                            @include('includes.imageprofilep')
                                <input id="image_profilep" type="file" class="form-control @error('image_profilep') is-invalid @enderror" name="image_profilep" value="">
                                @error('image_profilep')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save change
                                </button>
                            </div>
                        </div>
                        <!-- <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save change
                                </button>
                            </div>
                        </div> -->

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>






@endsection