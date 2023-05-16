@extends('admin_dashboard')

@section('admin')
@section('title')
    Invoice | Pencil POS System
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Customer Invoice</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Customer Invoice</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Logo & title -->
                        <div class="clearfix">
                            <div class="float-start">
                                <div class="auth-logo">
                                    <div class="logo logo-dark">
                                        <span class="logo-lg">
                                            <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt=""
                                                height="22">
                                        </span>
                                    </div>

                                    <div class="logo logo-light">
                                        <span class="logo-lg">
                                            <img src="{{ asset('backend/assets/images/logo-light.png') }}"
                                                alt="" height="22">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="float-end">
                                <h4 class="m-0 d-print-none">Invoice</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mt-3">
                                    <p><b>Hello, {{ $customer->name }}</b></p>
                                </div>

                            </div><!-- end col -->
                            <div class="col-md-4 offset-md-2">
                                <div class="mt-3 float-end">
                                    <p><strong>Order Date : </strong> <span class="float-end"> &nbsp;&nbsp;&nbsp;&nbsp;
                                        {{ date('Y-m-d H:i:s') }}</span></p>
                                    <p><strong>Order Status : </strong> <span class="float-end"><span
                                                class="badge bg-danger">Unpaid</span></span></p>
                                    <p><strong>Invoice No. : </strong> <span class="float-end">000028 </span></p>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <h6>Billing Address</h6>
                                <address>
                                    {{ $customer->address }} - {{ $customer->city }}
                                    <br>
                                    <abbr title="Phone">Shop Name:</abbr> {{ $customer->shopname }}<br>
                                    <abbr title="Phone">Phone:</abbr> {{ $customer->phone }}<br>
                                    <abbr title="Phone">Email:</abbr> {{ $customer->email }}
                                </address>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table mt-4 table-centered">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Item</th>
                                                <th style="width: 10%">Qty</th>
                                                <th style="width: 10%">Unit Cost</th>
                                                <th style="width: 10%" class="text-end">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $sl = 1;
                                            @endphp
                                            @foreach ($cartItem as $key => $item)
                                                <tr>
                                                    <td>{{ $sl++ }}</td>
                                                    <td>
                                                        <b>{{ $item->name }}</b> <br />

                                                    </td>
                                                    <td>{{ $item->qty }}</td>
                                                    <td>{{ $item->price }} Ks</td>
                                                    <td class="text-end">{{ $item->price * $item->qty }} Ks</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="clearfix pt-5">
                                    <h6 class="text-muted">Notes:</h6>

                                </div>
                            </div> <!-- end col -->
                            <div class="col-sm-6">
                                <div class="float-end">
                                    <p><b>Sub-total:</b> <span class="float-end">{{ Cart::subtotal() }} Ks</span></p>
                                    <p><b>Discount</b> <span class="float-end">0 Ks</span></p>

                                    <h3>{{ Cart::total() }} Ks</h3>
                                </div>
                                <div class="clearfix"></div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="mt-4 mb-1">
                            <div class="text-end d-print-none">
                                <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i
                                        class="mdi mdi-printer me-1"></i> Print</a>
                                <button type="button" class="btn btn-blue" data-bs-toggle="modal"
                                    data-bs-target="#signup-modal">Create Invoice</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container -->

</div> <!-- content -->

<!-- Signup modal content -->
<div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">

                <div class="text-center mt-2 mb-4">
                    <div class="auth-logo">
                        <h3>Invoice Of {{ $customer->name }}</h3>
                        <h3>Total Amonunt {{ Cart::total() }} Ks</h3>
                    </div>
                </div>


                <form class="px-3" action="{{ url('final-invoice') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Payment</label>
                        <select name="paymetnStatus" class="form-select mt-3" id="example-select">
                            <option selected disabled>Select Payment</option>

                            <option value="HandCash">HandCash</option>
                            <option value="Moblie Payment">Mobile Payment</option>
                            <option value="Due">Due</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Pay Now</label>
                        <input class="form-control" type="text" id="naem" name="payNow"
                            placeholder="Pay Ammount">
                    </div>


                    <input type="hidden" name="customerId" value="{{ $customer->id }}">
                    <input type="hidden" name="orderDate" value="{{ date('d-F-Y') }}">
                    <input type="hidden" name="orderStaus" value="pending">
                    <input type="hidden" name="porductCount" value="{{ Cart::count() }}">
                    <input type="hidden" name="subTotal" value="{{ Cart::subtotal() }}">
                    <input type="hidden" name="total" value="{{ Cart::total() }}">

                    <div class="mb-3 text-center">
                        <button class="btn btn-blue" type="submit">Complete Order</button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




@endsection
