

<!DOCTYPE html>
<html>
    
<head>
    <title>My Awesome Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('backend/css/adminlogin.css') }}">
        <script src="{{ asset('frontend/js/jquery.js')}}"></script>
</head>
<!--Coded with love by Mutiullah Samim-->
<body>
    <div class="container h-100" >
        <div class="d-flex justify-content-center h-100">
            <div class="user_card" style="height: 350px">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="{!! asset('frontend/images/home/logo.png') !!}" class="brand_logo" alt="Logo" >
                    </div>
                </div>
                
                <h3 style="text-align: center;">Password Reset Form</h3>

                <div class="d-flex justify-content-center form_container" style="margin-top: 20px" >

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.password.email') }}">
                        @csrf

                        
                           

                            <div class="mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        

                       
                            <div class="d-flex justify-content-center mt-3 login_container">
                                <button type="submit" class="btn login_btn">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


