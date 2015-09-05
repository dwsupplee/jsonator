<?php

require __DIR__ . '/../vendor/autoload.php';

function fetchFixture($path)
{
    return json_decode(file_get_contents($path));
}