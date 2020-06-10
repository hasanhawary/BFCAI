@extends('layouts.student.app')

@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row">
                <div class="col">
                    <h3 class="my-3">
                        <i class="icon  icon-book"></i>
                        {{$cource_data->name_en}} ({{$cource_data->cource_code}})
                    </h3>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
            <div class="row ">
                @foreach ($weeks as $week)
                    <div class="col-lg-4 ">
                        <a class="the-master" href="{{route('student.matrial.cource_data',[Request::segment(3),$cource_data->id,$week->id])}}">
                            <div class="card r-3 week-item mb-3 marg">
                                <div class="p-4 ">
                                    <div class="float-right">
                                        <span class="badge badge-danger mt-2 "></span>
                                    </div>
                                    <div class="counter-title"><i class="fas fa-university s-48 text-light-blue"></i></span></div>
                                    <h3 class=" mt-3">{{$week->displayName_en}}</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach     
            </div>
        </div>
    </div>
</div>
@endsection
