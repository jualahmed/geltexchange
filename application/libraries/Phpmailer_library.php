<?php
class Phpmailer_library
{
    public function __construct()
    {
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load()
    {
        require_once(APPPATH."third_party/PHPMaile/src/Exception.php");
        require_once(APPPATH."third_party/PHPMaile/src/PHPMailer.php");
        require_once(APPPATH."third_party/PHPMaile/src/SMTP.php");
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        return $mail;
    }
}
?>