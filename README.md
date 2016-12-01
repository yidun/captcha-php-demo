# captcha-php-demo
易盾验证码php演示项目

# 运行
* 修改index.php
```
var opts = {
    "element": "captcha_div",
    "captchaId": "YOUR_CAPTCHA_ID", // 验证码id
    "width": 320
  }
```

* 修改LoginServlet.php
```
	define("CAPTCHA_ID", "YOUR_CAPTCHA_ID"); // 验证码id
	define("SECRET_ID", "YOUR_SECRET_ID");   // 验证码密钥对id
	define("SECRET_KEY", "YOUR_SECRET_KEY"); // 验证码密钥对key
```

* `php -S 127.0.0.1:8181`
* 访问 http://127.0.0.1:8181/

# php版本
5.2+
