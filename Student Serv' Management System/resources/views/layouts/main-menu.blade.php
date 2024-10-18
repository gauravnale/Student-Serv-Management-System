    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            @role('admin')
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('admin') }}">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li><!-- End Dashboard Nav -->
            @endrole
            @role('school')
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('schooladmin') }}">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li><!-- End Dashboard Nav -->
            @endrole
            @role('business')
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('businessowner') }}">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li><!-- End Dashboard Nav -->
            @endrole
            @role('student')
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('student') }}">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li><!-- End Dashboard Nav -->
            @endrole
            @role('admin')
                @permission('manage-schools')
                    <li class="nav-item"><a class="nav-link collapsed" href="{{ route('admin.addschool') }}"><i
                                class="bi bi-menu-button-wide"></i><span>Create New
                                School</span><i class="bi bi-chevron-right ms-auto"></i></a>
                    </li>
                    <li class="nav-item"><a class="nav-link collapsed" href="{{ route('admin.manageschools') }}"><i
                                class="bi bi-journal-text"></i><span>Manage
                                Schools</span><i class="bi bi-chevron-right ms-auto"></i></a>
                    </li>
                @endpermission
                @permission('manage-business')
                    <li class="nav-item"><a class="nav-link collapsed" href="{{ route('admin.addbusiness') }}"><i
                                class="bi bi-layout-text-window-reverse"></i><span>Onboard
                                Business</span><i class="bi bi-chevron-right ms-auto"></i></a>
                    </li>
                    <li class="nav-item"><a class="nav-link collapsed" href="{{ route('admin.managebusiness') }}"><i
                                class="bi bi-gem"></i><span>Manage
                                Businesses</span><i class="bi bi-chevron-right ms-auto"></i></a>
                    </li>
                @endpermission
                @permission('manage-students')
                    <li class="nav-item"><a class="nav-link collapsed" href="{{ route('admin.addstudent') }}"><i
                                class="bi bi-envelope"></i><span>Onboard
                                Student</span><i class="bi bi-chevron-right ms-auto"></i></a>
                    </li>
                    <li class="nav-item"><a class="nav-link collapsed" href="{{ route('admin.managestudents') }}"><i
                                class="bi bi-dash-circle"></i><span>Manage
                                Students</span><i class="bi bi-chevron-right ms-auto"></i></a>
                    </li>
                @endpermission
                @permission('manage-chats')
                    <li class="nav-item"><a class="nav-link collapsed" href="{{ url('admin/orders') }}"><i
                                class="bi bi-menu-button-wide"></i><span>All
                                Chats</span><i class="bi bi-chevron-right ms-auto"></i></a>

                    </li>
                @endpermission
                <li class="nav-item"><a class="nav-link collapsed" href="{{ url('admin/manage-roles-permissions') }}"><i
                            class="bi bi-person"></i><span>All
                            Roles</span><i class="bi bi-chevron-right ms-auto"></i></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('admin.allchats') }}"><i
                            class="bi bi-person"></i><span>All
                            Chats</span><i class="bi bi-chevron-right ms-auto"></i></a>
                </li>
            @endrole

            @role('businessowner')
                <li class="nav-item"><a class="nav-link collapsed"
                        href="{{ route('businessowner.myproducts') }}"></i><span>My
                            Products</span><i class="bi bi-chevron-right ms-auto"></i></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('businessowner.addproduct') }}"><i
                            class="bi bi-person"></i><span>Add
                            Product</span><i class="bi bi-chevron-right ms-auto"></i></a>
                </li>

                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('businessowner.allchats') }}"><i
                            class="bi bi-person"></i><span>All
                            Chats</span></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('businessowner.adverts') }}"><i
                            class="bi bi-person"></i><span>Post
                            Advert</span></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('businessowner.myadverts') }}"><i
                            class="bi bi-person"></i><span>My
                            Adverts</span></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('businessowner.alladverts') }}"><i
                            class="bi bi-person"></i><span>All
                            Adverts</span></a>
                </li>
            @endrole
            @role('schooladmin')
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('student.allproducts') }}"><i
                            class="bi bi-person"></i><span>All
                            Products</span><i class="bi bi-chevron-right ms-auto"></i></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('student.mycart') }}"><i
                            class="bi bi-person"></i><span>My
                            Cart</span><i class="bi bi-chevron-right ms-auto"></i></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('student.adverts') }}"><i
                            class="bi bi-person"></i><span>Post Advert</span><i
                            class="bi bi-chevron-right ms-auto"></i></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('student.manage-purchases') }}"><i
                            class="bi bi-person"></i><span>Manage Purchases</span><i
                            class="bi bi-chevron-right ms-auto"></i></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('student.returnedgoods') }}"><i
                            class="bi bi-person"></i><span>Returned Products</span><i
                            class="bi bi-chevron-right ms-auto"></i></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('student.myadverts') }}"><i
                            class="bi bi-person"></i><span>My Adverts</span><i
                            class="bi bi-chevron-right ms-auto"></i></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('student.alladverts') }}"><i
                            class="bi bi-person"></i><span>All
                            Adverts</span><i class="bi bi-chevron-right ms-auto"></i></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('student.otherstudents') }}"><i
                            class="bi bi-person"></i><span>Other
                            Students</span><i class="bi bi-chevron-right ms-auto"></i></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('student.enrolledclubs') }}"><i
                            class="bi bi-person"></i><span>Enrolled
                            Clubs</span><i class="bi bi-chevron-right ms-auto"></i></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('student.schoolposts') }}"><i
                            class="bi bi-person"></i><span>School Posts</span><i
                            class="bi bi-chevron-right ms-auto"></i></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('student.orderhistory') }}"><i
                            class="bi bi-person"></i><span>Order History</span><i
                            class="bi bi-chevron-right ms-auto"></i></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('student.allchats') }}"><i
                            class="bi bi-person"></i><span>All Chats</span><i class="bi bi-chevron-right ms-auto"></i></a>
                </li>
            @endrole
            @role('school')
                <li class="nav-item"><a class="nav-link collapsed"
                        href="{{ route('schooladmin') }}"><span>Dashboard</span></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('schooladmin') }}"><i
                            class="bi bi-person"></i><span>All
                            Students</span><i class="bi bi-chevron-right ms-auto"></i></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('schooladmin.allchats') }}"><i
                            class="bi bi-person"></i><span>Chats</span><i class="bi bi-chevron-right ms-auto"></i></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('schooladmin.addclub') }}"><i
                            class="bi bi-person"></i><span>Add
                            Club</span><i class="bi bi-chevron-right ms-auto"></i></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('schooladmin.myclubs') }}"><i
                            class="bi bi-person"></i><span>My
                            Clubs</span><i class="bi bi-chevron-right ms-auto"></i></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('schooladmin.myposts') }}"><i
                            class="bi bi-person"></i><span>Posts</span><i class="bi bi-chevron-right ms-auto"></i></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('schooladmin.allproducts') }}"><i
                            class="bi bi-person"></i><span>All
                            Products</span><i class="bi bi-chevron-right ms-auto"></i></a>
                </li>
                <li class="nav-item"><a class="nav-link collapsed" href="{{ route('schooladmin.businessaccounts') }}"><i
                            class="bi bi-person"></i><span>All
                            Bussinesses</span><i class="bi bi-chevron-right ms-auto"></i></a>
                </li>
            @endrole

        </ul>

    </aside><!-- End Sidebar-->
