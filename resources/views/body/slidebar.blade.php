<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboards </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pos') }}">
                        <span class="badge bg-pink float-end">Hot</span>
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> POS </span>
                    </a>
                </li>


                <li class="menu-title mt-2">Apps</li>

                <li>
                    <a href="#employee" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span> Employee Manage</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="employee">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('all#employee')}}">All Employee</a>
                            </li>
                            <li>
                                <a href="{{ route('add#employee')}}">Add Employee</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#customer" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span> Customer Manage</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="customer">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('all#customer')}}">All Customer</a>
                            </li>
                            <li>
                                <a href="{{ route('add#customer')}}">Add Customer</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#salary" data-bs-toggle="collapse">
                        <i class="fas fa-truck"></i>
                        <span> Supplier Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="salary">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('all#supplier')}}">All Supplier</a>
                            </li>
                            <li>
                                <a href="{{ route('add#supplier')}}">Add Supplier</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#employeeSalary" data-bs-toggle="collapse">
                        <i class="fas fa-money-bill-wave"></i>
                        <span> Employee Salary </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="employeeSalary">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('all#advSalary')}}">All Advance Salary</a>
                            </li>
                            <li>
                                <a href="{{ route('add#advSalary')}}">Add Advance Salary</a>
                            </li>
                            <li>
                                <a href="{{ route('pay#Salary')}}">Pay Salary</a>
                            </li>
                            <li>
                                <a href="{{ route('month#Salary')}}">Last Month Salary</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#attendance" data-bs-toggle="collapse">
                        <i class="fas fa-clock"></i>
                        <span> Employee Attendance </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="attendance">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('add#attendance')}}">Add Employee Attendance</a>
                            </li>
                            <li>
                                <a href="{{route('employee#attendance')}}">Employee Attendance List</a>
                            </li>


                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#category" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Category </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="category">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all#category')}}">All Category</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#products" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Products </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="products">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all#product')}}">All Product</a>
                            </li>
                            <li>
                                <a href="{{ route('add#product')}}">Add Product</a>
                            </li>
                            <li>
                                <a href="{{ route('import#product')}}">Import Product</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#orders" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> orders </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="orders">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('pending#order')}}">Pending Orders</a>
                            </li>
                            <li>
                                <a href="{{ route('complete#order')}}">Complete Order</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#stock" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Stock Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="stock">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('manage#stock')}}">Stock</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#permission" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Role & Permission </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="permission">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all#permission')}}">All Permission</a>
                            </li>
                            <li>
                                <a href="{{ route('all#roles')}}">All Roles</a>
                            </li>
                            <li>
                                <a href="{{ route('add#rolepermission')}}">Roles In Permission</a>
                            </li>
                            <li>
                                <a href="{{ route('all#rolepermission')}}">All Roles In Permission</a>
                            </li>
                        </ul>
                    </div>
                </li>
                 <li>
                    <a href="#admin" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Setting Admin User </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="admin">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all#admin')}}">All Admin</a>
                            </li>
                            <li>
                                <a href="{{ route('all#roles')}}">Add Admin</a>
                            </li>

                        </ul>
                    </div>
                </li>



                <li class="menu-title mt-2">Custom</li>

                <li>
                    <a href="#addexpense" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span> Expense </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="addexpense">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('add#expense')}}">Add Expense</a>
                            </li>
                            <li>
                                <a href="{{route('today#expense')}}">Today Expense</a>
                            </li>
                            <li>
                                <a href="{{route('month#expense')}}">Monthly Expense</a>
                            </li>
                            <li>
                                <a href="{{route('year#expense')}}">Yearly Expense</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span> Extra Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpages">
                        <ul class="nav-second-level">
                            <li>
                                <a href="pages-starter.html">Starter</a>
                            </li>
                            <li>
                                <a href="pages-timeline.html">Timeline</a>
                            </li>

                        </ul>
                    </div>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
