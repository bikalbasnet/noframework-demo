<?php

namespace Example\Controllers;

use Example\Template\Renderer;
use Http\Request;
use Http\Response;

class Homepage
{
    private $request;
    private $response;
    private $renderer;

    public function __construct(Request $request, Response $response, Renderer $renderer)
    {
        $this->response = $response;
        $this->request = $request;
        $this->renderer = $renderer;
    }

    public function show()
    {
        $data = [
            'name' => 'Bikal Basnet'
        ];

        $html = $this->renderer->render('Homepage', $data);
        $this->response->setContent($html);
    }
}
