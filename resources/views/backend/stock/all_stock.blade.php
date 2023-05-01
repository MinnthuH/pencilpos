@extends('admin_dashboard')


@section('admin')
@section('title')
    All Product | Pencil POS System
@endsection
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="{{ route('import#product')}}" class="btn btn-blue rounded-pill waves-effect waves-light"> Import</a>
                            &nbsp;
                            <a href="{{ route('export#product')}}" class="btn btn-blue rounded-pill waves-effect waves-light"> Export</a>
                            &nbsp;
                            <a href="{{ route('add#product')}}" class="btn btn-blue rounded-pill waves-effect waves-light">Add Product</a>
                        </ol>
                    </div>
                    <h4 class="page-title">All Stock</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Supplier</th>
                                    <th>Code</th>
                                    <th>Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                               @foreach ($product as $key => $item)
                               <tr>
                                <td>{{$key+1}}</td>
                                <td><img src="{{asset($item->product_image)}}" style="width:50px;height:40px;" alt=""></td>
                                <td>{{$item->product_name}}</td>
                                <td>{{$item['category']['category_name']}}</td>
                                <td>{{$item['supplier']['name']}}</td>
                                <td>{{$item->porduct_code}}</td>
                                <td><button class="btn btn-warning waves-effect waves-light">{{$item->product_store}}</button></td>
                            </tr>
                               @endforeach

                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->


    </div> <!-- container -->

</div> <!-- content -->

@endsection
