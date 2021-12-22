<?php
// update.php - Update Standings

// include
    include('image_resize.php');
// Variables
	$pgm2 	= 'website.php?p=updatestandings';
	$msg	= NULL;
	

// Get Input
	if (isset($_POST['inrow'])) $inrow = $_POST['inrow']; else $inrow = NULL;
	if (isset($_POST['wins'])) $wins = $_POST['wins']; else $wins = NULL;
	if (isset($_POST['losses'])) $losses = $_POST['losses']; else $losses = NULL;
	if (isset($_POST['ties']))  $ties  = $_POST['ties'];  else $ties  = NULL;
	if (isset($_POST['points'])) $points = $_POST['points']; else $points = NULL;

    if ($inrow == NULL) $task = 'first'; else $task = 'show';
   if  (isset($_POST['submit'])) $task = 'update';

// Process Input
	if (isset($_POST['submit'])) {
		$query = "UPDATE standings SET
				  wins = '$wins' , losses = '$losses', ties = '$ties', points = '$points'
				  WHERE teamid = '$inrow'";
		$result = mysqli_query($mysqli, $query);
		if (!$result) echo "Query Error [$query]: " . mysqli_error($mysqli);
		$msg = "$inrow Updated - Check Standings Page to Verify";
		}
	else $msg = "Select a Team to Update";

// Output


    	$query2 = "SELECT teamid, teamname
            		      FROM standings
            			  ORDER BY teamid";
            	$result = mysqli_query($mysqli, $query2);
            	if (!$result) echo "Query Error [$query]: " . mysqli_error($mysqli);
            	echo "<p align='center'>
            		  <form action='$pgm2' method='POST'>
            		  <select name='inrow' onchange='this.form.submit()'>
            		  <option>Select</option>";
            	while(list($teamid, $teamname) = mysqli_fetch_row($result)) {
            		if ($teamid == $inrow) $se = 'selected'; else $se = NULL;
            		echo "<option value='$teamid' $se>$teamname</option>\n";
            		}
            	echo "</select></form>";
// Update Form
	if ($task == 'show') {
		$query3 = "SELECT teamid,wins,losses,ties,points
		      FROM standings
			  WHERE teamid = '$inrow'";
		$result3 = mysqli_query($mysqli, $query3);
// echo "QUERY [$query3]<br>";
		if (!$result3) echo "Query Error [$query]: " . mysqli_error($mysqli);
		list($teamid,$wins,$losses,$ties,$points) = mysqli_fetch_row($result3);
		echo " <form action='$pgm2' method='POST'>
		       <input type='hidden' name='inrow' value='$inrow'>
		      <p>Team $teamname
			  <p>Wins - <input type='number' name='wins' value = '$wins'>
			  <p>Losses - <input type='number' name='losses' value='$losses'>
			  <p>Ties - <input type='number' name='ties' value='$ties'>
			  <p>Points - <input type='number' name='points' value='$points'>
			  <p><input type='submit' name='submit' value='Submit'>
			  </form>";
		}
	echo "<p>MESSAGE: $msg";
?>