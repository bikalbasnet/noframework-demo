<?php

namespace Example\Controllers;

use Example\Page\InvalidPageException;
use Example\Page\PageReader;
use Example\Template\Renderer;
use Http\Response;

class Page
{
    private $pageReader;
    private $renderer;
    private $response;

    public function __construct(PageReader $pageReader, Renderer $renderer, Response $response)
    {
        $this->pageReader = $pageReader;
        $this->renderer = $renderer;
        $this->response = $response;
    }

    public function show($params)
    {
        $slug = $params['slug'];
        try {
            $data['content'] = $this->pageReader->readBySlug($slug);
        } catch (InvalidPageException $e) {
            $this->response->setStatusCode(404);
            return $this->response->setContent('404 - Page not found');
        }

        $html = $this->renderer->render('Page', $data);
        $this->response->setContent($html);
    }
}
