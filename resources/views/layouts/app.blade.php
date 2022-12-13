<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <title>Employee Management System</title>
</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;500;600;700;800&display=swap');

        * {
            font-family: 'Montserrat', sans-serif;
        }

        .custom-color-navbar {
            background-color: #3E3D59;
        }

        .custom-color-navbar-brand {
            color: #ffffff;
            font-weight: bold;
            font-size: 18px;
            line-height: 27px;
            letter-spacing: -0.055em;
        }

        .custom-color-navbar-sub-brand {
            font-weight: 500;
            font-size: 11px;
            line-height: 13px;
            display: flex;
            align-items: center;
            letter-spacing: -0.055em;
            text-transform: uppercase;
            font-feature-settings: 'pnum' on, 'lnum' on;

            color: #FFFFFF;

        }

        .custom-color-nav-links {
            color: #ffffff;
            text-transform: uppercase;
            text-decoration: none;
            padding-bottom:7px;
        }
        .custom-color-nav-links:hover {
            color: #ffffff;
            text-transform: uppercase;
            border-bottom:1px solid white;
            padding-bottom:6px;
        }
        .custom-active-link:active, .custom-color-nav-links:active{
            color: white;
        }

        .custom-active-link {
            color: #ffffff;
            text-decoration: none;
            text-transform: uppercase;
            border-bottom:1px solid white;
            padding-bottom:6px;
        }  

        h1{
            color: #3E3D59;
            font-weight: 800;
        }

        /**dashboard**/
        .custom-sidebar-color{
            background-color: #FFFFFF;
        }

        .content-page{
            margin-bottom: 100px;
            background: #FFFFFF;
            filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
        }
        .logout-text {
            text-decoration: none;
            color: #FFFFFF;
        }
        
        .dashboard-img{
            width: 60%;
            height: 80%;
        }
        .card {
            background: #FFFFFF;
            filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
            border-radius: 20px;
        }
        .edit,.delete,.create {
            color: #3E3D59;
        }
        .create:hover {
            color: #66bb6a;

        }
        .edit :hover {
            color: #29b6f6;
        }
        .delete:hover {
            color: #f44336;

        }

        .modal-header{
            background-color: #3E3D59;
            color: white;
        }

        .submit-modal{
            background-color: #3E3D59;
            color: white;
        }







        /**custom datatables att**/
        .dataTables_length, .dataTables_filter{
            margin-bottom: 30px;
        }

        /**custom table dark**/
        .table-dark{
            background-color: #3E3D59;
            color: #3E3D59;
        }
        /**custom paginate button**/
        .dataTables_info {
            color: #3E3D59;
        }

        .page-link {
            color: #3E3D59;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #3E3D59;
            border-color: #3E3D59;
        }

        table.dataTable.no-footer {
            border-bottom: none;
        }
        th{
            color: white;
            font:icon;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: transparent;
            color: white!important;
            border: 1px solid transparent;
            outline: none;
        }


        /*below block of css for change style when active*/

        .dataTables_wrapper .dataTables_paginate .paginate_button:active {
            background: transparent;
            color: white!important;
            border: 1px solid transparent;
            outline: none;
        }




    </style>

    <nav class="navbar navbar-expand-lg custom-color-navbar py-3">
        <div class="container mx-lg-auto d-flex">
            <div class = "px-4">

                <a class="navbar-brand row" href={{ url('user/dashboard') }}>
                    <span class="custom-color-navbar-brand">EMPLOYEE MANAGEMENT SYSTEM</span>
                    <span class="custom-color-navbar-sub-brand">SOFTWARE ENGINEERING I</span>
                </a>
            </div>


            <div class="custom-logout-session px-4">
                <a href= "{{ url('logout')  }}" class = "logout-text">
                    <span class = "d-flex logout-text">
                        <span>{{ $data['email'] }}</span>
                    <span class="material-symbols-outlined">
                        power_settings_new
                        </span>
                    </span>
                    
                
                </a>
            </div>

        </div>
    </nav>

    <nav class="navbar navbar-expand-lg custom-color-navbar py-3">
        <div class="container mx-md-auto row container">
                    
                    <div class = " d-flex justify-content-between">
                        @if (Str::contains(url()->current(), "user/dashboard") || (url()->current() == "http://127.0.0.1:8000") )
                            <a class ="custom-active-link" href= "{{ url('user/dashboard') }}">
                                <span class = "d-flex">
                                      
                                    <span class="material-symbols-outlined">
                                        dashboard
                                    </span>
                                    <span class = "px-2">DASHBOARD</span>  
                                </span>
                
                            </a>
                        @else
                            <a class ="custom-color-nav-links" href= "{{ url('user/dashboard') }}">
        
                                <span class = "d-flex">
                                          
                                    <span class="material-symbols-outlined">
                                        dashboard
                                    </span>
                                    <span class = "px-2">DASHBOARD</span>  
                                </span>
                            </a>

                            
                        @endif
                        @if (Str::contains(url()->current(), "user/employee"))
                            <a class ="custom-active-link" href= "{{ url('user/employee') }}">
                                <span class = "d-flex">          
                                    <span class="material-symbols-outlined">
                                        badge
                                    </span>
                                    <span class = "px-2">EMPLOYEES</span>  
                                </span>
                            </a>
                        @else
                            <a class ="custom-color-nav-links" href= "{{ url('user/employee') }}">
                                <span class = "d-flex">
                                    <span class="material-symbols-outlined">
                                        badge
                                    </span>
                                    <span class = "px-2">EMPLOYEES</span>  
                                </span>
                            </a>
                            
                        @endif
                        @if (Str::contains(url()->current(), "user/projects"))
                            <a class ="custom-active-link" href= "{{ url('user/projects') }}">
                                <span class = "d-flex">
                                    <span class="material-symbols-outlined">
                                        engineering
                                    </span>
                                    <span class = "px-2">PROJECTS</span>  
                                </span>
                            </a>
                        @else
                            <a class ="custom-color-nav-links" href= "{{ url('user/projects') }}">
                                <span class = "d-flex">
                                    <span class="material-symbols-outlined">
                                        engineering
                                    </span>
                                    <span class = "px-2">PROJECTS</span>  
                                </span>
                            </a>
                            
                        @endif
                        @if (Str::contains(url()->current(), "user/salary"))
                            <a class ="custom-active-link" href= "{{ url('user/salary') }}">
                                <span class = "d-flex">
                                    <span class="material-symbols-outlined">
                                        payments
                                    </span>
                                    <span class = "px-2">EMPLOYEE SALARY</span>  
                                </span>
                            </a>
                        @else
                            <a class ="custom-color-nav-links" href= "{{ url('user/salary') }}">
                            
                                <span class = "d-flex">
                                    <span class="material-symbols-outlined">
                                        payments
                                    </span>
                                    <span class = "px-2">EMPLOYEE SALARY</span>  
                                </span>
                            </a>
                        @endif
                        @if (Str::contains(url()->current(), "user/leaves"))
                            <a class ="custom-active-link" href= "{{ url('user/leaves') }}">
                                <span class = "d-flex">
                                    <span class="material-symbols-outlined">
                                        logout
                                    </span>
                                    <span class = "px-2">EMPLOYEE LEAVE</span>  
                                </span>
                            </a>
                        @else
                            <a class ="custom-color-nav-links" href= "{{ url('user/leaves') }}">
                                <span class = "d-flex">
                                    <span class="material-symbols-outlined">
                                        logout
                                    </span>
                                    <span class = "px-2">EMPLOYEE LEAVE</span>  
                                </span>
                            </a>
                            
                        @endif  

                        @if (Str::contains(url()->current(), "user/users"))
                            <a class ="custom-active-link" href= "{{ url('user/users') }}">
                                <span class = "d-flex">
                                    <span class="material-symbols-outlined">
                                        manage_accounts
                                    </span>
                                    <span class = "px-2">USERS</span>  
                                </span>
                            </a>
                        @else
                            <a class ="custom-color-nav-links" href= "{{ url('user/users') }}">
                                <span class = "d-flex">
                                    <span class="material-symbols-outlined">
                                        manage_accounts
                                    </span>
                                    <span class = "px-2">USERS</span>  
                                </span>
                            </a>
                        @endif  
                            
                        
                        
                    </div>
    
    
        </div>
    </nav>

        
    </div>

    
    


        
    @yield('content')
        
    </body>
</html>
