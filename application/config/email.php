<?
$config = [
    'protocol' => 'smtp',
    'smtp_host' => MAIL_SMTP,
    'smtp_port' => '587',
    'smtp_timeout' => '7',
    'smtp_user' => MAIL_FROM,
    'smtp_pass' => MAIL_PWD,
    'charset' => 'utf-8',
    'newline' => "\r\n",
    'mailtype' => 'html', // or html
    'validation' => TRUE  // bool whether to validate email or not
];