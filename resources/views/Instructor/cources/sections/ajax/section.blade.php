@if (!empty($section_data->first()))
    @foreach ($section_data as $section)
        <div class="listOfDataboxs mb-50">
            <div class="card">
                <div class="card-header">
                    <h4><i class="ik 
                            @if($section->type == 'document')
                                ik-book
                            @endif
                            @if($section->type == 'video')
                                ik-video
                            @endif
                            @if($section->type == 'assignment')
                                ik-bookmark
                            @endif
                            "></i><a href="#">{{ $section->type }}</a></h4>
                    <button type="button" class="btn btn-sm btn-success pull-left mr-5"><a class="text-white" href="{{ route('instructor.section.create',['cource' => $cource_id, 'week' => $week_id, 'type' => $type_lec]) }}"><i class="ik ik-plus"></i>@lang('site.add_new')</a></button>
                    <div class="manage pull-left">
                        <a data-toggle="tooltip" data-placement="top" title="Preview section" class="btn btn-icon btn-info btn-add-Details" href='{{ route('instructor.section.view',$section->id) }}'><i class="ik ik-eye f-16 mr-10"></i></a>
                        <a data-toggle="tooltip" data-placement="top" title="Edit section" class="btn btn-icon btn-primary btn-add-Edit" href='{{ route('instructor.section.edit', $section->id) }}'><i class="ik ik-edit f-16 mr-10"></i></a>
                        <a data-toggle="tooltip" data-placement="top" title="Download section" class="btn btn-icon btn-warning btn-add-Edit" href='{{ route('instructor.section.download',$section->id) }}'><i class="ik ik-download-cloud f-16 mr-10"></i></a>
                        <a data-toggle="modal" data-target="#deleteModal{{$section->id}}" class="btn btn-icon btn-danger btn-add-Delete" href='#'><i class="ik ik-trash-2 f-16 mr-10" data-toggle="tooltip" data-placement="top" title="Delete section" ></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 col-12 col-sm-6 col-lg-1">
                            <img alt="section Pic" src="
                                @if($section->type == 'document')
                                {{asset('storage/instructors/cources/lecture/photo/document.png')}}
                                @endif
                                @if($section->type == 'video')
                                {{asset('storage/instructors/cources/lecture/photo/video.png')}}
                                @endif
                                @if($section->type == 'assignment')
                                {{asset('storage/instructors/cources/lecture/photo/assignment.png')}}
                                @endif
                                " class="profileImg img-circle img-responsive" style="width: 170px !important">
                        </div>
                        <div class="col-md-10 col-12 col-sm-6 col-lg-11">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="countrydata icon-list-item">
                                        <i class="ik ik-book"></i>
                                        <div class="country"> {{ $section->name }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                            <div class="userPdetails">
                                <p>{!! $section->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>  
        <div class="modal fade" id="deleteModal{{$section->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete section</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('instructor.section.destroy', $section->id) }}" method="post">
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
    @endforeach
@else
<div class="card listOfDataboxs">
    <div class="card-header">
        <h3> {{  trans('site.show_section_uploaded') }}</h3>
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
                            @lang('site.not_sections_uploaded_yet')
                        @endif
                        @if($type_lec == 'video')
                            @lang('site.not_videos_uploaded_yet')
                        @endif	
                        @if($type_lec == 'assignment')
                           @lang('site.not_assignments_uploaded_yet')
                        @endif
                        <a href="{{route('instructor.section.create', ['cource' => $cource_id, 'week' => $week_id, 'type' => $type_lec]) }}" class="alert-link text-white"> @lang('site.click_her_if_you_need_to_upload') </a></h7>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
        
   

