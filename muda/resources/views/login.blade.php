<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio Muda | Sign In</title>
    <link rel="stylesheet" href="css/login.css">

</head>

<body>
    <div class="layer"></div>
    <main class="page-center">
        <article class="sign-up">
            <img src="./img/logo.png" alt="Logo" width="400px" style="margin-bottom: 10px;">
            <form class="sign-up-form form" id="loginform" action="login" method="post" role="form">
                @csrf
                {{-- tampilkan error --}}
                @if ($errors->any())
                    <div
                        style="
                    /* buat style */
                    background-color: #f8d7da;
                    color: #842029;
                    padding: 30px;
                    border-radius: 5px;
                    
                    ">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <label class="form-label-wrapper">
                    <p class="form-label">Username</p>
                    <input class="form-input" id="login-username" type="text" name="username" value=""
                        placeholder="Username">
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">Password</p>
                    <input class="form-input" type="password" placeholder="Password" name="password"
                        id="login-password">
                </label>
                {{-- <label class="form-checkbox-wrapper">
                    <input class="form-checkbox" name="ingataku" type="checkbox" value="1" checked> Ingat
                </label> --}}
                <input type="submit" name="login" class="form-btn primary-default-btn transparent-btn"
                    value="Login">
            </form>
        </article>
    </main>
    <script src="./plugins/chart.min.js"></script>
    <script src="plugins/feather.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
