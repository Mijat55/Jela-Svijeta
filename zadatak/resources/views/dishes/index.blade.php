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
                            <span class="fs-6 badge rounded-pill bg-success text-warning">
                            <h2>JELA SVIJETA</h2>
                        </span>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-2 text-center">
                <form class="form-inline ml-auto my-2 my-lg-0" type="get" action="{{ route('dishes.search') }}" method="GET">
                    <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search"> 
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><span class=" fs-6 badge rounded-pill bg-success text-warning">Search</span></button>
                </form>
                </div>    
                
                    <div>
                <span class="fs-6 badge rounded-pill bg-success text-warning">
                    Total Dishes: {{ count($dishes) }}
                </span>
            
                </div>
            </div>
            <hr>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col"><span class=" fs-6 badge rounded-pill bg-success text-warning"># </span></th>
                        <th scope="col"><span class=" fs-6 badge rounded-pill bg-success text-warning">Dish Name</span></th>
                        <th scope="col"><span class=" fs-6 badge rounded-pill bg-success text-warning">Description</span></th>
                        <th scope="col"><span class=" fs-6 badge rounded-pill bg-success text-warning">Image</span></th>
                        <th scope="col"><span class=" fs-6 badge rounded-pill bg-success text-warning">Category</span></th>
                        <th scope="col"><span class=" fs-6 badge rounded-pill bg-success text-warning">Date</span></th>
                        
                    </tr>
                </thead>
                 <tbody>
                    @foreach ($dishes as $dish )
                    <th scope="row"> {{ $dish->id }} </th>
                    <td>{{ $dish->name }} </td>
                    <td>
                        {{ $dish->description }} </td>
                    <td>
                        <img class="br5" src="{{ $dish->image }}" width="100%" height="100%">
                    </td>
                    <td>{{ $dish->category->name }} </td>
                    <td>
                        <span class="badge rounded-pill bg-success text-warning">
                            {{ date('F j, Y', strtotime($dish->created_at)) }}</td>
                        </span>
                    </tr>
            @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $dishes->links() }}
        </div>
    </body>

</html>