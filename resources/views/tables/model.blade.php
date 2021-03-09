@extends('layouts.dashboard')

@section('dashboard-content')
<div class="row">
    <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
        <div class="card mb-3">
            <div class="card-header text-white bg-dark">
                Models
                <a class="btn btn-sm btn-outline-light float-right addButton"><i class="fas fa-plus-circle"></i> Add</a>
            </div>
            <div class="card-body">
                <table class="table table-hover" id="modelTable">
                    <thead>
                        <tr>
                            <th>Manufacturer</th>
                            <th>Model Name</th>
                            <th>Created At</th>
                            <th>Update At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- CREATE MODAL -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100" id="myModalLabel">Add Model</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span id="form_output"></span>
        <div class="form-group">
            <label for="">Manufacturer:</label>
            <select name="manufacturer_id" class="form-control">
                @foreach($manufacturers as $manufacturer)
                    <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Model:</label>
            <input name="name" type="text" id="inputName" class="form-control">
            <div class="mt-3">
                <a href="#" class="btn btn-success saveButton float-right">Save</a>
                <a href="#" class="btn btn-secondary float-right mr-2" data-dismiss="modal">Close</a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- EDIT MODAL -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100" id="myModalLabel">Update model</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span id="form_output_edit"></span>
                <label for="">Name:</label>
                <input type="hidden" class="form-control idOfInput">
                <input name="name" type="text" class="form-control editInputName">
                <div class="mt-3">
                    <a href="#" class="btn btn-primary updateButton float-right">Update</a>
                    <a href="#" class="btn btn-secondary float-right mr-2" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DELETE MODAL -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="idDelete">
        Are you sure you want to delete this model?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('dashboard-script')
<script>
    $(document).ready( function () {
        $('#modelTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('get.models') !!}',
            columns: [
                { data: 'manufacturer', name: 'manufacturer' },
                { data: 'name', name: 'name' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ],
            language: { search: "" },
        });
        $('.dataTables_filter input[type="search"]').addClass('form-control');
        $('.dataTables_filter input[type="search"]').attr("placeholder", "Type here to search");

        $('.addButton').click(function () {
            $('#addModal').modal('show')
            $('#inputName').val("");
        })

        $('.saveButton').click(function () {
            var name = $(this).parent().parent().find('input').val();
            var manufacturer = $(this).parent().parent().prev().find('select option:selected').val();
            $.ajax({
                url: "/admin/models",
                method: "POST",
                data: {
                    "_token": '{{ csrf_token() }}',
                    "name": name,
                    "manufacturer_id": manufacturer
                },
                success: function (data) {
                    var d = JSON.parse(data);
                    if (d.error.length > 0) {
                        var error_html = '';
                        for (var count = 0; count < d.error.length; count++) {
                            error_html += '<div class="alert alert-danger">' + d.error[count] + '</div>';
                        }
                        $('#form_output').html(error_html);
                    }
                    else {
                        $('#addModal').modal('hide')
                        $('#modelTable').DataTable().draw()
                        toastr.success('Model added', {timeOut:5000})
                    }
                },
                error: function(xhr){
                    console.log(xhr);
                }
            })
        })

        $('body').on('click', '.editButton', function () {
            $('#form_output_edit').empty();
            var name = $(this).parent().parent().children('td').eq(1).text();
            $('.editInputName').val(name)
            $('#editModal').modal('show')
            var id = $(this).parent().parent().attr('id');
            $('.idOfInput').val(id);
        })

        $('.updateButton').click(function () {
            let id = $('.idOfInput').val();
            var newName = $(this).parent().parent().find('input.editInputName').val();
            $.ajax({
                url: "/admin/models/"+id+"/update",
                method: "PUT",
                data: {
                    "_token": '{{ csrf_token() }}',
                    "name": newName
                },
                success: function (data) {
                    var d = JSON.parse(data);
                    if (d.error.length > 0) {
                        var error_html = '';
                        for (var count = 0; count < d.error.length; count++) {
                            error_html += '<div class="alert alert-danger">' + d.error[count] + '</div>';
                        }
                        $('#form_output_edit').html(error_html);
                    }
                    else {
                        $('#editModal').modal('hide')
                        $('#modelTable').DataTable().draw()
                        toastr.success('Model updated', {timeOut:5000})
                    }
                },
                error: function(xhr){
                    console.log(xhr)
                }
            })
        })

        $('body').on('click', '.deleteButton', function () {
            $('#deleteModal').modal('show')
            id = $(this).parent().parent().attr('id')
            $('#idDelete').val(id)
        })

        $('#confirmDelete').click(function () {
            let id = $('#idDelete').val()
            $.ajax({
                type: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                url: '/admin/models/'+id,
                success: function (e) {
                    $('#modelTable').DataTable().draw()
                    $('#deleteModal').modal('hide')
                    toastr.success('Model Deleted', {timeOut:5000})
                },
                error: function (e) { console.log(e) }
            })
        })
  });
</script>
@endsection
