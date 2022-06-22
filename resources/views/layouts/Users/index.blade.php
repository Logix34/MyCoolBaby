 @extends('layouts.app')
 @section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users</h1>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Users List
                </h6>

            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>firstname</th>
                            <th>lastname</th>
                            <th>image</th>
                            <th>Email</th>
                            <th>register at</th>
                            <th>Status</th>
                            <th>action</th>
                        </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->


    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endsection
@section('script')
    <script>
        var dt = $('#dataTable').DataTable( {
            "ajax": "{{ url('/users_list') }}",
            "columns": [
                { "data": "first_name"},
                { "data": "last_name"},
                { "data": "profile_image"},
                { "data": "email" },
                { "data": "created_at" },
                {"data" : "status"},
                { "data": "action",searchable: false,orderable: false }
            ],
            "order": [[1, 'asc']]
        } );
    </script>
@endsection
