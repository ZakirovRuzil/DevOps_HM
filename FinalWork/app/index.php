<?php require_once 'operations/getNotes.php' ?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заметки</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        .form {
            max-width: 500px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .form input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        .form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #00bcd4;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        .form input[type="submit"]:hover {
            background-color: #0097a7;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            color: #333;
        }

        .note-time {
            font-size: 14px;
            color: #888;
        }

        hr {
            border: none;
            border-top: 1px solid #eee;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1>Добавление заметок</h1>
    <form class="form" action="operations/writeNote.php" method="post">
        <input type="text" name="note" placeholder="Напишите заметку" required>
        <input type="submit" value="Добавить">
    </form>

    <h2>Ваши заметки</h2>
    <div class="container">
        <?php getAllNotes() ?>
    </div>
</body>
</html>
