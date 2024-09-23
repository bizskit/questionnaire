<?php 
include 'conn.php';

$sql_gen = "SELECT COUNT(u.genneration_id) AS count_g, g.genneration_name 
        FROM `users` AS u 
        JOIN genneration AS g 
        ON g.genneration_id = u.genneration_id 
        WHERE u.id_card <> 'adminedit' 
        GROUP BY g.genneration_name; ";

$rs_sql_gen = $conn->query($sql_gen);

$data_gen_name = array();
$data_gen_count = array();

while ($row = $rs_sql_gen->fetch_assoc()) {
  $data_gen_name[] = $row['genneration_name'];
  $data_gen_count[] = $row['count_g'];
}

$data = array(
  'data_gen_name' => $data_gen_name,
  'data_gen_count' =>  $data_gen_count,
);

// Return data in JSON format
header('Content-Type: application/json');
echo json_encode($data);
?>