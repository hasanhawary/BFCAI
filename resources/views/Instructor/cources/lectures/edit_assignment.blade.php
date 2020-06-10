@extends('layouts.Instructor.app')
@push('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>

	<script>
		$(function () {
			$("#datetime1").datetimepicker({
				useCurrent: true,
			});
			$("#datetime2").datetimepicker();
			$("#datetime2").on("dp.change", function (e) {
                $('#datetime1').data("DateTimePicker").minDate(e.date);
            });
            $("#datetime1").on("dp.change", function (e) {
                $('#datetime2').data("DateTimePicker").maxDate(e.date);
            });
		});
    </script>
    
    <script>
		Dropzone.autoDiscover = false;    
		$(function () {
			$("#myzone").dropzone({  
				url: "{{route('instructor.lecture.upload_file',[$assignment->id,'assignment'])}}",
				paramName: 'file',
				method: 'post',
				uploadMultiple: false,
				maxFiles: 20,
				maxFilesize: 40,
				parallelUploads: 20,
				acceptedFiles: ".pdf,.doc,.xls,.docx,.xlsx,.jpg,.png,.gif,.jpeg,.pptx,.mp4",
				dictDefaultMessage: '<span>Drop or Click to add Attachments</span><div>You can also click to open file browser</div>',
				dictRemoveFile: 'delete file',
				params: {
					_token: "{{ csrf_token()}}"
				},
				addRemoveLinks: true,
				removedfile:function(file){
					$.ajax({
						url:"{{route('instructor.lecture.delete_file')}}",
						dataType: 'json',
						type: 'post',
						data: {
							_token:'{{ csrf_token() }}',
							id: file.fid
						}
					});
					var fmock;
					return (fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement): void 0;
				},
				init:function(){
					@foreach ($assignment->files()->get() as $file)
						@if($file->file_type == 'assignments')
							var mock = {name: '{{ $file->name }}', fid: '{{ $file->id }}', size: '{{ $file->size }}', type: '{{ $file->mime_type }}'};
							this.emit('addedfile', mock);
							this.options.thumbnail.call(this,mock,"{{ url('storage/'.$file->full_file) }}");
							$('.dz-progress').remove();
						@endif
					@endforeach

					this.on('sending',function(file,xhr,formDate){
						formDate.append('fid','');
						file.fid = '';
					});

					this.on('success',function(file,response){
						file.fid = response.id;
					});           
				}
			});
		});
    </script>
@endpush 
@push('style')
	<style>  
		.dropzone { 
			border:2px dashed #999999;
			border-radius: 5px;
			padding: 30px;
		}

		.dropzone .dz-default.dz-message span,
		.dropzone .dz-default.dz-message div{
			display: block;
			font-size: 22px;
			text-align: center;
		}

		.dropzone .dz-default.dz-message div{
			font-size: 18px;
			margin-top: 3px;
		}
	</style>
@endpush
@section('content')
<div class="page-header">
	<div class="row align-items-end">
		<div class="col-lg-8">
			<div class="page-header-title">
				<i class="ik ik-upload bg-blue"></i>
				<div class="d-inline">
					<h2>@lang('site.add_assignment')</h2>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<nav class="breadcrumb-container" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
					<a href="{{ iurl('/') }}"><i class="ik ik-home"></i></a>
					</li>
					<li class="breadcrumb-item" aria-current="page">
                      	@lang('site.add_assignment')
       				</li>
				</ol>
			</nav>
		</div>
	</div>
</div>
<div class="row mt-30">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body wizard-content vtab-steps-Container">
				<form action="{{ route('instructor.lecture.update',$assignment->id) }}" method="post" files=true enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="type" value="assignment">
					<div class="dd" data-plugin="nestable">
						<div class="row">
							<div class="col-md-12 ">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="name">@lang('site.assignemnt_name')</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<i class="ik ik-book-open"></i>
													</div>
												</div>
												<input id="name" value="{{$assignment->name}}" name="name"placeholder='@lang('site.assignemnt_name')' type="text"  class="form-control  @error('name') is-invalid @enderror">
												@error('name')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="grade">Assignment Grade</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<i class="ik ik-book-open"></i>
													</div>
												</div>
												<input id="grade" value="{{$assignment->grade}}" name="grade"placeholder='Assignment Grade' type="text"  class="form-control  @error('grade') is-invalid @enderror">
												@error('grade')
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
										<div class="form-group mb-20">
											<label for="BusinessIncubators">
												<i data-toggle="tooltip" data-placement="top" title="It has a deadline?" class="ik ik-info mx-2"></i>
												Is that Assignment has a deadline?
											</label>
											<div class="form-radio ml-4">
												<div class="radio radio-inline">
													<label>Yes
														<input type="radio" name="BusinessIncubators" class="showOtherFiled">
														<i class="helper"></i>
													</label>
												</div>
												<div class="radio radio-inline">
													<label>No
														<input type="radio" name="BusinessIncubators" checked>
														<i class="helper"></i>
													</label>
												</div>
											</div>
											<div class="col-md-12 otherRowinput" >
												<div class="form-group">
													<div class="container">
														<div class="row">
															<div class="col-md-6 ">
																<label class=" bold"><strong>Start Date</strong> </label><br>
																<div class="input-group">
																	<div class="input-group-prepend" style="width: -webkit-fill-available;">
																		<div class="input-group-text">
																			<i class="ik ik-arrow-right"></i>
																		</div>
																		<input id="datetime1" class="form-control pull-right">
																	</div>
																</div>
															</div>
															<div class="col-md-6 ">
																<label class=" bold"><strong>End Date</strong> </label><br>
																<div class="input-group">
																	<div class="input-group-prepend" style="width: -webkit-fill-available;">
																		<div class="input-group-text">
																			<i class="ik ik-arrow-right"></i>
																		</div>
																		<input id="datetime2" class="form-control pull-right">
																	</div>
																</div> 
															</div>
														</div>	
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="description">@lang('site.video_description')
												<i data-toggle="tooltip" data-placement="top" title="Explain the Lecture Description" class="ik ik-info mx-2"></i>
											</label>
											<textarea type="text" class="form-control cke_rtl @error('description') is-invalid @enderror"  cols="10" id="editor1" name="description" rows="10">{!!$assignment->description!!}</textarea>
											@error('description')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group mt-20">
											<div class="dropzone" id="myzone" ></div> 
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


