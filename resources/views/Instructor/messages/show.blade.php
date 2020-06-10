
@extends('layouts.instructor.app')
@push('style')
    <style>
        .card{
        width:90% !important;
        margin: auto;
        background-color: #FFF;
        border-radius: 10px;
        }
        .display-message {
            border:none !important;
            height: 300px ;
            max-width: 100%;
            background-color: #FFF;
            border:1px solid #EEE
        }  


        .Mheader{
            position: relative;
            margin-left: 0 !important;
            margin-right: 0 !important;
        }

        .Mheader .the-photo {
            padding: 10px;
            
        }

        .Mheader .the-photo img{
            border-radius: 50%;
            width: 145px;
            height:145px;
        }
        .display-message{
            overflow-y: scroll;
            border:1px solid #EEE !important;
        }
        .dis-content{
            padding-top: 15px;
        }

        .reply-mess{
            text-decoration: none;
            padding: 10px 20px ;
            border:1px solid rgb(105, 105, 105);
            color:rgb(105, 105, 105);
        }

        .tools-me{
            margin-bottom:20px;
            
        }
        .align-file, .view-file, .dwn-file{
            font-size: x-large;
            margin:0 10px;
            cursor: pointer;
            color:rgb(160, 158, 158);
        }

        .align-file:hover{
            color:#f05138;
        }

        .view-file:hover{
            color:#0062cc;
        }

        .dwn-file:hover{
            color:#FF7E39;
        }

        .card-footer{
            margin-bottom: 15px
        }
    </style>
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
@push('script')
    <script> $(document).ready(function() { $('.select1').niceSelect(); }); </script>
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

@push('script')
    <script>
        $(document).ready(function(){
            let send_user = $("#send_user").val();
            let send_user_id = $("#send_user_id").val();

            $('#replayMessage').on('click', function (e) {
                $("#message").empty();
                $("#loading").css("display", "flex");
                e.preventDefault();
                $.ajax({
                    url: "{{ route('instructor.messages.replay') }}",
                    dataType: 'html',
                    type: "post",
                    data: { _token:'{{ csrf_token() }}',send_user:send_user,send_user_id:send_user_id},
                    success:function(data){ 
                        $("#loading").css("display", "none");
                        $("#message").empty();               
                        $("#message").html(data);
                    },
                    complete:function(data){                    
                       
                        CKEDITOR.replace('editor1', {
                            extraPlugins: 'placeholder',
                            height: 220
                        });

                        Dropzone.autoDiscover = false;    
                        $(function () {
                            let message_replay_id= $("#message_replay").val();
                            $("#myzone").dropzone({ 
                                url: "{{route('instructor.messages.upload_file',1)}}",
                                paramName: 'file',
                                method: 'post',
                                uploadMultiple: false,
                                maxFiles: 20,
                                maxFilesize: 40,
                                parallelUploads: 20,
                                acceptedFiles: ".pdf,.doc,.xls,.docx,.xlsx,.jpg,.png,.gif,.jpeg,.pptx,.mp4",
                                dictDefaultMessage: '<span>Drop or Click to add Attachments</span><div>You can also click to open file browser</div>',
                                params: {
                                    _token: "{{ csrf_token()}}",
                                    message_replay_id: message_replay_id
                                }   
                            });  
                        });
                        $('#replay_click').trigger('click');
                    }
                });
            });
        });
    </script>
@endpush

@section('content')

<input type="hidden" name="send_user"  value="{{$message->send_user}}" id="send_user">
<input type="hidden" name="send_user_id" value="{{$message->send_user_id}}"  id="send_user_id">

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                    <i class="far fa-envelope bg-blue"></i>
                <div class="d-inline">
                    <h2>View Email</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="cpIndex.html"><i class="ik ik-home"></i></a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">View Email</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row mt-35">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body">
                <div class="media">
                    <img class="d-flex mr-3 height-50" style="border-radius: 10px; !important" src="{{asset('storage/'.$user->image)}}" alt="Generic placeholder image">
                    <div class="media-body">
                        <h6 class="mt-0 mb-1 font-weight-normal">{{$user->full_name}}</h6>
                        <span>Message From {{$message->send_user}}</span>
                        <br>
                        <small>{{$message->created_at}}</small>
                        <div class="collapse my-3 show">
                            <div> {!! $message->content!!}</div>
                            <div class="btn-group float-right">
                                <a class="btn btn-outline-primary btn-xs" href="#" data-toggle="modal" data-target="#replay">Forward</a>
                                @if (instructor()->id == $message->send_user_id and $message->send_user == 'instructors')
                                @else
                                <a class="btn btn-outline-primary btn-xs" id="replayMessage" href="#">Reply</a>
                                @endif
                                <a class="btn btn-outline-danger btn-xs" href="#deleteModal{{$message->id}}" data-toggle="modal" data-target="#deleteModal{{$message->id}}">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Attachments Start-->
            <div class="card-footer white">
                <ul class="mailbox-attachments clearfix">
                    @if (!empty($message->files()->first()))
                        @foreach ($message->files as $file)
                            @if($file->file_type == 'messages')
                                <li >
                                    @php
                                        $tmp = explode('/',$file->mime_type);
                                        $end = reset($tmp);
                                        $mim_type = strtolower($end);
                                    @endphp
                                    @if ($mim_type != 'image')
                                        @php
                                            $tmp = explode('.',$file->name);
                                            $end = end($tmp);
                                            $file_ext = strtolower($end);
                                        @endphp

                                        @if ($file_ext == 'pdf')
                                            <span class="mailbox-attachment-icon" style="max-height: 145px !important" >
                                                <i class="icon-document-file-pdf text-danger"></i>
                                            </span>
                                            <div class="mailbox-attachment-info" style="">
                                                <a href="{{ route('instructor.message.view',$file->id) }}" target="" class="mailbox-attachment-name"><i class="icon-paperclip"></i> {{$file->name}} &nbsp;</a>
                                                <span class="mailbox-attachment-size">&nbsp;{{number_format($file->size /1000)}} KB</span>
                                                <a href="{{ route('instructor.message.download',$file->id) }}" class="btn btn-danger btn-xs mt-5" style="display:block !important; height:30px !important; line-height: 10px !important;"><i class="icon-cloud-download"></i></a>
                                            </div>
                                        @elseif($file_ext == 'pptx')
                                            <span class="mailbox-attachment-icon" style="max-height: 145px !important">
                                                <i class="icon-document-file-ppt text-info"></i>
                                            </span>
                                            <div class="mailbox-attachment-info" style="">
                                                <a href="{{ route('instructor.message.view',$file->id) }}" target="" class="mailbox-attachment-name"><i class="icon-paperclip"></i> {{$file->name}} &nbsp;</a>
                                                <span class="mailbox-attachment-size">&nbsp;{{number_format($file->size /1000)}} KB</span>
                                                <a href="{{ route('instructor.message.download',$file->id) }}" class="btn btn-info btn-xs mt-5" style="display:block !important; height:30px !important; line-height: 10px !important;"><i class="icon-cloud-download"></i></a>
                                            </div>
                                        @elseif($file_ext == 'docx')
                                            <span class="mailbox-attachment-icon" style="max-height: 145px !important">
                                                <i class="icon-document-file-doc text-primary"></i>
                                            </span>
                                            <div class="mailbox-attachment-info" style="">
                                                <a href="{{ route('instructor.message.view',$file->id) }}" target="" class="mailbox-attachment-name"><i class="icon-paperclip"></i> {{$file->name}} &nbsp;</a>
                                                <span class="mailbox-attachment-size">&nbsp;{{number_format($file->size /1000)}} KB</span>
                                                <a href="{{ route('instructor.message.download',$file->id) }}" class="btn btn-primary btn-xs mt-5" style="display:block !important; height:30px !important; line-height: 10px !important;"><i class="icon-cloud-download"></i></a>
                                            </div>
                                        @elseif($file_ext == 'xls')
                                            <span class="mailbox-attachment-icon" style="max-height: 145px !important">
                                                <i class="icon-document-file-xls text-success"></i>  
                                            </span>
                                            <div class="mailbox-attachment-info" style="">
                                                <a href="{{ route('instructor.message.view',$file->id) }}" target="" class="mailbox-attachment-name"><i class="icon-paperclip"></i> {{$file->name}} &nbsp;</a>
                                                <span class="mailbox-attachment-size">&nbsp;{{number_format($file->size /1000)}} KB</span>
                                                <a href="{{ route('instructor.message.download',$file->id) }}" class="btn btn-success btn-xs mt-5" style="display:block !important; height:30px !important; line-height: 10px !important;"><i class="icon-cloud-download"></i></a>
                                            </div>
                                        @else
                                            <span class="mailbox-attachment-icon" style="max-height: 145px !important">
                                                <i class="icon-paperclip text-danger"></i>  
                                            </span>
                                            <div class="mailbox-attachment-info" style="">
                                                <a href="{{ route('instructor.message.view',$file->id) }}" target="" class="mailbox-attachment-name"><i class="icon-paperclip"></i> {{$file->name}} &nbsp;</a>
                                                <span class="mailbox-attachment-size">&nbsp; &nbsp; {{number_format($file->size /1000)}} KB</span>
                                                <a href="{{ route('instructor.message.download',$file->id) }}" class="btn btn-danger btn-xs mt-5" style="display:block !important; height:30px !important; line-height: 10px !important;"><i class="icon-cloud-download"></i></a>
                                            </div>
                                        @endif 
                                    @else
                                        <span class="mailbox-attachment-icon has-image" style="max-height: 137px !important"><img  style="max-height: 120px !important; max-width: 120px !important;"src="{{asset('storage/'.$file->full_file)}}" alt="{{$file->name}}"></span>
                                        <div class="mailbox-attachment-info">
                                            <a href="{{ route('instructor.message.view',$file->id) }}" target="" class="mailbox-attachment-name"><i class="icon-paperclip"></i> {{$file->name}} &nbsp;</a>
                                            <span class="mailbox-attachment-size">&nbsp;{{number_format($file->size /1000)}} KB</span>
                                            <a href="{{ route('instructor.message.download',$file->id) }}" class="btn btn-success btn-xs mt-5" style="display:block !important; height:30px !important; line-height: 10px !important;"><i class="icon-cloud-download"></i></a>
                                        </div>
                                    @endif    
                                </li>    
                            @endif
                        @endforeach
                    @endif

                </ul>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal{{$message->id}}"  role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('instructor.messages.destroy', $message->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <div class="modal-body">
                    Do you want delete this message?
                </div>
                <div class="modal-footer">
                    <input type="submit" id="deleteVstudy" value="Delete" class="btn btn-danger"/>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Add New Message Fab Button-->
<a href="{{route('instructor.messages.create')}}" id="addMessage" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i class="icon-add"></i></a>

<!--Message Modal-->
<div style="display: none; flex-direction: column; align-items: center; margin-top:10px;" id="loading">
    <div class="loader"></div>
    <h5 style="margin-top: 10px">@lang('site.loading')</h5>
</div>

<a data-toggle="modal" id="replay_click" data-target="#replay" class=" hidden btn btn-icon btn-danger " href='#'><i class="ik ik-trash-2 f-16 mr-10" data-toggle="tooltip" data-placement="top" ></i></a>

<div id="message"></div>
@endsection

