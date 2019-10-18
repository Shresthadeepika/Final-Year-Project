<html>
<head>
    <title>Laravel Project</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Laravel</a>
        </div>
        <u1 class="nav navbar-nav">
          <li><a href="{{route('create')}}">Add</a></li>
            <li><a href="{{route('index')}}">User</a></li>

        </u1>
    </div>
</nav>
@yield('content')
</body>
</html>
