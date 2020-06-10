@extends('layouts.student.app')
@push('style')
    <style>
        .card .the-header {
            background-color: transparent !important;
            border-bottom: 1px solid #ebedf2 !important;
            display: flex !important;
            color:#FFF;
        }
        
        /* Card header image */
        .card .card-header img {
            width: 40px;
            height: 40px;
        }
        
        /* Card header title */
        .card .card-header .card-title {
            color: #575962;
            font-size: 18px;
            padding-top: 3px;
        }
        
        .pins-color{
        background: #2196f3!important;
        }

        .Mheader{
        align-items:center;
        
        }

        .overlay a{
        min-width: 155px !important;
        padding:13px;
        }

        .overlay a>i{
            padding-right:7px;
            font-size:17px;
        }

        .card.card-cascade.wider {
        background-color: transparent;
        }
        .card.card-cascade.wider {
        box-shadow: none;
        }
        .card {
        font-weight: 400;
        }
        .card.card-cascade.wider .view {
        z-index: 2;
        }
        .card.card-cascade .view {
        border-radius: .25rem;
        }
        .card.card-cascade .view {
        box-shadow: 0 5px 11px 0 rgba(0, 0, 0, .18), 0 4px 15px 0 rgba(0, 0, 0, .15);
        }
        .card.card-cascade.wider .card-body {
        margin-left: 4%;
        margin-right: 4%;
        background: #fff;
        z-index: 1;
        border-radius: 0 0 .25rem .25rem;
        }
        .card.card-cascade.wider .card-body {
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
        }
        .card.card-cascade .card-body {
        padding-top: 1.8rem;
        }
        .card .card-body {
        position: relative;
        }
        .card-body {
        -webkit-box-flex: 1;
        }
        .card {
        -webkit-box-direction: normal;
        }
        @media (min-width: 576px) {
            .card-deck {
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
            }
            }
            @media (min-width: 576px) {
            .card-deck {
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-flow: row wrap;
                flex-flow: row wrap;
                margin-right: -15px;
                margin-left: -15px;
            }
        }
        p{
            padding: 2px;
            margin: 5px;
            line-height: 23px !important;
        }
    </style>
@endpush
@section('content')
<div class="page has-sidebar-left height-full">
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
            <div class="row my-3">
                <div class="col-md-12">
                    <article class="card card-cascade wider mb-5">            
                        <section class="view pins-color overlay d-flex align-items-center justify-content-center pt-2 pb-2">
                            <h4 class="card-header the-header">Lectures</h4>
                        </section>

                        <section class="card-body">
                            <section class="card-deck">
                                <div class="row " style="width: -webkit-fill-available;">
                                    @if (!empty($lectures->first()) and !empty($assignment_lectures->first()))
                                        @if (!empty($lectures->first()))
                                            @foreach ($lectures as $lecture)
                                                @foreach ($lecture->files as $file)
                                                    @if ($file->file_type == 'lectures')
                                                        @php
                                                            $tmp2 = explode('/',$file->mime_type);
                                                            $end2 = reset($tmp2);
                                                            $mim_type = strtolower($end2);
                                                            $tmp = explode('.',$file->name);
                                                            $end = end($tmp);
                                                            $file_ext = strtolower($end);
                                                        @endphp
                                                        <div class="col-12 col-md-6 col-lg-4">
                                                            <section class="card mb-4">
                                                                <section class="view overlay p-3 text-center">
                                                                    <div class="row Mheader ">
                                                                        <div class="media">
                                                                            <div class="the-photo pl-2 ">
                                                                                <img src="{{asset('storage/'.$matrial_lecture->user->image)}}" style="width: 50px;" alt="">
                                                                            </div>
                                                                            <div class="discription  p-0">
                                                                                <div class="dis-content pl-2 pt-2">
                                                                                    <h5 class="m-0"> {{$matrial_lecture->user->full_name}}</h5>
                                                                                    <span class="s-12">{{$lecture->date}}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div style="padding: 8px 5px 6px 5px !important">
                                                                    @if ($lecture->type == 'document')
                                                                            @if ($file_ext == 'pdf')
                                                                                <i class="icon-document-file-pdf text-danger" style="font-size: 65px"></i>
                                                                            @elseif($file_ext == 'pptx')
                                                                                <i class="icon-document-file-ppt text-primary" style="font-size: 65px"></i>
                                                                            @elseif($file_ext == 'docx')
                                                                                <i class="icon-document-file-doc text-primary" style="font-size: 65px"></i>
                                                                            @elseif($file_ext == 'xls')
                                                                                <i class="icon-document-file-xls text-sucess" style="font-size: 65px"></i>
                                                                            @elseif($file_ext == 'jpg' or $file_ext == 'jpeg' )
                                                                                <i class="icon-document-file-jpg text-primary" style="font-size: 65px"></i>
                                                                            @elseif($file_ext == 'png' )
                                                                                <i class="icon-document-file-png text-danger" style="font-size: 65px"></i>
                                                                            @else
                                                                                <i class="far fa-file-alt s-48 text-blue" style="font-size: 65px"></i>
                                                                            @endif 
                                                                        @else
                                                                            <i class="fas fa-play-circle  text-red"  style="font-size: 65px"></i>
                                                                        @endif 
                                                                    </div>
                                                                    <h5>{{$lecture->name}} <small>({{number_format($file->size / 1000, 0)}} KB)</small></h5>
                                                                    
                                                                    @if ($mim_type == 'image')
                                                                        <strong>Image</strong>
                                                                    @else
                                                                        @if ($lecture->type == 'document')
                                                                            <strong>(Document)</strong>
                                                                        @else
                                                                            <strong>(Video)</strong>
                                                                        @endif
                                                                    @endif     
                                                                    <p class="card-text">{!!$lecture->description!!}</p>
                                                                    <div>
                                                                        <a href="{{ route('student.lecture.view',$file->id) }}" class="btn m-1 btn-success" style="color:#FFF" role="button" target="_blank"><i class="fas fa-eye"></i>view</a>
                                                                    </div>    
                                                                    <div>
                                                                        <a href="{{ route('student.lecture.download',$file->id) }}" class="btn m-1 btn-primary" style="color:#FFF" role="button"><i class="fas fa-file-download"></i>Download</a>
                                                                    </div>                                      
                                                                </section>
                                                            </section>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endif

                                        @if (!empty($assignment_lectures->first()))
                                            @foreach ($assignment_lectures as $assignment_lec)
                                                @foreach ($assignment_lec->files as $file)
                                                    @if ($file->file_type == 'assignments')
                                                        @php
                                                            $tmp2 = explode('/',$file->mime_type);
                                                            $end2 = reset($tmp2);
                                                            $mim_type = strtolower($end2);
                                                            $tmp = explode('.',$file->name);
                                                            $end = end($tmp);
                                                            $file_ext = strtolower($end);
                                                        @endphp
                                                        <div class="col-12 col-md-6 col-lg-4">
                                                            <section class="card mb-4">
                                                                <section class="view overlay p-3 text-center">
                                                                    <div class="row Mheader ">
                                                                        <div class="media">
                                                                            <div class="the-photo pl-2 ">
                                                                                <img src="{{asset('storage/'.$assignment_lec->user->image)}}" style="width: 50px;" alt="">
                                                                            </div>
                                                                            <div class="discription  p-0">
                                                                                <div class="dis-content pl-2 pt-2">
                                                                                    <h5 class="m-0"> {{$assignment_lec->user->full_name}}</h5>
                                                                                    <span class="s-12">{{$assignment_lec->date}}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div style="padding: 8px 5px 6px 5px !important">
                                                                    @if ($mim_type != 'video')
                                                                        @if ($file_ext == 'pdf')
                                                                            <i class="icon-document-file-pdf text-danger" style="font-size: 65px"></i>
                                                                        @elseif($file_ext == 'pptx')
                                                                            <i class="icon-document-file-ppt text-primary" style="font-size: 65px"></i>
                                                                        @elseif($file_ext == 'docx')
                                                                            <i class="icon-document-file-doc text-primary" style="font-size: 65px"></i>
                                                                        @elseif($file_ext == 'xls')
                                                                            <i class="icon-document-file-xls text-sucess" style="font-size: 65px"></i>
                                                                        @elseif($file_ext == 'jpg' or $file_ext == 'jpeg' )
                                                                            <i class="icon-document-file-jpg text-primary" style="font-size: 65px"></i>
                                                                        @elseif($file_ext == 'png' )
                                                                            <i class="icon-document-file-png text-danger" style="font-size: 65px"></i>
                                                                        @else
                                                                            <i class="far fa-file-alt s-48 text-blue" style="font-size: 65px"></i>
                                                                        @endif 
                                                                    @else
                                                                        <i class="fas fa-play-circle  text-red"  style="font-size: 65px"></i>
                                                                    @endif 
                                                                    </div>
                                                                    <h5>{{$assignment_lec->name}} <small>({{number_format($file->size / 1000, 0)}} KB)</small></h5>
                                                                    
                                                                    <strong>(Assignemnt)</strong>
                                                                    
                                                                    <p class="card-text">{!! $assignment_lec->description !!}</p>
                                                                    <div>
                                                                        <a href="{{ route('student.lecture.view',$file->id) }}" class="btn m-1 btn-success" style="color:#FFF" role="button" target="_blank"><i class="fas fa-eye"></i>view</a>
                                                                    </div>    
                                                                    <div>
                                                                        <a href="{{ route('student.lecture.download',$file->id) }}" class="btn m-1 btn-primary" style="color:#FFF" role="button"><i class="fas fa-file-download"></i>Download</a>
                                                                    </div>                                      
                                                                </section>
                                                            </section>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endif
                                    @else
                                        <h1 style="margin: 40px auto">Not Lectures Uploaded YeT</h1>
                                    @endif
                                </div>
                            </section>
                        </section>
                    </article>
                    <article class="card card-cascade wider mb-4">
                        <section class="view pins-color overlay d-flex align-items-center justify-content-center pt-2 pb-2">
                            <h4 class="card-header the-header">Sections</h4>
                        </section>
                        <section class="card-body">
                            <section class="card-deck">
                                <div class="row " style="width: -webkit-fill-available;">
                                    @if (!empty($sections) and !empty($assignment_sections))
                                        @if (!empty($sections))
                                            @foreach ($sections as $section)
                                                @foreach ($section->files as $file)
                                                    @if ($file->file_type == 'lectures')
                                                        @php
                                                            $tmp2 = explode('/',$file->mime_type);
                                                            $end2 = reset($tmp2);
                                                            $mim_type = strtolower($end2);
                                                            $tmp = explode('.',$file->name);
                                                            $end = end($tmp);
                                                            $file_ext = strtolower($end);
                                                        @endphp
                                                        <div class="col-12 col-md-6 col-lg-4">
                                                            <section class="card mb-4">
                                                                <section class="view overlay p-3 text-center">
                                                                    <div class="row Mheader ">
                                                                        <div class="media">
                                                                            <div class="the-photo pl-2 ">
                                                                                <img src="{{asset('storage/'.$matrial_section->user->image)}}" style="width: 50px;" alt="">
                                                                            </div>
                                                                            <div class="discription  p-0">
                                                                                <div class="dis-content pl-2 pt-2">
                                                                                    <h5 class="m-0"> {{$matrial_section->user->full_name}}</h5>
                                                                                    <span class="s-12">{{$section->date}}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div style="padding: 8px 5px 6px 5px !important">
                                                                    @if ($section->type == 'document')
                                                                            @if ($file_ext == 'pdf')
                                                                                <i class="icon-document-file-pdf text-danger" style="font-size: 65px"></i>
                                                                            @elseif($file_ext == 'pptx')
                                                                                <i class="icon-document-file-ppt text-primary" style="font-size: 65px"></i>
                                                                            @elseif($file_ext == 'docx')
                                                                                <i class="icon-document-file-doc text-primary" style="font-size: 65px"></i>
                                                                            @elseif($file_ext == 'xls')
                                                                                <i class="icon-document-file-xls text-sucess" style="font-size: 65px"></i>
                                                                            @elseif($file_ext == 'jpg' or $file_ext == 'jpeg' )
                                                                                <i class="icon-document-file-jpg text-primary" style="font-size: 65px"></i>
                                                                            @elseif($file_ext == 'png' )
                                                                                <i class="icon-document-file-png text-danger" style="font-size: 65px"></i>
                                                                            @else
                                                                                <i class="far fa-file-alt s-48 text-blue" style="font-size: 65px"></i>
                                                                            @endif 
                                                                        @else
                                                                            <i class="fas fa-play-circle  text-red"  style="font-size: 65px"></i>
                                                                        @endif 
                                                                    </div>
                                                                    <h5>{{$section->name}} <small>({{number_format($file->size / 1000, 0)}} KB)</small></h5>
                                                                    
                                                                    @if ($mim_type == 'image')
                                                                        <strong>Image</strong>
                                                                    @else
                                                                        @if ($section->type == 'document')
                                                                            <strong>(Document)</strong>
                                                                        @else
                                                                            <strong>(Video)</strong>
                                                                        @endif
                                                                    @endif     
                                                                    <p class="card-text">{!!$section->description!!}</p>
                                                                    <div>
                                                                        <a href="{{ route('student.lecture.view',$file->id) }}" class="btn m-1 btn-success" style="color:#FFF" role="button" target="_blank"><i class="fas fa-eye"></i>view</a>
                                                                    </div>    
                                                                    <div>
                                                                        <a href="{{ route('student.lecture.download',$file->id) }}" class="btn m-1 btn-primary" style="color:#FFF" role="button"><i class="fas fa-file-download"></i>Download</a>
                                                                    </div>                                      
                                                                </section>
                                                            </section>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endif

                                        @if (!empty($assignment_sections))
                                            @foreach ($assignment_sections as $assignment_sec)
                                                @foreach ($assignment_sec->files as $file)
                                                    @if ($file->file_type == 'assignments')
                                                        @php
                                                            $tmp2 = explode('/',$file->mime_type);
                                                            $end2 = reset($tmp2);
                                                            $mim_type = strtolower($end2);
                                                            $tmp = explode('.',$file->name);
                                                            $end = end($tmp);
                                                            $file_ext = strtolower($end);
                                                        @endphp
                                                        <div class="col-12 col-md-6 col-lg-4">
                                                            <section class="card mb-4">
                                                                <section class="view overlay p-3 text-center">
                                                                    <div class="row Mheader ">
                                                                        <div class="media">
                                                                            <div class="the-photo pl-2 ">
                                                                                <img src="{{asset('storage/'.$assignment_sec->user->image)}}" style="width: 50px;" alt="">
                                                                            </div>
                                                                            <div class="discription  p-0">
                                                                                <div class="dis-content pl-2 pt-2">
                                                                                    <h5 class="m-0"> {{$assignment_sec->user->full_name}}</h5>
                                                                                    <span class="s-12">{{$assignment_sec->date}}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div style="padding: 8px 5px 6px 5px !important">
                                                                    @if ($mim_type != 'video')
                                                                        @if ($file_ext == 'pdf')
                                                                            <i class="icon-document-file-pdf text-danger" style="font-size: 65px"></i>
                                                                        @elseif($file_ext == 'pptx')
                                                                            <i class="icon-document-file-ppt text-primary" style="font-size: 65px"></i>
                                                                        @elseif($file_ext == 'docx')
                                                                            <i class="icon-document-file-doc text-primary" style="font-size: 65px"></i>
                                                                        @elseif($file_ext == 'xls')
                                                                            <i class="icon-document-file-xls text-sucess" style="font-size: 65px"></i>
                                                                        @elseif($file_ext == 'jpg' or $file_ext == 'jpeg' )
                                                                            <i class="icon-document-file-jpg text-primary" style="font-size: 65px"></i>
                                                                        @elseif($file_ext == 'png' )
                                                                            <i class="icon-document-file-png text-danger" style="font-size: 65px"></i>
                                                                        @else
                                                                            <i class="far fa-file-alt s-48 text-blue" style="font-size: 65px"></i>
                                                                        @endif 
                                                                    @else
                                                                        <i class="fas fa-play-circle  text-red"  style="font-size: 65px"></i>
                                                                    @endif 
                                                                    </div>
                                                                    <h5>{{$assignment_sec->name}} <small>({{number_format($file->size / 1000, 0)}} KB)</small></h5>
                                                                    
                                                                    <strong>(Assignemnt)</strong>
                                                                    
                                                                    <p class="card-text" >{!! $assignment_sec->description !!}</p>
                                                                    <div>
                                                                        <a href="{{ route('student.lecture.view',$file->id) }}" class="btn m-1 btn-success" style="color:#FFF" role="button" target="_blank"><i class="fas fa-eye"></i>view</a>
                                                                    </div>    
                                                                    <div>
                                                                        <a href="{{ route('student.lecture.download',$file->id) }}" class="btn m-1 btn-primary" style="color:#FFF" role="button"><i class="fas fa-file-download"></i>Download</a>
                                                                    </div>                                      
                                                                </section>
                                                            </section>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endif
                                    @else
                                        <h1 style="margin: 40px auto">Not Sections Uploaded YeT</h1>
                                    @endif

                                </div>
                            </section>
                        </section>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection
