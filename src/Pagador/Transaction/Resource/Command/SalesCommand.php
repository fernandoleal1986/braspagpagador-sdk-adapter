<?php

namespace Webjump\Braspag\Pagador\Transaction\Resource\Command;


use Webjump\Braspag\Factories\ClientHttpFactory;
use Webjump\Braspag\Factories\ResponseFactory;
use Webjump\Braspag\Factories\SalesFactory;
use \Psr\Http\Message\ResponseInterface;


class SalesCommand extends CommandAbstract
{
    protected function execute()
    {
        $sales = SalesFactory::make($this->request);
        $client = ClientHttpFactory::make();
        $response = $client->request($sales);

        if(! ($response instanceof ResponseInterface)) {
            exit($response);
        }

        $this->result = ResponseFactory::make($response);
    }
}
