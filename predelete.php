<?php 
session_start();
// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่และค่าของ idcard เป็น 'adminedit' หรือไม่
if (!isset($_SESSION['idcard']) || $_SESSION['idcard'] !== 'adminedit') {
  // หากเงื่อนไขไม่เป็นจริง ให้ทำการเปลี่ยนเส้นทางไปยังหน้าเข้าสู่ระบบหรือหน้าอื่นๆ
  header("location:register_users.php");
  exit(); // ป้องกันการดำเนินการต่อหลังจากการเปลี่ยนเส้นทาง
}
include 'conn.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Sweetalert -->
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js "></script>
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css " rel="stylesheet">

    <!-- AdminLTE -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>

    <!-- Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wdth,wght@62.5..100,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>ลบข้อมูล</title>
    <link rel="icon" type="image/png" href="./favicon-32x32.png" >
  </head>
  <style>
    body {
      font-family: 'Noto Sans Thai', sans-serif;
    }
  </style>

<body>

  <?php include 'navbar.php';?>

  <div class="container overflow-hidden" style="margin-top: 3cm;">
    <div class="row gy-5">
      <div class="col-6">
        <a class="btn btn-danger mb-5" style="width: 100%;" type="button" data-bs-toggle="modal" data-bs-target="#delete_Modal1">
          <h1 style="margin: 25px;">ลบหัวข้อและคำถาม</h1>
        </a>
      </div>
      <div class="col-6">
        <a class="btn btn-danger mb-5" style="width: 100%;" type="button" data-bs-toggle="modal" data-bs-target="#delete_Modal2">
          <h1 style="margin: 25px;">ลบคำถามและตัวเลือก</h1>
        </a>
      </div>
      <div class="col-6">
      <a class="btn btn-danger mb-5" style="width: 100%;" href="./delete_trun.php?tb=response&tb2=headtopicresponses&location=./predelete.php" onclick="Del2(this.href);return false;">
          <h1 style="margin: 25px;">ล้างข้อมูลการทำแบบสอบถาม</h1>
        </a>
      </div>
      <div class="col-6">
      <a class="btn btn-danger mb-5" style="width: 100%;" href="./delete_trun.php?tb=users&location=./predelete.php" onclick="Del2(this.href);return false;">
          <h1 style="margin: 25px;">ล้างข้อมูลผู้ทำแบบสอบถาม</h1>
        </a>
      </div>
    </div>
  </div>

  <?php
  $sql_question = "SELECT * FROM `question` ORDER BY CAST(`questions_name` AS UNSIGNED) ASC;";
  $rs_sql_question = mysqli_query($conn, $sql_question);

  $sql_section = "SELECT * FROM `section` ";
  $rs_sql_section = mysqli_query($conn, $sql_section);

  ?>

  <!-- Modal delete-->
  <div class="modal fade" id="delete_Modal1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-light">ลบหัวข้อและคำถาม</h5>
        </div>
        <div class="modal-body">
          <form id="deleteForm" method="get" action="./delete_data.php" enctype="multipart/form-data">
            <label>เลือกหัวข้อที่จะลบ:</label>
            <select class="form-control mb-3" name="id" required>
              <option selected value="">เลือกหัวข้อ</option>
              <?php foreach ($rs_sql_section as $row) { ?>
                <option value="<?= $row['sections_id'] ?>"><?= $row['section_name'] ?></option>
              <?php } ?>
            </select>
            <input type="text" name="idtb" id="idtb" value="sections_id" class="form-control" required hidden>
            <input type="text" name="tb" id="tb" value="section" class="form-control" required hidden>
            <input type="text" name="location" id="location" value="./predelete.php" class="form-control" required hidden>
            <div class="modal-footer">
              <button type="button" class="mt-2 btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
              <button type="submit" name="save1" id="save1" class="mt-2 btn btn-danger">ลบ</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal delete-->

  <!-- Modal delete -->
  <div class="modal fade" id="delete_Modal2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-light">ลบคำถามและตัวเลือก</h5>
        </div>
        <div class="modal-body">
          <form id="deleteForm" method="get" action="./delete_data.php" enctype="multipart/form-data">
            <label>เลือกคำถามที่จะลบ:</label>
            <select class="form-control mb-3" name="id" required>
              <option selected value="">เลือกคำถาม</option>
              <?php foreach ($rs_sql_question as $row) { ?>
                <option value="<?= $row['question_id'] ?>"><?= $row['questions_name'] ?></option>
              <?php } ?>
            </select>
            <input type="text" name="idtb" id="idtb" value="question_id" class="form-control" required hidden>
            <input type="text" name="tb" id="tb" value="question" class="form-control" required hidden>
            <input type="text" name="location" id="location" value="./predelete.php" class="form-control" required hidden>
            <div class="modal-footer">
              <button type="button" class="mt-2 btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
              <button type="submit" name="save1" id="save1" class="mt-2 btn btn-danger">ลบ</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal delete-->


</body>

<script>
  document.getElementById('deleteForm').addEventListener('submit', function(event) {
    event.preventDefault(); // ป้องกันการส่งฟอร์มทันที

    Swal.fire({
      title: 'คุณต้องการลบข้อมูลหรือไม่',
      text: "เมื่อคุณลบข้อมูลนี้ ข้อมูลที่อยู่ภายใต้จะหายไปด้วย และไม่สามารถกู้คืนได้",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ใช่, ลบมัน!',
      cancelButtonText: 'ยกเลิก'
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit(); // ส่งฟอร์มเมื่อได้รับการยืนยัน
      }
    });
  });

  function Del2(mypage) {
      Swal.fire({
        title: 'คุณต้องการลบข้อมูลหรือไม่',
        text: "คุณจะไม่สามารถกู้คืนข้อมูลนี้ได้!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่, ลบมัน!',
        cancelButtonText: 'ยกเลิก'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = mypage;
        }
      });
    }
</script>


</html>