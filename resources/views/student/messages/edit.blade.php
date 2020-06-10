@extends('layouts.student.app')
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
        margin-top: 5px;
    }

    .select2-container--default .select2-selection--multiple {
        background-color: #fff;
        border: 1px solid transparent; 
        border-radius: 4px; 
        cursor: text; 
    }

    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border: 1px solid transparent !important;
    }

    .select2-dropdown.select2-dropdown--below {
        margin-top: 5px;
    }

    .test{
        margin-top: 7px !important;
    }
     .view_message
    {
        color: #86939e;
    }
    .view_message:hover
    {
        color: #333;
    }
</style>
@endpush

@push('script')
<script>
    $(document).ready(function(){
        $(".star_status").on("click", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            $.ajax({
                url: "{{route('student.messages.star')}}",
                dataType: 'html',
                method: 'get',
                data: { _token:'{{ csrf_token() }}', id: id},
                success:function(data){ 
                    $("#star"+id+"").empty();               
                    $("#star"+id+"").append(data);
                    e.preventDefault();
                }
            });
        }); 
        $('#sent').on('click', function (e) {
            $("#message").empty();
            e.preventDefault();
            $.ajax({
                url: "{{route('student.messages.sent',[$semester,$users])}}",
                dataType: 'html',
                type: "post",
                data: { _token:'{{ csrf_token() }}'},
                success:function(data){ 
                    $("#message").empty();               
                    $("#message").html(data);
                }
            });
        });

        $('#inbox').on('click', function (e) {
            $("#message").empty();
            e.preventDefault();
            $.ajax({
                url: "{{route('student.messages.inbox',[$semester,$users])}}",
                dataType: 'html',
                type: "post",
                data: { _token:'{{ csrf_token() }}'},
                success:function(data){ 
                    $("#message").empty();               
                    $("#message").html(data);
                },
            });
        });
        $('#draft').on('click', function (e) {
            $("#message").empty();
            e.preventDefault();
            $.ajax({
                url: "{{route('student.messages.draft',[$semester,$users])}}",
                dataType: 'html',
                type: "post",
                data: { _token:'{{ csrf_token() }}'},
                success:function(data){ 
                    $("#message").empty();               
                    $("#message").html(data);
                },
            });
        });
        $('#important').on('click', function (e) {
            $("#message").empty();
            e.preventDefault();
            $.ajax({
                url: "{{route('student.messages.important',[$semester,$users])}}",
                dataType: 'html',
                type: "post",
                data: { _token:'{{ csrf_token() }}'},
                success:function(data){ 
                    $("#message").empty();               
                    $("#message").html(data);
                },
            });
        });

    });
</script>
@endpush
@push('script')
    <script></script>
    <script>
        CKEDITOR.replace('editorH');
        $(document).ready(function () {
            $(".limitedNumbSelect2").select2({
                maximumSelectionLength: 1,
                placeholder: " User Name..."
            })
        });

    Dropzone.autoDiscover = false;    
    $("#myzone").dropzone({ 
        url: "{{route('student.messages.upload_file',$message->id)}}",
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
                url:"{{route('student.messages.delete_file')}}",
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
                var mock = {name: '{{ $file->name }}', fid: '{{ $file->id }}', size: '{{ $file->size }}', type: '{{ $file->mime_type }}'};
                this.emit('addedfile', mock);
                this.options.thumbnail.call(this,mock,"{{ url('storage/'.$file->full_file) }}");
                $('.dz-progress').remove();
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
  
    </script>
@endpush 

@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row">
                <div class="col">
                    <h3 class="my-3">
                        
                        <i class="icon  icon-message"></i> Messages ({{$users}})
                    </h3>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="animated fadeInUpShort my-3">
            <div class="row">
                <div class="col-md-3">
                    <ul class="list-group shadow my-actions">
                        {{-- <a href="#" style="text-decoration:none;">
                            <li class="list-group-item list-group-item-action">
                                <i class="far fa-envelope-open text-blue pr-3"></i>
                                All<span class="badge r-3 badge-primary float-right">4</span>
                            </li>
                        </a> --}}
                        <a href="#" id="inbox" style="text-decoration:none;">
                            <li class="list-group-item list-group-item-action" >
                                <i class="icon icon-inbox text-blue"></i>
                                Inbox
                                <span class="badge r-3 badge-primary float-right">4</span>
                            </li>
                        </a>
                        <a href="#" id="sent" style="text-decoration:none;">
                            <li class="list-group-item list-group-item-action "  >
                                <i class="icon icon-envelope-o text-yellow"></i>
                                Sent
                            </li>
                        </a>
                        <a href="#" id="important" style="text-decoration:none;">
                            <li class="list-group-item list-group-item-action">
                            <i class="icon icon-star text-purple"></i>
                                Important
                            </li>
                        </a>
                        <a href="#" id="draft" style="text-decoration:none;">
                            <li class="list-group-item list-group-item-action">
                                <i class="icon icon-file-text-o text-purple"></i>
                                Drafts
                            </li>
                        </a>
                        <a href="{{route('student.messages.create',[$semester,$users])}}" style="text-decoration:none;">
                            <li class="list-group-item list-group-item-action">
                            <i class="far fa-plus-square text-success pr-3"></i>
                            Create Message
                            </li>
                        </a>
                    </ul>
                </div>
               
                <div class="col-md-9" >
                    <div class="row d-flex bd-highlight no-gutters">
                        <div class="flex-fill b-l height-full white">
                            <div class="table-responsive" id="message">
                                <div class="card b-0 r-0 shadow">  
                                    <form action="{{route('student.messages.update', [$semester,$users,$message->id])}}" method="post">
                                        {{ csrf_field() }}
                                        @method('put')

                                        <div class="form-group has-icon m-0">
                                            <i class="far fa-user"></i>
                                            <select name="receive_user_id" class="limitedNumbSelect2 @error('receive_user') is-invalid @enderror" multiple="true" >
                                            @foreach($users_name as $user_name)
                                            <option value="{{$user_name->id}}">{{$user_name->full_name}}</option>
                                            @endforeach
                                            </select>
                                            @error('receive_user')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="b-b test"></div>

                                        <div class="form-group subject has-icon m-0">
                                            <i class="icon-subject"></i>
                                            <input name="subject" class="form-control form-control-lg r-0 b-0  @error('subject') is-invalid @enderror" type="text" name="email" id="subject" placeholder="Subject">
                                            @error('subject')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <textarea name="content" required class="form-control r-0 b-0 p-t-40 editorH  @error('content') is-invalid @enderror" id="editorH" placeholder="Write Something..." rows=6>{{!empty($message->content) ? $message->content : ''}}</textarea>
                                            @error('content')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="b-b"></div>

                                        <div class="form-group">
                                            <div class="dropzone" id="myzone"></div> 
                                        </div>
                                        
                                        <div class="card-footer">
                                            <button class="btn btn-primary l-s-1 s-12 text-uppercase">
                                                Send Message
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Add New Message Fab Button-->
    <a href="{{route('student.messages.create',[$semester,$users])}}" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i class="icon-add"></i>
    </a>
</div>
@endsection







    