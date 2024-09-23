<!-- Sweetalert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js "></script>
<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css " rel="stylesheet">
<?php
include 'conn.php';
session_start();

// Get the submitted data
$data = $_POST;

$idcard = $_SESSION['idcard']; // สมมติว่ามีการเก็บ idcard ใน session

// Insert responses into the database
foreach ($data as $question_id => $choice_id) {
  // Extract the question_id from the name attribute
  $question_id = str_replace('question_', '', $question_id);

  // ตรวจสอบว่ามีการตอบแบบสอบถามสำหรับ id_card นี้แล้วหรือไม่
  $sql_check_response = "SELECT COUNT(*) AS count FROM `response` WHERE `question_id` = '$question_id' AND `id_card` = '$idcard'";
  $result_check_response = mysqli_query($conn, $sql_check_response);
  $check_response = mysqli_fetch_assoc($result_check_response);

  if ($check_response['count'] > 0) {
    // แสดงข้อความว่าผู้ใช้ได้ทำการตอบแบบสอบถามนี้แล้ว
    echo "<script>
    $(document).ready(function() {
      Swal.fire({
        title: 'คุณทำแบบทดสอบนี้ไปแล้ว',
        text: 'คุณไม่สามารถทำแบบสอบถามนี้ซ้ำได้',
        icon: 'warning',
        timer: 5000,
        didClose: () => {
          window.location.href = 'susccess.php';
        }
      });
    });
  </script>";
    continue; // ข้ามไปยังการทำงานถัดไปในลูป
  }

  // ทำการแทรกข้อมูลลงในตาราง response
  $sql_insert_responses = "INSERT INTO `response`(`response_id`, `question_id`, `choice_id`, `id_card`) VALUES ('', '$question_id', '$choice_id', '$idcard')";

  if (mysqli_query($conn, $sql_insert_responses)) {
    // อัปเดตเซสชัน
    $sql_weight = "SELECT `weight` FROM `users` WHERE `id_card` = '$idcard' ";
    $result_sql_weight = mysqli_query($conn, $sql_weight);
    $weight = mysqli_fetch_assoc($result_sql_weight);
    $_SESSION['weight'] = $weight['weight'];

    $sql_height = "SELECT `height` FROM `users` WHERE `id_card` = '$idcard' ";
    $result_sql_height = mysqli_query($conn, $sql_height);
    $height = mysqli_fetch_assoc($result_sql_height);
    $_SESSION['height'] = $height['height'];

    $sql_waistline = "SELECT `waistline` FROM `users` WHERE `id_card` = '$idcard' ";
    $result_sql_waistline = mysqli_query($conn, $sql_waistline);
    $waistline = mysqli_fetch_assoc($result_sql_waistline);
    $_SESSION['waistline'] = $waistline['waistline'];

    $sql_sex = "SELECT `sex` FROM `users` WHERE `id_card` = '$idcard' ";
    $result_sql_sex = mysqli_query($conn, $sql_sex);
    $sex = mysqli_fetch_assoc($result_sql_sex);
    $_SESSION['sex'] = $sex['sex'];

    // แสดงข้อความสำเร็จและเปลี่ยนเส้นทาง
    echo "<script>
    $(document).ready(function() {
      Swal.fire({
        title: 'ส่งแบบทดสอบเรียบร้อย',
        text: 'ขอบคุณที่ให้ความร่วมมือ',
        icon: 'success',
        timer: 5000,
        didClose: () => {
          window.location.href = 'susccess.php';
        }
      });
    });
  </script>";
  }
}

try {
  $sql_insert_headtopicresponses = "INSERT INTO `headtopicresponses`(`headtopic_responses_id`, `headtopic_id`, `id_card`) VALUES ('','001','$idcard')";
  mysqli_query($conn, $sql_insert_headtopicresponses);
} catch (mysqli_sql_exception $e) {
  $error = $e->getMessage();
  echo "<script>
  $(document).ready(function() {
    Swal.fire({
      title: 'คุณทำแบบสอบถามนี้ไปแล้ว',
      text: 'เกิดข้อผิดพลาด: $error',
      icon: 'warning',
      timer: 5000,
      didClose: () => {
        window.location.href = 'susccess.php';
      }
    });
  });
  </script>";
}




// Redirect to a thank you page or display a success message
