<?php

$filePath = __DIR__ . '/../notes.txt';

if (isset($_POST['index'])) {
    $index = (int)$_POST['index'];

    $notes = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if (isset($notes[$index])) {
        unset($notes[$index]);
        file_put_contents($filePath, implode(PHP_EOL, $notes) . PHP_EOL);
    }
}

header('Location: /');
exit;
