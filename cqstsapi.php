<?php
include 'db_connection.php';

$game_id = $_POST['game_id'];
$question_index = $_POST['question_index']; // Getting the current question index from the POST request

$current_time = time();
$cycle = $current_time % 60; // Cycle lasts 90 seconds

if ($cycle < 20) {
    $pattern = 1; // First 20 seconds: pattern 1
} elseif ($cycle < 40) {
    $pattern = 2; // Next 40 seconds: pattern 2
} else {
    $pattern = 3; // Final 40 seconds: pattern 3
}

$query = "SELECT * FROM questions WHERE game_id = '$game_id' AND pattern = '$pattern' AND status = '1' LIMIT $question_index, 1";
$result = mysqli_query($con, $query);

// Query to get total number of questions for this game
$query_total = "SELECT COUNT(*) as total_questions FROM questions WHERE game_id = '$game_id' AND pattern = '$pattern' AND status = '1'";
$result_total = mysqli_query($con, $query_total);
$total_questions_data = mysqli_fetch_assoc($result_total);
$total_questions = $total_questions_data['total_questions'];

if ($question_data = mysqli_fetch_assoc($result)) {
    // Fetching the answers for the current question
    $answers_query = "SELECT * FROM answers WHERE question_id = '" . $question_data['id'] . "'";
    $answers_result = mysqli_query($con, $answers_query);
    $answers = [];

    while ($answer = mysqli_fetch_assoc($answers_result)) {
        $answers[] = [
            'id' => $answer['id'],
            'answer' => $answer['answer'],
            'is_correct' => $answer['is_correct'] 
        ];
    }

    echo json_encode([
        'status' => 'success',
        'question' => $question_data['question'],
        'answers' => $answers,
        'current_question' => $question_index + 0, 
        'total_questions' => $total_questions
    ]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Question not found']);
}
?>
