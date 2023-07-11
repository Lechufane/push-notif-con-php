<?php
require_once('vendor/autoload.php');

use Minishlink\WebPush\VAPID;

print_r(VAPID::createVapidKeys());

/*
[publicKey] => BNFqRLZDs3ewl8OXOSpN46_R2e1NewbsB-uRAodaJftqwy5FomdoSEJ8a-2B11yotYZsC-9Auux7aoe3uyhMnoI
[privateKey] => OSXXbtLwc-KqclVF8jh5g55LtPJPh0MMHaHTUfN8k_w
*/