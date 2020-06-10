@extends('layouts.instructor.app')
@push('style')
<style>
    .listOfDataboxs{
        margin-top: -35px;
    }
    
    .data_choice{
        padding: 30px;
    }
</style>
@endpush
@push('script')
<script> $(document).ready(function() { $('.select1').niceSelect(); }); </script>
 <script type="text/javascript">
    $(document).ready(function(){
        let cource_id = $("#cource_id").val();
        $('#week').on('change', function (e) {
            e.preventDefault();
            var optionSelected = $("option:selected", this);
            var week = this.value;
            $('#type_lec').on('change', function (e) {
                e.preventDefault();
                var optionSelected = $("option:selected", this);
                var type_lec = this.value;
                $("#lecture").empty();
                $("#loading").css("display", "flex");
                $.ajax({
                    url: "{{ route('instructor.load_lecture') }}",
                    dataType: 'html',
                    type: "post",
                    data: { _token:'{{ csrf_token() }}' ,type_lec : type_lec ,week:week,cource_id:cource_id},
                    success:function(data){ 
                        $("#loading").css("display", "none");
                        $("#lecture").empty();               
                        $("#lecture").append(data);
                    }
                });
            });
		});
        $('#type_lec').on('change', function (e) {
            e.preventDefault();
            var optionSelected = $("option:selected", this);
            var type_lec = this.value;
            $('#week').on('change', function (e) {
               e.preventDefault();
                var optionSelected = $("option:selected", this);
                var week = this.value;
                $("#lecture").empty();
                $("#loading").css("display", "flex");
                $.ajax({
                    url: "{{ route('instructor.load_lecture') }}",
                    dataType: 'html',
                    type: "post",
                    data: { _token:'{{ csrf_token() }}' ,type_lec : type_lec ,week:week,cource_id:cource_id},
                    success:function(data){ 
                        $("#loading").css("display", "none");
                        $("#lecture").empty();               
                        $("#lecture").append(data);
                    }
                });
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
                <i class="ik ik-briefcase bg-blue"></i>
                <div class="d-inline">
                    <h2>@lang('site.manage_lecture')</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{iurl('/')}}"><i class="ik ik-home"></i></a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">@lang('site.lectures')</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<input type="hidden" id="cource_id" value="{{$cource->id}}">
<div class="row mt-40 choice_select">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h6>@lang('site.choice_week_upload_matriel')</h6></div>
                    <div class="card-body">
                        <div class="row">
                           <div class="col-md-4 offset-md-4">
                                <div class="form-group">
                                    <label for="week">@lang('site.please_choice_the_week_type_upload')<i data-toggle="tooltip" data-placement="top" title="@lang('site.please_choice_the_week_type_upload')"  class="ik ik-info mx-2"></i></label> 
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="ik {{ app()->getLocale() == 'en' ? 'ik-arrow-right' : 'ik-arrow-left' }}"></i>
                                            </div>
                                        </div> 
                                        <select class="form-control select1 wide" name="week" id="week" required>
                                            <option value="test" selected>@lang('site.Choice_week...')</option>
                                            @foreach ($weeks as $week)
                                                <option value="{{ $week->id }}">{{ app()->getLocale() == 'en' ? $week->displayName_en : $week->displayName_ar }}</option>   
                                            @endforeach				
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="ik {{ app()->getLocale() == 'en' ? 'ik-arrow-right' : 'ik-arrow-left' }}"></i>
                                            </div>
                                        </div> 
                                        <select class="form-control select1 wide" name="type_lec" id="type_lec" required>
                                                <option value="test" selected>@lang('site.type_lec...')</option>
                                                <option value="document">@lang('site.document')</option>      
                                                <option value="video">@lang('site.video')</option>      
                                                <option value="assignment">@lang('site.assignment')</option> 
                                                <option value="all_type">@lang('site.all_type')</option> 
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
<div class="row mt-30 listOfDataboxs">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div style="display: none; flex-direction: column; align-items: center; margin-top:10px;" id="loading">
                    <div class="loader"></div>
                    <h5 style="margin-top: 10px">@lang('site.loading')</h5>
                </div>
                        
                <div id="lecture">
                    <div class="card listOfDataboxs">
                        <div class="card-header">
                            <h3>@lang('site.show_lecture_uploaded')</h3>
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
                                        <h7>@lang('site.choose_the_week_and_type_of_lecture_first_upload_it.')</h7>
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
                            
