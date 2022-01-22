<?php

namespace App\Traits;

trait WithMoreLess
{
    public $per_page_moreless = 7;

    public function showMore(): int
    {
        $this->per_page_moreless += 5;
        return $this->per_page_moreless;
    }

    public function showLess(): int
    {
        $this->per_page_moreless -= 5;
        return $this->per_page_moreless;
    }
}
