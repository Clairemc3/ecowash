<?php

namespace App\Services;

use App\Content;
use App\Promotion;

class ContentBlock
{
    /**
     * Return a body from a Content record
     *
     * @param string $slug
     * @return string
     */
    public function getContent(string $slug) :string
    {
        $content = Content::where('slug', $slug)->first();

        return $content->body ?? '';
    }

}
