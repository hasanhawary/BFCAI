@extends('layouts.student.app')

@push('style')
    <link rel="stylesheet" href="{{asset('student/assets/css/bothCSS.css')}}">
@endpush

@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row">
                <div class="col">
                    <h3 class="my-3">
                        <i class="icon  icon-alarm"></i>
                        Announcments
                    </h3>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
            <div class="container">
                @if (!empty($announcments->first()))
                    @foreach ($announcments as $announcment)  
                    <div class="white shadow the-hold">
                        <div class="media">
                            <img class="d-flex mr-3 height-50" src="{{asset('storage/'.$announcment->user->image)}}" alt="Profile image">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1 font-weight-normal">{{$announcment->user->full_name}}</h5>
                                <small>{{$announcment->created_at}}</small>
                                <div class=" my-3 show the-post">
                                    <div><p  style="font-weight:bold !important">{!! $announcment->content !!}</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                <div class="text-center p-5">
                    <i class="icon-note-important s-64 text-primary"></i>
                    <h4 class="my-3">No Announcment Found</h4>
                    <p>There are no Announcment for you</p>
                    <a href="{{route('student.announcements.index',Request::segment(3))}}" class="btn btn-primary shadow btn-lg"><i class="icon-recycle mr-2 "></i>Refresh Again</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
