<!-- Sweetalert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js "></script>
<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css " rel="stylesheet">

<?php 
include 'conn.php';

if (isset($_POST['edit_department'])) {

  $id_eduedit = $_POST['id_departmentedit'];
  $edu_name_edit = $_POST['department_name_edit'];

  $sql_edit = "UPDATE `department` SET `department_name` = '$edu_name_edit' WHERE `department_id` = '$id_eduedit'";
  mysqli_query($conn, $sql_edit);
  echo "<script>
  $(document).ready(function() {
    Swal.fire({
      title: 'บันทึกเรียบร้อย',
      text: 'ข้อมูลการแก้ไขถูกบันทึกแล้ว',
      icon: 'success',
      timer: 5000,
      didClose: () => {
        window.location.href = 'edit_gennaral.php';
      }
    });
  });
</script>";
}

if (isset($_POST['edit_genneration'])) {

  $id = $_POST['data_id_edit'];
  $name_edit = $_POST['data_name_edit'];

  $sql_edit = "UPDATE `genneration` SET `genneration_name` = '$name_edit' WHERE `genneration_id` = '$id'";
  mysqli_query($conn, $sql_edit);
  echo "<script>
  $(document).ready(function() {
    Swal.fire({
      title: 'บันทึกเรียบร้อย',
      text: 'ข้อมูลการแก้ไขถูกบันทึกแล้ว',
      icon: 'success',
      timer: 5000,
      didClose: () => {
        window.location.href = 'edit_gennaral.php';
      }
    });
  });
</script>";
}

if (isset($_POST['edit_number_year_work'])) {

  $id = $_POST['data_id_num_edit'];
  $name_edit = $_POST['data_name_num_edit'];

  $sql_edit = "UPDATE `number_year_work` SET `number_year_work_name` = '$name_edit' WHERE `number_year_work_id` = '$id'";
  mysqli_query($conn, $sql_edit);
  echo "<script>
  $(document).ready(function() {
    Swal.fire({
      title: 'บันทึกเรียบร้อย',
      text: 'ข้อมูลการแก้ไขถูกบันทึกแล้ว',
      icon: 'success',
      timer: 5000,
      didClose: () => {
        window.location.href = 'edit_gennaral.php';
      }
    });
  });
</script>";
}
?>