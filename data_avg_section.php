<?php
include 'conn.php';

$sql_data_avg_section = "SELECT s.sections_id, s.section_name,
AVG(
    CASE
        WHEN LEFT(c.choice_text, 1) = '1' THEN 0
        WHEN LEFT(c.choice_text, 1) = '2' THEN 25
        WHEN LEFT(c.choice_text, 1) = '3' THEN 50
        WHEN LEFT(c.choice_text, 1) = '4' THEN 75
        WHEN LEFT(c.choice_text, 1) = '5' THEN 100
        ELSE 0
    END
) AS average_score
FROM response AS r 
JOIN choice AS c ON r.choice_id = c.choice_id 
JOIN question AS q ON q.question_id = r.question_id 
JOIN section AS s ON s.sections_id = q.section_id
GROUP BY s.sections_id, s.section_name";

$data_avg_section = $conn->query($sql_data_avg_section);

$data_section_name = array();
$data_section_avg = array();

while ($row = $data_avg_section->fetch_assoc()) {
  $data_section_name[] = $row['section_name'];
  $data_section_avg[] = number_format((float)$row['average_score'], 2, '.', '');
}

$data = array(
  'data_section_name' => $data_section_name,
  'data_section_avg' =>  $data_section_avg,
);

// Return data in JSON format
header('Content-Type: application/json');
echo json_encode($data);

?>
