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

<section>
    <div class="container-fluid">
        <div class="row my-4">
            <div class="col-12" style="text-align: right;">
                <a type="button" href="/admin/add_model" class="btn btn-success" style="margin-right: 7px;">Add Model</a>
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
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th scope="col">User No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Image</th>
                                        
                                        <th scope="col">Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $index = 0;
                                    @endphp
                                    @foreach($Modals as $Modal)
                                    @php
                                    $index = $index + 1;

                                    $icon = $Modal->icon;
                                    $image = $Modal->image;

                                    @endphp
                                    <tr>
                                        <td><?php echo $index; ?></td>
                                        <td>{{ $Modal->name }}</td>
                                        <td>{{ $Modal->price }}</td>
                                        <td><img src="{{ asset('assets/images/'.$icon.'') }}" style="max-width: 100px;" alt=""></td>
                                        <td><img src="{{ asset('assets/images/'.$image.'') }}" style="max-width: 150px;" alt=""></td>
                                       
                                        <td>
                                            <a class="btn btn-success" href="edit_modal/{{ $Modal->id }}" >Update</a>
                                            <a class="btn btn-danger" href="delete_modal/{{ $Modal->id }}" onclick ="return confirm('are you sure to delete this modal?')">Delete</a>
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


@endsection