<?php declare(strict_types = 1);

$injector = new \Auryn\Injector;

$injector->alias(\Http\Request::class, \Http\HttpRequest::class);
$injector->share(Http\HttpRequest::class);
$injector->define(\Http\Request::class, [
    ':get' => $_GET,
    ':post' => $_POST,
    ':cookies' => $_COOKIE,
    ':files' => $_FILES,
    ':server' => $_SERVER,
]);

$injector->alias(\Http\Response::class, \Http\HttpResponse::class);
$injector->share(\Http\HttpResponse::class);

return $injector;
