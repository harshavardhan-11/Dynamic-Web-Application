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