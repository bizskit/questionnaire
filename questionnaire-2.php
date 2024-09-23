<?php 
//บังคับให้ต้อง login ก่อนถึงจะเข้าหน้าเพจนี้ได้
session_start();
// if (!isset($_SESSION['idcard'])) {
// 	$_SESSION['msg'] = "กรุณาเข้าสู่ระบบ";
// 	header("location:register_users.php");
// }

include 'conn.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Sweetalert -->
  <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js "></script>
  <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css " rel="stylesheet">

  <!-- AdminLTE -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css"> -->

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wdth,wght@62.5..100,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>แบบสำรวจความสุขด้วยตนเอง</title>
  <link rel="icon" type="image/png" href="./favicon-32x32.png" >
</head>
<style>
  body {
    font-family: 'Noto Sans Thai', sans-serif;
  }
</style>

<body>
  <div class="container border rounded shadow-sm mr-5 ml-5 mb-5 mt-2">
    <form action="insert_responses-2.php" method="POST" enctype="multipart/form-data">
      <?php
      $sql_section = "SELECT * FROM `section`";
      $result_sql_section = mysqli_query($conn, $sql_section);
      $question_number = 1;
      while ($section = mysqli_fetch_assoc($result_sql_section)) {
      ?>
        <div class="alert alert-warning alert-dismissible mt-3 text-center">
          <h5 class="mb-0"><strong><?= $section['section_name'] ?></strong></h5>
        </div>

        <?php
        $section_id = $section['sections_id'];
        $sql_question = "SELECT * FROM `question` WHERE section_id = '$section_id' ORDER BY CAST(`questions_name` AS UNSIGNED) ASC;";
        $result_sql_question = mysqli_query($conn, $sql_question);
        while ($question = mysqli_fetch_assoc($result_sql_question)) {
        ?>
          <div class="container mt-2 p-0">
            <div class="form-check" style="padding-left: 0px;">
              <label class="form-label"><?= $question['questions_name'] ?></label>
            </div>
          </div>

          <div class="container mt-2 p-0">
            <div class="row row-cols-3 g-2">
              <?php
              $question_id = $question['question_id'];
              $sql_choice = "SELECT * FROM `choice` WHERE question_id = '$question_id'";
              $result_sql_choice = mysqli_query($conn, $sql_choice);
              while ($choice = mysqli_fetch_assoc($result_sql_choice)) {
              ?>
                <div class="col">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="question_<?= $question_id ?>" value="<?= $choice['choice_id'] ?>" required>
                    <label class="form-check-label"><?= $choice['choice_text'] ?></label>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>

        <?php
          $question_number++;
        }
        ?>
      <?php } ?>
      <div class="text-center mt-4 mb-3">
        <button type="submit" class="btn btn-primary">ส่งแบบสอบถาม</button>
      </div>
    </form>
  </div>
</body>

</html>