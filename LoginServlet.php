<?php 
	require_once dirname(__FILE__) . '/lib/NECaptchaVerifier.class.php';
	require_once dirname(__FILE__) . '/lib/SecretPair.class.php';

	define("CAPTCHA_ID", "6b144233421749dabd8f5081f792040f");
	define("SECRET_ID", "00461255961a4143acd1bde096c6cbfe");
	define("SECRET_KEY", "f493a769b52a4cada27d31eb10e60d97");

	session_start();
	$verifier = new NECaptchaVerifier(CAPTCHA_ID, new SecretPair(SECRET_ID, SECRET_KEY));
	$validate = $_POST['NECaptchaValidate'];
	$user = "{'user':123456}";

	$p = new SecretPair(SECRET_ID, SECRET_KEY);
	echo $p->secret_id;
	$result = $verifier->verify($validate, $user);
	if($result){
		echo "验证成功!";
	}else{
		echo "验证失败!";
	}
?>
