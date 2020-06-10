@if (!empty($assignments->first()->ass_result))
<form action="{{ route('instructor.assignmentResult.store')}}" method="post">
   
    @csrf
    <div class="listOfDataboxs mb-50">
        <div class="card">
            <div class="card-header">
                <h3>Table Result </h3>
                <div class="anno">
                    <button type="submit" class="btn btn-dark" style="margin-left: 39%;"">Save</label></button>
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
                            class="table tableTypeA table-striped table-hover mb-0 table-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>Assignment Name</th>
                                    <th>Assignment Grade</th>
                                    <th>Date</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assignments as $assignment)
                                    @foreach ($assignment->ass_result()->with('user')->get() as $ass_result)
                                        <tr>
                                            <td class="text-center"></td>
                                            <td class="text-center"><strong class="text-dark">{{$ass_result->user->full_name}}</strong></td>
                                            <td class="text-center"><strong class="text-dark">{{$ass_result->name}}</strong></td>
                                            <td class="text-center"><input class="form-control" type="number" value="{{!empty($ass_result->grade) ? $ass_result->grade : ''}}" name="grade[{{$ass_result->id}}]"></td>
                                            <td class="text-center text-dark">{{$ass_result->created_at->toDateString()}}</td>
                                            <td class="text-center">
                                                <div class="action-btns">
                                                    <a data-toggle="tooltip" data-placement="top" target="_blank" title="View Assignment" class="btn btn-icon btn-info btn-add-Details" href='{{ route('instructor.assignmentResult.view',$ass_result->id) }}'><i class="ik ik-eye f-16 mr-10"></i></a>
                                                    <a data-toggle="tooltip" data-placement="top" title="Download Assignment" class="btn btn-icon btn-warning btn-add-Edit" href='{{ route('instructor.assignmentResult.download',$ass_result->id) }}'><i class="ik ik-download-cloud f-16 mr-10"></i></a>
                                                    <a data-toggle="tooltip" data-placement="top" title="Student Profile" class="btn btn-icon btn-dark btn-view-profile" href='cp-profile.html'><i class="ik ik-user f-16 mr-10"></i></a>
                                                    <a data-toggle="modal" data-target="#deleteModal{{$ass_result->id}}" class="btn btn-icon btn-danger btn-add-Delete" href='#'><i class="ik ik-trash-2 f-16 mr-10" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                       
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                        <div class="anno">
                            <button type="submit" class="btn btn-info col-md-2" style="margin-left: 39%; margin-top: 20px;">Save</label></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    </form>
    @foreach ($assignments as $assignment)
        @foreach ($assignment->ass_result()->with('user')->get() as $ass_result)
            <div class="modal fade" id="deleteModal{{$ass_result->id}}"  role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Assignment Soultion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form action="{{ route('instructor.assignmentResult.destroy', $ass_result->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <div class="modal-body">
                                Do you want delete this assignment?
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
    @endforeach
@else
<div class="card listOfDataboxs">
    <div class="card-header">
        <h3> {{trans('site.show_assignment_uploaded')}}</h3>
        <div class="card-header-right">
            <ul class="list-unstyled card-option">
                <li><i class="ik ik-minus minimize-card"></i></li>
            </ul>
        </div>
    </div>
    <div class="card-body progress-task">
        <div class="dd" data-plugin="nestable">
            <div class="text-center">
                <div class="alert bg-danger alert-danger text-white d-inline-block my-3" role="alert">
                    <h7>{{trans('site.not_assignment_uploaded_yet')}}</a></h7>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
        
   

