<?php 
	require_once dirname(__FILE__) . '/lib/NECaptchaVerifier.class.php';
	require_once dirname(__FILE__) . '/lib/SecretPair.class.php';

	define("CAPTCHA_ID", "6b144233421749dabd8f5081f792040f");
	define("SECRET_ID", "00461255961a4143acd1bde096c6cbfe");
	define("SECRET_KEY", "f493a769b52a4cada27d31eb10e60d97");

	session_start();
	$verifier = new NECaptchaVerifier(CAPTCHA_ID, new SecretPair(SECRET_ID, SECRET_KEY));
	$validate = $_POST['NECaptchaValidate']; // 获得验证码二次校验数据
	$user = "{'user':123456}"; // 当前用户信息，值可为空

	$result = $verifier->verify($validate, $user);

	if($result){
?>
		<p>验证成功! <a href='/index.php'>回首页</a></p>
<?php
	}else{
?>
		<p>验证失败! <a href='/index.php'>回首页</a></p>
<?php
	}
?>
