<!DOCTYPE html>
<html lang="en" data-token="{{ csrf_token() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  @vite(['resources/css/app.css'])
  <title>{{ $title ? $title : 'Instagram' }}</title>
</head>
<body>
  @auth
    <x-navbar />
    <div class="container-xxl my-4">
      @yield('content')
    </div>
  @else
    @yield('auth')
  @endauth


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  @vite(['resources/js/app.js'])
</body>
</html>