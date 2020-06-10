@extends('layouts.student.app')

@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row">
                <div class="col">
                    <h3 class="my-3">
                        <i class="icon  icon-book"></i> My Matrials
                    </h3>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
            <div class="row">
                @foreach ($cources as $cource)
                    <div class="col-md-4">
                        <article class="card card-cascade wider reverse my-4">
                            <section class="card-header">
                                <img src="{{asset('storage/'.$cource->instructor->image)}}" class="rounded-circle" alt="Prfoile picture">
                                <h4 class="card-title m-2">{{$cource->instructor->full_name}}</h4>
                            </section>

                            <section class="view overlay" style="max-height: 170px; min-height:155px;">
                                <a href="{{route('student.matrial.weeks',[Request::segment(3),$cource->id])}}">
                                    <img  style="max-height: 170px; width:100%;" src="{{asset('storage/'.$cource->image)}}" alt="Trees" class="img-fluid">
                                </a>
                                <a href="{{route('student.matrial.weeks',[Request::segment(3),$cource->id])}}">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </section>

                            <section class="card-body text-center">
                                <h6 class="indigo-text darken-4">
                                    <i class="icon icon-book"></i>
                                    {{$cource->cource_code}}
                                </h6>
                                <a href="{{route('student.matrial.weeks',[Request::segment(3),$cource->id])}}"><h4 class="card-title blue-text">{{$cource->name_en}}</h4></a>
                                    <p class="card-text">
                                        {!! $cource->description !!}
                                    </p>
                                <a class="btn btn-outline-danger darken-4" href="{{route('student.matrial.weeks',[Request::segment(3),$cource->id])}}">
                                    Go To Cource
                                    <i class="icon icon-keyboard_arrow_right pull-right"></i>
                                </a>
                            </section>
                        </article>
                    </div>  
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
