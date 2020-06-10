@extends('layouts.student.app')

@push('style')
    <style>
    .input-label {
        background-color: #03a9f4; 
        color: #fff;
        padding: 5px 7px;
        margin-bottom: -14px;
        transition: 0.3s;
    }
    .input-label:hover{
        background-color: #03a9f4; 
    }
    
    </style>
@endpush
@push('script')
    <script>
        $(function(){
            $('#file').on('change',function(){
                $('#uploadForm').submit();
            });
        })
    </script>
@endpush
@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-assignment"></i>
                        Assignments
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white">
                    <li>
                        <a class="nav-link active" href="{{route('student.assignments.index',$semester)}}">
                            <i class="icon icon-list"></i>All Assignments
                        a</a>
                    </li>
                    <li>
                        <div class="dropdown">
                            <a class=" nav-link dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Lecture
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Security</a>
                                <a class="dropdown-item" href="#">DSS</a>
                                <a class="dropdown-item" href="#">GIS</a>
                                <a class="dropdown-item" href="#">Cloud Computing</a>
                                <a class="dropdown-item" href="#">Advanced Database</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Section
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Security</a>
                                <a class="dropdown-item" href="#">DSS</a>
                                <a class="dropdown-item" href="#">GIS</a>
                                <a class="dropdown-item" href="#">Cloud Computing</a>
                                <a class="dropdown-item" href="#">Advanced Database</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="row">
                <div class="col-md-12">
                    
                        @csrf
                        <div class="card no-b shadow">
                           
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <tbody>
                                            <tr>
                                                <td class="w-10">Type</td>
                                                <td>Ass Name</td>
                                                <td>Cource</td>
                                                <td></td>
                                                <td>Grade</td>
                                                <td></td>
                                                <td>Status</td>
                                                <td>Date</td>
                                                <td>Mange</td>
                                            </tr>
                                            @foreach($assignments as $assignment)
                                                @foreach($assignment->files as $file)
                                                    @if ($file->file_type == 'assignments')
                                                        <tr>
                                                            <td class="w-10">
                                                                @php
                                                                    $tmp = explode('.',$file->name);
                                                                    $end = end($tmp);
                                                                    $file_ext = strtolower($end);
                                                                @endphp

                                                                @if ($file_ext == 'pdf')
                                                                    <span class="mailbox-attachment-icon" >
                                                                        <i style="font-size: 50px !important" class="icon-document-file-pdf text-danger"></i></i>
                                                                    </span>
                                                                @elseif($file_ext == 'pptx')
                                                                    <span class="mailbox-attachment-icon">
                                                                        <i style="font-size: 50px !important" class="icon-document-file-ppt text-info"></i>
                                                                    </span>
                                                                @elseif($file_ext == 'docx')
                                                                    <span class="mailbox-attachment-icon">
                                                                        <i style="font-size: 50px !important" class="icon-document-file-doc text-primary"></i>
                                                                    </span>
                                                                @elseif($file_ext == 'jpg' or $file_ext == 'jpeg')
                                                                    <span class="mailbox-attachment-icon">
                                                                        <i style="font-size: 50px !important" class="icon-document-file-jpg text-primary"></i>
                                                                    </span>
                                                                @elseif($file_ext == 'png')
                                                                    <span class="mailbox-attachment-icon">
                                                                        <i style="font-size: 50px !important" class="icon-document-file-png text-primary"></i>
                                                                    </span>
                                                                @elseif($file_ext == 'xls')
                                                                    <span class="mailbox-attachment-icon">
                                                                        <i style="font-size: 50px !important" class="icon-document-file-xls text-success"></i>  
                                                                    </span>
                                                                @else
                                                                    <span class="mailbox-attachment-icon">
                                                                        <i class="icon-paperclip text-danger"></i>  
                                                                    </span>
                                                                @endif    
                                                            </td>
                                                            <td>
                                                                <h6>{{$assignment->name}}</h6>
                                                                <small class="text-center" style="padding-left: 10%">{{$assignment->type}}</small>
                                                            </td>
                                                            <td>
                                                                <h6>{{$assignment->cource->name_en}}</h6>
                                                                <small class="text-center" style="padding-left: 5%">Week {{$assignment->week_id}}</small>
                                                            </td>
                                                            <td></td>
                                                            <td class="text-center">
                                                                @php
                                                                    $ass_res = App\AssignmentResult::where('assignment_id', $assignment->id)->where('user_id',student()->id)->first();
                                                                @endphp
                                                                @if (!empty($ass_res))
                                                                    {{$ass_res->grade}} / {{$assignment->grade}}
                                                                @else
                                                                  {{$assignment->grade}}
                                                                @endif
                                                            </td>
                                                            <td></td>
                                                            @php
                                                                $ass_res = App\AssignmentResult::where('assignment_id', $assignment->id)->where('user_id',student()->id)->first();
                                                            @endphp
                                                            @if ($assignment->date_now == $assignment->date)
                                                                <td><span class="badge badge-danger">Not available</span></td>
                                                            @else
                                                                @if (!empty($ass_res))
                                                                    <td><span class="badge badge-success">sucess</span></td>
                                                                @else
                                                                    <td><span class="badge badge-success">available</span></td>
                                                                @endif
                                                            @endif
                                                            <td>
                                                                @if ($assignment->date_now == $assignment->date)
                                                                    <span style="color: red">
                                                                    <i class="icon icon-data_usage"></i>
                                                                        Out Of Date
                                                                    </span>
                                                                @else
                                                                    <span>
                                                                    <i class="icon icon-data_usage"></i>
                                                                        {{$assignment->duration}} days left
                                                                    </span>
                                                                @endif 
                                                                <br>
                                                                <span><i class="icon icon-timer"></i>{{$assignment->date}}</span>
                                                            </td>
                                                            <td>
                                                                @php
                                                                    $ass_res = App\AssignmentResult::where('assignment_id',$assignment->id)->where('user_id',student()->id)->first();
                                                                @endphp
                                                                
                                                                <a href="{{route('student.assignments.view',$file->id)}}" target="_blank" title="view"  class="btn-fab btn-fab btn-primary shadow text-white" style="cursor:pointer !important;"><i style="font-size: 17px !important;" class="icon-eye"></i></a>
                                                                @if ($assignment->date_now != $assignment->date)      
                                                                    @if (!empty($ass_res))
                                                                        <a title="upload"  class="btn-fab btn-fab btn-success shadow text-white" style="cursor:disapled !important;"><i style="font-size: 17px !important;" class="icon-cloud-upload"></i></a>
                                                                    @else
                                                                        <form class="form-inline" style="display:inline-block" enctype="multipart/form-data" id="uploadForm" action="{{route('student.assignments.store',$assignment->id)}}" method ="post">
                                                                            @method('post')
                                                                            @csrf                                               
                                                                            <a style="display:inline-block; margin-bottom: -15px !important">
                                                                                <label for="file" class="input-label btn-fab btn-fab btn-primary shadow text-white " style="position:relative; cursor:pointer !important;">
                                                                                    <i class="icon-cloud-upload" style="font-size: 17px !important; position: absolute; top:30%; left:28%" ></i>
                                                                                </label>
                                                                                <input id="file" style="display: none !important;"  name="content" type="file">
                                                                            </a>
                                                                        </form>
                                                                    @endif
                                                                @else
                                                                    <a title="upload"  class="btn-fab btn-fab btn-danger shadow text-white" style="cursor:disapled !important;"><i style="font-size: 17px !important;" class="icon-cloud-upload"></i></a>
                                                                @endif 
                                                                <a href="{{route('student.assignments.download',$file->id)}}" title="download" class="btn-fab btn-fab btn-primary shadow text-white" style="cursor:pointer !important;"><i style="font-size: 17px !important;" class="icon-cloud_download"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endif 
                                                @endforeach
                                            @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
            <nav class="pt-3" aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
