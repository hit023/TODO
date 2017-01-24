<?php
    require_once "./Mail-1.3.0/Mail.php";
    
    $from = 'hiteshbhagchandani39@gmail.com';
    $to = 'f2015023@hyderabad.bits-pilani.ac.in';
    $subject = 'Testing mail.';
    $body = "testing mail body!";
    
    $header = array(
        'From' => $from,
        'To' => $to,
        'Subject' => $subject
    );
    
    $smtp = Mail::factory('smtp',array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'hiteshbhagchandani39@gmail.com',
        'password' => 'HIT1234ESH'
    ));
    $mail = $smtp->send($to, $header, $body);
    if (PEAR::isError($mail)) {
        echo('<p>' . $mail->getMessage() . '</p>');
    } else {
        echo('<p>Message successfully sent!</p>');
    }
?>