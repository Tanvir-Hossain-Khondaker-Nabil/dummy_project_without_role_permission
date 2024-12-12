@extends('backend.layouts.master')

@section('title', 'User')
@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">User Table</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <!-- Card container -->
                <div class="card rounded-lg shadow-sm border-0">
                    <div class="card-body pt-4 table-responsive">
                        <!-- DataTable -->
                        <table id="userTable" class="table table-hover table-bordered dt-responsive nowrap w-100">
                            <thead class="thead-custom">
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 my-4">
            <a href="{{ route('users.create') }}">
                <button class="btn btn-primary btn-submit">➥ Create</button>
            </a>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        if (!$.fn.dataTable.isDataTable('#userTable')) {
            $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('users.getData') }}',
                    type: 'GET',
                },
                columns: [
                    { 
                        data: null, 
                        name: 'id', 
                        render: function(data, type, row, meta) {
                            // Calculate the row number (starting from 1)
                            return meta.settings._iDisplayStart + meta.row + 1;
                        },
                        searchable: false 
                    },
                    { data: 'image', name: 'image', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                language: {
                    emptyTable: "No data available"
                }
            });
        }
    });
</script>
<script>
    $(document).on('click', '.delete-btn', function() {
    var userId = $(this).data('id');
    
    // SweetAlert confirmation
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
        if (result.isConfirmed) {
            // Send delete request with CSRF token
            $.ajax({
                url: '/users/' + userId,
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}", // Add the CSRF token here
                },
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        'User has been deleted.',
                        'success'
                    );
                    $('#userTable').DataTable().ajax.reload(); // Reload DataTable
                },
                error: function(xhr) {
                    Swal.fire(
                        'Error!',
                        'There was an issue deleting the user.',
                        'error'
                    );
                }
            });
        }
    });
});

</script>

@endpush