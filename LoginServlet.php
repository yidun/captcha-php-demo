<?php 
	require_once dirname(__FILE__) . '/lib/NECaptchaVerifier.class.php';
	require_once dirname(__FILE__) . '/lib/SecretPair.class.php';

	define("CAPTCHA_ID", "YOUR_CAPTCHA_ID"); // 验证码id
	define("SECRET_ID", "YOUR_SECRET_ID");   // 验证码密钥对id
	define("SECRET_KEY", "YOUR_SECRET_KEY"); // 验证码密钥对key

	session_start();
	$verifier = new NECaptchaVerifier(CAPTCHA_ID, new SecretPair(SECRET_ID, SECRET_KEY));
	$validate = $_POST['NECaptchaValidate']; // 获得验证码二次校验数据
	if(get_magic_quotes_gpc()){// PHP 5.4之前默认会将参数值里的 \ 转义成 \\，这里做一下反转义
        $validate = stripcslashes($validate);
    }
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
