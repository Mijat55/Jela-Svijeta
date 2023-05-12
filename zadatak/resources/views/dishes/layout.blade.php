<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ env('APP_NAME')}}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <style>
    
        .br5{
          border-radius: 5px;
        }
        .image{
          width: 90px;
          height: 110px;
        }
    </style>
    <body class="bg-warning">

        <div class="p-4 mt-4">

        </div>
        <div class="container mt-5 bg-white p-4 rounded shadow">
            <div class="d-flex justify-content-between">
                <div class="container"> 
                          
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2>JELA SVIJETA</h2>
                        </div>
                    </div>
                </div>
                
            <div>
                <span class="fs-6 badge rounded-pill text-bg-danger">
                    Total Dishes: {{ count($dishes) }}
                </span>
            </div>
            </div>
            <hr>
         
        </div>
        
    </body>
    
</html>