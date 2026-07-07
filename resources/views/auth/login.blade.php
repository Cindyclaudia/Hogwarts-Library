<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hogwarts Library Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap');

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{

            min-height:100vh;

            display:flex;
            justify-content:center;
            align-items:center;

            background:#f5efe2;

            background-image:
            radial-gradient(circle at center,
            rgba(255,255,255,.5),
            rgba(0,0,0,.03));

            font-family:'Cinzel',serif;
        }

        .login-wrapper{

            width:100%;
            max-width:520px;

            padding:20px;
        }

        .login-card{

            background:#f8f1df;

            border:8px solid #5b3a1d;

            border-radius:20px;

            padding:35px;

            box-shadow:
            0 0 30px rgba(0,0,0,.25);

            position:relative;
        }

        .hog-logo{

            text-align:center;
            margin-bottom:20px;
        }

        .hog-logo i{

            font-size:60px;
            color:#c79b3b;
        }

        .title{

            text-align:center;
            font-size:36px;
            font-weight:700;

            color:#3d2414;

            margin-bottom:10px;
        }

        .subtitle{

            text-align:center;
            color:#7b5c35;

            margin-bottom:25px;
        }

        .form-label{

            font-size:16px;
            font-weight:600;

            color:#3d2414;
        }

        .form-control{

            height:60px;

            border:2px solid #caa96d;

            background:#fffaf0;

            font-size:18px;
        }

        .form-control:focus{

            box-shadow:none;

            border-color:#8d6735;
        }

        .login-btn{

            width:100%;

            background:#7b0f1f;

            border:none;

            color:white;

            font-size:24px;

            font-weight:bold;

            padding:15px;

            border-radius:12px;

            margin-top:20px;
        }

        .login-btn:hover{

            background:#5a0915;
        }

        .magic-icon{

            color:#8d6735;

            font-size:24px;

            margin-right:10px;
        }

        .footer-text{

            text-align:center;

            margin-top:25px;

            color:#7b5c35;
        }

    </style>

</head>

<body>

<div class="login-wrapper">

    <div class="login-card">

        <div class="hog-logo">

            <i class="fas fa-hat-wizard"></i>

        </div>

        <h1 class="title">
            Hogwarts Library
        </h1>

        <p class="subtitle">
            Access The Archives
        </p>

        @if($errors->any())

            <div class="alert alert-danger">

                @foreach($errors->all() as $error)

                    <div>{{ $error }}</div>

                @endforeach

            </div>

        @endif

        <form method="POST"
              action="{{ route('login') }}">

            @csrf

            <div class="mb-4">

                <label class="form-label">

                    <i class="fas fa-feather-pointed magic-icon"></i>

                    Email

                </label>

                <input type="email"
                       name="email"
                       class="form-control"
                       placeholder="Your Appellation"
                       required>

            </div>

            <div class="mb-4">

                <label class="form-label">

                    <i class="fas fa-hat-wizard magic-icon"></i>

                    Password

                </label>

                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Your Incantation"
                       required>

            </div>

            <button type="submit"
                    class="login-btn">

                Enter The Library

            </button>

        </form>

        <div class="footer-text">

            Hogwarts Library Management System

        </div>

    </div>

</div>

</body>
</html>