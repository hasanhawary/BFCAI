@extends('layouts.instructor.app')

{{-- @push('script')
<script>
    $("#myzone").dropzone({ 
        url: "instructor/announcments/store",
      
		paramName: 'file',
		uploadMultiple: false,
		maxFiles: 15,
		parallelUploads: 6,
		maxFilesize: 2,
        dictDefaultMessage: 'أضغد هنا لرفع الملفات او قم بسحب الملفات وافلاتها هنا',
        dictRemoveFile: 'delete',
		params: {
			_token: "{{ csrf_token()}}"
		},
    });
</script>
<style type="text/css">
	.dz-image img{
		width: 110px;
		height: 120px;
	}
</style>
@endpush --}}
@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-send bg-blue"></i>
                <div class="d-inline">
                    <h2>Announcement</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{iurl('/')}}"><i class="ik ik-home"></i></a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">Announcement</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Customer overview start -->
<div class="row mt-35">
    <div class="col-md-12">
        <div class="card my-4">
            <h5 class="card-header">Send Announcement</h5>
            <div class="card-body">
                <form action="{{route('instructor.announcments.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" required cols="10" id="editor1" name="content" rows="10"></textarea>
                    </div>


                    {{-- <div class="form-group">
                        <input name="file" class="hidden" type="file" multiple />
                        <div class="dropzone" id="myzone" ></div> 
                    </div> --}}

                    <div class="anno">
                        <label>Choice User:</label>
                        <select name="receive_user" class="form-control col-md-2">
                            <option value="students" selected>Students</option>
                            <option value="instructors">Instructors</option>
                        </select>
                        <button type="submit" class="btn btn-primary col-md-2" style="margin-left: 39%; margin-top: -50px;">Send <label class="ik ik-send"></label></button>
                    </div>   
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
