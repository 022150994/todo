@extends('layouts.app')

@section('content')
<div class="container" id="app1">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('posteditprofile') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"  required autocomplete="name" autofocus value="{{ Auth::user()->name }}" required>

                            </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" value="{{ Auth::user()->email }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="profileimage" class="col-md-4 col-form-label text-md-right">{{--{{__('Profile Image')}}--}}</label>
                            <div class="col-md-6">
                                <input class="form-check-input" type="checkbox" v-model='check' v-on:click='disableimagecontainer' true-value = 'on' false-value = 'off' id="profileimagecheck">
                                <label class="form-check-label" for="profileimagecheck">
                                    {{__('User Profile Image.')}}
                                </label>
                            </div>
                        </div>

                        <div id="imagecontainer">
                            <div class="form-group row">
                                <label for="profileimage" class="col-md-4 col-form-label text-md-right">{{__('Profile Image')}}</label>
                                <div class="col-md-6">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name='image' aria-describedby="inputGroupFileAddon01">
                                    <label class="" for="inputGroupFile01">{{__('Chose Image')}}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
