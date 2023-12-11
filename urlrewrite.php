<?php
$arUrlRewrite=array (
  8 => 
  array (
    'CONDITION' => '#^/pub/payment-slip/([\\w\\W]+)/#',
    'RULE' => 'signed_payment_id=$1',
    'ID' => 'bitrix:salescenter.pub.payment.slip',
    'PATH' => '/pub/payment_slip.php',
    'SORT' => 100,
  ),
  12 => 
  array (
    'CONDITION' => '#^/loyalty/#',
    'RULE' => NULL,
    'ID' => 'skyweb24:loyaltyprogram',
    'PATH' => '/loyalty/index.php',
    'SORT' => 100,
  ),
  14 => 
  array (
    'CONDITION' => '#^/news/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/news/index.php',
    'SORT' => 100,
  ),
);
