<?php

require_once('vendor/autoload.php');

use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

$auth = [
    'VAPID' => [
        'subject' => 'mailto:diego.villafane94@gmail.com',
        'publicKey' => 'BNFqRLZDs3ewl8OXOSpN46_R2e1NewbsB-uRAodaJftqwy5FomdoSEJ8a-2B11yotYZsC-9Auux7aoe3uyhMnoI',
        'privateKey' => 'OSXXbtLwc-KqclVF8jh5g55LtPJPh0MMHaHTUfN8k_w'
    ],
];

$webPush = new WebPush($auth);

$report = $webPush->sendOneNotification(
    Subscription::create(json_decode('{"endpoint":"https://fcm.googleapis.com/fcm/send/fwaqbQse98o:APA91bGzTgYcR6uhE4fbTTKdtBFejn0TEKfDV4XqMOFPLuN7t_FVa2dxZA81GG1xTED7JwHvAtwL8gqEiU5Z1YpphEF1PAW_bbLC3Ok0n9L7W3aIfiESxR_fMPffChHGnQOU3aBBVFQ0","expirationTime":null,"keys":{"p256dh":"BPrLD0fwv8pQsIRjOC7DcVayIY_GDGQsqVu0hnWcDPbisoDOw2rERFOne6bdVUfS8SlhbXz0ndtLUhCWf3PzfxE","auth":"SgbLiUxIMF9EedlX66eRCQ"}}', true)),
    '{title: "Hola", body: "Mundo", url: "https://ichef.bbci.co.uk/news/624/mcs/media/images/81763000/jpg/_81763098_risitas.jpg"}', 
    ['TTL'=> 30000]);

    print_r($report);