<!DOCTYPE html>
<html>
  <head>
    <link href= "{{url_for('static', filename='globals.css')}}" rel = "stylesheet">
    <link href= "{{url_for('static', filename='styleguide.css')}}" rel = "stylesheet">
    <link href= "{{url_for('static', filename='style.css')}}" rel = "stylesheet">
    <!--
      <link rel="stylesheet" href="globals.css" />
      <link rel="stylesheet" href="styleguide.css" />
      <link rel="stylesheet" href="style.css" />
    -->
  </head>
  <body>
    <div class="desktop-home-page">
      <div class="div">
        <div class="overlap">
          <div class="explore-box">
            <div class="explore"></div>
            <div class="text-wrapper">Explore</div>
          </div>
          <a href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/tbd.php" class='button-med'>
            <div class="overlap-group">
              <div class="rectangle"></div>
              <div class="text">Rock</div>
            </div>
          </a>
          <!--<div class="button-med">
            <div class="overlap-group">
              <div class="rectangle"></div>
              <div class="text">Rock</div>
            </div>
          </div>-->
          <a href="{{ url_for('tbd') }}" class='overlap-wrapper'>
            <div class="overlap-group">
              <div class="rectangle"></div>
              <div class="text">Pop</div>
            </div>
          </a>
          <!--<div class="overlap-wrapper">
            <div class="overlap-group">
              <div class="rectangle"></div>
              <div class="text">Pop</div>
            </div>
          </div>-->
          <a href="{{ url_for('tbd') }}" class='overlap-group-wrapper'>
            <div class="overlap-group">
              <div class="rectangle"></div>
              <div class="text">Country</div>
            </div>
          </a>
          <!--<div class="overlap-group-wrapper">
            <div class="overlap-group">
              <div class="rectangle"></div>
              <div class="text">Country</div>
            </div>
          </div>-->
          <a href="{{ url_for('tbd') }}" class='div-wrapper'>
            <div class="overlap-group">
              <div class="rectangle"></div>
              <div class="text">Jazz</div>
            </div>
          </a>
          <!--<div class="div-wrapper">
            <div class="overlap-group">
              <div class="rectangle"></div>
              <div class="text">Jazz</div>
            </div>
          </div>-->
          <a href="{{ url_for('tbd') }}" class='button-med-2'>
            <div class="overlap-group">
              <div class="rectangle"></div>
              <div class="text">Classical</div>
            </div>
          </a>
          <!--div class="button-med-2">
            <div class="overlap-group">
              <div class="rectangle"></div>
              <div class="text">Classical</div>
            </div>
          </div>-->
          <a href="{{ url_for('tbd') }}" class='button-med-3'>
            <div class="overlap-group">
              <div class="rectangle"></div>
              <div class="text">Other</div>
            </div>
          </a>
          <!--<div class="button-med-3">
            <div class="overlap-group">
              <div class="rectangle"></div>
              <div class="text">Other</div>
            </div>
          </div>-->
          <a href="{{ url_for('tbd') }}" class='button-lg'>
            <div class="overlap-2">
              <div class="rectangle-2"></div>
              <div class="text-2">Trending</div>
            </div>
          </a>
          <!--<div class="button-lg">
            <div class="overlap-2">
              <div class="rectangle-2"></div>
              <div class="text-2">Trending</div>
            </div>
          </div>-->
          <a href="{{ url_for('tbd') }}" class='button-lg-2'>
            <div class="overlap-2">
              <div class="rectangle-2"></div>
              <div class="text-2">Random</div>
            </div>
          </a>
          <!--<div class="button-lg-2">
            <div class="overlap-2">
              <div class="rectangle-2"></div>
              <div class="text-2">Random</div>
            </div>
          </div>-->
        </div>
        <a href="login.php" class='sign-in'>
          <div class="text-wrapper-2">Sign In</div>
        </a>
        <!--<div class="sign-in"><div class="text-wrapper-2">Sign In</div></div>-->
        <a href="tbd.php" class='button-sm'>
          <div class="overlap-3">
            <div class="rectangle-3"></div>
            <div class="text-3">New Song</div>
          </div>
        </a>
        <!--<div class="button-sm">
          <div class="overlap-3">
            <div class="rectangle-3"></div>
            <div class="text-3">New Song</div>
          </div>
        </div>-->
        <a href="{{ url_for('tbd') }}" class='button-sm-2'>
          <div class="overlap-3">
            <div class="rectangle-3"></div>
            <div class="text-3">Practice</div>
          </div>
        </a>
        <!--<div class="button-sm-2">
          <div class="overlap-3">
            <div class="rectangle-3"></div>
            <div class="text-3">Practice</div>
          </div>
        </div>-->
        <a href="{{ url_for('tbd') }}" class='button-sm-3'>
          <div class="overlap-3">
            <div class="rectangle-3"></div>
            <div class="text-3">Song List</div>
          </div>
        </a>
        <!--<div class="button-sm-3">
          <div class="overlap-3">
            <div class="rectangle-3"></div>
            <div class="text-3">Song List</div>
          </div>
        </div>-->
        <a href="{{ url_for('tbd') }}" class='button-sm-4'>
          <div class="overlap-3">
            <div class="rectangle-3"></div>
            <div class="text-3">Progress</div>
          </div>
        </a>
        <!--<div class="button-sm-4">
          <div class="overlap-3">
            <div class="rectangle-3"></div>
            <div class="text-3">Progress</div>
          </div>
        </div>-->
        <a href="{{ url_for('tbd') }}" class='settings'>
          <div class="ellipse-wrapper">
            <div class="ellipse"></div>
          </div>
        </a>
        <!--<div class="settings">
          <div class="ellipse-wrapper"><div class="ellipse"></div></div>
        </div>-->
        <div class="search-bar-w-radio">
          <div class="lens">
            <div class="overlap-group-2">
              <div class="ellipse-2"></div>
              <img class="line" src= "{{url_for('static', filename='img/line-1-5.svg')}}" />
              <!--<img class="line" src="img/line-1-5.svg" />-->
            </div>
          </div>
        </div>
        <a href="{{ url_for('profile') }}" class='profile-icon'>
          <div class="overlap-4">
            <div class="ellipse-3"></div>
            <img class="img" src= "{{url_for('static', filename='img/ellipse-4-2.svg')}}" />
              <!--<img class="img" src="img/ellipse-4-2.svg" />-->
          </div>
        </a>
        <!--<div class="profile-icon">
          <div class="overlap-4">
            <div class="ellipse-3"></div>
            <img src= "{{url_for('static', filename='img/ellipse-4-2.svg')}}" />
          </div>
        </div>-->
        <img src= "{{url_for('static', filename='img/logo.png')}}" />
        <!--<img class="logo" src="img/logo.png" />-->
        <div class="rectangle-4"></div>
      </div>
    </div>
  </body>
</html>
