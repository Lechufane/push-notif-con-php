<?php

require_once('vendor/autoload.php');

use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

$auth = [
    'VAPID' => [
        'subject' => 'mailto:diego.villafane94@gmail.com',
        'publicKey' => 'BGub5LGHjgzuJtjuIaPnGTU7AEfkMfUQDLHX1SjV32bMN4FSUTKFgDMuOukJBroZxDtXE9ecGWsHz8K9I6hB0_8',
        'privateKey' => 'BkF3Wpb-ebZA01VBE2CYr7Wh-XjxFMYUXyZyCjfhCgo'
    ],
];

$webPush = new WebPush($auth);

$report = $webPush->sendOneNotification(
    Subscription::create(json_decode('{
        "endpoint":"https://fcm.googleapis.com/fcm/send/ccdW_lCap7s:APA91bGymVreozKa2w8lTZeKsQUV1JAm9D2zZLKTJ2bPcLZF_u7Op1tOyEa1OaSc22uIIWj-P5l7hvfiKmRb-c8dUfStXSK1aOtulfV8m2_SrHNacWq0gpI17VKnZ_CItQPQudi-uOBB",
        "expirationTime":null,
        "keys":{
            "p256dh":"BKxfIx_JCWPsq8OYtAukTxyHMTqIjVSOEg4f5uhDk0lGSQD9TTDoEw1iRNjjyhPV4WUOoVRuCvulRlDL4wmi1t4",
            "auth":"sLv9damCS-sFS8cETvNlWw"
        }}', true)),
    '{
        "title": "Hola", 
        "body": "Mundo", 
        "url": "./?message=123"
    }', 
    ['TTL'=> 30000]);

    print_r($report);