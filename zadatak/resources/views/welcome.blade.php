<!DOCTYPE html>
<html lang ="{{ str_replace('_', '-', app()->getLocale())}}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">


      <title>Laravel</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <style>
      .bg{
        background: #fafafa;
      }
      .br5{
        border-radius: 5px;
      }
      .image{
        width: 90px;
        height: 110px;
      }
      .content{
        width: calc(100% - 90px);
      }
      .fw600{
        font-weight: 600;
      }
      .text-cl{
        color: #e03;
      }
      .fw400{
        font-weight: 400;
      }
      .fz90{
        font-size: 90%;
      }
  </style>
  <body class="bg">
    <div class="row p-0 p-2">
        @foreach($dishes as $post)
      <div class="col-12 shadow-sm bg-white p-2 d-flex mb-2 br5">
        <div class="image bg-info">
          <img class="br5" src="{{ $post->image }}" width="100%" height="100%">
        </div>
        <div class="px-2 content">
            <p class="mb-1 fw600">{{ $post->name }}</p>
            <p class="mb-1 text-cl fw400">{{ $post->category_id }}</p>
            <p class="mb-1 fw400 fz90">{{ $post->description }}</p>
            <div>
                <p class="text-success mb-0 fw600 fz90 float-start">{{ $post->created_at }}</p>
                <p class="text-cl mb-0 fw600 fz90 float-end"></p>
            </div>
        </div>
      </div>
      @endforeach
    </div>


  </body>
 </html>