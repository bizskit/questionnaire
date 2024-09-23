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

    <title>เพิ่มข้อมูล</title>

    <link rel="icon" type="image/png" href="./favicon-32x32.png" >
  </head>
  <style>
    body {
      font-family: 'Noto Sans Thai', sans-serif;
    }
  </style>

<body>

  <?php include 'navbar.php'; ?>

  <?php
  $sql_section = "SELECT * FROM `section`";
  $rs_sql_section = mysqli_query($conn, $sql_section);

  $sql_count_question = "SELECT COUNT(*) AS count FROM `question`; ";
  $rs_sql_question = mysqli_query($conn, $sql_count_question);
  $row = mysqli_fetch_assoc($rs_sql_question);
  $count = $row['count'];
  ?>

  <div class="container  d-flex justify-content-center" style="margin-top: 3cm;">
    <div class="d-grid gap-2">
      <button class="btn btn-success mb-5" style="width: 100%;" type="button" data-bs-toggle="modal" data-bs-target="#add_Modal1">
        <h1 style="margin: 1cm;">เพิ่มหัวข้อ</h1>
      </button>
      <button class="btn btn-success" style="width: 100%;" type="button" data-bs-toggle="modal" data-bs-target="#add_Modal2">
        <h1 style="margin: 1cm;">เพิ่มคำถามและตัวเลือก</h1>
      </button>
    </div>
  </div>


  <!-- Modal insert-->
  <div class="modal fade" id="add_Modal1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-light">เพิ่มหัวข้อ</h5>
        </div>
        <div class="modal-body">
          <form method="post" action="./insert_questionnaire.php" enctype="multipart/form-data">
            <label>หัวข้อ:</label>
            <input type="text" name="s_name" id="s_name" class="form-control" required placeholder="เพิ่มข้อมูล...">
            <div class="modal-footer">
              <button type="button" class="mt-2 btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
              <button type="submit" name="save1" id="save1" class="mt-2 btn btn-success">บันทึก</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal insert-->

  <!-- Modal insert -->
  <div class="modal fade" id="add_Modal2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-light">เพิ่มคำถามและตัวเลือก</h5>
        </div>
        <div class="modal-body">
          <form method="post" action="./insert_questionnaire.php" enctype="multipart/form-data">
            <label>หัวข้อ:</label>
            <select class="form-control mb-3" name="s_name" required>
              <option selected value="">เลือกหัวข้อ</option>
              <?php foreach ($rs_sql_section as $row) { ?>
                <option value="<?= $row['sections_id'] ?>"><?= $row['section_name'] ?></option>
              <?php } ?>
            </select>
            <label>คำถาม: <span style="color:red">*โปรดระบุเลขหน้า&nbsp;&nbsp;</span><span style="color:grey">เลขหน้าล่าสุด&nbsp;&nbsp;<?php echo $count; ?></span></label>
            <input type="text" name="q_name" id="q_name" class="form-control mb-3" pattern="^\d.*" value="<?php echo $count + 1; ?>." required placeholder="เพิ่มคำถาม...">
            <label>ตัวเลือก: <span style="color:red">*โปรดระบุเลขหน้าตัวเลือกทุกครั้งก่อนกดบันทึก</span></label>
            <input type="text" name="c_name1" id="c_name1" class="form-control mb-3" pattern="1.*" value="1." required placeholder="เพิ่มตัวเลือกหมายเลข 1...">
            <input type="text" name="c_name2" id="c_name2" class="form-control mb-3" pattern="2.*" value="2." required placeholder="เพิ่มตัวเลือกหมายเลข 2...">
            <input type="text" name="c_name3" id="c_name3" class="form-control mb-3" pattern="3.*" value="3." required placeholder="เพิ่มตัวเลือกหมายเลข 3...">
            <input type="text" name="c_name4" id="c_name4" class="form-control mb-3" pattern="4.*" value="4." required placeholder="เพิ่มตัวเลือกหมายเลข 4...">
            <input type="text" name="c_name5" id="c_name5" class="form-control mb-3" pattern="5.*" value="5." required placeholder="เพิ่มตัวเลือกหมายเลข 5...">

            <div class="modal-footer">
              <button type="button" class="mt-2 btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
              <button type="submit" name="save2" id="save2" class="mt-2 btn btn-success">บันทึก</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal insert -->

</body>

</html>