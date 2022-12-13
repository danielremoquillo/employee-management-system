@extends('layouts.app')
@section('content')
    

    <div class= "container mx-auto pb-5 px-5">
        
        <div class="mt-4 pt-3 d-flex align-items-center justify-content-between" >
            <div class = "py-3 flex-1">
                <h1>Employees</h1>
            </div>
            <div class = "">
                <a class="btn create" id="createNewEmployee">
                    <span class = "d-flex">
                        <span class = "px-2">Create</span>    
                        <span class="material-symbols-outlined pl-5">
                            add_circle
                        </span>   
                    </span>
                </a>
            </div>
        </div>
        
        <div class = "">
            <table class="table-dark  data-table text-center table-responsive">
                <thead >
                    <tr>
                        <th>ID</th>
                        <th width = "120px">Name</th>
                        <th width = "60px">Email</th>
                        <th>BirthDate</th>
                        <th>Gender</th>
                        <th width = "100px">Address</th>
                        <th>Degree</th>
                        <th>Position ID</th>
                        <th width = "80px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="ajaxModel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    
                    <form id="employeeForm" name="employeeForm" class="form-horizontal">
                        @csrf
                       <input type="hidden" name="employee_id" id="employee_id" value>
                    

                        <div class="form-group mb-3">
                            <label for="employee_name" class="form-label">Employee Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="employee_name" name="employee_name" placeholder="Enter Name of the Employee" value="" maxlength="50" required>
                            </div>
                        </div>


                        <div class="form-group mb-3">
                            <label for="employee_email" class="control-label">Employee Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="employee_email" name="employee_email" placeholder="Enter Email of the Employee" value="" maxlength="50" required>
                            </div>
                        </div>


                        <div class="form-group mb-3">
                            <label for="employee_bday" class="control-label">Employee BirthDate</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" id="employee_bday" name="employee_bday" placeholder="" value="" maxlength="50" required>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="employee_gender" class="control-label">Employee Gender</label>
                            <select class="form-select" name="employee_gender" id="employee_gender" required>
                                <option selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="employee_address" class="control-label">Employee Address</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="employee_address" name="employee_address" placeholder="" value="" maxlength="50" required >
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="employee_degree" class="control-label">Employee Degree</label>
                            <select class="form-select" name="employee_degree" id="employee_degree" required>
                                <option selected>Select Degree</option>
                                <option value="Professional Degree">Professional Degree</option>
                                <option value="Bachelor Degree">Bachelor Degree</option>
                                <option value="Master Degree">Master Degree</option>
                                <option value="Doctoral Degree">Doctoral Degree</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="position_id" class="control-label">Employee Position</label>
                            <select class="form-select" name="position_id" id="position_id" required>
                                <option selected>Select Position</option>
                                @foreach ($positions as $position)
                                    <option value="{{ $position['id']}}">{{ $position['position_name']}}</option>
                                @endforeach
                            </select>
                        </div>
          
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn submit-modal" id="saveBtn" value="create">Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
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
        ajax: "{{ route('employees.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'employee_name', name: 'employee_name'},
            {data: 'employee_email', name: 'employee_email'},
            {data: 'employee_bday', name: 'employee_bday'},
            {data: 'employee_gender', name: 'employee_gender'},
            {data: 'employee_address', name: 'employee_address'},
            {data: 'employee_degree', name: 'employee_degree'},
            {data: 'position_id', name: 'position_id'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });


    
    $('body').on('click', '.deleteEmployee', function () {
        
        var employee_id = $(this).data("id");
        if(confirm("Are You sure want to delete !")){
            $.ajax({
                type: "DELETE",
                url: "{{ route('employees.store') }}"+'/'+ employee_id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
      
        
    });

    $('#createNewEmployee').click(function () {
        $('#saveBtn').val("create-employee");
        $('#employee_id').val('');
        $('#employeeForm').trigger("reset");
        $('#modelHeading').html("Create New Employee");
        $('#ajaxModel').modal('show');
    });

    $('body').on('click', '.editEmployee', function () {
      var employee_id = $(this).data('id');
      

      $.get("{{ route('employees.index') }}" +'/' + employee_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Employee");
          $('#saveBtn').val("edit-employee");
          $('#ajaxModel').modal('show');
          $('#employee_id').val(data.id);
          $('#employee_name').val(data.employee_name);
          $('#employee_email').val(data.employee_email);
          $('#employee_bday').val(data.employee_bday);
          $('#employee_gender').val(data.employee_gender);
          $('#employee_address').val(data.employee_address);
          $('#employee_degree').val(data.employee_degree);
          $('#position_id').val(data.position_id);
      })
   });

   $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
        var val = document.getElementById('employeeForm').value;

        $.ajax({
          data: $('#employeeForm').serialize(),
          url: "{{ route('employees.store') }}",
          type: "POST",
          dataType: 'json',
          
          success: function (data) {
     
              $('#employeeForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
     
    $('body').on('click', '.deleteEmployee', function () {
     
     var employee_id = $(this).data("id");
     if(confirm("Are You sure want to delete !")){
         $.ajax({
             type: "DELETE",
             url: "{{ route('employees.store') }}"+'/'+ employee_id,
             success: function (data) {
                 table.draw();
             },
             error: function (data) {
                 console.log('Error:', data);
             }
       });
     }
   
     
 });
       
    </script>
    


@endsection