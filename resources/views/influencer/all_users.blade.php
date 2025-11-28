
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">


    <title>Superfans | All Users</title>
</head>
<style>
    
    table{
        width: 90%;
    }
    
</style>
<body>


    <div class="container-fluid my-4 w-100">

        {{-- Followers Messages --}}

        @if(Session::has('follower_message'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h5><b>{{ Session::get('follower_message') }}</b></h5>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>


        @endif

        @if(Session::has('follower_error_message'))

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h5><b>{{ Session::get('follower_error_message') }}</b></h5>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>


        @endif

        @error('no_of_followers')

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h5><b>{{  $message  }}</b></h5>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @enderror



        {{-- Likes Messages --}}


        @if(Session::has('likes_added_message'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h5><b>{{ Session::get('likes_added_message') }}</b></h5>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>


        @endif


        @if(Session::has('likes_removed_message'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h5><b>{{ Session::get('likes_removed_message') }}</b></h5>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>


        @endif




        @if(Session::has('likes_error_message'))

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h5><b>{{ Session::get('likes_error_message') }}</b></h5>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>


        @endif

        @error('no_of_likes')

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h5><b>{{  $message  }}</b></h5>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @enderror




       <table id="myTable" class="table table-striped table-bordered">

    <thead>
        <tr class="bg-dark text-white">
            <th>Username</th>
            <th>Email</th>
            <th>Followers</th>
            <th>Role</th>
            <th>No.of Followers</th>
            <th>Followers Action</th>
            <th>Posts</th>
            <th>Growth Gear</th>
            <th>Verified</th> 
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->username_URL }}</td>
                <td>{{ $user->email }} 
                <br />   <br />

      {{-- Suspend / Unsuspend Toggle --}}
    <form action="{{ route('suspend_user', $user->id) }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-sm {{ $user->status === 'suspended' ? 'btn-success' : 'btn-warning' }}"
            onclick="return confirm('{{ $user->status === 'suspended' ? 'Un-suspend' : 'Suspend' }} this user?')">
            {{ $user->status === 'suspended' ? 'Unsuspend' : 'Suspend' }}
        </button>
    </form>

    {{-- Delete / Restore Toggle --}}
    <form action="{{ route('delete_user', $user->id) }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-sm {{ $user->status === 'deleted' ? 'btn-success' : 'btn-danger' }}"
            onclick="return confirm('{{ $user->status === 'deleted' ? 'Restore' : 'Delete' }} this user?')">
            {{ $user->status === 'deleted' ? 'Restore' : 'Delete' }}
        </button>
    </form>
                
                
                </td>
                <td><b>{{ $user->no_of_followers ?? 'No Followers' }}</b></td>
                <td><b>{{ $user->role }}</b></td>
                <form action="{{ url('/influencer/update_followers') }}/{{ $user->id }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <td><input type="number" name="no_of_followers" required></td>
                    <td>
                        <input type="submit" name="add_followers" class="btn btn-success my-1" value="Add">
                        <input type="submit" name="remove_followers" class="btn btn-danger my-1" value="Remove">
                    </td>
                </form>
                <form action="{{ url('/influencer/all_user_posts') }}/{{ $user->id }}" method="POST">
                    @csrf
                    <td>
                        <input type="submit" name="user_posts" value="Posts" class="btn btn-warning">
                    </td>
                </form>
                <td>
               <form action="{{ route('start_automatic_growth') }}" method="POST">
    @csrf
    
        <input type="hidden" name="user_id" value="{{ $user->id }}">

        @if($user->growth_status === 'inactive')
            <input type="range" name="gear_level" min="1" max="5" value="{{ $user->growth_gear_level ?? 1 }}" class="form-range" style="width: 100%;" 
                   oninput="document.getElementById('gearValue{{ $user->id }}').innerText = this.value">
            <small style="color: black;">Gear: <span id="gearValue{{ $user->id }}">{{ $user->growth_gear_level ?? 1 }}</span></small>
        @else
            <small style="color: black;">Growth is active at Gear {{ $user->growth_gear_level }}</small>
        @endif

        <button type="submit" class="btn btn-sm {{ $user->growth_status === 'active' ? 'btn-danger' : 'btn-primary' }} mt-1">
            {{ $user->growth_status === 'active' ? 'Stop' : 'Start' }}
        </button>
 
</form>

        <form action="{{ route('toggle_vip_status') }}" method="POST" class="d-inline">
    @csrf
    <input type="hidden" name="user_id" value="{{ $user->id }}">
    <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="vipSwitch{{ $user->id }}" name="vip" value="1"
            onchange="this.form.submit()" {{ $user->vip ? 'checked' : '' }}>
        <label class="custom-control-label" for="vipSwitch{{ $user->id }}">VIP</label>
    </div>
</form>
        </td>
   
   <td>
    {{-- ✅ Verified Toggle --}}
<form action="{{ route('verify_influencer') }}" method="POST" class="d-inline">
    @csrf
    <input type="hidden" name="user_id" value="{{ $user->id }}">

    <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="verifiedSwitch{{ $user->id }}" name="verified" value="1"
            onchange="this.form.submit()" {{ $user->verified ? 'checked' : '' }}>
        <label class="custom-control-label" for="verifiedSwitch{{ $user->id }}">
            {{ $user->verified ? 'Verified' : 'Not Verified' }}
        </label>
    </div>
</form>

</td>

            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $users->links() }}
</div>

    </div>



<!-- Button trigger modal -->


<!-- Modal -->












<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            responsive: true,
            dom: 'lfrtip' 
        });
    });
</script>

</body>
</html>
