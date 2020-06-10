@extends('layouts.instructor.app')

@section('content')
<div class="page-header">
	<div class="row align-items-end">
		<div class="col-lg-8">
			<div class="page-header-title">
				<i class="ik ik-lock dropdown-icon bg-blue"></i>
				<div class="d-inline">
					<h2>@lang('site.password_modification')</h2>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<nav class="breadcrumb-container" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="index.html"><i class="ik ik-home"></i></a>
					</li>

					<li class="breadcrumb-item active" aria-current="page">@lang('site.change_password')</li>
				</ol>
			</nav>
		</div>
	</div>
</div>



<div class="row mt-40">
<div class="col-md-12">




	<div class="row">

      <!-- edit form column -->
      <div class="col-md-8 offset-md-2">
        @include('partials._errors')    
        <h3 class="mb-40">@lang('site.change_password')</h3>
        
    <form action="{{ route('instructor.change_password.update', $user->id) }}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
        {{ method_field('put') }}

          <div class="form-group row">
            <label class="col-md-3 control-label">@lang('site.current_password')</label>
            <div class="col-md-8">
              <input class="form-control" name="password_old" type="password" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 control-label">@lang('site.new_password')</label>
            <div class="col-md-8">
              <input class="form-control" name="password" id="newPasswordAgain" type="password" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 control-label">@lang('site.password_again')</label>
            <div class="col-md-8">
              <input class="form-control" name="password_confirmation" id="newPasswordAgain" type="password" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary btn-lg" value="@lang('site.save')">
              <span></span>
              <input type="reset" class="btn btn-dark btn-lg" value="@lang('site.reset')">
            </div>
          </div>
        </form>
      </div>
  </div>



</div>
</div>
@endsection