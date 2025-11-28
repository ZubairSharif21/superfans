@extends('layouts_admin.main')

@section('content_admin')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Assets</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Watermark</li>
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
                            <h3 style="text-align: center;">Add Watermark</h3>
                        </div>
                        <form method="post" action="/admin/add_new_watermark" enctype="multipart/form-data" id="add_asset_form">
                            @csrf


                            <div class="form-group">
                                <label for="exampleInputFile">Image </label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="watermark" class="custom-file-input" id="exampleInputFile" required>
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