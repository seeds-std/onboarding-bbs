<?php
/* ----------
 * XSSのデモ
 * ---------- */
$input = $_POST['text'] ?? '';

?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>XSS</title>
    <style>
        code {
            background-color: #eee;
            border-radius: 3px;
            padding: 0 3px;
            color: #eb5a46;
        }
    </style>
</head>
<body>
    <header>
        <h1>XSSデモ</h1>
    </header>
    <main>
        <div>
            <div>エスケープなし</div>
            <div><?= $input ?></div>
        </div>
        <br>
        <div>
            <div>エスケープあり</div>
            <div><?= htmlspecialchars($input) ?></div>
        </div>
        <hr>
        <div>
            <div>以下のフォームに&nbsp;<code>&lt;script&gt;alert('XSS');&lt;/script&gt;</code>&nbsp;を入力してみてね</div>
            <form action="xss.php" method="post">
                <label for="text">入力テキスト</label>:&nbsp;<input type="text" name="text" id="text">
                <button type="submit">送信</button>
            </form>
        </div>
    </main>
    <footer>
        <hr>
        X(・$・)S
    </footer>
</body>
</html>
