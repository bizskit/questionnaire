<?php
include 'conn.php';

// Update sections
$sql_section = "SELECT * FROM `section`";
$result_sql_section = mysqli_query($conn, $sql_section);
while ($section = mysqli_fetch_assoc($result_sql_section)) {
    $section_id = $section['sections_id'];
    $section_name = $_POST['section_name_' . $section_id];
    $sql_update_section = "UPDATE `section` SET section_name = '$section_name' WHERE sections_id = $section_id";
    mysqli_query($conn, $sql_update_section);
}

// Update questions
$sql_question = "SELECT * FROM `question`";
$result_sql_question = mysqli_query($conn, $sql_question);
while ($question = mysqli_fetch_assoc($result_sql_question)) {
    $question_id = $question['question_id'];
    $question_name = $_POST['question_name_' . $question_id];
    $sql_update_question = "UPDATE `question` SET questions_name = '$question_name' WHERE question_id = $question_id";
    mysqli_query($conn, $sql_update_question);
}

// Update choices
$sql_choice = "SELECT * FROM `choice`";
$result_sql_choice = mysqli_query($conn, $sql_choice);
while ($choice = mysqli_fetch_assoc($result_sql_choice)) {
    $choice_id = $choice['choice_id'];
    $choice_text = $_POST['choice_name_' . $choice_id];
    $sql_update_choice = "UPDATE `choice` SET choice_text = '$choice_text' WHERE choice_id = $choice_id";
    mysqli_query($conn, $sql_update_choice);
}

header("Location: edit_questionnaire.php");
// exit();
?>
