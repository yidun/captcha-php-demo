<?php

/**
 * 密钥对
 * @author yangweiqiang
 */
class SecretPair {
    public function __construct($secret_id, $secret_key) {
        $this->secret_id  = $secret_id;
        $this->secret_key = $secret_key;
    }
}
