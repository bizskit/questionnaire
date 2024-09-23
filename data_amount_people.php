<?php
include 'conn.php';

$sql_respons_and_choice = "SELECT r.id_card, r.choice_id, c.choice_text FROM response AS r JOIN choice AS c ON r.choice_id = c.choice_id";
$rs_respons_and_choice = mysqli_query($conn, $sql_respons_and_choice);

$user_scores = [];

if ($rs_respons_and_choice->num_rows > 0) {
    while ($row = $rs_respons_and_choice->fetch_assoc()) {
        $user_id = $row["id_card"];
        $choice_text = $row["choice_text"];

        // กำหนดคะแนนตาม choice_text
        $score = 0;
        if (strpos($choice_text, '1.') === 0) {
            $score = 0;
        } elseif (strpos($choice_text, '2.') === 0) {
            $score = 25;
        } elseif (strpos($choice_text, '3.') === 0) {
            $score = 50;
        } elseif (strpos($choice_text, '4.') === 0) {
            $score = 75;
        } elseif (strpos($choice_text, '5.') === 0) {
            $score = 100;
        }

        // บันทึกคะแนนรวมและจำนวนคำตอบ
        if (!isset($user_scores[$user_id])) {
            $user_scores[$user_id] = ["total_score" => 0, "count" => 0];
        }

        $user_scores[$user_id]["total_score"] += $score;
        $user_scores[$user_id]["count"] += 1;
    }
}

// กำหนดระดับความสุข
$happiness_levels = ['Very Unhappy', 'Unhappy', 'Happy', 'Very Happy'];
$happiness_count = [0, 0, 0, 0];

foreach ($user_scores as $user_id => $score_data) {
    $total_score = $score_data["total_score"];
    $average_score = $total_score / $score_data["count"]; // คำนวณคะแนนเฉลี่ย

    // กำหนดระดับความสุข
    if ($average_score <= 24.99) {
        $happiness_count[0] += 1; // Very Unhappy
    } elseif ($average_score <= 49.99) {
        $happiness_count[1] += 1; // Unhappy
    } elseif ($average_score <= 74.99) {
        $happiness_count[2] += 1; // Happy
    } elseif ($average_score <= 100) {
        $happiness_count[3] += 1; // Very Happy
    }
}

// แปลงข้อมูลเป็น JSON
$response = [
    "happiness_levels" => $happiness_levels,
    "happiness_count" => $happiness_count
];

$data = json_encode($response);

// ส่งข้อมูล JSON
header('Content-Type: application/json');
echo $data;
?>
