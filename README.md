# google2fa-without-laravel
A forked Google2FA PHP library without Laravel, allowing include and run directly. \
This is a modified version from https://github.com/antonioribeiro/google2fa \
Most of Google2FA PHP library on github using composer to install, it makes the project become heavy. \
If you just need a plug and play library, this is the suitable solution. \
Just place the PragmaRX folder at the same level with your php file. \
In the case you want to place the library in subfolder, you must change the require_once paths in all files of Google2FA folder. \
 \
This modified library is tested with Google Authenticator App on Android at May 23 2021. \
 \
Usage:
1. Call library: \
require_once("PragmaRX/Google2FA/Google2FA.php"); \
use PragmaRX\Google2FA\Google2FA;
2. Create instance: \
$g = new Google2FA();
3. Generate secret key: \
$secret = $g->generateSecretKey();
4. Generate QR image link: \
$url = $g->getQRCodeUrl("Company name","email",$secret); \
$url = "http://www.google.com/chart?chs=150x150&chld=M|0&cht=qr&chl=".$url;
5. Validation OTP code with secret key: \
$valid = $g->verifyKey($secret, $code);

Modified by ltkhanh@bigdolphin.com.vn \
Big Dolphin Co. Ltd

