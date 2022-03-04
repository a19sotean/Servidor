<?php

class GreetingServer {
    function sayHello(string $name): string {
        return "Hello $name!";
    }

    function sayGoodbye(string $name): string {
        return "Goodbye $name!";
    }
}

$server = new SoapServer(__DIR__.'/grettings.wsdl');

$server->setClass(GreetingServer::class);
$server->handle();