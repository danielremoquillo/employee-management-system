
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Book Flight</title>
</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;500;600;700;800&display=swap');

        * {
            font-family: 'Montserrat', sans-serif;
        }

        .logo-section {
            background-color: #ffffff;
            height: 80vh;
            width: 50%;
            margin-top: 50px;
        }

        .login-section {
            background-color: #FFFFFF;
            height: 80vh;
            width: 50%;
            margin-top: 50px;
        }

        .logo-ncf {
            height: 32%;
            width: 32%;
        }


        .logo-ncf-wings {
            height: 40%;
            width: 40%;
        }

        .logo-ncf {
            margin-left: 15%;
        }

        .logo-ncf-wings {
            margin-right: 10%;
        }

        body {
            background-color: #dfdfdf;
        }



        .input-border {
            box-sizing: border-box;


            border: 2px solid #064419;
            border-radius: 10px;
            background-color: transparent;

        }




        .custom-color-submit {

            background: #064419;

            color: #FFFFFF;
        }

        .custom-warning {
            font-size: 11px;
        }

        .custom-width-login {
            width: 80%;
        }
    </style>


@yield('content')



</body>