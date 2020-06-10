 <header class="header-top" header-theme="light">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="top-menu d-flex align-items-center">
                        <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                        <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
                    </div>
                    
                    <div class="top-menu d-flex align-items-center userDrops">
                        <div class="dropdown mr-20">
                            <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="{{asset('storage/'.instructor()->image)}}" alt="user image"></a>
                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{iurl('profile')}}"><i class="ik ik-user dropdown-icon"></i>@lang('site.my_profile')</a>
                                <a class="dropdown-item" href="{{iurl('password/change')}}"><i class="ik ik-lock dropdown-icon"></i>@lang('site.change_password')</a>
                               
                                    <a class="dropdown-item" href="#"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="ik ik-power dropdown-icon"></i>@lang('site.log_out')</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </div>
                        </div>
                        <div class="dropdown spDroplist">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (app()->getLocale() == 'ar') 
                                    <img class="avatar" src="{{asset('dashboard/img/egypt.png')}}" alt="lang-photo">
                                @else
                                    <img class="avatar" src="{{asset('dashboard/img/images.jfif')}}" alt="lang-photo">
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-left animated bounceInDown">
                                @if (app()->getLocale() == 'en') 
                                    <a class="dropdown-item" rel="alternate" hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"><i class="flag-icon flag-icon-in"></i><img src="{{asset('dashboard/img/egypt.png')}}" alt=""> @lang('site.arabic')</a>
                                @else
                                    <a class="dropdown-item" rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"><i class="flag-icon flag-icon-fr"></i> <img src="{{asset('dashboard/img/images.jfif')}}" alt=""> @lang('site.english')</a>
                                @endif                
                            </div>
                        </div>
                        <div class="dropdown mr-20">
                            <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-bell"></i><span class="badge bg-danger">2</span></a>
                            <div class="dropdown-menu dropdown-menu-left notification-dropdown" aria-labelledby="notiDropdown">
                                <h4 class="header">@lang('site.notifactions')</h4>
                                <div class="notifications-wrap">
                                    <a href="{{iurl('notifactions')}}" class="media">
                                        <span class="d-flex">
                                            <i class="ik ik-user"></i> 
                                        </span>
                                        <span class="media-body">
                                            <span class="heading-font-family media-heading">@lang('site.meeting')</span> 
                                            <span class="media-content">2020-10-04 - 8 AM ...</span>
                                        </span>
                                    </a>
                                    <a href="#" class="media">
                                        <span class="d-flex">
                                            <i class="ik ik-user"></i> 
                                        </span>
                                        <span class="media-body">
                                            <span class="heading-font-family media-heading">@lang('site.assigment_upload')</span> 
                                            <span class="media-content">2020-10-04 - 8 AM ...</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="footer"><a href="{{iurl('notifactions')}}">@lang('site.see_all')</a></div>
                            </div>
                        </div>                      
                    </div>
                </div>
            </div>
        </header>