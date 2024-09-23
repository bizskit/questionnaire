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


  <title>แก้ไขข้อมูลทั่วไป</title>

  <link rel="icon" type="image/png" href="./favicon-32x32.png" >
</head>
<style>
  body {
    font-family: 'Noto Sans Thai', sans-serif;
  }
</style>

<body>

  <?php include 'navbar.php'; ?>

  <div class="container mt-4">

    <div class="row">

      <div class="col ">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="card-title" style="margin-right:auto;">จำนวนปีที่ทำงานใน ร.พ.ค่ายวีรวัฒน์โยธิน</h3>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_Modal1">
              <i class="fas fa-plus"></i>
            </button>
          </div>
          <div class="card-body p-0">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th class="text-center">รายการ</th>
                  <th class="text-center">แก้ไข</th>
                  <th class="text-center">ลบ</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql_number_year_work = "SELECT * FROM `number_year_work`";
                $rs_sql_number_year_work = mysqli_query($conn, $sql_number_year_work);
                while ($number_year_work = mysqli_fetch_array($rs_sql_number_year_work)) {
                ?>
                  <tr>
                    <td><?= $number_year_work['number_year_work_name'] ?></td>
                    <td class="border text-center">
                      <a class="edit-button" style="color: orange; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#update_number_year_work_Modal" data-name_num="<?= $number_year_work['number_year_work_name'] ?>" data-id_num="<?= $number_year_work['number_year_work_id'] ?>">
                        <i class="fa-regular fa-pen-to-square fa-xl"></i>
                      </a>
                    </td>
                    <td class="border text-center">
                      <a class="" style="color: red;" href="./delete_data.php?id=<?= $number_year_work['number_year_work_id'] ?>&tb=number_year_work&idtb=number_year_work_id&location=./edit_gennaral.php" onclick="Del(this.href);return false;">
                        <i class="fa-regular fa-trash-can fa-xl"></i>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col ">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="card-title" style="margin-right: auto;">Genneration</h3>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_Modal2">
              <i class="fas fa-plus"></i>
            </button>
          </div>
          <div class="card-body p-0">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th class="text-center">รายการ</th>
                  <th class="text-center">แก้ไข</th>
                  <th class="text-center">ลบ</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql_genneration = "SELECT * FROM `genneration` ORDER BY genneration_name ASC";
                $rs_sql_genneration = mysqli_query($conn, $sql_genneration);
                while ($genneration = mysqli_fetch_array($rs_sql_genneration)) {
                ?>
                  <tr>
                    <td><?= $genneration['genneration_name'] ?></td>
                    <td class="border text-center">
                      <a class="edit-button" style="color: orange; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#update_genneration_Modal" data-name="<?= $genneration['genneration_name'] ?>" data-id="<?= $genneration['genneration_id'] ?>">
                        <i class="fa-regular fa-pen-to-square fa-xl"></i>
                      </a>
                    </td>
                    <td class="border text-center">
                      <a class="" style="color: red;" href="./delete_data.php?id=<?= $genneration['genneration_id'] ?>&tb=genneration&idtb=genneration_id&location=./edit_gennaral.php" onclick="Del(this.href);return false;">
                        <i class="fa-regular fa-trash-can fa-xl"></i>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>

    <div class="row">
      <div class="col ">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="card-title" style="margin-right: auto;">แผนก</h3>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_Modal3">
              <i class="fas fa-plus"></i>
            </button>
          </div>
          <div class="card-body p-0">
            <div style="height: 200px; overflow-y: auto;"> <!-- กำหนดความสูงและการเลื่อน -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="text-center">รายการ</th>
                    <th class="text-center">แก้ไข</th>
                    <th class="text-center">ลบ</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql_department = "SELECT * FROM `department` ORDER BY department_name ASC";
                  $rs_sql_department = mysqli_query($conn, $sql_department);
                  while ($department = mysqli_fetch_array($rs_sql_department)) {
                  ?>
                    <tr>
                      <td><?= $department['department_name'] ?></td>
                      <td class="border text-center">
                        <a class="edit-button" style="color: orange; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#update_department_Modal" data-department_name="<?= $department['department_name'] ?>" data-id_department="<?= $department['department_id'] ?>">
                          <i class="fa-regular fa-pen-to-square fa-xl"></i>
                        </a>
                      </td>
                      <td class="border text-center">
                        <a class="" style="color: red;" href="./delete_data.php?id=<?= $department['department_id'] ?>&tb=department&idtb=department_id&location=./edit_gennaral.php" onclick="Del(this.href);return false;">
                          <i class="fa-regular fa-trash-can fa-xl"></i>
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>

  <!-- Modal insert-->
  <div class="modal fade" id="add_Modal1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-light">เพิ่มข้อมูล</h5>
        </div>
        <div class="modal-body">
          <form method="post" action="./insert_gennaral.php" enctype="multipart/form-data">
            <input type="text" name="name" id="name" class="form-control" required placeholder="เพิ่มข้อมูล...">
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

  <!-- Modal insert-->
  <div class="modal fade" id="add_Modal2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-light">เพิ่มข้อมูล</h5>
        </div>
        <div class="modal-body">
          <form method="post" action="./insert_gennaral.php" enctype="multipart/form-data">
            <input type="text" name="name" id="name" class="form-control" required placeholder="เพิ่มข้อมูล...">
            <div class="modal-footer">
              <button type="button" class="mt-2 btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
              <button type="submit" name="save2" id="save2" class="mt-2 btn btn-success">บันทึก</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal insert-->

  <!-- Modal insert-->
  <div class="modal fade" id="add_Modal3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-light">เพิ่มข้อมูล</h5>
        </div>
        <div class="modal-body">
          <form method="post" action="./insert_gennaral.php" enctype="multipart/form-data">
            <input type="text" name="name" id="name" class="form-control" required placeholder="เพิ่มข้อมูล...">
            <div class="modal-footer">
              <button type="button" class="mt-2 btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
              <button type="submit" name="save3" id="save3" class="mt-2 btn btn-success">บันทึก</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal insert-->

  <!-- Modal update department-->
  <div class="modal fade" id="update_department_Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-light">แก้ไขข้อมูล</h5>
        </div>
        <div class="modal-body">
          <form method="post" action="./update_gennaral.php" enctype="multipart/form-data">
            <input type="text" name="id_departmentedit" id="id_departmentedit" class="form-control" hidden>
            <input type="text" name="department_name_edit" id="department_name_edit" class="form-control" required>
            <div class="modal-footer">
              <button type="button" class="mt-2 btn btn-secondary" onclick="cancel()" data-bs-dismiss="modal">ยกเลิก</button>
              <button type="submit" name="edit_department" id="edit_department" class="mt-2 btn btn-warning">แก้ไข</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal update department-->

  <!-- Modal update genneration -->
  <div class="modal fade" id="update_genneration_Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-light">แก้ไขข้อมูล</h5>
        </div>
        <div class="modal-body">
          <form method="post" action="./update_gennaral.php" enctype="multipart/form-data">
            <input type="text" name="data_id_edit" id="data_id_edit" class="form-control" hidden>
            <input type="text" name="data_name_edit" id="data_name_edit" class="form-control" required>
            <div class="modal-footer">
              <button type="button" class="mt-2 btn btn-secondary" onclick="cancel()" data-bs-dismiss="modal">ยกเลิก</button>
              <button type="submit" name="edit_genneration" id="edit_genneration" class="mt-2 btn btn-warning">แก้ไข</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal update genneration -->

  <!-- Modal update number_year_work -->
  <div class="modal fade" id="update_number_year_work_Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-light">แก้ไขข้อมูล</h5>
        </div>
        <div class="modal-body">
          <form method="post" action="./update_gennaral.php" enctype="multipart/form-data">
            <input type="text" name="data_id_num_edit" id="data_id_num_edit" class="form-control" hidden>
            <input type="text" name="data_name_num_edit" id="data_name_num_edit" class="form-control" required>
            <div class="modal-footer">
              <button type="button" class="mt-2 btn btn-secondary" onclick="cancel()" data-bs-dismiss="modal">ยกเลิก</button>
              <button type="submit" name="edit_number_year_work" id="edit_number_year_work" class="mt-2 btn btn-warning">แก้ไข</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal update number_year_work -->

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const moveButtons = document.querySelectorAll('.edit-button');
      moveButtons.forEach(function(button) {
        button.addEventListener('click', function() {
          const department_name = button.getAttribute('data-department_name');
          const id_departmentedit = button.getAttribute('data-id_department');

          const department_nameField = document.getElementById('department_name_edit'); // You may need to use a different ID if necessary
          department_nameField.value = department_name;
          const id_departmenteditField = document.getElementById('id_departmentedit'); // You may need to use a different ID if necessary
          id_departmenteditField.value = id_departmentedit;

        });
      });
    });

    document.addEventListener('DOMContentLoaded', function() {
      const moveButtons = document.querySelectorAll('.edit-button');
      moveButtons.forEach(function(button) {
        button.addEventListener('click', function() {
          const data_name = button.getAttribute('data-name');
          const data_id = button.getAttribute('data-id');

          const data_nameField = document.getElementById('data_name_edit'); // You may need to use a different ID if necessary
          data_nameField.value = data_name;
          const data_idField = document.getElementById('data_id_edit'); // You may need to use a different ID if necessary
          data_idField.value = data_id;

        });
      });
    });

    document.addEventListener('DOMContentLoaded', function() {
      const moveButtons = document.querySelectorAll('.edit-button');
      moveButtons.forEach(function(button) {
        button.addEventListener('click', function() {
          const data_name_num = button.getAttribute('data-name_num');
          const data_id_num = button.getAttribute('data-id_num');

          const data_name_numField = document.getElementById('data_name_num_edit'); // You may need to use a different ID if necessary
          data_name_numField.value = data_name_num;
          const data_id_numField = document.getElementById('data_id_num_edit'); // You may need to use a different ID if necessary
          data_id_numField.value = data_id_num;

        });
      });
    });

    function Del(mypage) {
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

    function cancel() {
      window.location.reload();
    }
  </script>

</body>

</html>