@extends('layouts.instructor.app')
@push('style')
    <style> 
    .cp, .narrow .cp {
            float: none;

            flex-wrap: nowrap;
            align-items: flex-start;
            margin-right: 0;
            padding: 0 8px 0 0;
            box-sizing: content-box;
            flex-shrink: 0;
            vertical-align: top;
            cursor: pointer;


        }
        .narrow .votes,.narrow .views,.narrow .status{
            display: inline-block;
            height: 38px;
            min-width: 38px;
            margin: 0 3px 0 0;
            font-size: 15px;
            color: var(--black-400);
            padding: 7px 6px;
            text-align: center;

        }
        .narrow .votes {
            color: #cad900;
        }
        .narrow .views {
            color: green;

        }
        .narrow .status{
            color: red;
        }


    </style> 
@endpush
@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-briefcase bg-blue"></i>
                <div class="d-inline">
                    <h2>Questions Bank</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="cpIndex.html"><i class="ik ik-home"></i></a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">Questions Bank</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row mt-40">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Questions Bank :</h3>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="ik ik-minus minimize-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-body wizard-content vtab-steps-Container">
                <div class="dd" data-plugin="nestable">




                    <form class="vertical-tab-steps wizard-notification wizard clearfix vertical">
                        
                        <section>


                            <!-- ============================================================== -->
                            <!-- start New Row -->
                            <div class="row">
                                <div class="col-md-10 offset-md-1">

                                    <div class="row">
                                        <div class="col-md-6 offset-md-3">
                                            <div class="form-group">
                                                <label for="name">Course Name :</label>
                                                <select  name="course"
                                                    class="form-control ">
                                                    <option selected>Selcet Course</option>
                                                    <option value="BIS">BIS</option>
                                                    <option value="GIS">GIS</option>
                                                    <option value="Security">Security</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>


                        </section>
                    </form>


                </div>

            </div>
        </div>
    </div>
</div>
<div class="row mt-40">
    <div class="col-md-12">

        <div class="listOfDataboxs">

            <!-- start New card -->
            <div class="card">
                <div class="card-header">
                    <h4><i class="ik ik-user"></i><a href="#">Ehab Elsese</a></h4>
                    <button type="button" class="btn btn-sm btn-success pull-left"
                        data-toggle="modal" data-target="#sendMsg"><i class="ik ik-send"></i>Answer</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10 col-12 col-sm-6 col-lg-11 offset-md-1">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="countrydata icon-list-item">
                                        <i class="ik ik-book"></i>
                                        <div class="cousre-name" style="display: inline-block;">Security</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                            <div class="Question">
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio nisi nulla voluptas earum sit qui voluptate at non consequatur adipisci dicta, odit ut eos eaque iusto. Officia libero labore consequatur ?</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer narrow ">
                    <div class="cp ">
                        <div class="votes">
                            <div class="mini-counts"><span title="100 votes">100</span></div>
                            <div>votes</div>
                        </div>
                        <div class="status unanswered">
                            <div class="mini-counts"><span title="0 answers">0</span></div>
                            <div>answers</div>
                        </div>
                        <div class="views">
                            <div class="mini-counts"><span title="200 views">200</span></div>
                            <div>views</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4><i class="ik ik-user"></i><a href="#">Hassan Elhawary</a></h4>
                    <button type="button" class="btn btn-sm btn-success pull-left"
                        data-toggle="modal" data-target="#sendMsg"><i class="ik ik-send"></i>Answer</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10 col-12 col-sm-6 col-lg-11 offset-md-1">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="countrydata icon-list-item">
                                        <i class="ik ik-book"></i>
                                        <div class="cousre-name" style="display: inline-block;">Security</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                            <div class="Question">
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio nisi nulla voluptas earum sit qui voluptate at non consequatur adipisci dicta, odit ut eos eaque iusto. Officia libero labore consequatur ?</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer narrow ">
                    <div class="cp ">
                        <div class="votes">
                            <div class="mini-counts"><span title="100 votes">100</span></div>
                            <div>votes</div>
                        </div>
                        <div class="status unanswered">
                            <div class="mini-counts"><span title="0 answers">0</span></div>
                            <div>answers</div>
                        </div>
                        <div class="views">
                            <div class="mini-counts"><span title="200 views">200</span></div>
                            <div>views</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>
    <!-- Customer overview end -->





</div>
@endsection
