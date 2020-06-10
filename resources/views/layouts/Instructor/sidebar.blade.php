<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{url('instructor')}}">
            <div class="logo-img">
                <img src="{{asset('dashboard/src/img/logo.png')}}" class="header-brand-img" alt="">
            </div>
            <span class="text">BFCAI</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expand" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button> </div>
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item active">
                    <a href="{{iurl('/')}}"><i class="ik ik-home"></i><span>@lang('site.home')</span></a>
                </div>
                <div class="nav-item has-sub">
                    @php
                    global $instructor;
                    $instructor = \App\Instructor::where('id',instructor()->id)->with('cources')->first();
                    @endphp
                    <a href="javascript:void(0)"><i class="ik ik-book"></i><span>@lang('site.my_material')</span></a>
                    <div class="submenu-content">
                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i></i><span class="ml-15">@lang('site.first_semester')</span></a>
                            <div class="submenu-content">
                                @if(!empty($instructor->cources->first()))
                                    @foreach ($instructor->cources as $cource)
                                        @if ($cource->semester == 1)
                                            @if (instructor()->type == 'doctor' or instructor()->type == 'head' )
                                            <a href="{{route('instructor.cources.lectures.index',$cource->id)}}" class="menu-item ml-5" ><span class=" ">{{ app()->getLocale() == 'en' ? $cource->name_en : $cource->name_ar }}</span></a> 
                                            @elseif(instructor()->type == 'assistant')
                                            <a href={{route('instructor.cources.sections.index',$cource->id)}}" class="menu-item ml-5" ><span class=" ">{{ app()->getLocale() == 'en' ? $cource->name_en : $cource->name_ar }}</span></a> 
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                                <a href="{{iurl('cources/create')}}" class="menu-item"><span>+ @lang('site.add_material')</span></a>
                            </div>      
                        </div>
                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i></i><span class="ml-15">@lang('site.second_semester')</span></a>
                            <div class="submenu-content">
                                @if(!empty($instructor->cources->first()))
                                    @foreach ($instructor->cources as $cource)
                                        @if ($cource->semester == 2)
                                            @if (instructor()->type == 'doctor' or instructor()->type == 'head' )
                                            <a href="{{route('instructor.cources.lectures.index',$cource->id)}}"  class="menu-item ml-5" ><span class=" ">{{ app()->getLocale() == 'en' ? $cource->name_en : $cource->name_ar }}</span></a> 
                                            @elseif(instructor()->type == 'assistant')
                                            <a href={{route('instructor.cources.sections.index',$cource->id)}}" class="menu-item ml-5" ><span class=" ">{{ app()->getLocale() == 'en' ? $cource->name_en : $cource->name_ar }}</span></a> 
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                                <a href="{{iurl('cources/create')}}"  class="menu-item" ><span> + @lang('site.add_material')</span></a>
                            </div>      
                        </div>
                    </div>
                </div>
                {{-- <div class="nav-item">
                    <a href="{{iurl('notifactions')}}"><i class="ik ik-bell"></i><span>@lang('site.notifactions')</span><span class="badge bg-danger">4</span></a>
                </div> --}}
                <div class="nav-item">
                    <a href="{{iurl('announcments')}}"><i class="ik ik-bookmark"></i><span>@lang('site.announcments')</span></a>
                </div>
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-check-square"></i>@lang('site.assigments_result')</a> 
                    <div class="submenu-content">
                       @if(!empty($instructor->cources->first()))
                            @foreach ($instructor->cources as $cource)
                                <a href="{{route('instructor.assignmentResult.index',$cource->id)}}"  class="menu-item ml-5" ><span class=" ">{{ app()->getLocale() == 'en' ? $cource->name_en : $cource->name_ar }}</span></a> 
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-mail"></i>@lang('site.messages')<span class="badge bg-danger">34</span></a> 
                    <div class="submenu-content">
                        <a href="{{route('instructor.messages.sent')}}" class="menu-item"><span>@lang('site.sent_message')</span></a>
                        <a href="{{iurl('messages')}}" class="menu-item"><span>@lang('site.receive_message')</span><span class="badge bg-danger">34</span></a>
                    </div>
                </div>
                 <div class="nav-item">
                    <a href="{{iurl('QuetionBank')}}"><i class="ik ik-message-square"></i><span>@lang('site.quetion_bank')</span><span class="badge bg-danger">15</span></a>
                </div>
                <div class="nav-item">
                    <a href="{{iurl('students')}}"><i class="ik ik-message-circle"></i><span>@lang('site.chat_room')</span><span class="badge bg-danger">+99</span></a>
                </div>
                <div class="nav-item">
                    <a href="{{iurl('students')}}"><i class="ik ik-users"></i><span>@lang('site.students')</span></a>
                </div>
                <div class="nav-item">
                    <a href="{{iurl('students')}}"><i class="ik ik-clipboard"></i><span>@lang('site.quiz')</span></a>
                </div>
                <div class="nav-item">
                    <a href="{{iurl('students')}}"><i class="ik ik-message-square"></i><span>@lang('site.feedback')</span><span class="badge bg-danger">140</span></a>
                </div>
            </nav>
        </div>
    </div>
</div>