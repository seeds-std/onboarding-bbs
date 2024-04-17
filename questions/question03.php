<?php
/* -------------------------------------------------------------------------------------------------------------------
 * 以下のプログラムは `articles` テーブルのデータを全件取得するプログラムです
 *
 * 1: このプログラムを動かしてみて $articles のデータの中身を確認してみてください
 * 2: $articlesのデータをforeachを使って 名前(name) と コンテンツ(content) を出力してみてください
 * 3: 今、このプログラムは全件を取得していますが、「idが2」のデータ1件のみ取得するように修正してみてください
 * 4: 「idが2」のデータはhtmlがそのまま出力されてしまっていますのでデータをエスケープしてみてください
 * ------------------------------------------------------------------------------------------------------------------- */

define('DB_HOST', 'db');
define('DB_PORT', 3306);
define('DB_NAME', 'bbs');
define('DB_USER', 'user');
define('DB_PASSWORD', 'password');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // 問題があった場合に例外を出す
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

$statement = mysqli_prepare($connection, 'SELECT * FROM `articles`');
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);
$articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
