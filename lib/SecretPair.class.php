<?php

/**
 * 密钥对
 * @author yangweiqiang
 */
class SecretPair {
	public $secret_id;
	public $secret_key;

	/**
	 * 构造函数
	 * @param $secret_id 密钥对id
	 * @param $secret_key 密钥对key
	 */
    public function __construct($secret_id, $secret_key) {
        $this->secret_id  = $secret_id;
        $this->secret_key = $secret_key;
    }
}