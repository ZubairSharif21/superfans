@extends('layouts_admin.main')

@section('content_admin')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
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
                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th scope="col">User No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        
                                        <th scope="col">Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $index = 0;
                                    @endphp
                                    @foreach($Users as $user)
                                    @php
                                    $index = $index + 1;
                                    @endphp
                                    <tr>
                                        <td><?php echo $index; ?></td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                       
                                        <td>
                                            <a class="btn btn-success" href="edit_user/{{ $user->id }}" >Edit</a>
                                            <a class="btn btn-danger" href="delete_user/{{ $user->id }}" onclick ="return confirm('are you sure to delete this user?')">Delete</a>
                                            
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