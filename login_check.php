<!-- Sweetalert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js "></script>
<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css " rel="stylesheet">
<?php
session_start();
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $inputpassword = $_POST['inputpassword']; //id_card

  // เลขบัตรประชาชน ในตารางผู้ใช้
  $sql_passwork = "SELECT * FROM users WHERE id_card = '$inputpassword' ";
  $result_sql_passwork = mysqli_query($conn, $sql_passwork);
  $role = mysqli_fetch_array($result_sql_passwork);

  //เลขบัตรใน ตารางการทำแบบทดสอบเสร็จแล้ว
  $sql_idcard = "SELECT * FROM `headtopicresponses` WHERE `id_card` = '$inputpassword' ";
  $result_sql_idcard = mysqli_query($conn, $sql_idcard);
  $sussecc = mysqli_fetch_array($result_sql_idcard);
  // echo $sussecc ;


  if ($sussecc > 0) { //ตรวจสอบว่าเลขบัตรมีอยู่ในตารางทำแบบทดสอบแล้ว

    $sql_weight = "SELECT `weight` FROM `users` WHERE `id_card` = '$inputpassword' ";
    $result_sql_weight = mysqli_query($conn, $sql_weight);
    $weight = mysqli_fetch_assoc($result_sql_weight);
    $_SESSION['weight'] = $weight['weight'];

    $sql_height = "SELECT `height` FROM `users` WHERE `id_card` = '$inputpassword' ";
    $result_sql_height = mysqli_query($conn, $sql_height);
    $height = mysqli_fetch_assoc($result_sql_height);
    $_SESSION['height'] = $height['height'];

    $sql_waistline = "SELECT `waistline` FROM `users` WHERE `id_card` = '$inputpassword' ";
    $result_sql_waistline = mysqli_query($conn, $sql_waistline);
    $waistline = mysqli_fetch_assoc($result_sql_waistline);
    $_SESSION['waistline'] = $waistline['waistline'];

    $sql_sex = "SELECT `sex` FROM `users` WHERE `id_card` = '$inputpassword' ";
    $result_sql_sex = mysqli_query($conn, $sql_sex);
    $sex = mysqli_fetch_assoc($result_sql_sex);
    $_SESSION['sex'] = $sex['sex'];

    $_SESSION['idcard'] = $inputpassword;

    echo "<script>
    $(document).ready(function() {
      Swal.fire({
        title: 'ทำแบบทดสอบเสร็จสิ้น',
        text: 'ขอบคุณที่ให้ความร่วมมือ',
        icon: 'success',
        timer: 10000,
        didClose: () => {
          window.location.href = 'susccess.php';
        }
      });
    });
  </script>";
  } else {
    if ($role > 0) { //ตรวจสอบว่ามีเลขบัตรอยู่ในระบบ
      if ($role['role'] == '0') {
        $_SESSION['idcard'] = $inputpassword;
        echo "<script>window.location = 'questionnaire-2.php'</script>";
      } else {
        $_SESSION['idcard'] = $inputpassword;
        echo "<script>window.location = 'dashboard.php'</script>";
      }
    } else {
      echo "<script>
       $(document).ready(function() {
         Swal.fire({
           title: 'ผิดผลาด',
           text: 'บัตรประชาชนยังไม่ถูกลงทะเบียน',
           icon: 'error',
           timer: 10000,
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