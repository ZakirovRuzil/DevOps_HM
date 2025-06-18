<?php

$filePath = __DIR__ . '/../notes.txt';

$note = trim($_POST['note'] ?? '');

date_default_timezone_set('Europe/Moscow');
$date = new DateTime('now');

if ($note !== '') {
    $entry = $date->format('Y-m-d H:i:s') . '|' . str_replace("\n", " ", $note) . PHP_EOL;
    file_put_contents($filePath, $entry, FILE_APPEND);
}

header('Location: /');
exit;
