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

<section>
    <div class="container-fluid">
        <div class="row my-4">
            <div class="col-12" style="text-align: right;">
                <a type="button" href="/admin/add_asset" class="btn btn-success" style="margin-right: 7px;">Add
                    Asset</a>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->

<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div style="text-align: end;">
                            <a href="/admin/add_watermark" class="btn btn-success mb-2">Add Watermark</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Watermark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $index = 0;
                                    @endphp
                                    @foreach($water_marks as $water_mark)
                                    @php
                                    $index++;
                                    $image = $water_mark->image;
                                    @endphp
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td>

                                            <img src="{{ asset('assets/images/'.$image.'') }}" class="shadow"
                                                style="max-width: 200px;" alt="">

                                        </td>
                                        <td>
                                            <a class="btn btn-success m-1"
                                                href="edit_watermark/{{ $water_mark->id }}">Update</a>

                                            <a class="btn btn-danger m-1" href="delete_watermark/{{ $water_mark->id }}"
                                                onclick="return confirm('are you sure to delete this watermark?')">Delete</a>
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

    </div>

</div>

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
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Icon/Color</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Parent</th>
                                        <th scope="col">Z-index</th>
                                        <th scope="col">Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $index = 0;
                                    @endphp
                                    @foreach($Assets as $Asset)
                                    @php
                                    $index = $index + 1;


                                    $icon = $Asset->icon;
                                    $image = $Asset->image;



                                    if($Asset->parent != 0){
                                    $asset_parent = DB::table('assets')->where('id', $Asset->parent)->first();

                                    }

                                    @endphp
                                    <tr>
                                        <td><?php echo $index; ?></td>
                                        <td>{{ $Asset->name }}</td>

                                        <td><img src="{{ asset('assets/images/'.$icon.'') }}" style="max-width: 100px;"
                                                alt=""></td>
                                        <td><img src="{{ asset('assets/images/'.$image.'') }}" style="max-width: 100px;"
                                                alt=""></td>

                                        @if($Asset->parent == 0)
                                        <td>Null</td>
                                        @else

                                        <td>{{ $asset_parent->name }}</td>
                                        @endif

                                        <td>
                                            <div class="form-group">

                                                <input type="number" class="form-control z_index" id="{{ $Asset->id }}"
                                                    aria-describedby="emailHelp" placeholder=""
                                                    value="{{ $Asset->z_index }}">

                                            </div>
                                        </td>

                                        <td>
                                            <a class="btn btn-success m-1" href="edit_asset/{{ $Asset->id }}">Update</a>
                                            @if($Asset->parent != 0 || $Asset->id > 8 )
                                            @php
                                                    $assets = DB::table('assets')->where('parent',$Asset->id)->get();
                                                   
                                                    
                                                    if(count($assets) > 0) {
                                                        $child_exist = 1;
                                                    }
                                                    else {
                                                        $child_exist = 0;
                                                    }
                                                        
                                                    
                                            @endphp
                                            <!-- <a class="btn btn-danger m-1" href="delete_asset/{{ $Asset->id }}"
                                                @if($child_exist == 0 ) onclick="return confirm('are you sure to delete this modal?')" @else onclick="return Delete_child();" @endif>Delete</a> -->
                                                <p class="btn btn-danger m-1 delete_asset_btn" @if($child_exist == 1 ) id="0" @else id="{{ $Asset->id }}" @endif  
                                               >Delete</p>
                                            @endif
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

    // function Delete_child(){
    //     alert("Please delete or update the child assets parent to delete it");
    //     return false;
    // }

    $(".delete_asset_btn").click(function(){
            var id = $(this).attr('id');
            if(id == 0)
            {
                alert("Please delete child assets or update them to delete this assets");
            } else {

                var r = confirm("are you sure to delete this asset?");
                if (r == true) {
                    window.location.href = "delete_asset/"+id+"";
                } else {
                
                }

            }
    });


    $(".z_index").on("change keyup", function() {
        id = $(this).attr('id');
        z_index_val = $(this).val();



        $.ajax({
            url: '{{URL::to('/admin/change_z_index')}}',
            type: 'GET',
            data: {
                'id': id,
                'z_index_val': z_index_val
            },
            success: function(response) {
                console.log(response);
                $("#earning_body").empty();
                $("#earning_body").append(response);
            }
        });





    });
});
</script>



@endsection