@extends('layouts/mastertemplet')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sub Categories</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url ('admin/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Sub Categories</li>
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
                        <h3 class="card-title">Quick Example <small>jQuery Sub Categories</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" action="{{url ('admin/subcategory-request')}}" method="post">
                        @csrf
                        <div class="card-body">


                            <div class="form-group">
                                <label for="Sub category name">Categories</label>
                                <select name="category_id" class="form-control">
                                    @foreach($category as $category)
                                    <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Sub category name">Sub Category</label>
                                <input type="text" name="sub_category_name" class="form-control" id="Sub Category name" placeholder="Sub category name">
                            </div>

                            <div class="form-group">
                                <label for="subcategory_product_count">Sub Category product count</label>
                                <input type="number" name="subcategory_product_count" class="form-control" id="subcategory_product_count" placeholder="subcategory_product_count">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        @include('messages')
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
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