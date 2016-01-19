<!DOCTYPE html>
<html>
    <head>
        <title>404 Error</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <!-- stylesheets -->
        <link href="{{ asset('css/errors.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">404 | Page Not Found.</div> 
                <div class="col-md-6 text-center">
                    <a href="{{ url('/') }}">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-user"></i>Go Home
                        </button>
                   </a>
                </div>            
            </div>
        </div>
    </body>
</html>
