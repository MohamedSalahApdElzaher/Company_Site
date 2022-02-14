<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="/index.html">
                <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33" viewBox="0 0 30 33">
                    <g fill="none" fill-rule="evenodd">
                        <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                        <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                </svg>
                <span class="brand-name">Sleek Dashboard</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">

            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">



                <li class="has-sub active expand">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Home</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse show" id="dashboard" data-parent="#sidebar-menu">
                        <div class="sub-menu">



                            <li class="active">
                                <a class="sidenav-item-link" href="{{route('slider.home')}}">
                                    <span class="nav-text">Slider</span>

                                </a>
                            </li>

                            <li>
                                <a class="sidenav-item-link" href="{{route('about.all')}}">
                                    <span class="nav-text">Home About</span>

                                    <span class="badge badge-success">new</span>

                                </a>
                            </li>

                            <li>
                                <a class="sidenav-item-link" href="{{route('multi.picture')}}">
                                    <span class="nav-text">Home Portfolio</span>

                                </a>
                            </li>

                            <li>
                                <a class="sidenav-item-link" href="{{route('all.brand')}}">
                                    <span class="nav-text">Home Brand</span>

                                </a>
                            </li>




                        </div>
                    </ul>
                </li>

                <li class="has-sub active expand">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#contact" aria-expanded="false" aria-controls="contact">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Contacts</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse show" id="contact" data-parent="#sidebar-menu">
                        <div class="sub-menu">



                            <li class="active">
                                <a class="sidenav-item-link" href="{{route('contact-details')}}">
                                    <span class="nav-text">Contact Details</span>

                                </a>
                            </li>



                        </div>
                    </ul>
                </li>

            </ul>

        </div>

        <hr class="separator" />


    </div>
</aside>