<?php

function get_skyway_api_key() {
    $f = new SplFileObject( __DIR__ . '/../.env');
    $f->setFlags(SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE);
    $api_key = null;
    foreach ($f as $line) {
        list($key, $value) = explode('=', $line);
        if ($key === 'SKYWAY_API_KEY') {
            $api_key = $value;
        }
    }

    return $api_key;
}