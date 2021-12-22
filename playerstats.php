<?php
// playerstats.php
// Shows stats of players on current rosters

// Variables
include('image_resize.php');

	$td1		= "style='text-decoration:underline; font-weight:bold;font-size:20px;'";
// input

// Query


	$query2 = "SELECT standings.teamid,standings.teamname,standings.logo,pos,pname,g,a,plusminus,ppp,shp,sog,fw,hit,blk,gs,w,gaa,sv,sho
		      FROM playerstats INNER JOIN standings ON standings.teamid = playerstats.teamid
		      ORDER BY standings.teamname";
	$result2 = mysqli_query($mysqli, $query2);
    if (!$result2) echo "Query Error [$query2]: " . mysqli_error($mysqli);
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
	while(list($teamid,$teamname,$logo,$pos,$pname,$g,$a,$plusminus,$ppp,$shp,$sog,$fw,$hit,$blk,$gs,$w,$gaa,$sv,$sho) = mysqli_fetch_row($result2)) {
	list($neww, $newh) = image_resize("logos/$logo", 150, 75);
		echo "<tr>
			  <td align='left'><img src='logos/$logo'width='$neww'height='$newh'><b>$teamname</b></img>-- $pname </td>
              <td>$g</td>
			  <td>$a</td>
			  <td>$plusminus</td>
			  <td>$ppp</td>
			  <td>$shp</td>
			  <td>$sog</td>
			  <td>$fw</td>
			  <td>$sog</td>
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