<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  @vite(['resources/css/app.css'])
  <title>{{ $title ? $title : 'Instagram' }}</title>
</head>
<body>

  <div class="d-flex m-h-full flex-column align-items-center mb-5">
    <div class="mt-3" style="width: 350px;">
      <div class="border py-2 d-flex flex-column mb-3 justify-content-center">
        @yield('content')
      </div>
      <div class="border d-flex flex-column align-items-center pt-2">
        <p class="m-4 d-inline-block">{{$info}} <a href="{{ route($link) }}">{{ $text }}</a></p>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  @vite(['resources/js/app.js'])
</body>
</html>