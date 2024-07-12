<?php
require_once('funcs.php');

// 1. POSTデータ取得
$id = isset($_POST['id']) ? $_POST['id'] : '';

if (empty($id)) {
  echo json_encode(['error' => 'Invalid ID']);
  exit;
}

// 2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

// 3. データ削除SQL作成
$stmt = $pdo->prepare("DELETE FROM osakana_table WHERE id = :id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// 4. データ削除処理後
if($status === false) {
  sql_error($stmt);
} else {
  echo json_encode(['success' => true]);
}
