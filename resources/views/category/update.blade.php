@extends('layouts/mastertemplet')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Category Update</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url ('admin/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Category Update</li>
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
                <!-- jquery Category -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Quick Example <small>Category Update</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                         
                    <form id="quickForm" action="{{url ('admin/update-request')}}" method="post">
                          @include('messages')
                        <input type="hidden" name="id" value="{{$category->id}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <input type="text" name="cat_name" class="form-control" id="category" value="{{$category->cat_name}}">
                            </div>
                        </div>
                        <!-- /.card-body -->
                 
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