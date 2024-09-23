<!-- Sweetalert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js "></script>
<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css " rel="stylesheet">

<?php
session_start();
include 'conn.php';


if (isset($_POST['save1'])) {
  $name = $_POST['name'];

  $sql = "INSERT INTO `number_year_work`(`number_year_work_id`, `number_year_work_name`) VALUES ('','$name')";
  mysqli_query($conn, $sql);

  echo "<script>
  $(document).ready(function() {
    Swal.fire({
      title: 'บันทึกเรียบร้อย',
      text: 'ข้อมูลถูกบันทึกแล้ว',
      icon: 'success',
      timer: 5000,
      didClose: () => {
        window.location.href = 'edit_gennaral.php';
      }
    });
  });
</script>";
}

if (isset($_POST['save2'])) {
  $name = $_POST['name'];

  $sql = "INSERT INTO `genneration`(`genneration_id`, `genneration_name`) VALUES ('','$name')";
  mysqli_query($conn, $sql);

  echo "<script>
  $(document).ready(function() {
    Swal.fire({
      title: 'บันทึกเรียบร้อย',
      text: 'ข้อมูลถูกบันทึกแล้ว',
      icon: 'success',
      timer: 5000,
      didClose: () => {
        window.location.href = 'edit_gennaral.php';
      }
    });
  });
</script>";
}

if (isset($_POST['save3'])) {
  $name = $_POST['name'];

  $sql = "INSERT INTO `department`(`department_id`, `department_name`) VALUES ('','$name')";
  mysqli_query($conn, $sql);

  echo "<script>
  $(document).ready(function() {
    Swal.fire({
      title: 'บันทึกเรียบร้อย',
      text: 'ข้อมูลถูกบันทึกแล้ว',
      icon: 'success',
      timer: 5000,
      didClose: () => {
        window.location.href = 'edit_gennaral.php';
      }
    });
  });
</script>";
}
