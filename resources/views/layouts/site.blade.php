<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <title>NCF WINGS</title>
</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;500;600;700;800&display=swap');

        * {
            font-family: 'Montserrat', sans-serif;
        }
        body{
            background-color: #dfdfdf;
        }

        .custom-color-navbar {
            background-color: #064419;
        }

        .custom-color-navbar-brand {
            color: #ffffff;
            font-weight: bold;
            font-size: 18px;
            line-height: 27px;
            letter-spacing: -0.055em;
        }

        .custom-color-navbar-sub-brand {
            font-weight: 500;
            font-size: 11px;
            line-height: 13px;
            display: flex;
            align-items: center;
            letter-spacing: -0.055em;
            text-transform: uppercase;
            font-feature-settings: 'pnum' on, 'lnum' on;

            color: #FFFFFF;

        }

        .ncf-logo {
            height: 50px;
            width: 50px;
        }

        .ncf-wings-logo {
            height: 50px;
            width: 58px;
        }

        .custom-color-nav-links {
            color: #ffffff;
            text-transform: uppercase;
            text-decoration: none;
            padding-bottom:7px;
        }
        .custom-color-nav-links:hover {
            color: #ffffff;
            text-transform: uppercase;
            border-bottom:1px solid white;
            padding-bottom:6px;
        }
        .custom-active-link:active, .custom-color-nav-links:active{
            color: white;
        }

        .custom-active-link {
            color: #ffffff;
            text-decoration: none;
            text-transform: uppercase;
            border-bottom:1px solid white;
            padding-bottom:6px;
        }  





        /**dashboard**/
        .custom-sidebar-color{
            background-color: #FFFFFF;
        }

        .content-page{
            margin-bottom: 100px;
            background: #FFFFFF;
            filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
        }

        /**airports**/




    </style>

  
    


        
    @yield('content')
        
    </body>
</html>
