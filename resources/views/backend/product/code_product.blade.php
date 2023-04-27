@extends('admin_dashboard')

@section('admin')
@section('title')
    Add Barcode | Pencil POS System
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
                            <a href="{{ route('all#product')}}" class="btn btn-blue rounded-pill waves-effect waves-light"><i class="fas fa-arrow-circle-left"></i></a>
                        </ol>
                    </div>
                    <h4 class="page-title">Barcode Product</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-lg-8 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-pane" id="settings">


                            <h5 class="mb-4 text-uppercase"><i class="fas fa-barcode me-1"></i> Barcode Product
                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="firstname" class="form-label">Product Barcode</label>
                                        <h3>{{ $product->porduct_code }}</h3>
                                    </div>
                                </div>
                                <!-- end col -->

                                @php

                                    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                @endphp

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="firstname" class="form-label">Product Barcode</label>
                                        <h3>{!! $generator->getBarcode($product->porduct_code,$generator::TYPE_CODE_128) !!}</h3>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div> <!-- end row -->



                        </div>
                        <!-- end settings content-->

                    </div>
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div> <!-- container -->

</div> <!-- content -->






@endsection
