<?php
include 'conn.php';

$sql_wt = "SELECT COUNT(u.work_type_id) AS count_w, w.work_type_name FROM `users` AS u JOIN work_type AS w ON w.work_type_id = u.work_type_id WHERE u.id_card <> 'adminedit' GROUP BY w.work_type_id; ";

$rs_sql_wt = $conn->query($sql_wt);

$data_wt_name = array();
$data_wt_count = array();

while ($row = $rs_sql_wt->fetch_assoc()) {
  $data_wt_name[] = $row['work_type_name'];
  $data_wt_count[] = $row['count_w'];
}

$data = array(
  'data_wt_name' => $data_wt_name,
  'data_wt_count' =>  $data_wt_count,
);

// Return data in JSON format
header('Content-Type: application/json');
echo json_encode($data);
