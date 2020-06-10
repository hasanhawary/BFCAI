<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
    <section class="sidebar">
        <div class="w-80px mt-3 mb-3 ml-3 ">
            <h3>BFCAI</h3>
        </div>
        <div class="relative">
            <a data-toggle="collapse" href="#userSettingsCollapse" role="button" aria-expanded="false"
                aria-controls="userSettingsCollapse"
                class="btn-fab btn-fab-sm absolute fab-right-bottom fab-top btn-primary shadow1 ">
                <i class="icon icon-cogs"></i>
            </a>
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                        <img class="user_avatar" src="{{asset('student/assets/img/dummy/u13.png')}}" alt="User Image">
                    </div>
                    <div class="float-left info">
                        <h6 class="font-weight-light mt-2 mb-1">Hassan Elhawary</h6>
                        <a href="#"><i class="icon-circle text-primary blink"></i> Online</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="collapse multi-collapse" id="userSettingsCollapse">
                    <div class="list-group mt-3 shadow">
                        <a href="#" class="list-group-item list-group-item-action ">
                            <i class="mr-2 icon-umbrella text-blue"></i>Profile
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="mr-2 icon-security text-purple"></i>Change Password
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="{{route('student.index',Request::segment(3))}}">
                    <i class="icon icon icon-home  red-text s-18"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{route('student.matrial.index',Request::segment(3))}}">
                    <i class="icon icon-book purple-text s-18"></i> 
                    <span>My Matrials</span>
                    <span class="badge r-3 badge-danger pull-right">43</span> 
                </a>
            </li>
             <li class="treeview"><a href="{{route('student.assignments.index',Request::segment(3))}}">
                    <i class="icon icon-assignment  lime-text s-18"></i>
                    <span>Assignments</span>
                    <span class="badge r-3 badge-danger pull-right">72</span>
                </a>
            </li>
            <li class="treeview"><a href="{{route('student.announcements.index',Request::segment(3))}}">
                    <i class="icon icon-announcement pink-text  s-18"></i>
                    <span>Announcements</span>
                    <span class="badge r-3 badge-danger pull-right">4</span>
                </a>
            </li>
            <li class="treeview ">
                <a style="cursor:pointer;">
                <i class="icon icon-message light-green-text s-18"></i>
                <span style="cursor:pointer;">Messages</span>
                <span class="badge r-3 badge-danger pull-right">20</span>
                </a>
                
                <ul class="treeview-menu">
                    <li>
                        <a href="{{route('student.messages.index',[Request::segment(3),'instructors'])}}" class="pr-10">
                            <i class="fas fa-users red-text pr-4 "></i>
                            Instructors
                        </a>
                    </li>
                    <li>
                        <a href="{{route('student.messages.index',[Request::segment(3),'students'])}}" class="pr-10">
                            <i class="fas fa-users red-text pr-4"></i>
                            Students
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview"><a href="#">
                    <i class="icon icon icon-chat_bubble_outline  red-text s-18"></i>
                    <span>Chat Room</span>
                    <span class="badge r-3 badge-danger pull-right">+99</span>
                </a>
            </li>
            <li class="treeview"><a href="#">
                    <i class="icon icon-group amber-text  s-18"></i>
                    <span>Department Group</span>
                    <span class="badge r-3 badge-danger pull-right">27</span>
                </a>
            </li>
            
           
            <li class="treeview"><a href="#">
                    <i class="icon icon-beenhere teal-text  s-18"></i>
                    <span>Quizes</span>
                    <span class="badge r-3 badge-danger pull-right">85</span>
                </a>
            </li>
            <li class="treeview"><a href="#">
                    <i class="icon icon-question_answer orange-text  s-18"></i>
                    <span>Questions Bank</span>
                    <span class="badge r-3 badge-danger pull-right">+40</span>
                </a>
            </li>
            <li class="treeview"><a href="#">
                    <i class="icon icon-content_paste deep-orange-text  s-18"></i>
                    <span>Questionnaire</span>
                </a>
            </li>
        </ul>
    </section>
</aside>