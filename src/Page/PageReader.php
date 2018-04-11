<?php

namespace Example\Page;

interface PageReader
{
    public function readBySlug(string $slug) : string;
}
