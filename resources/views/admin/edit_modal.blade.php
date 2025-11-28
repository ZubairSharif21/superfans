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
                            <h3 style="text-align: center;">Update Model</h3>
                        </div>
                        <form method="post" action="/admin/update_model" enctype="multipart/form-data" id="edit_model_form">
                            @csrf

                            <input type="hidden" name="id" value="{{$Modal->id}}">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="name" value="{{$Modal->name}}">

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">price</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="price" value="{{$Modal->price}}">

                            </div>

                                    @php

                                        $icon = $Modal->icon;
                                        $icon_off = $Modal->icon_off;
                                        $image = $Modal->image;

                                    @endphp

                            

                            <div class="form-group">
                                <label for="exampleInputFile" style="width: 100%;">Icon</label>
                                <img src="{{ asset('assets/images/'.$icon.'') }}" style="max-width: 100px;margin-bottom: 20px;" alt="">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="icon" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">{{ $Modal->icon }}</label>
                                    </div>
                                   
                                </div>
                            </div>



                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="use_on_image" value="on" id="use_on_image" @if($icon == $icon_off) checked @endif>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Use same image for Off
                                </label>
                            </div>



                            <div class="form-group">
                                <label for="exampleInputFile">Toggle Icon OFF </label>
                                <div style="text-align: center;">
                                    <img src="{{ asset('assets/images/'.$icon_off.'') }}" style="max-width: 100px;" alt="">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="icon_off" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">{{ $Modal->icon_off }}</label>
                                    </div>
                                   
                                </div>
                            </div>



                           

                            <div class="form-group">
                                <label for="exampleInputFile" style="width: 100%;">Image</label>
                                <img src="{{ asset('assets/images/'.$image.'') }}" style="max-width: 150px;margin-bottom: 20px;" alt="">
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
        $('#edit_model_form').submit();
    } else {
        
        if($('input[name="icon_off"]').val() == '')
        {
            $('#edit_model_form').submit();
        } else {
            $('#edit_model_form').submit();
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