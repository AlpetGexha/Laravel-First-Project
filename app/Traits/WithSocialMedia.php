<?php

namespace App\Traits;

trait WithSocialMedia
{
    public function facebook($value)
    {
        return 'https://www.facebook.com/' . $value;
    }

    public function instagram($value)
    {
        return 'https://www.instagram.com/' . $value . '/';
    }

    public function twitter($value)
    {
        return 'https://www.twitter.com/' . $value;
    }

    public function github($value)
    {
        return 'https://www.github.com/' . $value;
    }

    public function youtube($value)
    {
        return 'https://www.youtube.com/' . $value;
    }

    public function linkedin($value)
    {
        return 'https://www.linkedin.com/in/' . $value;
    }
}
