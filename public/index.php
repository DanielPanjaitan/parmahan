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

$app->get('/', function ($request, $response, $args) {
    $this->logger->info("/");
    $dataRes =[
            'apiVersion' => getenv('APP_VERSION'),
            'data' => [
                'serverTime' => date("Y-m-d H:i:s"), 
            ]
        ];
   return $response->withJSON(
        $dataRes,
        200,
        JSON_UNESCAPED_UNICODE
    );
});

$app->run();