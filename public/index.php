<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Nette\Mail\Message;
require '../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__ . '/..');
$dotenv->load();

$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);
require __DIR__ . '/../src/dependencies.php';


$app->get('/', function (Request $request, Response $response) {
    $transaksi = $this->db->table('transaksi')->get();
    $newestIndex = sizeof($transaksi)-1;
    $data = [
        'TRX_ID' => $transaksi[$newestIndex]->TRX_ID,
        'ADDRESS_SHIP' => $transaksi[$newestIndex]->ADDRESS_SHIP,
        'DATE_ORDER' => $transaksi[$newestIndex]->DATE_ORDER,
        'SELLER_NAME' => $transaksi[$newestIndex]->SELLER_NAME,
        'DELIVERY_SERVICE' => $transaksi[$newestIndex]->DELIVERY_SERVICE
    ];

    return $this->get('view')->render($response, 'transaction.twig', $data);
});

$app->run();