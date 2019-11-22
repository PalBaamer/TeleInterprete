<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
    .toggler { width: 200px; height: 500px; position: relative; }
    #button { padding: .5em 1em; text-decoration: none; }
    #effect { width: 200px; height: 240px; padding: 0.4em; position: relative; background: #fff; }
    #effect h3 { margin: 0; padding: 0.4em; text-align: center; }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var state = true;
    $( "#button" ).on( "click", function() {
      if ( state ) {
        $( "#effect" ).animate({
          backgroundColor: "#aa0000",
          color: "#fff",
          height: 500
        }, 1000 );
      } else {
        $( "#effect" ).animate({
          backgroundColor: "#fff",
          color: "#000",
          height: 240
        }, 1000 );
      }
      state = !state;
    });
  } );
  </script>
  </head>
</html>