<?PHP
// logon.php - Website Logon
// Repurposed by Adam Gordon, 2021
	
// Start Session
	include('image_resize.php');
	
// Variables 
	$msg 		= NULL;								// Error Message
	$td 		= "width='20%' align='right'";		// Attributes for 1st column
	$tf 		= "width='80%' align='left'";		// Attributes for 2nd column
	$pgm2		= "$pgm?p=logon";
	$width		= '800';
  
// Get Form Input  
	if (isset($_POST['logon'])) {
		if (isset($_POST['userid']))		$userid		= trim($_POST['userid']);		else $userid 	= NULL;
		if (isset($_POST['password']))		$password 	= trim($_POST['password']);		else $password 	= NULL;
		
// Verify Input
		if ($userid == NULL) 		$msg = "USERID is missing";
		if ($password == NULL) 		$msg = "PASSWORD is missing";
		if (($userid == NULL) AND ($password == NULL)) $msg = "USERID & PASSWORD are missing";
		
// LOGON		
		if ($msg == NULL) {
			
// Query User Using the USERID
			include('bcs350_mysqli_connect.php');
			$query = "SELECT teamid,role,password
					  FROM standings 
					  WHERE role ='$userid'";
			$result = mysqli_query($mysqli, $query);
			if (!$result) echo "Query Error [$query] " . mysqli_error($mysqli);
			
// If USERID is FOUND, Verify Password			
			if (mysqli_num_rows($result) > 0) {
				list($userid,$role, $password2) = mysqli_fetch_row($result);
				
// If PASSWORD matches, Complete LOGON				
				if ($password == $password2) {
					$_SESSION['logon']		= TRUE;
					$_SESSION['userid'] 	= $userid;
					$_SESSION['user'] 		= $user = "$role";
					$_SESSION['role']		= $role; 
					$msg					= "<font color='green'><b>$user Logon Successful</b></font>";
					$logon 					= TRUE;
					}
				else $msg = "Invalid Password";
				}
			else $msg = "USERID [$userid] is invalid";
			}
		}
  
// OUTPUT Logon Screen
	if ($msg == NULL)  	$msg = "Enter User Role and Password";
	else if (!$logon) $msg = "<font color='red'>$msg, please try again</font>";	
	include('header.php');
	include('menubar.php');
	echo "<p>Website Logon
		  <p><form action='$pgm2' method='post'>
		  <table width='$width' align='center'>
		  <tr><td $td>User ID</td>		<td $tf><input type='text'     name='userid'   size='60' maxlength='80'></td></tr>
		  <tr><td $td>Password</td>		<td $tf><input type='password' name='password' size='12' maxlength='12'></td></tr>
		  </table>
		  <p align='center'><input type='submit' name='logon' value='LOGON' style='background-color:lightgreen;font-weight:bold'>
		  <p><table width='$width'><tr><td $td>Message</td><td $tf><b>$msg</b></td></tr></table>
		  </form>";

?>