<?php
	if ($_GET['error'] == "1") { // errors generally
		$error = 1; 
	} else {
		$error = 0;
	}
	
	if ($_GET['invalid_email'] == "1") { //invalid email in field
		$invalid_email = 1;
	} else {
		$invalid_email = 0;
	}
?>

<body>
<h3>Register with Viral LLC</h3>
<?
	if ($error) {
		echo "<div style='color:red'>Please help us with the following:</div>";
	}
?>
<form method="GET" action="registration.php">
<table>
<tr>
<td align="right">
Name:
</td>
<td align="left">
<input type="text" size="25" name="name" value="<? echo $_GET['name']; ?>" />
<?
	if ($error && !($_GET['name'])) {
		echo "<b>Please include your name.</b>";
	}
?>
</td>
</tr>
<tr>
<td align="right">
Email:
</td><td align="left">
<input type="text" size="25" name="email" value="<? echo $_GET['email']; ?>" />
<?
	if ($error && !($_GET['email'])) {
		echo "<b>Please include your email.</br>";
	} else if ($invalid_email) { // separate test for invalid email
		echo "<b>Your email '".$_GET['email']."' is invalid</b>";
	}
?>
</td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" value="SUBMIT" />
</td></tr>
</table>
</form>
</body>