<!-- Sweetalert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js "></script>
<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css " rel="stylesheet">

<?php
session_start();
include 'conn.php';

if (isset($_POST['save1'])) {

  $name = $_POST['s_name'];

  $sql = "INSERT INTO `section`(`sections_id`, `headtopic_id`, `section_name`) VALUES ('','001','$name')";
  mysqli_query($conn, $sql);

  echo "<script>
  $(document).ready(function() {
    Swal.fire({
      title: 'บันทึกเรียบร้อย',
      text: 'ข้อมูลถูกบันทึกแล้ว',
      icon: 'success',
      timer: 5000,
      didClose: () => {
        window.location.href = 'preinsert_section_and_question.php';
      }
    });
  });
</script>";
}

if (isset($_POST['save2'])) {

  $section_id = $_POST['s_name'];
  $question_name = $_POST['q_name'];
  $choices = [
    $_POST['c_name1'],
    $_POST['c_name2'],
    $_POST['c_name3'],
    $_POST['c_name4'],
    $_POST['c_name5']
  ];

  $sql_quetion = "INSERT INTO `question`(`question_id`, `section_id`, `questions_name`) VALUES ('','$section_id','$question_name')";
  mysqli_query($conn, $sql_quetion);

  $question_id = mysqli_insert_id($conn);

  $sql_insert_choice = "INSERT INTO `choice` (question_id, choice_text) VALUES (?, ?)";
  $stmt = mysqli_prepare($conn, $sql_insert_choice);

  foreach ($choices as $choice) {
    mysqli_stmt_bind_param($stmt, 'is', $question_id, $choice);
    mysqli_stmt_execute($stmt);
  }

  echo "<script>
  $(document).ready(function() {
    Swal.fire({
      title: 'บันทึกเรียบร้อย',
      text: 'ข้อมูลถูกบันทึกแล้ว',
      icon: 'success',
      timer: 5000,
      didClose: () => {
        window.location.href = 'preinsert_section_and_question.php';
      }
    });
  });
</script>";
}
