@extends('layouts.Instructor.app')

@section('content')
 <div class="row mt-30 clearfix">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="widget">
            <div class="widget-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h5>@lang('site.students')</h5>
                        <h2>165</h2>
                    </div>
                    <div class="icon">
                        <i class="ik ik-users"></i>
                    </div>
                </div>
            </div>
            <div class="progress progress-sm">
                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="widget">
            <div class="widget-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h5>@lang('site.assignments')</h5>
                        <h2>55</h2>
                    </div>
                    <div class="icon">
                        <i class="ik ik-check"></i>
                    </div>
                </div>
            </div>
            <div class="progress progress-sm">
                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="widget">
            <div class="widget-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h5>@lang('site.messages')</h5>
                        <h2>120</h2>
                    </div>
                    <div class="icon">
                        <i class="ik ik-message-square"></i>
                    </div>
                </div>
            </div>
            <div class="progress progress-sm">
                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="widget">
            <div class="widget-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h5>@lang('site.feedback')</h5>
                        <h2>45</h2>
                    </div>
                    <div class="icon">
                        <i class="ik ik-trending-up"></i>
                    </div>
                </div>
            </div>
            <div class="progress progress-sm">
                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
            </div>
        </div>
    </div>
</div>
@endsection
