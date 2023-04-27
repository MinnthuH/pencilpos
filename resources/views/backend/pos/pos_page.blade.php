@extends('admin_dashboard')

@section('admin')
@section('title')
    POS | Pencil POS System
@endsection
{{-- jquery link  --}}
<script src="{{ asset('backend/assets/jquery.js') }}"></script>
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">POS</a></li>

                        </ol>
                    </div>
                    <h4 class="page-title">POS</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-6 col-xl-6">
                <div class="card text-center">
                    <div class="card-body">

                        <table class="table table-bordered border-primary mb-0">
                            <thead>

                                <tr>
                                    <th>Name</th>
                                    <th>QTY</th>
                                    <th>Price</th>
                                    <th>SubTotal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @php
                                $allcart = Cart::content();
                            @endphp
                            <tbody>
                                @foreach ($allcart as $cart)
                                    <tr>

                                        <td>{{ $cart->name }}</td>
                                        <td>
                                            <form action="{{url('/cart_update/'.$cart->rowId)}}" method="post">
                                                @csrf
                                                <input type="number" name="qty" style="width:40px;" min="1"
                                                    value="{{ $cart->qty }}">
                                                <button type="submit" class="btn btn-sm btn-success"
                                                    style="margin-top:-2px;"><i class="fas fa-check"></i></button>
                                            </form>
                                        </td>
                                        <td>{{ $cart->price }}</td>
                                        <td>{{ $cart->price * $cart->qty }}</td>
                                        <td><a href="{{url('/cart_remove/'.$cart->rowId)}}" style="margin-top:-2px;"><i class="fas fa-trash-alt"
                                                    style="color:rgb(25, 7, 187)"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="bg-blue">
                            <br>
                            <p style="font-size:18px; color:#fff ">Quantity : {{ Cart::count()}} Pcs</p>
                            <p style="font-size:18px; color:#fff ">SubTotal : {{Cart::subtotal()}} Ks</p>
                            {{-- <p style="font-size:18px; color:#fff ">Tax : {{Cart::tax()}}</p> --}}
                            <p>
                            <h2 class="text-white">Total :</h2>
                            <h1 class="text-white">{{Cart::total()}}</h1>
                            </p>
                            <br>
                        </div>
                    </div>
                    <form action="{{url('create-invoice')}}" id="myForm" method="post">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="costomer" class="form-label">Add Customer</label>

                            <a href="{{ route('add#customer') }}"
                            class="btn btn-outline-blue rounded-pill waves-effect waves-light"><i class="fas fa-plus"></i></a>

                            <select name="customerId" class="form-select mt-3" id="example-select">
                                <option selected disabled>Select Customer</option>
                                @foreach ($customers as $cust)
                                    <option value="{{ $cust->id }}">{{ $cust->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- end col -->
                        <button class="btn btn-blue waves-effect waves-light mb-3">Create Invoice</button>
                    </form>

                </div> <!-- end card -->



            </div> <!-- end col-->

            <div class="col-lg-6 col-xl-6">
                <div class="card">
                    <div class="card-body">


                        <div class="tab-pane" id="settings">
                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th></th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($products as $key => $item)
                                        <tr>
                                            <form action="{{ url('/add-cart') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <input type="hidden" name="porductName"
                                                    value="{{ $item->product_name }}">
                                                <input type="hidden" name="qty" value="1">
                                                <input type="hidden" name="price"
                                                    value="{{ $item->selling_price }}">
                                                <td>{{ $key + 1 }}</td>
                                                <td><img src="{{ asset($item->product_image) }}"
                                                        style="width:50px;height:40px;" alt=""></td>
                                                <td>{{ $item->product_name }}</td>
                                                <td><button type="submit" style="font-size: 20px; color:#0d37f3;"><i
                                                            class="fas fa-plus-square"></i></button></td>

                                            </form>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                        <!-- end settings content-->

                    </div>
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div> <!-- container -->

</div> <!-- content -->

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                customerId: {
                    required : true,
                },
            },
            messages :{
                customerId: {
                    required : 'Please Select Customer Name',
                },

            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>







@endsection
