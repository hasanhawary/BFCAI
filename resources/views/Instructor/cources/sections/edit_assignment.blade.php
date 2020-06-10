@extends('layouts.Instructor.app')
@push('script')
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
					<h2>@lang('site.add_assignment') {{$assignment->type}}</h2>
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
                      	@lang('site.add_assignment') {{$assignment->type}}
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
									<div class="col-md-12">
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


