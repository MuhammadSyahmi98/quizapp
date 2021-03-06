<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="span3">
                <div class="sidebar">
                    <ul class="widget widget-menu unstyled">
                        <li class="active"><a href="{{ url('/') }}"><i class="menu-icon icon-dashboard"></i>Dashboard
                            </a></li>
                        <li><a href="{{ route('quiz-create') }}"><i class="menu-icon icon-inbox"></i>Create Quiz <b class="label green pull-right">
                                    11</b> </a></li>
                        <li><a href="{{ route('quiz-index') }}"><i class="menu-icon icon-tasks"></i>View Quiz <b class="label orange pull-right">
                                    19</b> </a></li>
                    </ul>
                    <!--/.widget-nav-->


                    <ul class="widget widget-menu unstyled">
                        <li><a href="{{route('question-create')}}"><i class="menu-icon icon-bold"></i> Create Question </a></li>
                        <li><a href="{{route('question-index')}}"><i class="menu-icon icon-book"></i>View Questions </a></li>
                        
                    </ul>

                    <ul class="widget widget-menu unstyled">
                        <li><a href="{{route('user-create')}}"><i class="menu-icon icon-paste"></i>Create User </a></li>
                        <li><a href="{{route('user-index')}}"><i class="menu-icon icon-table"></i>View User </a></li>
            
                    </ul>

                    <ul class="widget widget-menu unstyled">
                        <li><a href="{{route('exam-create')}}"><i class="menu-icon icon-paste"></i>Assign Exam</a></li>
                        <li><a href="{{route('exam-index')}}"><i class="menu-icon icon-table"></i>View User Exam</a></li>
            
                    </ul>
                    <!--/.widget-nav-->
                    <ul class="widget widget-menu unstyled">
                        <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>More Pages </a>
                            <ul id="togglePages" class="collapse unstyled">
                                <li><a href="other-login.html"><i class="icon-inbox"></i>Login </a></li>
                                <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Profile </a></li>
                                <li><a href="other-user-listing.html"><i class="icon-inbox"></i>All Users </a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="menu-icon icon-signout"></i>Logout </a></li>
                    </ul>
                </div>
                <!--/.sidebar-->
            </div>
            <!--/.span3-->