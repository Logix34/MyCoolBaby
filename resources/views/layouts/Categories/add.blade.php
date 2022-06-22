@extends('layouts.app')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <div class="card o-hidden border-0 shadow-lg my-5 ml-lg-5" style="max-width: 800px;">
            <!-- Page Heading -->
            <div class="card-body p-0 ">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="mb-3">
                                <h1 class="h3 mb-0 text-gray-800">{{ isset($detail)?"Edit Category":"Add Category" }}</h1>

                            </div>
                            <form role="form" class="user" method="Post" action="{{route('submit_categories')}}" autocomplete="off" enctype="multipart/form-data" >
                                @csrf
                                <input  type="hidden" name="id"  value="{{ isset($detail->id)?$detail->id:"" }}">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name"> Name</label>
                                        <input type="text" class="form-control " id=name" name="name" placeholder="Name"  value="{{ isset($detail->name)?$detail->name:"" }}">
                                        @error('name')
                                        <span class="alert" style="color: red;">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="banner_image"> Bennar Image</label>
                                    <input type="file" class="form-control" id="banner_image" name="banner_image" placeholder="banner_image" value="{{ isset($detail->banner_image)?$detail->banner_image:"" }}">
                                    @if(isset($detail->banner_image)&& !empty($detail->banner_image))<img src="{{ asset($detail->banner_image)}}" class="mt-4" id="preview_banner_image" height="150px" width="150px">@endif

                                </div>

                                <div class="form-group">
                                    <label for="square_image"> Square Image</label>
                                    <input type="file" class="form-control" id="square_image" name="square_image" placeholder="square_image" value="{{ isset($detail->square_image)?$detail->square_image:"" }}">
                                    @if(isset($detail->square_image)&& !empty($detail->square_image))<img src="{{ asset($detail->square_image)}}" class="mt-4" id="preview_square_image" height="150px" width="150px">@endif
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block" id="btn_submit">
                                   Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('script')
    <script>
        setTimeout(() => {
            $('.alert').alert('close');
        }, 2000);

        $("#banner_image").on('change' ,function (e){
            $("#preview_banner_image").attr("src", URL.createObjectURL(e.target.files[0]));
        })
        $("#square_image").on('change' ,function (e){
            $("#preview_square_image").attr("src", URL.createObjectURL(e.target.files[0]));
        })
    </script>
@endsection
