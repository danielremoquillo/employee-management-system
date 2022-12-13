@extends('layouts.site')
@section('content')


    <div class= "container mx-auto content-page my-5 pb-5 px-5">
        <div class="mt-4 pt-3 d-flex align-items-center justify-content-between" >
            <div class = "py-5 flex-1">
                <h1>Book A Flight</h1>
            </div>
            <div class = "">
            </div>
        </div>
        <div class = "">
            <table class="table table-bordered data-table text-center">
                <thead >
                    <tr>
                        <th>No</th>
                        <th>Flight Code</th>
                        <th>Departure Airport</th>
                        <th>Arrival Airport</th>
                        <th>Departure Date Time</th>
                        <th>Arrival Date Time</th>
                        <th>Available Seats</th>
                        <th>Price</th>
                        <th>Action</th>


                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

   
                    
                    <form id="bookingForm" name="bookingForm" class="form-horizontal" action= "{{ url('site/bookdetails') }}" method = "get" hidden>
                        @csrf
                       <input type="hidden" name="flight_id" id="flight_id" value>
                       <input type="hidden" name="flight_code" id="flight_code" value = "" >
                        <div class="form-group mb-3">
                            <label for="departure_airport_id" class="form-label">Departure Airport</label>
                            <select class="form-select form-select-lg" name="departure_airport_id" id="departure_airport_id" disabled>
                                <option selected>Select one</option>
                                @foreach ($airports as $airport)
                                    <option value="{{ $airport['id']}}">{{ $airport['name']}}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="arrival_airport_id" class="form-label">Arrival Airport</label>
                            <select class="form-select form-select-lg" name="arrival_airport_id" id="arrival_airport_id" disabled>
                                <option selected>Select one</option>
                                @foreach ($airports as $airport)
                                    <option value="{{ $airport['id']}}">{{ $airport['name']}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group mb-3">
                            <label for="departure_DateTime" class="col-sm-2 control-label">Departure Date Time</label>
                            <div class="col-sm-12">
                                <input type="datetime-local" class="form-control" id="departure_dateTime" name="departure_dateTime" placeholder="Enter Name of the Airport" value="" maxlength="50" disabled>
                            </div>
                        </div>


                        <div class="form-group mb-3">
                            <label for="arrival_DateTime" class="col-sm-2 control-label">Arrival Date Time</label>
                            <div class="col-sm-12">
                                <input type="datetime-local" class="form-control" id="arrival_dateTime" name="arrival_dateTime" placeholder="Enter Name of the Airport" value="" maxlength="50" disabled >
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="price" class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" id="price" name="price" placeholder="Enter Name of the Airport" value="" maxlength="50" disabled >
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="seat" class="col-sm-2 control-label">Seat</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" id="seats" name="seats" placeholder="Enter Name of the Airport" value="" maxlength="50" disabled>
                            </div>
                        </div>
                    </form>

           

        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  

    <script type="text/javascript">
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('bookings.index') }}",

        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'flight_code', name: 'flight_code'},
            {data: 'departure_airport', name: 'departure_airport'},
            {data: 'arrival_airport', name: 'arrival_airport'},
            {data: 'departure_dateTime', name: 'departure_dateTime'},
            {data: 'arrival_dateTime', name: 'arrival_dateTime'},
            {data: 'seats', name: 'seats'},
            {data: 'price', name: 'price'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
    

        ]
    });

    $('body').on('click', '.reserveFlight', function () {
      var flight_id = $(this).data('id');
      
      $.get("{{ route('bookings.index') }}" +'/' + flight_id +'/edit', function (data) {
          $('#flight_id').val(data.id);
          $('#departure_airport_id').val(data.departure_airport_id);
          $('#arrival_airport_id').val(data.arrival_airport_id);
          $('#departure_dateTime').val(data.departure_dateTime);
          $('#arrival_dateTime').val(data.arrival_dateTime);
          
          $('#seats').val(data.seats);
          $('#price').val(data.price);

        document.getElementById('bookingForm').submit();
      })
      
      
   });
       
    </script>
    


@endsection