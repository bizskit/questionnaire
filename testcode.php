<?php include 'conn.php'; ?>

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
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wdth,wght@62.5..100,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    body {
      font-family: 'Noto Sans Thai', sans-serif;
    }

    /* iPhone SE */
    @media only screen and (max-width: 375px) {
      .container {
        width: 100%;
        padding: 5px;
      }

      .alert {
        font-size: 14px;
        padding: 10px;
      }

      .col-form-label,
      .form-check-label {
        font-size: 14px;
      }

      .btn {
        width: 100%;
        font-size: 14px;
      }

      .row .col-2,
      .row .col-3,
      .row .col-4 {
        width: 100%;
      }

      input[type="text"],
      select,
      button {
        width: 100%;
        margin-bottom: 10px;
      }
    }

    /* iPhone 11 Pro Max */
    @media only screen and (max-width: 414px) {
      .container {
        width: 100%;
        padding: 10px;
      }

      .alert {
        font-size: 16px;
        padding: 15px;
      }

      .btn {
        width: 100%;
        font-size: 16px;
      }

      .row .col-2,
      .row .col-3,
      .row .col-4 {
        width: 100%;
      }

      input[type="text"],
      select,
      button {
        width: 100%;
        margin-bottom: 10px;
      }
    }

    /* Galaxy S20 */
    @media only screen and (max-width: 412px) {
      .container {
        width: 100%;
        padding: 15px;
      }

      .alert {
        font-size: 16px;
      }

      .btn {
        width: 100%;
        font-size: 16px;
      }

      input[type="text"],
      select,
      button {
        width: 100%;
        margin-bottom: 10px;
      }
    }


    /* Galaxy S20+ */
    @media only screen and (max-width: 450px) {
      .container {
        width: 100%;
        padding: 15px;
      }

      .alert {
        font-size: 18px;
      }

      .btn {
        width: 100%;
        font-size: 18px;
      }

      input[type="text"],
      select,
      button {
        width: 100%;
        margin-bottom: 15px;
      }
    }
  </style>

  <title>กรอกข้อมูลก่อนเข้าทำแบบทดสอบ</title>

  <link rel="icon" type="image/png" href="./favicon-32x32.png">

</head>

<body>

  <div class="container border shadow-sm mr-5 ml-5 mb-5">

    <div class="alert text-center mt-2 border" role="alert">
      <p class="h4">แบบสำรวจความสุขด้วยตนเอง : HAPPINOMETER</p>
      <p class="h4">บุคลากร รพ.ค่ายวีรวัฒน์โยธิน</p>
      <p class="h4">ปีงบประมาณ <?php echo date("Y") + 543; ?></p>
    </div>

    <div class="alert mt-2 border" role="alert">
      <p class="">
        <strong>วัตถุประสงค์ : </strong>
        เพื่อใช้ประเมินความสุขของตนเอง เท่าทันความรู้สึกของตนเอง ได้ทบทวนประสบการณ์หรือเรื่องราวที่เกิดขึ้นกับชีวิต องค์กรได้รับรู้ชีวิตและความรู้สึกของคนในองค์กร เพื่อผู้บริหารสามารถนำผลการประเมินมาวางแผน ออกนโยบายที่ช่วยส่งเสริมให้คนทำงานมีความสุขได้
      </p>
    </div>

    <form method="post" action="insert_register.php" enctype="multipart/form-data">

      <div class="text-center mb-3">
        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">เริ่มทำแบบสอบถาม</button>
      </div>

      <div class="alert alert-success alert-dismissible">
        <h4 class="mb-0 ">ข้อมูลทั่วไป</h4>
      </div>

      <div class="row g-3">
        <?php
        $sql_title = 'SELECT * FROM title ORDER BY title_id';
        $rs_sql_title = mysqli_query($conn, $sql_title);
        ?>
        <div class="col-2">
          <select class="form-select" name="title" required>
            <option selected value="">คำนำหน้า</option>
            <?php foreach ($rs_sql_title as $row) { ?>
              <option value="<?= $row['title_id'] ?>"><?= $row['title_name'] ?></option>
            <?php }  ?>
          </select>
        </div>
        <div class="col-auto">
          <label class="col-form-label">ชื่อ :</label>
        </div>
        <div class="col-4">
          <input type="text" pattern="^[\u0E00-\u0E7F]+$" name="firstname" class="form-control" placeholder="กรอกชื่อ..." required>
        </div>
        <div class="col-auto">
          <label class="col-form-label">นามสกุล :</label>
        </div>
        <div class="col-4">
          <input type="text" pattern="^[\u0E00-\u0E7F]+$" name="lastname" class="form-control" placeholder="กรอกนามสกุล..." required>
        </div>
      </div>

      <div class="row g-3 mt-1">
        <div class="col-auto mt-2">
          <label class="col-form-label">เลขประชาชน :</label>
          <div>
            <span id="user-availability-status"></span>
          </div>
        </div>
        <div class="col-3 mt-2">
          <input type="text" minlength="13" maxlength="13" pattern="[0-9]{13}" name="idcard" id="idcard" class="form-control" placeholder="กรอกเลขบัตรประชาชน..." required onblur="checkAvailability()">
        </div>
        <div class="col-auto">
          <div class="form-check">
            <label class="form-label">เพศ :</label>&nbsp;&nbsp;
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sex" value="ชาย" required>
              <label class="form-check-label" for="male">ชาย</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sex" value="หญิง" required>
              <label class="form-check-label" for="female">หญิง</label>
            </div>
          </div>
        </div>
        <div class="col-auto ">
          <label class="col-form-label p-0">แผนก :</label>
        </div>

        <?php
        $sql_department = 'SELECT * FROM department ORDER BY department_name ASC';
        $rs_sql_department = mysqli_query($conn, $sql_department);
        ?>

        <div class="col-4 p-0 mt-2">
          <select class="form-select" name="department" required>
            <option selected value="">เลือกแผนก</option>
            <?php foreach ($rs_sql_department as $row) { ?>
              <option value="<?= $row['department_id'] ?>"><?= $row['department_name'] ?></option>
            <?php }  ?>
          </select>
        </div>
      </div>

      <div class="row g-3 mt-1">
        <div class="col-auto">
          <label class="col-form-label">น้ำหนัก : กิโลกรัม</label>
        </div>
        <div class="col-2">
          <input type="text" pattern="^[1-9][0-9]{0,2}$" name="weight" class="form-control" placeholder="กรอกน้ำหนัก..." required>
        </div>
        <div class="col-auto">
          <label class="col-form-label">ส่วนสูง : เซนติเมตร</label>
        </div>
        <div class="col-2">
          <input type="text" pattern="[0-9]{3}" name="height" class="form-control" placeholder="กรอกส่วนสูง..." required>
        </div>
        <div class="col-auto">
          <label class="col-form-label">รอบเอว : เซนติเมตร</label>
        </div>
        <div class="col-2">
          <input type="text" pattern="^[1-9][0-9]{0,2}$" name="waistline" class="form-control" placeholder="กรอกรอบเอว..." required>
        </div>

      </div>

      <?php
      $sql_educational = 'SELECT * FROM educational ORDER BY educational_id';
      $rs_sql_educationa = mysqli_query($conn, $sql_educational);
      ?>

      <div class="container mt-2 p-0">
        <div class="form-check" style="padding-left: 0px;">
          <label class="form-label ">วุฒิการศึกษา :</label>
        </div>
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
          <?php foreach ($rs_sql_educationa as $row) { ?>
            <div class="col-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="educational" value="<?= $row['educational_id'] ?>" required>
                <label class="form-check-label"><?= $row['educational_name'] ?></label>
              </div>
            </div>
          <?php }; ?>
        </div>
      </div>

      <?php
      $sql_genneration = 'SELECT * FROM genneration ORDER BY genneration_name ASC';
      $rs_sql_genneration = mysqli_query($conn, $sql_genneration);
      ?>

      <div class="container mt-2 p-0">
        <div class="form-check" style="padding-left: 0px;">
          <label class="form-label ">แบ่งตาม Genneration :</label>
        </div>
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
          <?php foreach ($rs_sql_genneration as $row) { ?>
            <div class="col-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="genneration" value="<?= $row['genneration_id'] ?>" required>
                <label class="form-check-label"><?= $row['genneration_name'] ?></label>
              </div>
            </div>
          <?php }; ?>
        </div>
      </div>

      <?php
      $sql_position = 'SELECT * FROM position ORDER BY position_id';
      $rs_sql_position = mysqli_query($conn, $sql_position);
      ?>

      <div class="container mt-2 p-0">
        <div class="form-check" style="padding-left: 0px;">
          <label class="form-label ">ตำแหน่งเป็น :</label>
        </div>
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
          <?php foreach ($rs_sql_position as $row) { ?>
            <div class="col-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="position" value="<?= $row['position_id'] ?>" required>
                <label class="form-check-label"><?= $row['position_name'] ?></label>
              </div>
            </div>
          <?php }; ?>
        </div>
      </div>

      <?php
      $sql_work_type = 'SELECT * FROM work_type ORDER BY work_type_id';
      $rs_sql_work_type = mysqli_query($conn, $sql_work_type);
      ?>

      <div class="container mt-2 p-0">
        <div class="form-check" style="padding-left: 0px;">
          <label class="form-label ">ประเภทงาน :</label>
        </div>
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
          <?php foreach ($rs_sql_work_type as $row) { ?>
            <div class="col-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="work_type" value="<?= $row['work_type_id'] ?>" required>
                <label class="form-check-label"><?= $row['work_type_name'] ?></label>
              </div>
            </div>
          <?php }; ?>
        </div>
      </div>

      <?php
      $sql_number_year_work = 'SELECT * FROM number_year_work';
      $rs_sql_number_year_work = mysqli_query($conn, $sql_number_year_work);
      ?>

      <div class="container mt-2 mb-3 p-0">
        <div class="form-check" style="padding-left: 0px;">
          <label class="form-label ">จำนวนปีที่ทำงานใน รพ.ค่ายวีรวัฒน์โยธิน :</label>
        </div>
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
          <?php foreach ($rs_sql_number_year_work as $row) { ?>
            <div class="col-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="number_year_work" value="<?= $row['number_year_work_id'] ?>" required>
                <label class="form-check-label"><?= $row['number_year_work_name'] ?></label>
              </div>
            </div>
          <?php }; ?>
        </div>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-success">ลงทะเบียน</button>
      </div>

  </div>

  </form>
  </div>
</body>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="login_check.php" enctype="multipart/form-data">

          <label class="form-label">เลขบัตรประชาชน</label>&nbsp;&nbsp;<span class="password-toggle-icon"><i class="fas fa-eye"></i></span>
          <input type="password" name="inputpassword" id="inputpassword" class="form-control" required placeholder="กรอกเลขบัตรประชาชน...">

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">ทำแบบทดสอบ</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function checkAvailability() {
    console.log(document.getElementById("idcard").value);
    $.ajax({
      type: "POST",
      url: "check_idcard.php",
      cache: false,
      data: {
        type: 'users',
        input_name: $("#idcard").val(),
        where: 'id_card',
      },
      success: function(data) {
        $("#user-availability-status").html(data);
        // if (data.indexOf("ถูกใช้ไปแล้ว") !== -1) {
        //   $("#save1").prop("disabled", true);
        // } else {
        //   $("#save1").prop("disabled", false);
        // }
      }
    });
  }

  const passwordField = document.getElementById("inputpassword");
  const togglePassword = document.querySelector(".password-toggle-icon i");

  togglePassword.addEventListener("click", function() {
    if (passwordField.type === "password") {
      passwordField.type = "text";
      togglePassword.classList.remove("fa-eye");
      togglePassword.classList.add("fa-eye-slash");
    } else {
      passwordField.type = "password";
      togglePassword.classList.remove("fa-eye-slash");
      togglePassword.classList.add("fa-eye");
    }
  });
</script>

</html>