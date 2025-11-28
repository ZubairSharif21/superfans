@extends('layouts_admin.main')

@section('content_admin')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Models</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Models</li>
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
                            <h3 style="text-align: center;">Add Model</h3>
                        </div>
                        <form method="post" action="/admin/add_new_model" enctype="multipart/form-data" id="add_modal_form">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="name" value="">

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">price</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="price" value="">

                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Icon</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="icon" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                   
                                </div>
                            </div>

                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="use_on_image" value="" id="use_on_image">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Use same image for Off
                                </label>
                            </div>

                            <div class="form-group mt-2">
                                <label for="exampleInputFile">Toggle Icon OFF</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="icon_off" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                   
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                   
                                </div>
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
$(document).ready(function(){
  $("#submit_btn").click(function(){
    
    

    if($('#use_on_image').is(':checked'))
    {
        $('#add_asset_form').submit();
    } else {
        
        if($('input[name="icon_off"]').val() == '')
        {
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