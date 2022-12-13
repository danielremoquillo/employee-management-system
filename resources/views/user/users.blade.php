@extends('layouts.app')
@section('content')


    <div class= "container mx-auto pb-5 px-5">
        <div class="mt-4 pt-3 d-flex align-items-center justify-content-between" >
            <div class = "py-3 flex-1">
                <h1>Users</h1>
            </div>
            <div class = "">
                <a class="btn create" id="createNewUser">
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
                        <th>No</th>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th width = "150px">Action</th>                   
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
                    
                    <form id="userForm" name="userForm" class="form-horizontal">
                        @csrf
                       <input type="hidden" name="user_id" id="user_id">
                       <div class="form-group mb-3">
                            <label for="name" class="control-label">Employee ID</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="employee_id" name="employee_id" readonly>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="role_id" class="form-label">Role</label>
                            <select class="form-select" name="role_id" id="role_id" required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role['id']}}">{{ $role['name']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="name" class="control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email of the User" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name" class="control-label">Password</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Email of the User" value="" maxlength="50" required="">
                            </div>
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

    <!--- Create -->
    <div class="modal fade" id="ajaxModelCreate">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeadingCreate"></h4>
                </div>
                <div class="modal-body">
                    
                    <form id="userFormCreate" name="userFormCreate" class="form-horizontal">
                        @csrf
                       <input type="hidden" name="user_id" id="user_id">
                       <input type="hidden" id="full_name" name="full_name">
                       <div class="form-group mb-3">
                            <label for="employee_id" class="control-label">Employee Information</label>
                            <select class="form-select" name="employee_id" id="employee_id" required>
                                <option selected>Select Employee</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee['id']}}">#{{ $employee['id']}} {{ $employee['employee_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="role_id" class="form-label">Role</label>
                            <select class="form-select" name="role_id" id="role_id" required>
                                <option selected>Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role['id']}}">{{ $role['name']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="name" class="control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email of the User" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name" class="control-label">Password</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password of the User" value="" maxlength="50" required="">
                            </div>
                        </div>
          
                        <div class="col-sm-offset-2 col-sm-10">
                         <button type="submit" class="btn submit-modal" id="saveBtnCreate" value="create">Save changes
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
        ajax: "{{ route('users.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'employee_id', name: 'employee_id'},
            {data: 'employee_name', name: 'employee_name'},
            {data: 'role_name', name: 'role_name'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });


    $('#createNewUser').click(function () {
        $('#saveBtn').val("create-user");
        $('#user_id').val('');
        $('#userFormCreate').trigger("reset");
        $('#modelHeadingCreate').html("Register New User");
        $('#ajaxModelCreate').modal('show');

    });

    $('#saveBtnCreate').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
        $.ajax({
          data: $('#userFormCreate').serialize(),
          url: "{{ route('users.store') }}",
          type: "POST",
          dataType: 'json',
          
          success: function (data) {
     
              $('#userFormCreate').trigger("reset");
              $('#ajaxModelCreate').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtnCreate').html('Save Changes');
          }
      });
    });


    
    $('body').on('click', '.editUser', function () {
      var user_id = $(this).data('id');
      $.get("{{ route('users.index') }}" +'/' + user_id +'/edit', function (data) {
          $('#modelHeading').html("Edit User");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#user_id').val(data.id);
          $('#employee_id').val(data.employee_id);
          $('#role_id').val(data.role_id);
          $('#email').val(data.email);
          $('#password').val(data.password);
      })
   });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
        
        console.log($('#userForm').serialize())
        $.ajax({
          data: $('#userForm').serialize(),
          url: "{{ route('users.store') }}",
          type: "POST",
          dataType: 'json',
          
          success: function (data) {
     
              $('#userForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
    
    $('body').on('click', '.deleteUser', function () {
        
        var user_id = $(this).data("id");
        if(confirm("Are You sure want to delete !")){
            $.ajax({
                type: "DELETE",
                url: "{{ route('users.store') }}"+'/'+ user_id,
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