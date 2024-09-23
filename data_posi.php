<?php
include 'conn.php';

$sql_posi = "SELECT COUNT(u.position_id) AS count_p, p.position_name 
            FROM `users` AS u 
            JOIN position AS p 
            ON p.position_id = u.position_id
            WHERE u.id_card <> 'adminedit' 
            GROUP BY p.position_name;  ";

$rs_sql_posi = $conn->query($sql_posi);

$data_posi_name = array();
$data_posi_count = array();

while ($row = $rs_sql_posi->fetch_assoc()) {
  $data_posi_name[] = $row['position_name'];
  $data_posi_count[] = $row['count_p'];
}

$data = array(
  'data_posi_name' => $data_posi_name,
  'data_posi_count' =>  $data_posi_count,
);

// Return data in JSON format
header('Content-Type: application/json');
echo json_encode($data);
