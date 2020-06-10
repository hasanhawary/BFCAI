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
               
                <div  class="col-md-9">
                    <div class="row d-flex bd-highlight no-gutters">
                        <div class="flex-fill b-l height-full white">
                            <div class="table-responsive" id="message">
                                @if (!empty($messages->first()))
                                    <form>
                                        <table class="table table-striped table-hover r-0">
                                            <thead>
                                                <tr class="no-b">
                                                    <th style="width: 30px">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="checkedAll" class="custom-control-input"><label class="custom-control-label" for="checkedAll"></label>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="dropdown">
                                                            <button class="btn btn-danger btn-sm r-3 pr-3 pl-3" type="button">
                                                                Delete All
                                                            </button>
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($messages as $message)
                                                @if (!empty($message->subject))
                                                    @if (!empty($message->send_user_id))
                                                        @php
                                                            global $user;
                                                            if($message->send_user == 'students'){
                                                                $user = \App\User::where('id',$message->send_user_id)->first();
                                                            }
                                                            elseif($message->send_user == 'instructors'){
                                                                $user = \App\Instructor::where('id',$message->send_user_id)->first();
                                                            }
                                                        @endphp
                                                    @endif
                                                    <tr>
                                                        <a href="{{route('student.messages.show',[$semester,$users,$message->id])}}" class="view_message">
                                                            <td>
                                                                <a href="{{route('student.messages.show',[$semester,$users,$message->id])}}" class="view_message">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input checkSingle" id="user_id_1" required>
                                                                    <label class="custom-control-label" for="user_id_1"></label>
                                                                </div>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="{{route('student.messages.show',[$semester,$users,$message->id])}}" class="view_message">
                                                                <div class="avatar avatar-md mr-3 mt-1 float-left">
                                                                    <img src="{{asset('storage/'.$user->image)}}" alt="{{$user->full_name}}">
                                                                </div>
                                                                <div>
                                                                    <div>
                                                                        <strong><Span>{{$user->full_name}}</Span></strong>
                                                                    </div>
                                                                    <small>
                                                                        @php 
                                                                            if(strlen($message->subject) > 70){
                                                                                echo substr($message->subject,0,70).'...';
                                                                            }else {
                                                                                echo $message->subject;
                                                                            }
                                                                        @endphp
                                                                    </small>
                                                                </div>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <small class="float-right">
                                                                    <span>{{$message->created_at->toDateString()}}</span>
                                                                    <span id="star{{$message->id}}">
                                                                        <a href="" class="star_status"  data-id={{$message->id}}  class="mr-2 ml-2">
                                                                            <i class="@if($message->important == 0) icon-star-o @else icon-star @endif"></i>
                                                                        </a>
                                                                    </span>
                                                                    
                                                                    <a href="#" class="mr-2 ml-2">
                                                                        <i class="icon-paperclip"></i>
                                                                    </a>
                                                                </small>
                                                            </td>
                                                            <td>
                                                                <a href="#" title="Delete message" class="btn-fab btn-fab-sm btn-danger  shadow text-white"><i class="icon-delete"></i></a>
                                                            </td>
                                                        </a>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </form> 
                                    @else
                                    <div class="row d-flex bd-highlight no-gutters">
                                        <div class="flex-fill b-l height-full white">
                                            <div class="text-center p-5">
                                                <i class="icon-note-important s-64 text-primary"></i>
                                                <h4 class="my-3">No Messages Found</h4>
                                                <p>There are no Message for you</p>
                                                <a href="{{route('student.messages.index',[Request::segment(3),$users])}}" class="btn btn-primary shadow btn-lg"><i class="icon-recycle mr-2 "></i>Refresh Again</a>
                                            </div>
                                        </div>             
                                    </div> 
                                @endif
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
