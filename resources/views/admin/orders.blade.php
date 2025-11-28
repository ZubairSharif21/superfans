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
            <div class="col-12">
                @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
                @endif

                <div class="container card shadow mb-5 p-4" style="border-radius: 15px;">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">From</label>
                                <input type="date" class="form-control" id="from" aria-describedby="emailHelp">

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">To</label>
                                <input type="date" class="form-control" id="to" aria-describedby="emailHelp">

                            </div>
                        </div>

                        <div class="col-md-4">

                            <button type="button" class="btn btn-primary " id="date_filter_btn"
                                style="margin-top: 32px;">Search</button>



                        </div>

                    </div>

                </div>
                

                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Order No</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody id="order_body">
                                    @php
                                    $index = 0;
                                    @endphp
                                    @foreach($Orders as $Order)
                                    @php
                                    $index = $index + 1;

                                    $user = DB::table('users')->where('id',$Order->user_id)->first();

                                    $modals = DB::table('modals')->where('id',$Order->modal_id)->first();


                                    @endphp
                                    <tr>
                                        <td><?php echo $index; ?></td>
                                        <td>{{ $user->name }}</td>
                                        <td>${{ $modals->price }}</td>
                                        <td>{{ $Order->updated_at }}</td>
                                        <td> <a class="btn btn-success" href="view_order_details/{{ $Order->id }}">View
                                                Details</a> </td>
                                        <!-- <td>
                                            <div>

                                                <img src="{{ asset('assets/images/vest-yellow.png')}}"
                                                    style="width: 100px;max-width: 100%;position: absolute;@if($Order->vest == 1) display: block; @else display: none; @endif"
                                                    class="vest vest_yellow" alt="">

                                                <img src="{{ asset('assets/images/shoes.png')}}"
                                                    style="width: 100px;max-width: 100%;position: absolute;@if($Order->shoes == 1) display: block; @else display: none; @endif"
                                                    class="shoes" alt="">
                                                <img src="{{ asset('assets/images/face-mask.png')}}"
                                                    style="width: 100px;max-width: 100%;position: absolute;@if($Order->mask == 1) display: block; @else display: none; @endif"
                                                    class="face-mask" alt="">
                                                <img src="{{ asset('assets/images/gloves.png')}}"
                                                    style="width: 100px;max-width: 100%;position: absolute;@if($Order->gloves == 1) display: block; @else display: none; @endif"
                                                    class="gloves" alt="">
                                                <img src="{{ asset('assets/images/googles.png')}}"
                                                    style="width: 100px;max-width: 100%;position: absolute;@if($Order->glasses == 1) display: block; @else display: none; @endif"
                                                    class="googles" alt="">
                                                <img src="{{ asset('assets/images/helmet-yellow.png')}}"
                                                    style="width: 100px;max-width: 100%;position: absolute;@if($Order->helmet == 1) display: block; @else display: none; @endif"
                                                    class="helmet" alt="">
                                                @php
                                                $modal = DB::table('modals')->where('id',$Order->modal_id)->first();
                                                $image = $modal->image;
                                                @endphp
                                                <img src="{{ asset('assets/images/'.$image.'')}}"
                                                    style="width: 100px;max-width: 100%;" alt="">
                                            </div>
                                        </td> -->



                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#date_filter_btn").click(function() {
            var from_date = $("#from").val();
            var to_date = $("#to").val();

            $.ajax({
                url: '{{URL::to('/admin/filter_orders')}}',
                type: 'GET',
                data: { 'from_date':from_date,'to_date':to_date},
                success: function(response)
                {
                    
                    $("#order_body").empty();
                    $("#order_body").append(response);
                }
            });

        });
    });
    </script>


@endsection