<html>
<head>
    <link href= "{{url_for('static', filename='style.css')}}" rel = "stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha256-/ykJw/wDxMa0AQhHDYfuMEwVb4JHMx9h4jD4XvHqVzU=" crossorigin="anonymous" />

<!--    <link rel="stylesheet" type="text/css" href="public/style.css"/>-->
</head>
<body onload="welcome();">

<h1>CSE442 Home Page</h1>

<hr/>
<img src= "{{url_for('static', filename='cat.jpg')}}" alt="Temp" class="my_image">
<!--<button type="button">Login</button>-->
<a href="{{ url_for('login') }}" class='btn btn-primary'>Login</a>
<button type="button">Sign-Up</button>
<button type="button">Profile</button>
<br/>
<hr/>
</body>
</html>
