@extends('layouts_admin.main')

@section('content_admin')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Packages</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Packages</li>
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
                        <h3 style="text-align: center;">Edit Package</h3>
                    </div>
                        <form method="post" action="/admin/update_package">
                        @csrf
                        <input type="hidden" name="id" value="{{$Package->id}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="name" value="{{$Package->name}}">
                               
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">price</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="price" value="{{$Package->price}}">
                               
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="desc" value="{{$Package->desc}}">
                               
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">duration</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="duration" value="{{$Package->duration}}">
                               
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">duration unit</label>
                                <!-- <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="duration_unit" value="{{$Package->duration_unit}}"> -->

                                    <select class="form-control" name="duration_unit" id="exampleFormControlSelect1">
                                        <option selected>Select duration unit</option>
                                        <option value="month">Month</option>
                                        <option value="year">Year</option>
                                    </select>
                                    
                            </div>



                            <div class="form-group">
                                <label for="exampleInputEmail1">Available</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="Available" value="{{ $Package_includes->Available }}">
                               
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Unlimited</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="Unlimited" value="{{ $Package_includes->Unlimited }}">
                               
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">24/7 Free</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="twenty_four_hour_Free" value="{{ $Package_includes->twenty_four_hour_Free }}">
                               
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Free</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="Free" value="{{ $Package_includes->Free }}">
                               
                            </div>
                          
                          
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->


@endsection