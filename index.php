<!doctype html>
<HTML>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/jquery.timespace.light.css">
  <title>SCHEDULE ROOM</title>
</head>
<?php
require('inc/functions.php');
?>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="#">Rooms</a>
      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Room</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item disabled" href="#">Port Rooms</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="?room=p1">Port 1</a>
            <a class="dropdown-item" href="?room=p1">Port 2</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item disabled" href="#">Loft Rooms</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="?room=l1">Loft 1</a>
            <a class="dropdown-item" href="?room=l2">Loft 2</a>
            <a class="dropdown-item" href="?room=l3">Loft 3</a>
        </li>
          <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              
          </li>
      </ul>
      </div>
    </nav>
<p>
<?php
    //$roomnames = array_map('str_getcsv', file('roomnames.csv'));
    //array_walk($roomnames, function(&$a) use ($roomnames) {
     // $a = array_combine($roomnames[0], $a);
    //});
    //array_shift($roomnames); # remove column header
//$roomnames = parse_csv(file_get_contents('roomnames.csv'));
$lines = explode( "\n", file_get_contents( 'roomnames.csv' ) );
$headers = str_getcsv( array_shift( $lines ) );
$data = array();
foreach ( $lines as $line ) {
	$row = array();
	foreach ( str_getcsv( $line ) as $key => $field )
		$row[ $headers[ $key ] ] = $field;
	$row = array_filter( $row );
	$data[] = $row;
}
print_r($data);

?>
</p>
<div id="timelineClock"></div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="js/jquery.timespace.js"></script>
<script>
// (c)2018 Keegan Harris
// Using TimeLine jquery plugin for scheduling
$(function () {
  
  $('#timelineClock').timespace({
    selectedEvent: -1,
    data: {
      headings: [
        {start: 0, end: 6, title: 'Night'},
        {start: 6, end: 12, title: 'Morning'},
        {start: 12, end: 18, title: 'Afternoon'},
        {start: 18, end: 24, title: 'Evening'},
      ],
      events: [
        {start: 6.50, end: 7.50, title: 'Meeting 1', description: 'Some random meeting.'},
        {start: 8, end: 10, title: 'Meeting 2', description: 'Description here.'},
        {start: 13, title: 'Meeting 4', description: 'yep.'},
        {start: 14.75, title: 'Meeting 5', noDetails: true},
        {start: 15.75, title: 'Meeting 6'},
      ]
    }
  });
});</script>
</body>
</HTML>