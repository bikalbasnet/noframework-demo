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

$injector->alias(\Example\Template\Renderer::class, \Example\Template\MustacheRenderer::class);
$injector->define(Mustache_Engine::class, [
    ':options' => [
        'loader' => new Mustache_Loader_FilesystemLoader(dirname(__DIR__) . '/src/templates', [
            'extension' => '.html',
        ]),
    ],
]);

$injector->alias(\Example\Page\PageReader::class, \Example\Page\FilePageReader::class);
$injector->define(\Example\Page\PageReader::class, [
    ':pageFolder' => __DIR__ . '/pages',
]);
$injector->share(Example\Page\PageReader::class);

return $injector;
