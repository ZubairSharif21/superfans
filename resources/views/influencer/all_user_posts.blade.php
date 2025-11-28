
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">


    <title>Superfans | All Posts</title>
</head>

<style>
    /* table{
        border: 1px solid black;
    }
    table th, td{
        border: 1px solid black;
    } */
</style>
<body>


    <div class="container my-4 ">


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




        {{-- <form action="{{ url('influencer/all_user_posts/{username_URL}')}}" method="POST">
            @csrf
            <input type="text" name="user_name" placeholder="Find by name">

            <a href="{{ url('influencer/all_user_posts/{username_URL}')}}">
            <input type="submit" name="find_posts" value="Find Posts"></a>
        </form> --}}

        {{-- <div class="wrapper">
            <input type="text" class="influencer_search" placeholder="{{ __('nav.search_influencer') }}">
            <div class="wrapper_span">🔎</div>
          </div> --}}
        <table class="table table-striped table-bordered dt-responsive nowrap" id="myTable">
            <thead>
                <tr class="bg-dark text-white">
                    <th>Post Id</th>
                    <th>Post</th>
                    <th>Influencer id</th>
                    <th>{{ __('content.likes') }} </th>
                    <th>Add {{ __('content.likes') }} </th>
                    <th>Likes Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($posts as $post)

                @php



                    $image_video = $post->image_video;

                    $file_extension = substr($image_video, strpos($image_video, ".") + 1);

                    $posts = DB::table('posts')->where('influencer_id', $post->id);


                @endphp
                    <tr>

                        <td>{{ $post->id }}</td>
                        <td>

                              @php
             $file_extension = pathinfo($image_video, PATHINFO_EXTENSION);
               $video_extensions = ['mp4', 'webm', 'mov', 'MOV'];
              @endphp

               @if (in_array(strtolower($file_extension), $video_extensions))
                                        <video controlsList="nodownload"  style="max-width: 100%;" controls loop>

                                            <source src="{{ asset('assets/images/' . $image_video . '') }}"
                                                    type="video/mp4">


                                        </video>
                                    @else
                                 
                                        <a href="{{ asset('assets/images/'.$image_video.'') }}"><img src="{{ asset('assets/images/'.$image_video.'') }}" alt="Nueva Modelo Superfans - �Bienvenid@ a mi Portfolio!" class="img-responsive" style="border-radius: 26px !important; border: 7px solid lightgray;width: 100px;">
                                </a>
                                    @endif


                        </td>

                        <td>{{ $post->influencer_id }}</td>

                        <td><b>{{ number_format($post->no_of_likes) }}</b></td>



                        <form action="{{ url('/influencer/update_likes', $post->id)}}" method="POST">
                            @csrf
                            <td><input type="number" name="no_of_likes" id="" required></td>
                            <td>

                                <a href="{{url('/influencer/update_likes')}}/{{ $post->id }}" class="text-decoration-none pointer"><input type="submit" name="add_likes" class="btn my-1 btn-success" value="Add "></a>
                                <a href="{{url('/influencer/update_likes')}}/{{ $post->id }}" class="text-decoration-none pointer"><input type="submit" name="remove_likes" class="btn my-1 btn-danger" value="Remove "></a>

                    </form>

                        {{-- <td><b>@if($user->no_of_followers == NULL) No Followers @else {{ $user->no_of_followers }} @endif</b></td> --}}

                    </tr>


                @endforeach
            </tbody>
        </table>
    </div>



<!-- Button trigger modal -->


<!-- Modal -->












<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
    var table = $('#myTable').DataTable( {
        responsive: true
    } );

    new $.fn.dataTable.FixedHeader( table );
} );
</script>
</body>
</html>
