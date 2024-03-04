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
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
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
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sub Categories data tables</h3>
                        <a href="{{url ('admin/subcategory-add')}}" class="float-right btn btn-primary">Add Sub Category</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @include('messages')
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Sub Category Name</th>
                                    <th>Category Name</th>
                                    <th>Product count</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                @foreach($product as $prod)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$prod->sub_category_name}}</td>
                                    <td>{{$prod->c_name}}</td>
                                    <td>{{$prod->subcategory_product_count}}</td>
                                    <td><a href="{{url ('admin/product-delete/'.$prod->id)}}" class="fa fa-trash text-red"></a> |
                                        <a href="{{url ('admin/product-update/'.$prod->id)}}" class="fa fa-edit text-success"></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection