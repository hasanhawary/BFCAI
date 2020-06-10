@extends('layouts.instructor.app')

@push('script')
    <script>
        $(document).ready(function() {
            $('.select1').niceSelect();
        });
        $("#country").select2( { placeholder: "Select Student Name", });
        
    </script> 
    <script>
        $(document).ready(function(){
            $('#user_type').on('change', function (e) {
                e.preventDefault();
                var optionSelected = $("option:selected", this);
                var user_type = this.value;
                $.ajax({
                    url: "{{ route('instructor.messages.load_users') }}",
                    dataType: 'html',
                    type: "post",
                    data: { _token:'{{ csrf_token() }}' ,user_type : user_type },
                    success:function(data){ 
                        $(".list_user").empty();
                        $(".list_user").html(data);
                                    
                    }
                });
            });
        });
    </script>

    <script>
    Dropzone.autoDiscover = false;    
    $(function () {
        $("#myzone").dropzone({ 
           
            url: "{{route('instructor.messages.upload_file',$message->id)}}",
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
                    url:"{{route('instructor.messages.delete_file')}}",
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
                @foreach ($message->files()->get() as $file)
                   @if($file->file_type == 'messages')
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

    .select2{
        height: 37px !important;
        margin-top: -1px !important;
        margin-bottom: -1px !important;
        padding-bottom: 15px ;
        background-color: #FFF !important;
        font-size: 20px !important;;
    }
    .select2-search.select2-search--dropdown::before{
      display: none;
    }
    .select2-container--default .select2-selection--single{
      font-size: 22px !important;
    }
    .select2-search__field{
      background-color: #EEE !important;
    }
  #select2-country-container{
      padding: 0 ;
      margin: 0;
      height: 60px !important;
    }
    .form-group{
      margin-bottom: -15px;

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
                    <h2>Send Mail</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{iurl('/')}}.html"><i class="ik ik-home"></i></a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">Send Mail</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row mt-30">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Please write the Message here</h3>
            </div>
            <div class="card-body">
                
                <form action="{{route('instructor.messages.update', $message->id)}}" method="post">
                    {{ csrf_field() }}
                    @method('put')
                    <div class="form-group" style="margin-bottom: -15px;">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="ik ik-mail"></i>
                                </div>
                            </div>
                            <input id="subject" value="{{$message->subject}}" name="subject" placeholder="@lang('site.subject')" type="text"  class="form-control  @error('subject') is-invalid @enderror">
                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="ik ik-user"></i>
                                </div>
                            </div>
                            <select class="form-control wide select1" name="receive_user" id="user_type"  required>
                                <option @if($message->receive_user == 'none') selected @endif value='none'>@lang('site.type_user...')</option>
                                <option @if($message->receive_user == 'instructors') selected @endif value="instructors">@lang('site.instructor')</option>      
                                <option @if($message->receive_user == 'students') selected @endif value="students">@lang('site.student')</option>      
                            </select>
                            @error('receive_user')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                
                                    @include('partials._errors')
                                
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group select2">
                        <select id="country" class="list_user" name="receive_user_id" >
                            <option value=0>Choice Type First</option>
                            @if(!empty($message->receive_user_id))
                                <option selected value="{{$message->receive_user_id}}">
                                    @php
                                        global $user;
                                        if($message->receive_user == 'students'){
                                            $user = \App\User::where('id',$message->receive_user_id)->first();
                                        }
                                        elseif($message->receive_user == 'instructors'){
                                            $user = \App\Instructor::where('id',$message->receive_user_id)->first();
                                        }
                                    @endphp
                                    {{$user->full_name}}
                                </option>
                            @endif
                        </select>
                        @error('receive_user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
        
                    <div class="form-group">
                        <textarea class="form-control" required cols="4" id="editor1" name="content" rows=6>{{!empty($message->content) ? $message->content : ''}}</textarea>
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mt-20">
                        <div class="dropzone" id="myzone" ></div> 
                    </div>

                    <div class="anno mt-30">
                        <button type="submit" class="btn mt-5 btn-primary col-md-2" style=" margin-left: 39%; margin-top: -50px;">Send <label class="ik ik-send"></label> </button>
                    </div>   
                </form>
            </div>
        </div>
    </div>
</div>   

@endsection


