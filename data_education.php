<?php
include 'conn.php';

$sql_amount_edu = "SELECT COUNT(u.educational_id) AS count_e , e.educational_name 
                  FROM `users` AS u 
                  JOIN educational AS e 
                  ON e.educational_id = u.educational_id
                  WHERE u.id_card <> 'adminedit'
                  GROUP BY e.educational_name";

$rs_sql_amount_edu = $conn->query($sql_amount_edu);

$data_edu_name = array();
$data_edu_count = array();

while ($row = $rs_sql_amount_edu->fetch_assoc()) {
  $data_edu_name[] = $row['educational_name'];
  $data_edu_count[] = $row['count_e'];
}

$data = array(
  'data_edu_name' => $data_edu_name,
  'data_edu_count' =>  $data_edu_count,
);

// Return data in JSON format
header('Content-Type: application/json');
echo json_encode($data);

?>