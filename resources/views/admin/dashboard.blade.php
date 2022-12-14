@extends('layouts.app')
@section('content')

<div class="container pb-5">
    <div class= "container row  mx-auto my-3 pt-2 pb-5 ">
        <div class="col mt-4 pt-3" >
            <div class = "py-1 page-header">
                <h1>Dashboard</h1>
            </div>
        </div>
        <div class="py-5 row ">
            <div class="col card text-center p-5 px-2 mx-2">
                <div class="card-body p-5 px-3">
                    <img src="../assets/employee.svg" class = "dashboard-img" alt="">
                </div>
                <div class="card-body p-5 px-3">
                    <h1>{{ $dashboard_data['Employee'] }}</h1>
                </div>
                <div class="card-text">
                    <h5>Employees</h5>
                </div>
            </div>
            <div class="col card text-center p-5  px-2 mx-2">
                <div class="card-body p-5 px-3">
                    <img src="../assets/project.svg" class = "dashboard-img" alt="">
                </div>
                <div class="card-body p-5 px-3">
                    <h1>{{ $dashboard_data['Project'] }}</h1>
                    
                </div>
                <div class="card-text">
                    <h5>Projects</h5>
                </div>
            </div>
            <div class="col card text-center p-5  px-2 mx-2">
                <div class="card-body p-5 px-3">
                    <img src="../assets/leave.svg" class = "dashboard-img" alt="">
                </div>
                <div class="card-body p-5 px-3">
                    <h1>{{ $dashboard_data['Leave'] }}</h1>
                </div>
                <div class="card-text">
                    <h5>Employee Leave</h5>
                </div>
            </div>
            <div class="col card text-center p-5  px-2 mx-2">
                <div class="card-body p-5 px-3">
                    <img src="../assets/user.svg" class = "dashboard-img" alt="">
                </div>
                <div class="card-body p-5 px-3">
                    <h1>{{ $dashboard_data['User'] }}</h1>
                </div>
                <div class="card-text">
                    <h5>Users Created</h5>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection