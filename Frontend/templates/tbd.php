<!DOCTYPE html>
<html>
  <head>
    <link href= "{{url_for('static', filename='globals.css')}}" rel = "stylesheet">
    <link href= "{{url_for('static', filename='styleguide.css')}}" rel = "stylesheet">
    <link href= "{{url_for('static', filename='style.css')}}" rel = "stylesheet">
  </head>
  <body>
    <div class="desktop-coming-soon">
      <div class="div">
        <div class="text-wrapper">Coming Soon...</div>
        <img src= "{{url_for('static', filename='img/logo.png')}}" />
      </div>
    </div>
  </body>
</html>
