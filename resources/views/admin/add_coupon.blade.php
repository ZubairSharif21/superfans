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

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12 col-sm-6 offset-sm-3 ">
                <div class="card">
                    <div class="card-body ">
                        <div>
                            <h3 style="text-align: center;">Add Coupon</h3>
                        </div>
                        <form method="post" action="/admin/add_new_coupon" enctype="multipart/form-data"
                            id="add_asset_form">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="name" value="" required>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Code</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="code" value="" required>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">amount</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="amount" value="" required>

                            </div>


                            <!-- <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary active">
                                    <input type="radio" name="options" id="option1" checked> Apple
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="options" id="option2"> Samsung
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="options" id="option3"> Sony
                                </label>
                            </div> -->

                            


                            <div class="form-group">
                                <label for="exampleInputEmail1" style="display: block;">Type</label>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-primary active">
                                    <input type="radio" name="type" id="option1" autocomplete="off" value="percent" checked> Percentage
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="type" id="option2" autocomplete="off" value="flat"> Flat
                                </label>
                               
                            </div>

                            </div>



                            <div class="form-group">
                                <label for="exampleInputEmail1">Expiry date</label>
                                <input type="date" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="expiry_date" value="" required>

                            </div>




                                <div class="form-check my-3">
                                    <input class="form-check-input" type="checkbox" name="limit_one" value="1" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Limit to one use per customer
                                    </label>
                                </div>




                            <button type="button" class="btn btn-primary" id="submit_btn">Submit</button>
                        </form>

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
    $("#submit_btn").click(function() {



        if ($('#use_on_image').is(':checked')) {
            $('#add_asset_form').submit();
        } else {

            if ($('input[name="icon_off"]').val() == '') {
                alert("Toggle Icon OFF is required or use the Toggle Icon ON");
            } else {
                $('#add_asset_form').submit();
            }



        }


    });


    $('.custom-file-input').change(function() {
        var i = $(this).next('label').clone();
        var file = $(this)[0].files[0].name;
        $(this).next('label').text(file);
    });


});
</script>


@endsection