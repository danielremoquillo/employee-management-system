

@extends('layouts.details')
@section('content')


    <div class="container login-interface mx-auto mt-5">
        
        <div class="row">
            
            <div class="col logo-section d-md-flex justify-content-evenly align-items-center px-5 d-none">
                <div class = "d-flex flex-column custom-width-login">
                    <div class="login-section-header mb-3 pb-3">
                        <h2>Flight Information</h2>
                    </div>
                    <form>
                        <div class="form-outline mb-4">
                            <label class="form-label">Flight Code</label>
                            <input type="email" id="eMail" class="form-control" name ="email" value ="{{ $flights[0]['flight_code'] }}" readonly/>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <div class="form-outline mb-4">
                                <label class="form-label">Departure Airport</label>
                                <input type="email" id="eMail" class="form-control" name ="email" value ="{{ $flights[0]['departure_airport'] }}" readonly/>
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label">Arrival Airport</label>
                                <input type="email" id="eMail" class="form-control" name ="email" value ="{{ $flights[0]['arrival_airport'] }}" readonly/>
                            </div>


                        </div>
                        
                        
                        <div class="d-flex justify-content-between">
                            <div class="form-outline mb-4">
                                <label class="form-label">Departure Date Time</label>
                                <input type="email" id="eMail" class="form-control" name ="email" value ="{{ $flights[0]['departure_dateTime'] }}" readonly/>
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label">Arrival Date Time</label>
                                <input type="email" id="eMail" class="form-control" name ="email" value ="{{ $flights[0]['arrival_dateTime'] }}" readonly/>
                            </div>


                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-outline mb-4">
                                <label class="form-label">Seats</label>
                                <input type="email" id="eMail" class="form-control" name ="email" value ="{{ $flights[0]['seats'] }}" readonly/>
                            </div>
    
                            <div class="form-outline mb-4">
                                <label class="form-label">Price</label>
                                <input type="email" id="eMail" class="form-control" name ="email" value ="{{ $flights[0]['price'] }}" readonly/>
                            </div>


                        </div>
                        
        
                    </form>

                </div>

            </div>
            

            <div class="col login-section d-flex justify-content-center align-items-center px-5">
                
                <div class = "d-flex flex-column custom-width-login">
                    <div class="login-section-header mb-3 pb-3">
                        <h2>Personal Details</h2>
                    </div>
                    @if(Session::has('Success'))
                    <div class="alert alert-success pb-3 mb-3">{{ Session::get('Success') }}</div>
                    @endif
                    @if(Session::has('Error'))
                        <div class="alert alert-danger pb-3 mb-3">{{ Session::get('Error') }}</div>
                    @endif
                    <form action = "{{ route('book-register') }}" method = "POST">
                        @csrf
                        <input type="hidden" class="form-control" name="flight_id" id="flight_id" value = "{{ $flights[0]['id'] }}">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="eMail">Full Name</label>
                            <input type="text" id="full_name" class="form-control" name ="full_name" value ="{{ old('full_name') }}"/>
                            <span class="text-danger custom-warning">@error('email')
                                {{ $message }}
                            @enderror</span>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="eMail">Email</label>
                            <input type="text" id="eMail" class="form-control" name ="email" value ="{{ old('email') }}"/>
                            <span class="text-danger custom-warning">@error('email')
                                {{ $message }}
                            @enderror</span>
                        </div>
                      
                        <div class="form-outline mb-4">
                            <label class="form-label" for="eMail">Address</label>
                            <input type="text" id="address" class="form-control" name ="address" value ="{{ old('address') }}"/>
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




