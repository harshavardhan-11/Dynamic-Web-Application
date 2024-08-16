<?php
function isUrl($url)
{
    return $_SERVER['REQUEST_URI'] === $url;
}

function authorize($condition, $responseCode)
{
    if(!$condition) {
        abort(403);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}