<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Email Verification</title>


  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/apple-touch-icon.png') }}" />
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon-32x32.png') }}" />
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon-16x16.png') }}" />
  <link rel="icon" type="image/x-icon" href="{{ URL::asset('/favicon.ico') }}" />
  <link rel="manifest" href="{{ asset('assets/images/site.webmanifest') }}" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha256-PI8n5gCcz9cQqQXm3PEtDuPG8qx9oFsFctPg0S5zb8g=" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous">

  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

  <div class="container-fluid d-flex align-items-center justify-content-center">
    <div class="card mb-3 shadow p-3 mb-5 bg-body-tertiary rounded container">
      <div class="row g-0">

        <div class="col-md-4">
          <div class="card-body sign-in-wrapper justify-content-center">
            <h1 class="mb-3 login-title">Email Verification</h1>

            <form class="needs-validation" id="emailverificationForm" method="post" action="{{ url('') }}">
              @csrf

              <!--- Username Textfield --->
              <div class="form-group mb-4 email-textfield">
                <label for="email" class="form-label mb-2">Email</label>
                <input type="text" name="email" id="email"
                  class="form-control @error('email') is-invalid @enderror" placeholder="Enter your Email Address"
                  required />
                @error('username')
                @foreach($errors->get('email') as $verifyerror)
                <span class="invalid-feedback">{{ $verifyerror }}</span>
                @endforeach
                @enderror
              </div><!--- Closing of form-group mb-4 email-textfield --->

              <div class="d-flex justify-content-between align-items-center mb-5">
                <input type="submit" id="verify" class="btn btn-primary" value="Verify" />
            </form>

            <!--- Forgot Password Link --->
            <a href="{{ url('login') }}" id="forgotPasswordLink" class="forgot-password-link">Back to Login</a>

          </div><!--- Closing of d-flex justify-content-between align-items-center mb-5 --->
        </div><!-- Closing of card-body sign-in-wrapper justify-content-center --->
      </div><!-- Closing of col-md-4 -->


      <div class="col-md-6 image-container">
        <img src="{{ url('assets/images/Login-Card-Image.png') }}" alt="Login Card Image" />
      </div><!--- Closing of col-md-6 image-container --->

    </div><!-- Closing of row g-0 --->
  </div><!--- Closing of card mb-3 shadow p-3 mb-5 bg-body-tertiary rounded container --->
  </div><!--- Closing of container-fluid d-flex align-items-center justify-content-center --->


  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha256-3gQJhtmj7YnV1fmtbVcnAV6eI4ws0Tr48bVZCThtCGQ=" crossorigin="anonymous"></script>
</body>

</html>