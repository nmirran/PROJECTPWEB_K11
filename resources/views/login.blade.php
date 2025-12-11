<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register BrownyGift</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body class="wave"> <span></span> <span></span> <span></span>

    <div class="container" id="container">

        <!-- REGISTER -->
        <div class="form-container sign-up">
            <form action="{{ route('register.post') }}" method="POST">
                @csrf

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <input type="text" name="nama" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="no_hp" placeholder="Phone Number" required>
                <input type="password" name="password" placeholder="Password" required>

                <button type="submit">Sign Up</button>
            </form>
        </div>

        <!-- LOGIN -->
        <div class="form-container sign-in">
            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <h1>Sign In</h1>

                <span>or use your email and password</span>

                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>

                <a href="#">Forgot your email or password?</a>

                <button type="submit">Sign In</button>
            </form>
        </div>

        <!-- TOGGLE -->
        <div class="toggle-container">
            <div class="toggle">

                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>

                <div class="toggle-panel toggle-right">
                    <h1>Hello, User!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>

            </div>
        </div>

    </div>

    <script src="{{ asset('js/login.js') }}"></script>
</body>

</html>