<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Create New Password</title>


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
        <div class="card mb-3 shadow p-3 mb-5 bg-body-tertiary rounded np-container">
            <div class="row g-0">

                <div class="col-md-5">
                    <div class="card-body sign-in-wrapper justify-content-center">
                        <h1 class="mb-3 login-title">Create New Password</h1>

                        <form class="needs-validation" id="newpasswordForm" method="post" action="{{ url('') }}">
                            @csrf

                            <!--- New Password Textfield --->
                            <div class="form-group mb-4 new-password-textfield">
                                <label for="new-password" class="form-label mb-2">New Password</label>
                                <span class="eye-container" id="eyeIconNew">
                                    <i class="bi bi-eye-slash-fill"></i>
                                </span>
                                <input type="password" name="new-password" id="passwordNew"
                                    class="form-control @error('new-password') is-invalid @enderror"
                                    placeholder="Enter your New Password" required />
                                @error('new-password')
                                @foreach($errors->get('new-password') as $newpassworderror)
                                <span class="invalid-feedback">{{ $newpassworderror }}</span>
                                @endforeach
                                @enderror
                            </div>

                            <!--- Confirm New Password Textfield --->
                            <div class="form-group mb-4 confirm-new-password-textfield">
                                <label for="confirm-new-password" class="form-label mb-2">Confirm New Password</label>
                                <span class="eye-container" id="eyeIconConfirm">
                                    <i class="bi bi-eye-slash-fill"></i>
                                </span>
                                <input type="password" name="confirm-new-password" id="passwordConfirm"
                                    class="form-control @error('confirm-new-password') is-invalid @enderror"
                                    placeholder="Confirm your New Password" required />
                                @error('confirm-new-password')
                                @foreach($errors->get('confirm-new-password') as $confirmnewpassworderror)
                                <span class="invalid-feedback">{{ $confirmnewpassworderror }}</span>
                                @endforeach
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <input type="submit" id="submit-new-password" class="btn btn-primary btn-lg"
                                    value="Submit" />
                        </form>

                        <!--- Forgot Password Link --->
                        <a href="{{ url('login') }}" id="forgotPasswordLink" class="forgot-password-link">Back to
                            Login</a>

                    </div><!--- Closing of d-flex justify-content-between align-items-center mb-5 --->
                </div><!--- Closing of card-body sign-in-wrapper justify-content-center --->
            </div><!--- Closing of col-md-4 --->


            <div class="col-md-5 image-container-np">
                <img src="{{ url('assets/images/Login-Card-Image.png') }}" alt="Login Card Image"/>
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