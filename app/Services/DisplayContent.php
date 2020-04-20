<?php

namespace App\Services;

use App\Content;

class DisplayContent
{
    /**
     * Return content body to display on the front end.
     *
     * @param string $slug
     * @return string
     */
    public function bySlug(string $slug) :string
    {
        $content = Content::where('slug', $slug)->first();

        return $content->body ?? '';
    }
}
