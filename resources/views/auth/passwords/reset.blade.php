<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Reset Password - Superfans World</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="shortcut icon" href="{{ url('assets/images/SUPERHEROINA.svg') }}" type="image/jpg">

  <style>
    input {
        height: 45px;
        border: 1px solid black !important;
        font-size: 20px !important;
        font-weight: 100 !important;
        border-radius: 0px !important;
    }
    .btn-outline-primary {
        color: #da1212;
        border: 2px solid #da1212;
        border-radius: 0px;
    }
    .btn-outline-primary:hover,
    .btn-outline-primary:focus,
    .btn-outline-primary:active {
        color: #fff;
        background-color: #da1212 !important;
        border-color: #da1212 !important;
        box-shadow: none;
        outline: none;
    }
    .form-control:focus {
        border: 1px solid black !important;
        color: black;
        background-color: #fff;
        box-shadow: none !important;
    }
  </style>
</head>
<body>

<!-- Loader -->
<!--<div id="loader" style="-->
<!--    position: fixed;-->
<!--    top: 0; left: 0;-->
<!--    width: 100%; height: 100%;-->
<!--    background: white;-->
<!--    display: flex;-->
<!--    justify-content: center;-->
<!--    align-items: center;-->
<!--    z-index: 9999;-->
<!--">-->
<!--  <img src="{{ url('assets/images/Superfans Titulo-01.svg') }}" alt="Loading..." style="width: 59%;">-->
<!--</div>-->

<!--<script>-->
<!--  window.addEventListener('load', function () {-->
<!--      const loader = document.getElementById('loader');-->
<!--      loader.style.transition = 'opacity 2.6s ease';-->
<!--      loader.style.opacity = 0;-->
<!--      setTimeout(() => loader.style.display = 'none', 700);-->
<!--  });-->
<!--</script>-->

<!-- Form Container -->
<div class="container">
  <div class="row justify-content-center align-items-center" style="height: 90vh">
    <div class="col-lg-5">
      <div class="card p-4" style="border-radius: 30px;border: 0;">
        <div class="card-body">
          <div class="text-center">
          @php
    $locale = app()->getLocale(); // get the current locale

$logos = [
        'en' => 'Superworld-13.svg',
        'it' => 'Superworld-14.svg',
        'es' => 'Superworld-15.svg',
        'pt' => 'Superworld-15.svg',
        'ca' => 'Superworld-16.svg',
        'fr' => 'Superworld-17.svg',
        'de' => 'Superworld-18.svg',
    ];

    $logo = $logos[$locale] ?? 'Superworld-13.svg'; // fallback English
@endphp

<a href="https://superfans.world/">
    <img src="{{ url('assets/images/' . $logo) }}" style="width: 56%;">
</a>

          </div>
          <h1 class="mb-3 text-center" style="color: #212529;">Reset Password</h1>
          <p class="text-center" style="color: black;">Enter your new password below.</p>

          <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
              <input id="email" type="email" placeholder="Your email" class="form-control @error('email') is-invalid @enderror"
                     name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
              @error('email')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>

            <div class="form-group">
              <input id="password" type="password" placeholder="New password" class="form-control @error('password') is-invalid @enderror"
                     name="password" required autocomplete="new-password">
              @error('password')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>

            <div class="form-group">
              <input id="password-confirm" type="password" placeholder="Confirm new password"
                     class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <button type="submit" class="btn btn-outline-primary btn-block" style="font-size: 20px;">Reset Password</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
