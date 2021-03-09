@extends('layouts.dashboard')

@section('dashboard-content')
<div class="row">
    <div class="col-lg-10 offset-lg-1">
        <div class="card mb-3">
            @if (session('successStoreCar'))
                <script>
                    toastr.success('{{ session('successStoreCar') }}', {timeOut:5000})
                </script>
            @endif
            @if (session('successCarUpdate'))
                <script>
                    toastr.success('{{ session('successCarUpdate') }}', {timeOut:5000})
                </script>
            @endif

            <div class="card-header text-white bg-dark">
                Cars
                <a href="{{ route('add.car') }}" class="btn btn-sm btn-outline-light float-right addButton"><i class="fas fa-plus-circle"></i> Add</a>
            </div>
            <div class="card-body">
                <table class="table table-hover" id="carsTable">
                    <thead>
                        <tr>
                            <th>Model</th>
                            <th>Type</th>
                            <th>Year</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
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
                Are you sure you want to delete this car?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- DETAILS MODAL -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100" id="myModalLabel">Add Body type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span id="form_output"></span>
                <label for="">Name:</label>
                <input name="name" type="text" id="inputName" class="form-control">
                <div class="mt-3">
                    <a href="#" class="btn btn-success saveButton float-right">Save</a>
                    <a href="#" class="btn btn-secondary float-right mr-2" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('dashboard-script')
<script>
    $(document).ready( function () {
        $('#carsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('get.cars') !!}',
            columns: [
                { data: 'manufacturer', name: 'manufacturer' },
                { data: 'body_type', name: 'body_type' },
                { data: 'year', name: 'year' },
                { data: 'price', name: 'price' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ],
            language: { search: "" },
        });
        $('.dataTables_filter input[type="search"]').addClass('form-control');
        $('.dataTables_filter input[type="search"]').attr("placeholder", "Type here to search");

        $('body').on('click', '.detailButton', function () {
            $('#detailsModal').modal('show')
            var id = $(this).parent().parent().attr('id');
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
                url: '/admin/cars/'+id,
                success: function (e) {
                    $('#carsTable').DataTable().draw()
                    $('#deleteModal').modal('hide')
                    toastr.success('Car Deleted', {timeOut:5000})
                },
                error: function (e) { console.log(e) }
            })
        })
    });
</script>
@endsection
