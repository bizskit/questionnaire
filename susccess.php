<?php
//บังคับให้ต้อง login ก่อนถึงจะเข้าหน้าเพจนี้ได้
session_start();
if (!isset($_SESSION['idcard'])) {
  // $_SESSION['msg'] = "กรุณาเข้าสู่ระบบ";
  header("location:register_users.php");
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

  <script>
    window.history.pushState(null, "", window.location.href);
    window.onpopstate = function() {
      window.history.pushState(null, "", window.location.href);
      window.location.href = "index.php";
    };
  </script>

  <title>สรุปผลการทำแบบทดสอบ</title>

  <link rel="icon" type="image/png" href="./favicon-32x32.png">
</head>
<style>
  body {
    font-family: 'Noto Sans Thai', sans-serif;
  }

  /* iPhone SE */
  @media only screen and (max-width: 375px) {
    .container {
      padding: 5px;
      margin: 0;
      width: 100%;
    }

    .alert {
      padding: 10px;
      font-size: 14px;
    }

    .h4 {
      font-size: 1.25rem;
    }

    .btn-secondary,
    .btn-success,
    .btn-warning,
    .btn-danger {
      font-size: 12px;
      padding: 6px;
      border-radius: 8px;
    }

    .h1,
    .h2 {
      font-size: 1.25rem;
    }

    .fa-face-frown,
    .fa-face-meh,
    .fa-face-smile,
    .fa-face-laugh-beam {
      font-size: 5em;
    }

    /* Adjust spacing */
    .mb-2,
    .mb-4,
    .mt-2,
    .mt-4 {
      margin-bottom: 10px;
      margin-top: 10px;
    }

    .text-center {
      text-align: center;
    }

    .row {
      margin-right: 0;
      margin-left: 0;
    }

    .col-sm-9,
    .col-8,
    .col-sm-6 {
      padding-right: 0;
      padding-left: 0;
    }
  }


  /* iPhone 11 Pro Max */
  @media only screen and (max-width: 414px) {
    .container {
      padding: 15px;
    }

    .btn-secondary,
    .btn-success,
    .btn-warning,
    .btn-danger {
      font-size: 16px;
      padding: 10px;
    }

    .h1,
    .h2 {
      font-size: 1.75rem;
    }

    .fa-face-frown,
    .fa-face-meh,
    .fa-face-smile,
    .fa-face-laugh-beam {
      font-size: 7em;
    }
  }

  /* Galaxy S20 */
  @media only screen and (max-width: 412px) {
    .container {
      padding: 10px;
    }

    .btn-secondary,
    .btn-success,
    .btn-warning,
    .btn-danger {
      font-size: 14px;
      padding: 8px;
    }

    .h1,
    .h2 {
      font-size: 1.5rem;
    }

    .fa-face-frown,
    .fa-face-meh,
    .fa-face-smile,
    .fa-face-laugh-beam {
      font-size: 6em;
    }
  }

  /* Galaxy S20+ */
  @media only screen and (max-width: 450px) {
    .container {
      padding: 15px;
    }

    .btn-secondary,
    .btn-success,
    .btn-warning,
    .btn-danger {
      font-size: 16px;
      padding: 10px;
    }

    .h1,
    .h2 {
      font-size: 1.75rem;
    }

    .fa-face-frown,
    .fa-face-meh,
    .fa-face-smile,
    .fa-face-laugh-beam {
      font-size: 7em;
    }
  }
</style>

<body>
  <div class="container border shadow-sm mr-5 ml-5 mb-5">

    <div class="alert text-center mt-2 border" role="alert">
      <p class="h4">แบบสำรวจความสุขด้วยตนเอง : HAPPINOMETER</p>
      <p class="h4">บุคลากร รพ.ค่ายวีรวัฒน์โยธิน</p>
      <p class="h4">ปีงบประมาณ <?php echo date("Y") + 543; ?></p>
    </div>

    <div class="alert mt-2 pb-0 border" role="alert">
      <p>
        <strong>BMI : </strong>
        คือค่าดัชนีที่ใช้ชี้วัดความสมดุลของน้ำหนักตัว (กิโลกรัม) และส่วนสูง (เซนติเมตร) ซึ่งสามารถระบุได้ว่า ตอนนี้รูปร่างของคนคนนั้นอยู่ในระดับใด ตั้งแต่อ้วนมากไปจนถึงผอมเกินไป
      </p>
      <p>
        <strong>ภาวะลงพุง : </strong>
        ผู้ที่มีเส้นรอบเอวเกินกว่าค่ามาตรฐาน กล่าวคือ หากผู้ชาย มีเส้นรอบเอวตั้งแต่ 90 เซนติเมตรขึ้นไป และผู้หญิง มีเส้นรอบเอวตั้งแต่ 80 เซนติเมตรขึ้นไป
      </p>
    </div>

    <div class="mb-5 mt-4 text-center bmi-c">

      <?php
      $weight = $_SESSION['weight'];
      $height = $_SESSION['height'] / 100;
      $waistline = $_SESSION['waistline'];

      $BMI = $weight / ($height * $height);

      if ($BMI < 18.5) {
        echo '<h1>ดัชนีมวลกาย (BMI) : <span class="btn-secondary p-2" style="border-radius: 10px;">น้ำหนักต่ำกว่าเกณฑ์</span></h1>';
      } elseif ($BMI >= 18.6 && $BMI <= 22.9) {
        echo '<h1>ดัชนีมวลกาย (BMI) : <span class="btn-success p-2" style="border-radius: 10px;">น้ำหนักสมส่วน</span></h1>';
      } elseif ($BMI >= 23.0 && $BMI <= 24.9) {
        echo '<h1>ดัชนีมวลกาย (BMI) : <span class="btn-warning p-2" style="border-radius: 10px;">น้ำหนักเกินมาตรฐาน</span></h1>';
      } elseif ($BMI >= 25.0 && $BMI <= 29.9) {
        echo '<h1>ดัชนีมวลกาย (BMI) : <span class="btn-warning p-2" style="border-radius: 10px;">น้ำหนักอยู่ในเกณฑ์อ้วน</span></h1>';
      } elseif ($BMI > 30.0) {
        echo '<h1>ดัชนีมวลกาย (BMI) : <span class="btn-danger p-2" style="border-radius: 10px;">น้ำหนักอยู่ในเกณฑ์อ้วนมาก</span></h1>';
      }
      ?>
    </div>

    <div class=" mb-4 text-center">
      <?php
      if ($waistline >= 90 && $_SESSION['sex'] == 'ชาย') {
        echo '<h1>ภาวะลงพุง : <span class="btn-warning p-2 "style="border-radius: 10px;">ลงพุง(ชาย)</span></h1>';
      } elseif ($waistline >= 80 && $_SESSION['sex'] == 'หญิง') {
        echo '<h1>ภาวะลงพุง : <span class="btn-warning p-2 "style="border-radius: 10px;">ลงพุง(หญิง)</span></h1>';
      } else {
        echo '<h1>ภาวะลงพุง : <span class="btn-success p-2 "style="border-radius: 10px;">ไม่มีภาวะลงพุง<span></h1>';
      }
      ?>
    </div>

    <div class="text-center">
      <?php
      $id_card =   $_SESSION['idcard'];
      $sql_respons_and_choice = "SELECT r.id_card, r.choice_id, c.choice_text FROM response AS r JOIN choice AS c ON r.choice_id = c.choice_id WHERE id_card = '$id_card'";
      $rs_respons_and_choice = mysqli_query($conn, $sql_respons_and_choice);

      $user_scores = [];

      if ($rs_respons_and_choice->num_rows > 0) {
        while ($row = $rs_respons_and_choice->fetch_assoc()) {
          $user_id = $row["id_card"];
          $choice_text = $row["choice_text"];

          // กำหนดคะแนนตามเลขหน้าของ choice_text
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

          // บันทึกคะแนนรวมและจำนวนคำตอบ
          if (!isset($user_scores[$user_id])) {
            $user_scores[$user_id] = ["total_score" => 0, "count" => 0];
          }

          $user_scores[$user_id]["total_score"] += $score;
          $user_scores[$user_id]["count"] += 1;
        }
      }
      ?>

      <?php foreach ($user_scores as $user_id => $data) {
        $total_score = $data["total_score"];
        $count = $data["count"];
        $percentage = ($total_score / ($count * 100)) * 100;

        $status = "";
      ?>

        <div class="row mb-2 d-flex justify-content-center ">
          <div class="col-sm-9">
            <h2>ระดับความสุขของคุณ</h2>
            <div class="row d-flex justify-content-center">
              <div class="col-8 col-sm-6">
                <?php
                if ($percentage <= 24.99) {
                  echo '<h2 class="btn-danger p-2" style="border-radius: 10px;">Very Unhappy</h2>';
                  echo '<i class="fa-solid fa-face-frown" style="font-size: 10em; color: #dc3545;"></i>';
                } elseif ($percentage <= 49.99) {
                  echo '<h2 class="btn-warning p-2" style="border-radius: 10px; background-color: orange;">UnHappy</h2>';
                  echo '<i class="fa-solid fa-face-meh" style="font-size: 10em; color: orange;"></i>';
                } elseif ($percentage <= 74.99) {
                  echo '<h2 class="btn-warning p-2" style="border-radius: 10px;">Happy</h2>';
                  echo '<i class="fa-solid fa-face-smile" style="font-size: 10em; color: #ffc107;"></i>';
                } else {
                  echo '<h2 class="btn-success p-2" style="border-radius: 10px;">Very Happy</h2>';
                  echo '<i class="fa-solid fa-face-laugh-beam" style="font-size: 10em; color: #198754 ;"></i>';
                }
                ?>
                <div class="mt-2">
                  <h1><?= number_format($percentage, 2) ?>%</h1>
                </div>
              </div>

            </div>
          </div>
        </div>

      <?php } ?>

      </table>

    </div>

    <div>

    </div>

  </div>
</body>

<script src="format.js"></script>

</html>