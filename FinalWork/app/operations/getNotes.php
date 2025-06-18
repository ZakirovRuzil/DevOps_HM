<?php

function getAllNotes(): void {
    $filePath = __DIR__ . '/../notes.txt';

    if (!file_exists($filePath)) {
        echo "<p>Нет заметок.</p>";
        return;
    }

    $notes = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($notes as $index => $line) {
        [$timestamp, $text] = explode('|', $line, 2);
        echo "<div style='margin-bottom:15px;'>
                <div class='note-time'>{$timestamp}</div>
                <div>" . htmlspecialchars($text) . "</div>
                <form method='post' action='operations/deleteNote.php' style='margin-top:5px;'>
                    <input type='hidden' name='index' value='{$index}'>
                    <input type='submit' value='Удалить' style='background-color:#e53935;color:white;padding:5px 10px;border:none;border-radius:4px;cursor:pointer;'>
                </form>
              </div><hr>";
    }
}
