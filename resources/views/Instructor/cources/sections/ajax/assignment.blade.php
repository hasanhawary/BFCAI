@if (!empty($lecture_data->first()))
    @foreach ($lecture_data  as $lecture)
        @if (!empty($lecture))
            @foreach ($lecture->files  as $file)
                @if ($file->file_type == 'lectures')
                    <div class="listOfDataboxs mb-50">
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <i class="ik k-bookmark">
                                    </i>
                                        <a href="#">{{ $lecture->type }}</a>
                                    </h4>
                                <button type="button" class="btn btn-sm btn-success pull-left mr-5"><a class="text-white" href="{{ route('instructor.lecture.create',['cource' => $cource_id, 'week' => $week_id, 'type' => $type_lec]) }}"><i class="ik ik-plus"></i>@lang('site.add_new')</a></button>
                                <div class="manage pull-left">
                                    <a data-toggle="tooltip" data-placement="top" title="Preview Lecture"  target="_blank" class="btn btn-icon btn-info btn-add-Details" href='{{ route('instructor.lecture.view',$file->id) }}'><i class="ik ik-eye f-16 mr-10"></i></a>
                                    <a data-toggle="tooltip" data-placement="top"   title="Edit Lecture" class="btn btn-icon btn-primary btn-add-Edit" href='{{ route('instructor.lecture.edit', [$lecture->id, $lecture->type]) }}'><i class="ik ik-edit f-16 mr-10"></i></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Download Lecture" class="btn btn-icon btn-warning btn-add-download" href='{{ route('instructor.lecture.download',$file->id) }}'><i class="ik ik-download-cloud f-16 mr-10"></i></a>
                                    <a data-toggle="modal" data-target="#deleteModal{{$lecture->id}}" class="btn btn-icon btn-danger btn-add-Delete" href='#'><i class="ik ik-trash-2 f-16 mr-10" data-toggle="tooltip" data-placement="top" title="Delete Lecture" ></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2 col-12 col-sm-6 col-lg-1">
                                        <img alt="Lecture Pic" src="
                                            {{asset('storage/instructors/cources/lecture/photo/assignment.png')}}
                                            "class="profileImg img-circle img-responsive" style="width: 170px !important">
                                    </div>
                                    <div class="col-md-10 col-12 col-sm-6 col-lg-11">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="countrydata icon-list-item">
                                                    <i class="ik ik-book"></i>
                                                    <div class="country" style="font-family: Muli;"> 
                                                        <span  style="font-family: Muli;font-weight: bold;">
                                                            {{ $lecture->name }}
                                                        </span>
                                                        ({{ $file->name }})
                                                    </div>
                                                    <br>
                                                    <small style="font-family: Muli; display:inline-block; padding-top: 10px;"> &nbsp; &nbsp; <span style="font-size:12px;">Size: </span> {{ number_format($file->size / 1000,0)  }} KB</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="userPdetails" style="font-family: Muli; margin-top: -5px !important;">
                                            <p>{!! $lecture->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="modal fade" id="deleteModal{{$lecture->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Delete Lecture</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ route('instructor.lecture.destroy', $lecture->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <div class="modal-body">
                                        Do you want delete that?
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" id="deleteVstudy" value="Delete" class="btn btn-danger"/>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif  
            @endforeach
        @else
            <div class="card listOfDataboxs">
                <div class="card-header">
                    <h3> {{  trans('site.show_lecture_uploaded') }}</h3>
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
                                <h7>
                                    @if($type_lec == 'document')
                                        @lang('site.not_assignment_uploaded_yet')
                                    @endif
                
                                    <a href="{{route('instructor.lecture.create', ['cource' => $cource_id, 'week' => $week_id, 'type' => $type_lec]) }}" class="alert-link text-white"> 
                                        @lang('site.click_her_if_you_need_to_upload') 
                                    </a>
                                </h7>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif    
    @endforeach
@else
    <div class="card listOfDataboxs">
        <div class="card-header">
            <h3> {{  trans('site.show_lecture_uploaded') }}</h3>
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
                        <h7>
                            @if($type_lec == 'document')
                                @lang('site.not_assignment_uploaded_yet')
                            @endif
        
                            <a href="{{route('instructor.lecture.create', ['cource' => $cource_id, 'week' => $week_id, 'type' => $type_lec]) }}" class="alert-link text-white"> 
                                @lang('site.click_her_if_you_need_to_upload') 
                            </a>
                        </h7>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
        
   


