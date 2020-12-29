<?php

class Router
{
    const PARAM_NAME = "p";

    public function createURL($url, $params = [])
    {
        if ($url) {
            $params[self::PARAM_NAME] = $url;
        }
        return $_SERVER['PHP_SELF'] . '?' . http_build_query($params);
    }
}
