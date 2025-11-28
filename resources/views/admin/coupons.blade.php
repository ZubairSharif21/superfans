@extends('layouts_admin.main')

@section('content_admin')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Coupons</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Coupons</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section>
    <div class="container-fluid">
        <div class="row my-4">
            <div class="col-12" style="text-align: right;">
                <a type="button" href="/admin/add_coupon" class="btn btn-success" style="margin-right: 7px;">Add
                    Coupon</a>
            </div>
        </div>
    </div>
</section>




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

               

                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Coupon No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Expiry Date</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody id="order_body">
                                    @php
                                    $index = 0;
                                    @endphp
                                    @foreach($Coupons as $Coupon)
                                    @php
                                    $index = $index + 1;

                                    @endphp
                                    <tr>
                                        <td><?php echo $index; ?></td>
                                        <td>{{ $Coupon->name }}</td>
                                        <td>{{ $Coupon->code }}</td>
                                        <td>${{ $Coupon->amount }}</td>
                                        <td>{{ $Coupon->type }}</td>
                                        <td>{{ $Coupon->expiry_date }}</td>
                                        <td>
                                            <a class="btn btn-success" href="edit_coupon/{{ $Coupon->id }}">Edit</a> 
                                            <a class="btn btn-danger" href="delete_coupon/{{ $Coupon->id }}" onclick="return confirm('are you sure to delete this coupon?')">Delete</a>
                                        </td>
                                      

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