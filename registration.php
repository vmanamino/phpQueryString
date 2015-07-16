<?php	
	$email_string = $_GET['email'];
	if (!preg_match("/^\w+\@\w+\.\w+/", $email_string)) { //check string against basic email pattern
		$email_string = "Email invalid"; // declare variable with assignment	
	}
	
	if (!($_GET['name'] && $_GET['email']) || $email_string == "Email invalid") { //include possible invalid email
		$query_string = $_SERVER['QUERY_STRING'];
		$url = "http://".$_SERVER['HTTP_HOST']."/php1_hmwk/lesson10/registration_form.php?".$query_string."&error=1";  // there is at least one error, perhaps including invalid email
		if ($email_string == "Email invalid") { // if email invalid, flag it in query string
			$url = $url."&invalid_email=1";
		} 
		header("Location: ".$url);
		exit();
	}
extract($_GET, EXTR_PREFIX_SAME, "get");

function generate_password( $length = 8 ) { // stole this from the http://99webtools.com/blog/php-strong-random-password-generator/ please no credit
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
$password = substr( str_shuffle( $chars ), 0, $length );
return $password;
}
$password = generate_password(); // password to include in email

/* construct email */
$message = "Hello ".$name.", at ".$email."! For now, your username will be your email.
You will need to reset this later, but use the following token as a password: ".$password; // email body
$to = $email;
$from = "email@domail.com";
$subject = "Registration confirmation";

/*now mail*/
mail($to, $subject, $message, "From: ".$from);

/* confirmation */

echo "<h3>Thanks!</h3>";
echo "Here's the info you supplied:<br/><br/>";

echo "Name: ".$name."<br/>";
echo "Email: ".$email."<br/>";

echo "Soon you will receive an email with login instructions and password.";

?>
