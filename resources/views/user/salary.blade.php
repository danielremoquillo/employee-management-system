@extends('layouts.app')
@section('content')
    

    <div class= "container mx-auto pb-5 px-5">
        
        <div class="mt-4 pt-3 d-flex align-items-center justify-content-between" >
            <div class = "py-3 flex-1">
                <h1>Employee Salary</h1>
            </div>
        </div>
        
        <div class = "">
            <table class="table-dark  data-table text-center table-responsive">
                <thead >
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Base Salary</th>
                
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

        
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
        ajax: "{{ route('salary.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'employee_name', name: 'employee_name'},
            {data: 'position_name', name: 'position_name'},
            {data: 'position_salary', name: 'position_salary'},
            
        ]
    });


    

       
    </script>
    


@endsection