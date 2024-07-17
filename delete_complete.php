<?php
//必要なファイルの読み込み
require_once 'private/bootstrap.php';
require_once 'private/database.php';

session_start();
$token = $_POST['token'];

//DB接続
$connection = connectDB();
//トークンの値を比較　違ったらリダイレクト
if($token != $_SESSION['token']){
    unset($_SESSION['token']);
    redirect('/index.php');
}

//セッションからIDを取得
$id = $_SESSION['id'];

//削除処理
$stmt = $connection->prepare("DELETE FROM articles WHERE id = :id");
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$stmt->execute();

unset($_SESSION['token']);
unset($_SESSION['id']);

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
