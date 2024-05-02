<?php
/* --------------------------------------------------
 * 必要なファイルを読み込む
 * -------------------------------------------------- */
require_once 'private/bootstrap.php';
require_once 'private/database.php';

/* --------------------------------------------------
 * セッション開始
 * -------------------------------------------------- */
session_start();

/* --------------------------------------------------
 * 送られてきた値を取得する
 * -------------------------------------------------- */
$token = $_POST['token'];

$id = $_SESSION['id'];

/* --------------------------------------------------
 * 送られてきたトークンのバリデーション
 * 
 * セッションに保存されているトークンと比較し、
 * 一致していなかった場合はトップ画面にリダイレクトする
 * -------------------------------------------------- */
if($token != $_SESSION['token']){
    unset($_SESSION['token']);
    redirect('/index.php');
}
/* --------------------------------------------------
 * データベース接続
 * -------------------------------------------------- */
$connection = connectDB();

/* --------------------------------------------------
 * 投稿を削除
 * -------------------------------------------------- */
 $stmt = mysqli_prepare($connection, 'DELETE FROM`articles` WHERE id = ?');
 mysqli_stmt_execute($stmt, [$id]);
?>

<!-- 描画するHTML -->
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>削除成功</title>
</head>
<body>
    <header>
        <h1>削除成功</h1>
    </header>
    <main>
        <a href="index.php">戻る</a>
    </main>
    <footer>
        <hr>
        <div>(　・ω・)ノ</div>
    </footer>
</body>
</html>
