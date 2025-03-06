<?php
include "db_connection.php";


$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 8;

$sql = "SELECT id, name, image FROM games ORDER BY id DESC LIMIT $limit OFFSET $offset";
$result = mysqli_query($con, $sql);

$quizzes = [];
while ($row = mysqli_fetch_assoc($result)) {
    $quizzes[] = $row;
}

// Check if more quizzes exist
$next_offset = $offset + $limit;
$hasMoreQuizzes = mysqli_num_rows(mysqli_query($con, "SELECT id FROM games LIMIT 1 OFFSET $next_offset")) > 0;

echo json_encode(["status" => "success", "quizzes" => $quizzes, "hasMoreQuizzes" => $hasMoreQuizzes]);
exit;
?>
