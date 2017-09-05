<?php
  include 'calendar.php';
  $calendar = new Calendar();
  $db = mysql_connect("alenigs.mysql","alenigs_mysql","f-A8QZva");
  mysql_set_charset('utf8',$db);
  mysql_select_db("alenigs_db" ,$db);
  $sql = mysql_query("SELECT * FROM pilvdays" ,$db);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      Календарь
    </title>
    <link rel="stylesheet" href="./css/master.css">
    <style media="screen">

    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h1>
            Pilvilinn's Calendar
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <?php
            echo $calendar->show();
          ?>
          <div class="img-container">
            <a href="http://argemona.ru/pilvilinn"><img src="http://argemona.ru/files/style/site/pilvilinn.png" alt="Пилвилинн" title="Пилвилинн"></a>
          </div>

        </div>
        <div class="col-sm-6">
          <?php
            $today = date("F j");
            echo ("<h2>" . $today . "</h2>");

            while ($tablerows = mysql_fetch_row($sql)) {

              if (file_exists("./days_images/".date("d-m", strtotime($tablerows[2])).".png")) {
                echo "<div class='img-container'>";
                echo "<img src='"."./days_images/".date("d-m", strtotime($tablerows[2])).".png"."' />";
                echo "</div>";
              }
              echo("<h3>" . $tablerows[1] . "</h3>");
              echo($tablerows[3]);
            }
          ?>
        </div>
        <div class="col-sm-3">
          <h2>С Днём Рождения!</h2>
          <div class="img-container">
            <a href="http://argemona.ru"><img src="http://argemona.ru/files/style/site/images/headerDecorSun.png" alt="Аргемона" title="Аргемона"></a>
          </div>
        </div>
      </div>
    </div>

    <?php
      mysql_close($db);
      ?>
  </body>
</html>
