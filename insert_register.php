<!-- Sweetalert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js "></script>
<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css " rel="stylesheet">
<?php
session_start();
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $idcard = $_POST['idcard'];
  $sex = $_POST['sex'];
  $department = $_POST['department'];
  $educational = $_POST['educational'];
  $genneration = $_POST['genneration'];
  $position = $_POST['position'];
  $work_type = $_POST['work_type'];
  $number_year_work = $_POST['number_year_work'];
  $weight = $_POST['weight'];
  $height = $_POST['height'];
  $waistline = $_POST['waistline'];

  // Check if id_card already exists
  $check_idcard_query = "SELECT * FROM `users` WHERE `id_card` = '$idcard'";
  $result = mysqli_query($conn, $check_idcard_query);

  if (mysqli_num_rows($result) > 0) {
    // id_card already exists
    echo "<script>
          $(document).ready(function() {
            Swal.fire({
              title: 'ผิดผลาด',
              text: 'รหัสประชาชนนี้ถูกใช้แล้ว',
              icon: 'error',
              timer: 5000,
              didClose: () => {
                window.location.href = 'index.php';
              }
            });
          });
        </script>";
  } else {
    // Insert new record
    $sql_insert_register = "INSERT INTO `users`(`user_id`, `title_id`, `firstname`, `lastname`, `id_card`, `department_id`, `sex`, `educational_id`, `genneration_id`, `position_id`, `work_type_id`, `number_year_work_id`, `role`, `weight`, `height`, `waistline`) 
    VALUES ('','$title','$firstname','$lastname','$idcard','$department','$sex','$educational','$genneration','$position','$work_type','$number_year_work','0','$weight','$height',' $waistline')";

    if (mysqli_query($conn, $sql_insert_register)) {
      // $_SESSION['idcard'] = $idcard;
      echo "<script>
            $(document).ready(function() {
              Swal.fire({
                title: 'บันทึกข้อมูลเรียบร้อย',
                text: 'สามารถกรอกบัตรประชาชนเพื่อเข้าทำแบบสอบถาม',
                icon: 'success',
                timer: 5000,
                didClose: () => {
                  window.location.href = 'index.php';
                }
              });
            });
          </script>";
    } else {
      echo "<script>
            $(document).ready(function() {
              Swal.fire({
                title: 'ผิดผลาด',
                text: 'มีบางอย่างไม่ถูกต้อง',
                icon: 'error',
                timer: 5000,
                didClose: () => {
                  window.location.href = 'index.php';
                }
              });
            });
          </script>";
    }
  }
}
?>
