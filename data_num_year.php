<?php
include 'conn.php';

$sql_ny = "SELECT COUNT(u.work_type_id) AS count_n, n.number_year_work_name FROM `users` AS u JOIN number_year_work AS n ON n.number_year_work_id = u.number_year_work_id WHERE u.id_card <> 'adminedit' GROUP BY n.number_year_work_name; ";

$rs_sql_ny = $conn->query($sql_ny);

$data_ny_name = array();
$data_ny_count = array();

while ($row = $rs_sql_ny->fetch_assoc()) {
  $data_ny_name[] = $row['number_year_work_name'];
  $data_ny_count[] = $row['count_n'];
}

$data = array(
  'data_ny_name' => $data_ny_name,
  'data_ny_count' =>  $data_ny_count,
);

// Return data in JSON format
header('Content-Type: application/json');
echo json_encode($data);
