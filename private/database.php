<?php
/* ----------------------------------------------------------------------
 * データベースの設定定義
 *
 * DB_HOST: データベースサーバのホスト名
 * DB_PORT: データベースサーバのポート
 * DB_NAME: データベース名
 * DB_USER: データベースにアクセスする際に利用するユーザ
 * DB_PASSWORD: データベースにアクセスする際に利用するユーザのパスワード
 * ---------------------------------------------------------------------- */
define('DB_HOST', 'db');
define('DB_PORT', 3306);
define('DB_NAME', 'bbs');
define('DB_USER', 'user');
define('DB_PASSWORD', 'password');

/* ----------------------------------------------------------------------
 * データベースへの接続を行う
 * ---------------------------------------------------------------------- */
function connectDB()
{
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // 問題があった場合に例外を出す
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
    return $connection;
}
