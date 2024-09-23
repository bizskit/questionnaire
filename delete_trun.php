<!-- Sweetalert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js "></script>
<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css " rel="stylesheet">
<?php
include 'conn.php';

// $tb = $_GET['tb'];
// $tb2 = $_GET['tb2'];
// $location = $_GET['location'];

if (isset($_GET['tb']) && $_GET['tb'] == 'response' && isset($_GET['tb2']) && $_GET['tb2'] == 'headtopicresponses') {

  $tb = $_GET['tb'];
  $tb2 = $_GET['tb2'];
  $location = $_GET['location'];

  try {
    $sql = "TRUNCATE TABLE `$tb` ";
    $sql2 = "TRUNCATE TABLE `$tb2` ";
    $query_result = mysqli_query($conn, $sql);
    $query_result2 = mysqli_query($conn, $sql2);

    if ($query_result === TRUE && $query_result2 === TRUE) {
      echo "<script>
    $(document).ready(function() {
      Swal.fire({
        title: 'ลบข้อมูลเรียบร้อย',
        text: 'ข้อมูลมีการแก้ไขถูกบันทึกแล้ว',
        icon: 'success',
        timer: 10000,
        didClose: () => {
          window.location.href = '$location';
        }
      });
    });
    </script>";
    }
  } catch (mysqli_sql_exception $e) {
    $error = $e->getMessage();
    if (strpos($error, 'Cannot delete or update a parent row: a foreign key constraint fails') !== false) {
      echo "<script>
    $(document).ready(function() {
      Swal.fire({
        title: 'เกิดข้อผิดพลาด',
        text: 'ไม่สามารถลบข้อมูลได้ เนื่องจากข้อมูลนี้ถูกใช้งานอยู่',
        icon: 'error',
        timer: 10000,
        didClose: () => {
          window.location.href = '$location';
        }
      });
    });
    </script>";
    } else {
      echo "<script>
    $(document).ready(function() {
      Swal.fire({
        title: 'เกิดข้อผิดพลาด',
        text: '$error',
        icon: 'error',
        timer: 10000,
        didClose: () => {
          window.location.href = '$location';
        }
      });
    });
    </script>";
    }
  }
}

if (isset($_GET['tb']) && $_GET['tb'] == 'users') {

  $tb = $_GET['tb'];
  $location = $_GET['location'];

  try {
    $sql = "DELETE FROM `$tb` WHERE `role` != 1";
    $query_result = mysqli_query($conn, $sql);

    echo "<script>
    $(document).ready(function() {
      Swal.fire({
        title: 'ลบข้อมูลเรียบร้อย',
        text: 'ข้อมูลมีการแก้ไขถูกบันทึกแล้ว',
        icon: 'success',
        timer: 10000,
        didClose: () => {
          window.location.href = '$location';
        }
      });
    });
    </script>";
  } catch (mysqli_sql_exception $e) {
    $error = $e->getMessage();
    if (strpos($error, 'Cannot delete or update a parent row: a foreign key constraint fails') !== false) {
      echo "<script>
    $(document).ready(function() {
      Swal.fire({
        title: 'เกิดข้อผิดพลาด',
        text: 'ไม่สามารถลบข้อมูลได้ เนื่องจากข้อมูลนี้ถูกใช้งานอยู่',
        icon: 'error',
        timer: 10000,
        didClose: () => {
          window.location.href = '$location';
        }
      });
    });
    </script>";
    } else {
      echo "<script>
    $(document).ready(function() {
      Swal.fire({
        title: 'เกิดข้อผิดพลาด',
        text: '$error',
        icon: 'error',
        timer: 10000,
        didClose: () => {
          window.location.href = '$location';
        }
      });
    });
    </script>";
    }
  }
}

?>