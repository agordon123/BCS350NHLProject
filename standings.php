<?php
//
// Team Standings by Adam Gordon
include('image_resize.php');

// Variables
    $pgm2       = 'standings.php';

// Query
	$query = "SELECT teamid,logo,teamname,wins,losses,ties,points
		      FROM standings
			  ORDER BY points DESC";
	$result = mysqli_query($mysqli, $query);
	if (!$result) echo "Query Error [$query]: " . mysqli_error($mysqli);


	echo "<table align='center' cellpadding='5'>
		  <tr>

		  <td align='left'style='color:green;font-size:36px'>Team</td>
		  <td style='color:blue;font-size:36px'>Wins</td>
		  <td style='color:red;font-size:36px'>Losses</td>
		  <td style='color:green;font-size:36px'>Ties</td>
		  <td style='color:purple;font-size:36px'>points</td>
		  </tr>";
	while(list($teamid,$logo,$teamname, $wins, $losses,$ties,$points) = mysqli_fetch_row($result)) {
    list($neww, $newh) = image_resize("logos/$logo", 150, 75);
		echo "<tr>

			  <td align='left'style='color:green;font-size:18px'><img src='logos/$logo'width='$neww'height='$newh'>$teamname</img></td>
			  <td align='left'style='color:blue;font-size:18px'>$wins</td>
			 <td align='left'style='color:red;font-size:18px'>$losses</td>
			 <td align='left'style='color:grey;font-size:18px'>$ties</td>
			  <td align='left'style='color:pruple;font-size:18px'>$points</td>
			  </tr>";
		}
	echo "</table>";
?>