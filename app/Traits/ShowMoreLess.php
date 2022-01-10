<?php

namespace App\Traits;

trait WithMoreLess
{
    public $per_page = 7;

    public function showMore(): int
    {
        $this->per_page += 5;
        return $this->per_page;
    }

    public function showLess(): int
    {
        $this->per_page -= 5;
        return $this->per_page;
    }
}
