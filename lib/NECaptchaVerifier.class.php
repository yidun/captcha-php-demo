<?php
define("VERSION", "v1");
/**
 * 易盾验证码二次校验SDK
 * @author yangweiqiang
 */
class NECaptchaVerifier {
    /**
     * 构造函数
     */
    public function __construct($captcha_id, $secret_pair) {
        $this->captcha_id  = $captcha_id;
        $this->secret_pair = $secret_pair;
    }

    /**
     * 发起二次校验请求
     * @param $validate 二次校验数据
     * @param $user 用户信息
     */
    public function verify($validate, $user) {
        var_dump($this->secret_pair);
        // echo $this->secret_pair->secret_key;

        $params = array();
        $params["captchaId"] = $this->captcha_id;
        $params["validate"] = $validate;
        $params["user"] = $user;
        // 公共参数
        $params["secretId"] = ($this->secret_pair)->secret_id;
        $params["version"] = VERSION;
        $params["timestamp"] = sprintf("%d", round(microtime(true)*1000));// time in milliseconds
        $params["nonce"] = sprintf("%d", rand()); // random int
        $params["signature"] = $this->sign(($this->secret_pair)->secret_key, $params);

        var_dump($params);
        $result = $this->send_http_request($params);
        var_dump($result);
    }

    /**
     * 计算参数签名
     * @param $secret_key 密钥对key
     * @param $params 请求参数
     */
    private function sign($secret_key, $params){
        ksort($params); // 参数排序拼接
        $buff="";
        foreach($params as $key=>$value){
            $buff .=$key;
            $buff .=$value;
        }
        $buff .= $secret_key;
        return md5($buff);
    }

    /**
     * 发送http请求
     * $params 请求参数
     */
    private function send_http_request($params){
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'timeout' => API_TIMEOUT, // read timeout in seconds
                'content' => http_build_query($params),
            ),
        );
        $context  = stream_context_create($options);
        $result = file_get_contents(API_URL, false, $context);
        if($result === FALSE){
            return array("code"=>500, "msg"=>"file_get_contents failed.");
        }else{
            return json_decode($result, true);  
        }
    }
}

?>