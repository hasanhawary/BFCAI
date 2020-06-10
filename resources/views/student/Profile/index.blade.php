@extends('layouts.instructor.app')

@section('content')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-user dropdown-icon bg-blue"></i>
                    <div class="d-inline">
                        <h2>@lang('site.my_profile')</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ iurl('/') }}"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('site.profile')</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    {!! Form::open(['route' => ['instructor.profile.update' , $user->id],'method' => 'put' , 'files'=>true]) !!}
    <div class="row mt-40">
        <div class="col-md-12">
            <div class="row">
                <!-- left column -->
                <div class="col-md-3">
                    <div class="form-group projectlogoDiv">
                        <div class="text-center mt-50 mb-50">
                            <img src="{{asset('storage/'.$user->image)}}" class="avatar image-preview rounded-circle" style="width: 130px;" alt="avatar" />
                            <label for="projectIdea" class="mt-15"><h6>@lang('site.change_profile_picture')<i data-toggle="tooltip" data-placement="top" title="@lang('site.choice_photo')" class="ik ik-info mx-2"></i></h6></label> 
                            <input type="file" value="user.jpg" name="image" class= "image file-upload-default">
                            <div class="input-group">
                                <input type="text" class="form-control image file-upload-info" disabled
                                    placeholder="@lang('site.upload_image')">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">@lang('site.select_image')</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 offset-md-1 personal-info">
                    <h3 class="mb-40">@lang('site.edit_profile_data')</h3>
                        <div class="form-group row {!! $errors->has('first_name')? 'has-error' : '' !!}">
                            {!! Form::label('first_name', trans('site.first_name'), ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('first_name',$user->first_name, ['class' => ' form-control']) !!}
                            </div>
                            <span class="help-block">{!! $errors->has('first_name')? $errors->first('first_name') : '' !!}</span>
                        </div>
                        <div class="form-group row {!! $errors->has('last_name')? 'has-error' : '' !!}">
                            {!! Form::label('last_name', trans('site.last_name'), ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('last_name',$user->last_name, ['class' => ' form-control']) !!}
                            </div>
                            <span class="help-block">{!! $errors->has('last_name')? $errors->first('last_name') : '' !!}</span>
                        </div>
                        <div class="form-group row {!! $errors->has('email')? 'has-error' : '' !!}">
                            {!! Form::label('email', trans('site.email'), ['class' => 'col-md-2 control-label ']) !!}
                            <div class="col-md-8">
                                {!! Form::text('email',$user->email, ['class' => ' form-control','disabled']) !!}
                            </div>
                            <span class="help-block">{!! $errors->has('email')? $errors->first('email') : '' !!}</span>
                        </div>
                        <div class="form-group row {!! $errors->has('phone')? 'has-error' : '' !!}">
                            {!! Form::label('phone', trans('site.phone'), ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('phone',$user->phone, ['class' => ' form-control','placeholder' => '01005164154']) !!}
                            </div>
                            <span class="help-block">{!! $errors->has('phone')? $errors->first('phone') : '' !!}</span>
                        </div>
                        
                        <div class="form-group row">
                            {!! Form::label('', '', ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                {!!Form::submit(trans('site.save'),["class" => "btn btn-primary btn-lg"])!!}
                                {!!Form::reset(trans('site.reset'),["class" => "btn btn-dark btn-lg"])!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     {!!Form::close()!!}
@endsection
