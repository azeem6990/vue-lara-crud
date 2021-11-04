<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contact List</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    </head>
    <body>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" id="app">
                    
                    <example-component/> 
                  
                </div>
            </div>
        </div>

       <script src="{{mix('js/app.js')}}"></script>
    </body>
</html>
