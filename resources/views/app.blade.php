<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" /> -->
  <title>SleeveUP!</title>
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
</head>
<body>
  <div id="app">
    @yield('content')
  </div>
</body>
</html>