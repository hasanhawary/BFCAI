@if (!empty($messages->first()))

<form>
    <table class="table table-striped table-hover r-0">
        <thead>
            <tr class="no-b">
                <th style="width: 30px">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="checkedAll"
                        class="custom-control-input"><label class="custom-control-label"
                        for="checkedAll"></label>
                    </div>
                </th>
                <th>
                    <div class="dropdown">
                        <button class="btn btn-danger btn-sm  r-3 pr-3 pl-3" type="button">
                            Delete All
                        </button>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
         
                <tr>
                    <a href="{{route('student.messages.edit',[$semester,$users,$message->id])}}" class="view_message">
                        <td>
                            <a href="{{route('student.messages.show',[$semester,$users,$message->id])}}" class="view_message">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkSingle" id="user_id_1" required>
                                <label class="custom-control-label" for="user_id_1"></label>
                            </div>
                            </a>
                        </td>
                        <td>
                            <a href="{{route('student.messages.edit',[$semester,$users,$message->id])}}" class="view_message">
                            <div class="avatar avatar-md mr-3 mt-1 float-left">
                                <img src="{{asset('storage/'.student()->image)}}" alt="{{student()->full_name}}">
                            </div>
                            <div>
                                <div>
                                    <strong><Span>{{student()->full_name}}</Span></strong>
                                </div>
                                <small>Cick here to resend messages</small>
                            </div>
                            </a>
                        </td>
                        <td>
                            <small class="float-right">
                                <a href="{{route('student.messages.edit',[$semester,$users,$message->id])}}">
                                    <span  class="mr-2 ml-2 font-weight-bold badge badge-warning text-bold" style="font-size: 11px">
                                        Not success
                                    </span>
                                </a>
                            </small>
                        </td>
                        <td>
                            <small class="float-right">
                                <span>{{$message->created_at->toDateString()}}</span>
                            </small>
                        </td>
                        <td>
                            <a href="#" title="Delete message" class="btn-fab btn-fab-sm btn-danger  shadow text-white"><i class="icon-delete"></i></a>
                        </td>
                    </a>
                </tr>
           
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
