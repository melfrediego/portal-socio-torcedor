<?php
$environment = env('GERENCIANET_ENVORINMENT');

$isSandbox = ($environment == 'sandbox' || $environment == 'develop' || $environment == 'test') ? true : false;

//Conta:                                      Desenvolvimento                                           Producao
$client_id          = ($isSandbox) ? 'Client_Id_88e06150b36330dea7b3a19da76b6ea3528625d0' : 'Client_Id_1edcb03a7f9790cbadc7f0a2cfb426fe4eafc4a0';
$client_secret      = ($isSandbox) ? 'Client_Secret_a122b85d45bf67f57d7f4437328304a1669f239b' : 'Client_Secret_142f84c036e156a2b3877ba854182e000ccdb64f';

$notification_url   = ($isSandbox) ? 'http://192.168.18.5:8000/api/notification' : 'https://socioeternocampeao.com.br/api/notification';

return [
    'environment'       => $environment,
    'is_sandbox'        => $isSandbox,
    'client_id'         => $client_id,
    'client_secret'     => $client_secret,
    'notification_url'  => $notification_url,
];


