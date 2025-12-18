<?php

// Paksa folder storage ke /tmp agar Laravel tidak crash saat menulis log/cache
$basePath = __DIR__ . '/..';
putenv("APP_STORAGE=/tmp/storage");

// Buat folder yang dibutuhkan di /tmp
$folders = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/bootstrap/cache',
];
foreach ($folders as $folder) {
    if (!is_dir($folder)) {
        mkdir($folder, 0755, true);
    }
}

require __DIR__ . '/../public/index.php';