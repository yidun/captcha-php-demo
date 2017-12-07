# captcha-php-demo
易盾验证码php演示项目

# 运行
* 修改index.php
```
initNECaptcha({
  captchaId: 'YOUR_CAPTCHA_ID', // <-- 这里填入在易盾官网申请的验证码id
  element: '#captcha_div',
  mode: 'float',
  width: '320px',
  onVerify: function(err, ret){
    if(!err){
        // ret['validate'] 获取二次校验数据
    }
  }
}, function (instance) {
  // 初始化成功后得到验证实例instance，可以调用实例的方法
}, function (err) {
  // 初始化失败后触发该函数，err对象描述当前错误信息
})
```

* 修改LoginServlet.php
```
	define("YIDUN_CAPTCHA_ID", "YOUR_CAPTCHA_ID"); // 验证码id
	define("YIDUN_SECRET_ID", "YOUR_SECRET_ID");   // 验证码密钥对id
	define("YIDUN_SECRET_KEY", "YOUR_SECRET_KEY"); // 验证码密钥对key
```

* `php -S 127.0.0.1:8181`
* 访问 http://127.0.0.1:8181/

# php版本
5.2+
