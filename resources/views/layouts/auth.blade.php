<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>NCF WINGS</title>
</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;500;600;700;800&display=swap');

        * {
            font-family: 'Montserrat', sans-serif;
        }

        .login-section {
            background-color: #FFFFFF;
            height: 70vh;
            border-radius: 20px;
            margin-top: 100px;
        }

        .login-header{
            color:#3E3D59;
        }

        label{
            color:#2E2E42;
            font-size: 1rem;
        }


        

        .input-border {
            box-sizing: border-box;
            border: 2px solid #3E3D59;
            border-radius: 10px;
            background-color: transparent;
            color:#3E3D59;
            font-size: 1rem;
            width: 100%;
        }

        .input-border:focus {
            box-sizing: border-box;
            border: 2px solid #3E3D59;
            border-radius: 10px;
            background-color: transparent;
            color:#3E3D59;
            font-size: 1rem;
            width: 100%;
        }


        .custom-color-submit {
            background: #3E3D59;
            color: #FFFFFF;
        }

        .custom-color-submit:hover {
            border:1px solid #3E3D59;
            color: #3E3D59;
            background-color: transparent;
        }

        .custom-warning {
            font-size: 1rem;
        }

        .custom-width-login {
            width: 30%;
        }

        .logo {
            width: 60%;
            height: 80%;
        }
    </style>


@yield('content')



</body>