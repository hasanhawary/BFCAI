@extends('layouts.instructor.app')

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-upload bg-blue"></i>
                <div class="d-inline">
                    <h2>Sent Mail</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href=""><i class="ik ik-home"></i></a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">Sent Mail</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Customer overview start -->
<div class="row mt-40">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                
                 <div class="anno">
                    <a href="{{route('instructor.messages.create')}}" class="btn btn-primary" style="margin-left: 10%; color: white; font-size:14px">New Message <i class="icon-add"></i></label></a>
                </div>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="ik ik-minus minimize-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-body progress-task">
                <div class="dd" data-plugin="nestable">

                    <div class="table-responsive">
                        <table id="advanced_table"
                            class="table tableTypeA  table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Status</th>
                                    <th>Subject</th>
                                    <th>User</th>
                                    <th>User Name</th>
                                    <th>Date</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $message)
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="text-center">
                                            @if (!empty($message->subject))
                                                <span class="badge badge-success font-weight-bold">Sucess</span>
                                            @else
                                                <span class="badge badge-danger font-weight-bold">Draft</span>
                                            @endif
                                        </td>
                                        <td>
                                            <strong class="text-dark text-center">
                                            @php 
                                                if(strlen($message->subject) > 18){
                                                    echo substr($message->subject,0,18).'...';
                                                }else {
                                                    echo $message->subject;
                                                }
                                            @endphp
                                            </strong>
                                        </td>
                                        <td><strong class="text-dark text-center">{{$message->receive_user}}</strong></td>
                                        <td><strong class="text-dark text-center">
                                            @if (!empty($message->receive_user_id))
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
                                            @endif
                                        </strong></td>
                                        <td class="text-center text-dark">{{$message->created_at->toDateString()}}</td>
                                        <td class="text-center">
                                            <div class="action-btns">
                                                @if (!empty($message->subject))
                                                @else
                                                    <a data-toggle="tooltip" data-placement="top" title="Resend" class="btn btn-icon btn-primary btn-add-resend" href='{{route('instructor.messages.edit',$message->id)}}'><i class="ik ik-repeat f-16 mr-10"></i></a>
                                                @endif
                                                <a data-toggle="tooltip" data-placement="top" title="show" class="btn btn-icon btn-info btn-add-Details" href='{{route('instructor.messages.show',$message->id)}}'><i class="ik ik-eye f-16 mr-10"></i></a>
                                                <a data-toggle="modal" data-target="#deleteModal{{$message->id}}" class="btn btn-icon btn-danger btn-add-Delete" href='#'><i class="ik ik-trash-2 f-16 mr-10" data-toggle="tooltip" data-placement="top" title="delete" ></i></a>
                                            </div>
                                        </td>
                                    </tr>
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
                                @endforeach   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Customer overview end -->
<!--Add New Message Fab Button-->
<a href="{{route('instructor.messages.create')}}" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i class="icon-add"></i></a>
@endsection
