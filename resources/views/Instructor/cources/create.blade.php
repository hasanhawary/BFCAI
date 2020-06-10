@extends('layouts.Instructor.app')

@section('content')
<div class="page-header">
	<div class="row align-items-end">
		<div class="col-lg-8">
			<div class="page-header-title">
				<i class="ik ik-upload bg-blue"></i>
				<div class="d-inline">
					<h2>@lang('site.add_course')</h2>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<nav class="breadcrumb-container" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
					<a href="{{ iurl('/') }}"><i class="ik ik-home"></i></a>
					</li>
					<li class="breadcrumb-item" aria-current="page">@lang('site.add_course')</li>
				</ol>
			</nav>
		</div>
	</div>
</div>
<div class="row mt-40">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3>@lang('site.add_course')</h3>
				<div class="card-header-right">
					<ul class="list-unstyled card-option">
						<li><i class="ik ik-minus minimize-card"></i></li>
					</ul>
				</div>
			</div>
			<div class="card-body wizard-content vtab-steps-Container">
				<form action="{{route('instructor.cources.store')}}" method="post"enctype="multipart/form-data" data-toggle="validator">
					@csrf
					<div class="dd" data-plugin="nestable">
						<div class="row">
							<div class="col-md-10 offset-md-1">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="name">@lang('site.course_name_ar')</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<i class="ik ik-book-open"></i>
													</div>
												</div>
												<input id="name_ar" value="{{old('name_ar')}}" name="name_ar" placeholder="@lang('site.course_name_ar')" type="text"  class="form-control  @error('name_ar') is-invalid @enderror">
												@error('name_ar')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="name">@lang('site.course_name_en')</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<i class="ik ik-book-open"></i>
													</div>
												</div>
												<input id="name_en" value="{{old('name_en')}}" name="name_en" placeholder="@lang('site.course_name_en')" type="text"  class="form-control  @error('name_en') is-invalid @enderror">
												@error('name_en')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="age">@lang('site.course_code')</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<i class="ik ik-edit"></i>
													</div>
												</div>
												<input value="{{old('cource_code')}}" type="text"
													name="cource_code" placeholder="@lang('site.course_code')"
													class="form-control @error('cource_code') is-invalid @enderror" >
													@error('cource_code')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>s
													@enderror
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="img">@lang('site.course_image')</label>

											<input type="file" value="{{old('image')}}" name="image"
												class="file-upload-default  @error('name') is-invalid @enderror">
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<i class="ik ik-camera"></i>
													</div>
												</div>
												<input type="text"
													class="form-control  @error('image') is-invalid @enderror file-upload-info"
													placeholder="@lang('site.course_image')"
													disabled>
												<span class="input-group-append">
													<button
														class="file-upload-browse btn btn-primary"
														type="button">@lang('site.select_image')</button>
												</span>
												@error('image')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="projectIdea">@lang('site.course_description')<i data-toggle="tooltip" data-placement="top" title="Explain the Cource Description" class="ik ik-info mx-2"></i></label>
											<textarea type="text" class="form-control cke_rtl @error('description') is-invalid @enderror"  cols="10" id="editor1" name="description" rows="10">{{old('description')}}</textarea>
											@error('description')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group text-center row">
						<label class="col-md-2 control-label"></label>
						<div class="col-md-8">
							<button type="submit" class="btn btn-primary ehab">@lang('site.save')</button>
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
@endsection


