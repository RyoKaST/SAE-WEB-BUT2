<?php
$trousseau = __DIR__
    . DIRECTORY_SEPARATOR
    . 'data'
    . DIRECTORY_SEPARATOR . 'account.ndjson';

function createTrousseau(string $trousseau) : void {
    $directory = dirname($trousseau);
    if(!is_dir($directory)) {
        mkdir($directory, 0777, true);
    }
    if(!file_exists($trousseau)) {
        touch($trousseau);
    }
}

function addAccount(String $trousseau, array $data) : void {
    file_put_contents($trousseau,
        json_encode($data) . PHP_EOL,
        FILE_APPEND);
}

