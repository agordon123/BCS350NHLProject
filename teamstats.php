<?php
// teamstats.php - total team stats
//  by Adam Gordon

// Variables
	$td1		= "style='text-decoration:underline; font-weight:bold;'";
	$pgm2       = 'teamstats.php';
        if (isset($_POST['inrow'])) $inrow = $_POST['inrow']; else $inrow = NULL;
                	// Query
                    	$query = "SELECT teamname,g,a,plusminus,ppp,shp,sog,fw,hit,blk,gs,w,gaa,sv,sho
                    		      FROM teamstats
                    			  ORDER BY teamname ASC";
                    	$result = mysqli_query($mysqli, $query);
                    	if (!$result) echo "Query Error [$query]: " . mysqli_error($mysqli);

// Output
	echo "<table align='center' cellpadding='5'>
		  <tr>

		  <td $td1>Team Name</td>
		  <td $td1>Goals</td>
		  <td $td1>Assists</td>
		  <td $td1>Plus/Minus</td>
		  <td $td1>Powerplay Points</td>
		  <td $td1>Shorthanded Points</td>
		  <td $td1>Shots on Goal</td>
		  <td $td1>Faceoff Wins</td>
		  <td $td1>Hits</td>
		  <td $td1>Blocks</td>
		  <td $td1>Goalie Games Started</td>
		  <td $td1>Goalie Wins</td>
		  <td $td1>Goals Allowed Average</td>
		  <td $td1>Save Percentage</td>
		  <td $td1>Shutouts</td>
		  </tr>";
	while(list($teamname,$g,$a,$plusminus,$ppp,$shp,$sog,$fw,$hit,$blk,$gs,$w,$gaa,$sv,$sho) = mysqli_fetch_row($result)) {
		echo "<tr>
			  <td align='left'>$teamname</td>
              <td>$g</td>
			  <td>$a</td>
			  <td>$plusminus</td>
			  <td>$ppp</td>
			  <td>$shp</td>
			  <td>$sog</td>
			  <td>$fw</td>
			  <td>$hit</td>
			  <td>$blk</td>
			  <td>$gs</td>
			  <td>$w</td>
			  <td>$gaa</td>
			  <td>$sv</td>
			  <td>$sho</td>
			  </tr>";
		}
	echo "</table>";
?>