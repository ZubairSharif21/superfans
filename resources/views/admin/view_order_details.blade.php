@extends('layouts_admin.main')

@section('content_admin')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Orders</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Orders</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12 col-sm-6 offset-sm-3 ">
                <div class="card">
                    <div class="card-body ">
                        <div>
                            <h3 style="text-align: center;">Order details</h3>

                        </div>

                        <div>

                            <img src="{{ asset('assets/images/vest-yellow.png')}}"
                                style="max-width: 100%;position: absolute;margin-left: -19px;margin-top: -13.5px;@if($Order->vest == 1) display: block; @else display: none; @endif"
                                class="vest vest_yellow" alt="">

                            <img src="{{ asset('assets/images/shoes.png')}}"
                                style="max-width: 100%;position: absolute;margin-left: -16px;margin-top: -17px;@if($Order->shoes == 1) display: block; @else display: none; @endif"
                                class="shoes" alt="">
                            <img src="{{ asset('assets/images/face-mask.png')}}"
                                style="max-width: 100%;position: absolute;margin-left: -20px;margin-top: -10px;@if($Order->mask == 1) display: block; @else display: none; @endif"
                                class="face-mask" alt="">
                            <img src="{{ asset('assets/images/gloves.png')}}"
                                style="max-width: 100%;position: absolute;margin-left: -21px;margin-top: -32px;@if($Order->gloves == 1) display: block; @else display: none; @endif"
                                class="gloves" alt="">
                            <img src="{{ asset('assets/images/googles.png')}}"
                                style="max-width: 100%;position: absolute;margin-left: -20px;margin-top: -10px;@if($Order->glasses == 1) display: block; @else display: none; @endif"
                                class="googles" alt="">
                            <img src="{{ asset('assets/images/helmet-yellow.png')}}"
                                style="max-width: 100%;position: absolute;margin-left: -20px;margin-top: -10px;@if($Order->helmet == 1) display: block; @else display: none; @endif"
                                class="helmet" alt="">
                            @php
                            $modal = DB::table('modals')->where('id',$Order->modal_id)->first();
                            $image = $modal->image;
                            @endphp
                            <img src="{{ asset('assets/images/'.$image.'')}}" style="max-width: 100%;" alt="">
                        </div>

                        @php
                            $user = DB::table('users')->where('id',$Order->user_id)->first();

                            $modals = DB::table('modals')->where('id',$Order->modal_id)->first();
                        @endphp

                        <div>
                            <p style="font-size: 20px;text-align: center;"><span style="font-weight: bold;">{{ __('content.name') }}</span> {{ $user->name }}</p>
                            <p style="font-size: 20px;text-align: center;"><span style="font-weight: bold;">Price:</span> ${{ $modals->price }}</p>
                        </div>


                    </div>

                </div>

            </div>

        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->


@endsection