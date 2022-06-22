@extends('layouts.app')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Sub Categories</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sub Categories List
                    <a href="{{route('add/sub_categories')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right ">Add Sub Categories</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Banner Image</th>
                            <th>Square Image</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subcategories as $subcategory)
                            <tr>
                                <td>{{$subcategory->name}}</td>
                                <td>{{$subcategory->category->name}}</td>
                                <td><img src="{{asset($subcategory->banner_image)}}" height="150px" width="150px" class="ml-5"></td>
                                <td><img src="{{$subcategory->square_image}}" height="150px" width="150px" class="ml-5"></td>
                                <td>
                                    <a class="btn  btn-sm" href="{{url('edit/subcategory/'.$subcategory->id)}}"><i class="fas fa-edit"></i></a>
                                    <a class="btn  delete btn-sm"  href="{{url('sub_categories/delete/' .$subcategory->id) }}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
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
@endsection

