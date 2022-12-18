<?php
// データベースに接続する
$mysqli = new mysqli('db', 'test_user', 'pass', 'test_database');
if ($mysqli->connect_error) {
    throw new RuntimeException('mysqli接続エラー:' . $mysqli->connect_error);
}

// テーブルの初期化
$mysqli->query('DROP TABLE IF EXISTS employees');

// テーブルの作成
$createTable = <<<EOT
CREATE TABLE IF NOT EXISTS employees (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4
EOT;
$mysqli->query($createTable);

$mysqli->close();
