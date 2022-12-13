@extends('layouts.auth')
@section('content')


    <div class="container mt-5">
        <div class="row m-5">

            <div class="col login-section d-flex justify-content-center align-items-center px-5">
                <img src="assets/logo_employee.svg"  class = "logo d-lg-block d-none" alt="">

                
                <div class = "d-flex flex-column custom-width-login">
                    <div class="login-header mb-3 pb-3">
                        <h1>Login</h1>
                    </div>
                    @if(Session::has('Success'))
                    <div class="alert alert-success pb-3 mb-3">{{ Session::get('Success') }}</div>
                    @endif
                    @if(Session::has('Error'))
                        <div class="alert alert-danger pb-3 mb-3">{{ Session::get('Error') }}</div>
                    @endif
                    <form action = "{{ route('login-user') }}" method = "POST">
                        @csrf
                        <div class="form-outline mb-4">
                            <label class="form-label" for="eMail">Email</label>
                            <input type="email" id="eMail" class="form-control input-border" name ="email" value ="{{ old('email') }}"/>
                            <span class="text-danger custom-warning">@error('email')
                                {{ $message }}
                            @enderror</span>
                        </div>
                      
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="passWord">Password</label>
                            <input type="password" id="passWord" class="form-control input-border" name ="password"/>
                            <span class="text-danger custom-warning">@error('email')
                                {{ $message }}
                            @enderror</span>
                        </div>
                      
                        <!-- Submit button -->
                        <input type="submit" class="btn custom-color-submit mb-4" value = "Submit" id ="loginSubmit">
                      
        
                    </form>

                </div>
                    
            </div>
        </div>
    </div>

@endsection




