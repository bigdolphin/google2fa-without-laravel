<?php
require_once("PragmaRX/Google2FA/Google2FA.php");
use PragmaRX\Google2FA\Google2FA;

$g = new Google2FA();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$secret = $_POST["validation"];
	$code = $_POST["otpcode"];
	// Validating OTP code with Secret key
	$valid = $g->verifyKey($secret, $code);
	if($valid==1){
		echo "<font color=green>OTP code is Valid!</font><p>";
	}
	else{
		echo "<font color=red>OTP code is Invalid!</font><p>";
	}
}
else{
	// Generate Secret Key
	$secret = $g->generateSecretKey();

	// Generate URL to get QRCode image
	$url = $g->getQRCodeUrl("Big Dolphin","ltkhanh@bigdolphin.com.vn",$secret);
	$url = "http://www.google.com/chart?chs=150x150&chld=M|0&cht=qr&chl=".$url;
}

?>
<html>
<head></head>
<body>
	Your secret key: <?php echo $secret; ?><p>
	<img src='<?php echo $url; ?>' alt="QR Image"><p>
	<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
		<input type="text" name="otpcode" placeholder="OTP code">
		<button type="submit" name="validation" value='<?php echo $secret; ?>'>Check</button>
	</form>
</body>
</html>
