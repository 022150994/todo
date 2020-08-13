@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border border-gray rounded">

                <div class="card-body">
                    <h2 class="text-center p-2">{{ trans('main.Editprofile') }}</h2>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('posteditprofile') }}" enctype="multipart/form-data">
                        @csrf
                        {{-- name --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ trans('main.Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"  required autocomplete="name" autofocus value="{{ Auth::user()->name }}" required>
                            </div>
                        </div>
                        {{-- email --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ trans('main.Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        {{-- use image profile or not --}}
                        <div class="form-group row">
                            <label for="profileimage" class=" col-md-4 col-form-label text-md-right">{{trans('main.Useprofileimage')}}</label>
                            <div class="col-md-6 py-2 ml-4">
                                <input class="form-check-input" type="checkbox" v-model='check' v-on:click='disableimagecontainer' true-value = 'on' false-value = 'off' checked id="profileimagecheck">
                            </div>
                        </div>

                        <div class=" form-group row" id="imagecontainer">
                            <label for="Image" class="col-md-4 col-form-label text-md-right">{{ trans('main.Image') }}</label>

                            <div class="col-md-6 offse-md-3 ">
                                <input type="file" class="file-input py-1" name="avatar"/>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('main.Edit')}}
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
