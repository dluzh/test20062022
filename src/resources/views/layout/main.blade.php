<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>RSS eater</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link href='https://cdn.jsdelivr.net/npm/froala-editor@4.0.10/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
</head>

<body class="p-3">
  <h1>RSS eater</h1>
  
  @if(Session::has('message'))
    <p class="alert alert-info text-center">{{ Session::get('message') }}</p>
  @endif

  @yield('content')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
  <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@4.0.10/js/froala_editor.pkgd.min.js'></script>
  <script>
    var editor = new FroalaEditor('#myEditor');
  </script> 
</body>
</html>