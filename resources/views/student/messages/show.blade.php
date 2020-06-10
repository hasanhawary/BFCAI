
@extends('layouts.student.app')

@push('style')
<style>
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

@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row">
                <div class="col">
                    <h3 class="my-3">
                        <i class="icon  icon-message"></i> View {{$user->full_name}} Email
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
                <div class="col-md-9">
                    <div class="row d-flex bd-highlight no-gutters">
                        <div class="flex-fill b-l height-full white">
                            <div class="table-responsive" id="message">       
                                <div class="card b-0 ">
                                    <div class="card-body">
                                        <div data-target="#message1">
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
                                                            <a class="btn btn-outline-primary btn-xs"style="padding: 10px 13px" href="#" data-toggle="modal" data-target="#replay">Forward</a>
                                                            @if (student()->id == $message->send_user_id and $message->send_user == 'students')
                                                            @else
                                                            <a class="btn btn-outline-primary btn-xs" style="padding: 10px 13px"id="replayMessage" href="#">Reply</a>
                                                            @endif
                                                            <a class="btn btn-outline-danger btn-xs" style="padding: 10px 13px"href="#deleteModal{{$message->id}}" data-toggle="modal" data-target="#deleteModal{{$message->id}}">Delete</a>
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
                                                                        <span class="mailbox-attachment-icon" style="max-height: 145px !important">
                                                                            <i class="icon-document-file-pdf text-danger"></i>
                                                                        </span>
                                                                        <div class="mailbox-attachment-info" style="min-height: 79px !important">
                                                                            <a href="{{ route('student.message.view',$file->id) }}" target="_blank" class="mailbox-attachment-name"><i class="icon-paperclip"></i> {{$file->name}} &nbsp;</a>
                                                                            <span class="mailbox-attachment-size">&nbsp;{{number_format($file->size /1000)}} KB</span>
                                                                            <a href="{{ route('student.message.download',$file->id) }}" class="btn btn-success btn-xs float-right s-12 ml-2 r-3 bg-primary" style="height:30px !important; width:40px !important">
                                                                                <i class="icon-cloud-download"></i>
                                                                            </a>
                                                                            <a href="{{ route('student.message.view',$file->id) }}" class="btn btn-success btn-xs float-right s-12 ml-2 r-3 bg-sucess" style="height:30px !important; width:40px !important">
                                                                                <i class="far fa-eye"></i>
                                                                            </a>                                                                            
                                                                        </div>
                                                                    @elseif($file_ext == 'pptx')
                                                                        <span class="mailbox-attachment-icon" style="max-height: 145px !important">
                                                                            <i class="icon-document-file-ppt text-info"></i>
                                                                        </span>
                                                                        <div class="mailbox-attachment-info" style="min-height: 79px !important">
                                                                            <a href="{{ route('student.message.view',$file->id) }}" target="_blank" class="mailbox-attachment-name"><i class="icon-paperclip"></i> {{$file->name}} &nbsp;</a>
                                                                            <span class="mailbox-attachment-size">&nbsp;{{number_format($file->size /1000)}} KB</span>
                                                                            <a href="{{ route('student.message.download',$file->id) }}" class="btn btn-success btn-xs float-right s-12 ml-2 r-3 bg-primary" style="height:30px !important; width:40px !important">
                                                                                <i class="icon-cloud-download"></i>
                                                                            </a>
                                                                            <a href="{{ route('student.message.view',$file->id) }}" class="btn btn-success btn-xs float-right s-12 ml-2 r-3 bg-sucess" style="height:30px !important; width:40px !important">
                                                                                <i class="far fa-eye"></i>
                                                                            </a>
                                                                        </div>
                                                                    @elseif($file_ext == 'docx')
                                                                        <span class="mailbox-attachment-icon" style="max-height: 145px !important">
                                                                            <i class="icon-document-file-doc text-primary"></i>
                                                                        </span>
                                                                        <div class="mailbox-attachment-info" style="min-height: 79px !important">
                                                                            <a href="{{ route('student.message.view',$file->id) }}" target="_blank" class="mailbox-attachment-name"><i class="icon-paperclip"></i> {{$file->name}} &nbsp;</a>
                                                                            <span class="mailbox-attachment-size">&nbsp;{{number_format($file->size /1000)}} KB</span>
                                                                            <a href="{{ route('student.message.download',$file->id) }}" class="btn btn-success btn-xs float-right s-12 ml-2 r-3 bg-primary" style="height:30px !important; width:40px !important">
                                                                                <i class="icon-cloud-download"></i>
                                                                            </a>
                                                                            <a href="{{ route('student.message.view',$file->id) }}" class="btn btn-success btn-xs float-right s-12 ml-2 r-3 bg-sucess" style="height:30px !important; width:40px !important">
                                                                                <i class="far fa-eye"></i>
                                                                            </a>
                                                                        </div>
                                                                    @elseif($file_ext == 'xls')
                                                                        <span class="mailbox-attachment-icon" style="max-height: 145px !important">
                                                                            <i class="icon-document-file-xls text-success"></i>  
                                                                        </span>
                                                                        <div class="mailbox-attachment-info" style="min-height: 79px !important">
                                                                            <a href="{{ route('student.message.view',$file->id) }}" target="_blank" class="mailbox-attachment-name"><i class="icon-paperclip"></i> {{$file->name}} &nbsp;</a>
                                                                            <span class="mailbox-attachment-size">&nbsp;{{number_format($file->size /1000)}} KB</span>
                                                                            <a href="{{ route('student.message.download',$file->id) }}" class="btn btn-success btn-xs float-right s-12 ml-2 r-3 bg-primary" style="height:30px !important; width:40px !important">
                                                                                <i class="icon-cloud-download"></i>
                                                                            </a>
                                                                            <a href="{{ route('student.message.view',$file->id) }}" class="btn btn-success btn-xs float-right s-12 ml-2 r-3 bg-sucess" >
                                                                                <i class="far fa-eye"></i>
                                                                            </a>
                                                                        </div>
                                                                    @else
                                                                        <span class="mailbox-attachment-icon" style="max-height: 145px !important">
                                                                            <i class="icon-paperclip text-danger"></i>  
                                                                        </span>
                                                                        <div class="mailbox-attachment-info" style="min-height: 79px !important">
                                                                            <a href="{{ route('student.message.view',$file->id) }}" target="_blank" class="mailbox-attachment-name"><i class="icon-paperclip"></i> {{$file->name}} &nbsp;</a>
                                                                            <span class="mailbox-attachment-size">&nbsp; &nbsp; {{number_format($file->size /1000)}} KB</span>
                                                                            <a href="{{ route('student.message.download',$file->id) }}" class="btn btn-success btn-xs float-right s-12 ml-2 r-3 bg-primary" style="height:30px !important; width:40px !important">
                                                                                <i class="icon-cloud-download"></i>
                                                                            </a>
                                                                            <a href="{{ route('student.message.view',$file->id) }}" class="btn btn-success btn-xs float-right s-12 ml-2 r-3 bg-sucess" style="height:30px !important; width:40px !important">
                                                                                <i class="far fa-eye"></i>
                                                                            </a>
                                                                        </div>
                                                                    @endif 
                                                                @else
                                                                    <span class="mailbox-attachment-icon has-image" style="max-height: 137px !important"><img  style="max-height: 120px !important; max-width: 120px !important;"src="{{asset('storage/'.$file->full_file)}}" alt="{{$file->name}}"></span>
                                                                    <div class="mailbox-attachment-info" style="min-height: 79px !important; padding-top:7px;">
                                                                        <a href="{{ route('student.message.view',$file->id) }}" target="_blank" class="mailbox-attachment-name"><i class="icon-paperclip"></i> {{$file->name}} &nbsp;</a>
                                                                        <span class="mailbox-attachment-size">&nbsp;{{number_format($file->size /1000)}} KB</span>
                                                                        <a href="{{ route('student.message.download',$file->id) }}" class="btn btn-success btn-xs float-right s-12 ml-2 r-3 bg-primary" style="height:30px !important; width:40px !important">
                                                                                <i class="icon-cloud-download"></i>
                                                                            </a>
                                                                            <a href="{{ route('student.message.view',$file->id) }}" class="btn btn-success btn-xs float-right s-12 ml-2 r-3 bg-sucess" style="height:30px !important; width:40px !important">
                                                                                <i class="far fa-eye"></i>
                                                                            </a>
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
                        </div>             
                    </div> 
                </div>
            </div>
        </div>
     </div>
</div>
<!--Add New Message Fab Button-->
<a href="{{route('student.messages.create',[$semester,$users])}}" id="addMessage" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i class="icon-add"></i></a>
@endsection

