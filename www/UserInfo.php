<?php
// www/UserInfo.php
class UserInfo {
    public static function getInfo(): array {
        return [
            'IP Address' => $_SERVER['REMOTE_ADDR'] ?? 'N/A',
            'User Agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'N/A',
            'Request Time' => date('Y-m-d H:i:s')
        ];
    }
}