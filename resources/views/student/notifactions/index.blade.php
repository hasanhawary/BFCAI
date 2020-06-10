@extends('layouts.Instructor.app')

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-bell bg-blue"></i>
                <div class="d-inline">
                    <h2>@lang('site.notifactions')</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ iurl('/') }}"><i class="ik ik-home"></i></a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">@lang('site.notifactions')</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Customer overview start -->
<div class="row mt-40">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>@lang('site.notifactions')</h3>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="ik ik-minus minimize-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-body progress-task">
                <div class="dd" data-plugin="nestable">

                    <div class="table-responsive">
                        <table id="advanced_table"
                            class="table tableTypeA table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('site.notice')</th>
                                    <th>@lang('site.user_name')</th>
                                    <th>@lang('site.date')</th>
                                    <th>@lang('site.show')</th>
                                    <th>@lang('site.manage')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center"></td>
                                    <td><strong class="text-dark text-center">@lang('site.meeting_will_be_held')</strong></td>
                                    <td><strong class="text-dark text-center">Hassan Elhawary</strong></td>
                                    <td class="text-center text-dark">@lang('site.2020-11-22')</td>
                                    <td class="text-center text-dark">
                                        <a data-toggle="tooltip" data-placement="top" title="@lang('site.show_meeting')" href="#" class="btn btn-outline-success btn-sm">@lang('site.show_meeting')</a>
                                    </td>
                                    <td class="text-center">
                                        <div class="action-btns">
                                            <a data-toggle="tooltip" data-placement="top" title="Mark as Read" class="btn btn-icon btn-primary btn-view-profile" href='#'><i class="ik ik-check f-16 mr-10"></i></a>
                                            <a data-toggle="modal" data-target="#deleteModal" class="btn btn-icon btn-danger btn-add-Delete" href='#'><i class="ik ik-trash-2 f-16 mr-10" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"></td>
                                    <td><strong class="text-dark text-center">@lang('site.meeting_will_be_held')</strong></td>
                                    <td><strong class="text-dark text-center">Hassan Elhawary</strong></td>
                                    <td class="text-center text-dark">@lang('site.2020-11-22')</td>
                                    <td class="text-center text-dark">
                                        <a data-toggle="tooltip" data-placement="top" title="@lang('site.show_meeting')" href="#" class="btn btn-outline-success btn-sm">@lang('site.show_meeting')</a>
                                    </td>
                                    <td class="text-center">
                                        <div class="action-btns">
                                            <a data-toggle="tooltip" data-placement="top" title="Mark as Read" class="btn btn-icon btn-primary btn-view-profile" href='#'><i class="ik ik-check f-16 mr-10"></i></a>
                                            <a data-toggle="modal" data-target="#deleteModal" class="btn btn-icon btn-danger btn-add-Delete" href='#'><i class="ik ik-trash-2 f-16 mr-10" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"></td>
                                    <td><strong class="text-dark text-center">@lang('site.meeting_will_be_held')</strong></td>
                                    <td><strong class="text-dark text-center">Hassan Elhawary</strong></td>
                                    <td class="text-center text-dark">@lang('site.2020-11-22')</td>
                                    <td class="text-center text-dark">
                                        <a data-toggle="tooltip" data-placement="top" title="@lang('site.show_meeting')" href="#" class="btn btn-outline-success btn-sm">@lang('site.show_meeting')</a>
                                    </td>
                                    <td class="text-center">
                                        <div class="action-btns">
                                            <a data-toggle="tooltip" data-placement="top" title="Mark as Read" class="btn btn-icon btn-primary btn-view-profile" href='#'><i class="ik ik-check f-16 mr-10"></i></a>
                                            <a data-toggle="modal" data-target="#deleteModal" class="btn btn-icon btn-danger btn-add-Delete" href='#'><i class="ik ik-trash-2 f-16 mr-10" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"></td>
                                    <td><strong class="text-dark text-center">@lang('site.meeting_will_be_held')</strong></td>
                                    <td><strong class="text-dark text-center">Hassan Elhawary</strong></td>
                                    <td class="text-center text-dark">@lang('site.2020-11-22')</td>
                                    <td class="text-center text-dark">
                                        <a data-toggle="tooltip" data-placement="top" title="@lang('site.show_meeting')" href="#" class="btn btn-outline-success btn-sm">@lang('site.show_meeting')</a>
                                    </td>
                                    <td class="text-center">
                                        <div class="action-btns">
                                            <a data-toggle="tooltip" data-placement="top" title="Mark as Read" class="btn btn-icon btn-primary btn-view-profile" href='#'><i class="ik ik-check f-16 mr-10"></i></a>
                                            <a data-toggle="modal" data-target="#deleteModal" class="btn btn-icon btn-danger btn-add-Delete" href='#'><i class="ik ik-trash-2 f-16 mr-10" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Customer overview end -->
@endsection


