@extends('layouts.app')
@section('content')


    <div class= "container mx-auto pb-5 px-5">
        <div class="mt-4 pt-3 d-flex align-items-center justify-content-between" >
            <div class = "py-3 flex-1">
                <h1>Projects</h1>
            </div>
            <div class = "">
                <a class="btn create" id="createNewProject">
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
                        <th>Project Name</th>
                        <th>Due Date</th>
                        <th>Submission Date</th>
                        <th>Status</th>
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
                    
                    <form id="projectForm" name="projectForm" class="form-horizontal">
                        @csrf
                       <input type="hidden" name="project_id" id="project_id" value>
                        <div class="form-group mb-3">
                            <label for="employee_id" class="form-label">Employee</label>
                            <select class="form-select" name="employee_id" id="employee_id" required>
                                <option selected>Select Employee</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee['id']}}">#{{ $employee['id'] . "\t"}}{{ $employee['employee_name']}}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="project_name" class="form-label">Project Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Enter Name of the Project" value="" maxlength="50" required>
                            </div>
                        </div>


                        <div class="form-group mb-3">
                            <label for="project_due" class=" control-label">Due Date</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" id="project_due" name="project_due" placeholder="" value="" maxlength="50" required>
                            </div>
                        </div>


                        <div class="form-group mb-3">
                            <label for="project_sub" class="control-label">Submission Date</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" id="project_sub" name="project_sub" placeholder="" value="" maxlength="50" required>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="project_status" class="control-label">Status</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="project_status" name="project_status" placeholder="" value="" maxlength="50" required >
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
        ajax: "{{ route('projects.index') }}",

        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'employee_id', name: 'employee_id'},
            {data: 'project_name', name: 'project_name'},
            {data: 'project_due', name: 'project_due'},
            {data: 'project_sub', name: 'project_sub'},
            {data: 'project_status', name: 'project_status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#createNewProject').click(function () {
        $('#saveBtn').val("create-project");
        $('#project_id').val('');
        $('#projectForm').trigger("reset");
        $('#modelHeading').html("Create New Project");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.editProject', function () {
      var project_id = $(this).data('id');
      

      $.get("{{ route('projects.index') }}" +'/' + project_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Flight");
          $('#saveBtn').val("edit-flight");
          $('#ajaxModel').modal('show');
          $('#project_id').val(data.id);
          $('#employee_id').val(data.employee_id);
          $('#project_name').val(data.project_name);
          $('#project_due').val(data.project_due);
          $('#project_sub').val(data.project_sub);
          $('#project_status').val(data.project_status);
      })
   });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
        var val = document.getElementById('projectForm').value;

        $.ajax({
          data: $('#projectForm').serialize(),
          url: "{{ route('projects.store') }}",
          type: "POST",
          dataType: 'json',
          
          success: function (data) {
     
              $('#projectForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
    
    $('body').on('click', '.deleteProject', function () {
     
        var project_id = $(this).data("id");
        if(confirm("Are You sure want to delete !")){
            $.ajax({
                type: "DELETE",
                url: "{{ route('projects.store') }}"+'/'+ project_id,
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