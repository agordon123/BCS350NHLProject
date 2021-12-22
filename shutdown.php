<?php
// shutdown.php - Website Shutdown
// Written by:  Prof. Kaplan, November 2021

// Output
	echo "<p>Website is SHUTDOWN for Maintenance
		  <br>Please try again later";
?>
	//EMAIL

        ini_set("SMTP", "aspmx.l.google.com");
        ini_set("sendmail_from", "gordar@farmingdale.edu");
        $to = "kaplanc@farmingdale.edu";
        $subject = "Email from my php Project";
        $message = "The mail message was sent with the following mail setting:\r\nSMTP = aspmx.l.google.com\r\nsmtp_port = 25\r\nsendmail_from = gordar@farmingdale.edu";

        $headers = "From: Adam <gordar@farmingdale.edu>";

        $sendmail = mail($to,$subject, $message, $headers);