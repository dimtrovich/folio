<?php 

namespace Folio\Admin\Controllers;

use App\Controllers\AppController;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

class AdminController extends AppController
{
    public function initialize(ServerRequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initialize($request, $response, $logger);
    }
}