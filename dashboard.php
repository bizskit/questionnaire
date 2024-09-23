<?php
session_start();
// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่และค่าของ idcard เป็น 'adminedit' หรือไม่
if (!isset($_SESSION['idcard']) || $_SESSION['idcard'] !== 'adminedit') {
  // หากเงื่อนไขไม่เป็นจริง ให้ทำการเปลี่ยนเส้นทางไปยังหน้าเข้าสู่ระบบหรือหน้าอื่นๆ
  $_SESSION['msg'] = "กรุณาเข้าสู่ระบบหรือไม่มีสิทธิ์เข้าถึงหน้าเพจนี้";
  header("location:register_users.php");
  exit(); // ป้องกันการดำเนินการต่อหลังจากการเปลี่ยนเส้นทาง
}

include 'conn.php';

$sections = [];
$section_query = "SELECT sections_id, section_name FROM section";
$section_result = mysqli_query($conn, $section_query);
if ($section_result->num_rows > 0) {
  while ($row = $section_result->fetch_assoc()) {
    $sections[$row["sections_id"]] = $row["section_name"];
  }
}

// Query เพื่อดึงข้อมูลการตอบแบบสอบถามและตัวเลือกที่เลือก
$sql = "SELECT
            u.id_card,
            u.firstname,
            u.lastname,
            q.section_id,
            c.choice_text,
            t.title_name
        FROM users u
        JOIN response r ON u.id_card = r.id_card
        JOIN question q ON r.question_id = q.question_id
        JOIN choice c ON r.choice_id = c.choice_id
        JOIN title t ON t.title_id = u.title_id";

$result = mysqli_query($conn, $sql);

$user_scores = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $user_id = $row["id_card"];
    $full_name = $row["title_name"] . $row["firstname"] . ' ' . $row["lastname"];
    $section_id = $row["section_id"];
    $choice_text = $row["choice_text"];

    // กำหนดคะแนนตาม choice_text
    $score = 0;
    if (strpos($choice_text, '1.') === 0) {
      $score = 0;
    } elseif (strpos($choice_text, '2.') === 0) {
      $score = 25;
    } elseif (strpos($choice_text, '3.') === 0) {
      $score = 50;
    } elseif (strpos($choice_text, '4.') === 0) {
      $score = 75;
    } elseif (strpos($choice_text, '5.') === 0) {
      $score = 100;
    }

    // บันทึกคะแนนในแต่ละหัวข้อ
    if (!isset($user_scores[$user_id])) {
      $user_scores[$user_id] = [
        "full_name" => $full_name,
        "total_score" => 0,
        "count" => 0
      ];
      foreach ($sections as $section_name) {
        $user_scores[$user_id][$section_name] = ["score" => 0, "count" => 0];
      }
    }

    // เพิ่มคะแนนในหัวข้อที่เหมาะสม
    if (isset($sections[$section_id])) {
      $section_name = $sections[$section_id];
      $user_scores[$user_id][$section_name]["score"] += $score;
      $user_scores[$user_id][$section_name]["count"] += 1;
    }
    $user_scores[$user_id]["total_score"] += $score;
    $user_scores[$user_id]["count"] += 1;
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- SheetJS (xlsx) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

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


  <title>สรุปผลความผาสุขขององค์กร</title>

  <link rel="icon" type="image/png" href="./favicon-32x32.png">
</head>
<style>
  body {
    font-family: 'Noto Sans Thai', sans-serif;
  }

  canvas {
    max-width: 100%;
    max-height: 100%;
  }

  /* ปรับแต่งให้ส่วนหัวของตารางติดคงที่ */
  table thead th {
    position: sticky;
    top: 0;
    background-color: white;
    /* หรือกำหนดสีพื้นหลังอื่นๆ ตามที่ต้องการ */
    z-index: 2;
    /* เพิ่มค่า z-index เพื่อให้ส่วนหัวอยู่ด้านหน้าของส่วนอื่นๆ */
    box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
    /* เพิ่มเงาเพื่อให้ดูมีมิติ */
  }
</style>

<body class=" sidebar-closed sidebar-collapse">
  <?php include 'navbar.php'; ?>

  <div class="container mt-4 ">
    <div class="row g-2">

      <div class="col-6  border shadow" style="border-radius: 25px;">
        <h3 class="text-center mt-2">วิเคราะห์ผลการประเมินในภาพรวมของหน่วยงาน</h3>
        <canvas style="height: 460px;" id="BarAvgSection"></canvas>
      </div>

      <div class="col-6 col-md-5 border shadow ml-4" style="border-radius: 25px;">
        <h3 class="text-center mt-2">การประเมินรายบุคคลกับระดับความสุข</h3>
        <canvas style="height: 150px; width: 150px;" id="PieAmountPeople"></canvas>
      </div>

    </div>
  </div>

  <div class="row m-4 d-flex justify-content-center">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-center">
          <h3 class="card-title">วิเคราะห์ผลการประเมินรายบุคคล</h3>
          <div class="card-tools">
            <div class="input-group input-group-sm ml-2" style="width: 150px;">
              <input type="text" id="table_search" name="table_search" class="form-control float-right" placeholder="Search">
            </div>

          </div>

        </div>

        <div class="card-body table-responsive p-0">
          <div style="height: 400px; overflow-y: auto;">

            <table class="table table-hover text-nowrap" id="tableexcel">
              <thead>
                <tr>
                  <th>ชื่อ-สกุล</th>
                  <?php foreach ($sections as $section_name) {
                    echo "<th>$section_name</th>";
                  } ?>
                  <th>คะแนนเฉลี่ยรายบุคคล</th>
                </tr>
              </thead>
              <tbody id="user_table">
                <?php
                // คำนวณคะแนนเฉลี่ยของแต่ละหัวข้อ
                $section_totals = array();
                $section_counts = array();
                $overall_totals = 0;
                $overall_counts = 0;

                foreach ($user_scores as $user_id => $scores) {
                  foreach ($sections as $section_name) {
                    if (!isset($section_totals[$section_name])) {
                      $section_totals[$section_name] = 0;
                      $section_counts[$section_name] = 0;
                    }
                    $section_totals[$section_name] += $scores[$section_name]["score"];
                    $section_counts[$section_name] += $scores[$section_name]["count"];
                    // คำนวณคะแนนรวมสำหรับแต่ละผู้ใช้
                    $overall_totals += $scores[$section_name]["score"];
                    $overall_counts += $scores[$section_name]["count"];
                  }
                }

                foreach ($user_scores as $user_id => $scores) {
                  // กำหนดตัวแปรสำหรับคะแนนรวมและจำนวนที่ใช้คำนวณคะแนนเฉลี่ย
                  $total_score = 0;
                  $total_count = 0;

                  foreach ($sections as $section_name) {
                    $total_score += $scores[$section_name]["score"];
                    $total_count += $scores[$section_name]["count"];
                  }

                  $average_score = $total_count ? number_format($total_score / $total_count, 2) : 0;
                ?>
                  <tr>
                    <td><?= $scores['full_name'] ?></td>
                    <?php foreach ($sections as $section_name) {
                      $average_section_score = $scores[$section_name]["count"] ? number_format($scores[$section_name]["score"] / $scores[$section_name]["count"], 2) : 0;
                      $color = $average_section_score < 50.00 ? 'red' : 'black'; ?>
                      <td class="text-center" style='color: <?= $color ?>;'><?= number_format($average_section_score, 2) ?></td>
                    <?php } ?>
                    <?php
                    $color = $average_score < 50.00 ? 'red' : 'black'; // กำหนดสีสำหรับคะแนนเฉลี่ยรวม
                    ?>
                    <td class="text-center" style='color: <?= $color ?>;'><strong><?= number_format($average_score, 2) ?></strong></td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>คะแนนเฉลี่ยหัวข้อ</th>
                  <?php foreach ($sections as $section_name) {
                    $average_section_score = $section_counts[$section_name] ? number_format($section_totals[$section_name] / $section_counts[$section_name], 2) : 0;
                    $color = $average_section_score < 50.00 ? 'red' : 'black'; ?>
                    <th class="text-center" style='color: <?= $color ?>;'><?= number_format($average_section_score, 2) ?></th>
                  <?php } ?>
                  <th class="text-center"><?= number_format($overall_counts ? $overall_totals / $overall_counts : 0, 2) ?></th>
                </tr>
              </tfoot>
            </table>

          </div>
        </div>
        <div class="card-footer d-flex justify-content-start align-items-center">
          <button onclick="exportTableToExcel('tableexcel', 'คะแนนเฉลี่ยรายบุคคล')" class="btn btn-success">Excel</button>
          <?php $sql_count = "SELECT COUNT(*) AS count FROM `headtopicresponses`";
          $rs = mysqli_query($conn, $sql_count);
          $count = mysqli_fetch_assoc($rs);
          ?>
          <h5 class="mb-0">&nbsp;&nbsp;&nbsp;&nbsp;จำนวนผู้เข้าทำแบบทดสอบ : <?php echo $count['count']; ?></h5>
        </div>
      </div>

    </div>
  </div>

  <div class="container mb-3">
    <div class="row ">
      <div class="col border mr-3 shadow" style="border-radius: 25px;">
        <canvas style="height: 300px; width: 300px;" id="PieEducation"></canvas>
      </div>
      <div class="col border mr-3 shadow" style="border-radius: 25px;">
        <canvas style="height: 300px; width: 300px;" id="PieGen"></canvas>
      </div>
      <div class="col border shadow" style="border-radius: 25px;">
        <canvas style="height: 300px; width: 300px;" id="PiePosition"></canvas>
      </div>
    </div>
  </div>

  <div class="container mb-4 ">
    <div class="row ">
      <div class="col border mr-3 shadow" style="border-radius: 25px;">
        <canvas style="height: 300px; width: 300px;" id="PieWorkType"></canvas>
      </div>
      <div class="col  border shadow" style="border-radius: 25px;">
        <canvas style="height: 300px; width: 300px;" id="PieNumYear"></canvas>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $("#table_search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#user_table tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>

  <script>
    function exportTableToExcel(tableID, filename = '') {
      var table = document.getElementById(tableID);
      var wb = XLSX.utils.table_to_book(table, {
        sheet: "Sheet1"
      });
      var wbout = XLSX.write(wb, {
        bookType: 'xlsx',
        type: 'binary'
      });

      function s2ab(s) {
        var buf = new ArrayBuffer(s.length);
        var view = new Uint8Array(buf);
        for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
        return buf;
      }
      saveAs(new Blob([s2ab(wbout)], {
        type: "application/octet-stream"
      }), filename + ".xlsx");
    }
  </script>

  <!-- FileSaver.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

  <script src="chart_bar.js"></script>
  <script src="chart_pie_people.js"></script>
  <script src="chart_pie_edu.js"></script>
  <script src="chart_pie_gen.js"></script>
  <script src="chart_pie_posi.js"></script>
  <script src="chart_pie_wt.js"></script>
  <script src="chart_pie_ny.js"></script>
  <script src="format.js"></script>

</body>

</html>