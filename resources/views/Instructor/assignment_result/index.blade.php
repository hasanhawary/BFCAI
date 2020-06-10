@extends('layouts.instructor.app')
@push('script')
 <script type="text/javascript">
    $(document).ready(function(){
        let cource_id = $("#cource_id").val();
        let type = $("#type").val();
        let instructor_id = $("#instructor_id").val();
        $('#week').on('change', function (e) {
            e.preventDefault();
            var optionSelected = $("option:selected", this);
            var week = this.value;
            $("#assignment").empty();
            $("#loading").css("display", "flex");
            $.ajax({
                url: "{{ route('instructor.load_assignment') }}",
                dataType: 'html',
                type: "post",
                data: { _token:'{{ csrf_token() }}',week:week,cource_id:cource_id,type:type,instructor_id:instructor_id},
                success:function(data){ 
                    $("#loading").css("display", "none");
                    $("#assignment").empty();               
                    $("#assignment").append(data);
                }
            });
		});
    });
</script>
@endpush
@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-check-square bg-blue"></i>
                <div class="d-inline">
                    <h2>Assignment Result ({{ app()->getLocale() == 'en' ? $cource->name_en : $cource->name_ar }})</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{iurl('/')}}"><i class="ik ik-home"></i></a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">Assignment Result</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<input type="hidden" id="cource_id" value="{{$cource->id}}">
<input type="hidden" id="type" value="{{$instructor->type}}">
<input type="hidden" id="instructor_id" value="{{$instructor->id}}">
<div class="row mt-40  ">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h6>@lang('site.choice_week_show_assignment_result')</h6></div>
                    <div class="card-body">
                        <div class="row">
                           <div class="col-md-5 offset-md-3">
                                <div class="form-group">
                                    <label for="week">@lang('site.please_choice_the_week')<i data-toggle="tooltip" data-placement="top" title="@lang('site.please_choice_the_week')"  class="ik ik-info mx-2"></i></label> 
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="ik {{ app()->getLocale() == 'en' ? 'ik-arrow-right' : 'ik-arrow-left' }}"></i>
                                            </div>
                                        </div> 
                                        <select class="form-control" name="week" id="week" required>
                                            <option value="test" selected>@lang('site.Choice_week...')</option>
                                            @foreach ($weeks as $week)
                                                <option value="{{ $week->id }}">{{ app()->getLocale() == 'en' ? $week->displayName_en : $week->displayName_ar }}</option>   
                                            @endforeach				
                                        </select>
                                    </div>
                                </div>       
                            </div>
                        </div>                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div style="display: none; flex-direction: column; align-items: center; margin-top:10px;" id="loading">
                    <div class="loader"></div>
                    <h5 style="margin-top: 10px">@lang('site.loading')</h5>
                </div>
                        
                <div id="assignment">
                    <div class="card ">
                        <div class="card-header">
                            <h3>@lang('site.show_assignment_uploaded')</h3>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="ik ik-minus minimize-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body progress-task">
                            <div class="dd" data-plugin="nestable">
                                <div class="text-center">
                                    <div class="alert bg-info alert-info text-white d-inline-block my-3" role="alert">
                                        <h7>@lang('site.choose_the_week_and_tcource_first_show_it')</h7>
                                    </div>                        
                                </div>                        
                            </div>
                        </div>
                    </div> 
                    
                </div>
             </div> 
        </div>                                           
    </div> 
</div>
@endsection
