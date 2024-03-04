@extends('layouts/mastertemplet')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url ('admin/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Product add</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery Sub Categories -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Products<small>Add</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @include('messages')
                    <form id="quickForm" action="{{url ('admin/productadd-request')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">


                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Product Name">
                            </div>

                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <input type="text" name="short_description" class="form-control" id="short_description" placeholder="Short Description">
                            </div>

                            <div class="form-group">
                                <label for="long_description">Long Description</label>
                                <textarea id="summernote" name="long_description">
                               Place <em>some</em> <u>text</u> <strong>here</strong>
                              </textarea>
                            </div>

                            <!--          @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror -->


                            <div class="form-group">
                                <label for="price">Product Price</label>
                                <input type="text" name="price" class="form-control" id="price" placeholder="Product Price">
                            </div>


                            <div class="form-group">
                                <label for="category Name">Category Name</label>
                                <select name="product_category_id" class="form-control">
                                    @foreach($category as $cat)
                                    <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="price">Sub Category Name</label>
                                <select name="product_subcategory_id" class="form-control">
                                    <option value="0">Select Sub Category</option>
                                    @foreach($sub_category as $subcat)
                                    <option value="{{$subcat->id}}">{{$subcat->sub_category_name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="product_image">Product Image</label>
                                <input type="file" name="product_image" class="form-control">
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection