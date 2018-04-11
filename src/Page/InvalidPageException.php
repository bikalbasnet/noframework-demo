<?php declare(strict_types = 1);

namespace Example\Page;

use \Exception;
use Throwable;

class InvalidPageException extends Exception
{
    public function __construct(string $slug, int $code = 0, Exception $previous = null)
    {
        $message = "No page with slug {$slug}  found";
        parent::__construct($message, $code, $previous);
    }
}
