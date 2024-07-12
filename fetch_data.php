<?php

session_start();

// 1. DB接続します
require_once('funcs.php');
$pdo = db_conn();

// セッションからuser_idを取得
$user_id = $_SESSION['user_id'];

// 2. データ取得SQL作成
$fish = isset($_GET['fish']) ? $_GET['fish'] : '';

if ($fish) {
    $stmt = $pdo->prepare("SELECT * FROM osakana_table WHERE fish = :fish AND user_id = :user_id");
    $stmt->bindValue(':fish', $fish, PDO::PARAM_STR);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
} else {
    $stmt = $pdo->prepare("SELECT * FROM osakana_table WHERE user_id = :user_id");
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
}

$status = $stmt->execute();

// 3. データ表示
if($status === false) {
  sql_error($stmt);
} else {
  $result = [];
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $result[] = $row;
  }
  echo json_encode($result);
}
