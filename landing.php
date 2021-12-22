<?php
// landing.php - Check that program was called by WEBSITE.PHP



	if (!isset($landing)) {
		header('Location: website.php');
		exit;
		}
?>