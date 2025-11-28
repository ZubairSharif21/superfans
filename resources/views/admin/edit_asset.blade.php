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
                    <li class="breadcrumb-item active">Assets</li>
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
                            <h3 style="text-align: center;">Update Asset</h3>
                        </div>
                        <form method="post" action="/admin/update_asset" enctype="multipart/form-data" id="add_asset_form">
                            @csrf

                            <input type="hidden" name="id" value="{{ $Asset_updated->id }}" >

                            @if($Asset_updated->parent != 0)
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="name" value="{{ $Asset_updated->name }}">

                            </div>
                            @endif


                            @php
                                $icon = $Asset_updated->icon;
                                $icon_off = $Asset_updated->icon_off;
                                $image = $Asset_updated->image;
                            @endphp
                            
                           

                            <div class="form-group">
                                <label for="exampleInputFile">Toggle Icon ON </label>
                                <div style="text-align: center;">
                                    <img src="{{ asset('assets/images/'.$icon.'') }}" style="max-width: 100px;" alt="">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="icon" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">{{ $Asset_updated->icon }}</label>
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
                                        <label class="custom-file-label" for="exampleInputFile">{{ $Asset_updated->icon_off }}</label>
                                    </div>
                                   
                                </div>
                            </div>






                           

                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div style="text-align: center;">
                                    <img src="{{ asset('assets/images/'.$image.'') }}" style="max-width: 200px;" alt="">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>

                                </div>
                            </div>

                            @if($Asset_updated->parent != 0)
                            <div class="form-group">
                                <label for="exampleInputEmail1">Parent</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="parent">
                                    <option value="0">Select Parent</option>
                                    @foreach($Assets as $Asset)
                                    <option value="{{$Asset->id}}" @if($Asset_updated->parent == $Asset->id) selected @endif>{{$Asset->name}}</option>
                                    @endforeach

                                </select>

                            </div>
                            @endif




                            <button type="button" class="btn btn-primary" id="submit_btn">Update</button>
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
            $('#add_asset_form').submit();
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