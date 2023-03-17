<?php
include 'connect.php';
  $stmt = $conn -> prepare("SELECT * FROM ex222");
  $stmt -> execute();
  $rows =  $stmt -> fetchAll(PDO::FETCH_ASSOC);


  function get_data($col){
    global $conn;
    $stmt = $conn -> prepare("SELECT DISTINCT $col FROM ex222;");
    $stmt -> execute();
    $rows =  $stmt -> fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="jquery.js"></script>
  <style>
    table{
      width: 100%;
      text-align: center;
      /* border: 1px solid black ; */
    }
    tr td {
      border: 1px solid black ;
    }

  </style>
  <title>Document</title>
</head>
<body>
  <h1><center>Students Exams</center></h1>

    <table>
      <thead>
        <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Course</th>
        <th>Section</th>
        <th>Room</th>
        <th>Seat</th>
        <th>Note</th>
        <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <form action="search.php" method="POST">
              <td><input type="text" id="id" name = "id"></td>
              <td><input type="text" id="email" name = "email"></td>
              <td>
                <select name="course" id="course">
                  <?php
                  echo "<option>". "------" ."</option>";
                    foreach(get_data("course") as $r){
                      echo "<option>". $r['course'] ."</option>";
                    }
                  ?>
                </select>
              </td>
              <td>
              <select name="sec" id="section">
                  <?php
                      echo "<option>". "------" ."</option>";
                    foreach(get_data("sec") as $r){
                      echo "<option>". $r['sec'] ."</option>";
                    }
                  ?>
                </select>
              </td>
              <td>
              <select name="room" id="room">
                  <?php
                  echo "<option>". "------" ."</option>";
                    foreach(get_data("room") as $r){
                      echo "<option>". $r['room'] ."</option>";
                    }
                  ?>
                </select>
              </td>
              <td>
              <select name="seat" id="seat">
                  <?php
                  echo "<option>". "------" ."</option>";
                    foreach(get_data("seat") as $r){
                      echo "<option>". $r['seat'] ."</option>";
                    }
                  ?>
                </select>
              </td>
              <td><input type="text" id="note" name = "note"></td>
              <td><input type="text" id="date" name = "date"></td>
              <input type="submit" value="go">
            </form>
        </tr>
      </tbody>
    </table>




  <div id="data">
    <table>
      <thead> 
        <tr>
          <th>ID</th>
          <th>Email</th>
          <th>Course</th>
          <th>Section</th>
          <th>Room</th>
          <th>Seat</th>
          <th>Note</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach($rows as $r){ ?>
            <tr class="data">
              <td><?= $r['id']?></td>
              <td><?= $r['email']?></td>
              <td><?= $r['course']?></td>
              <td><?= $r['sec']?></td>
              <td><?= $r['room']?></td>
              <td><?= $r['seat']?></td>
              <td><?= $r['note']?></td>
              <td><?= $r['date']?></td>
            </tr> <?php
          }
        ?>
      </tbody>
    </table>
  </div>

<script src="script.js"></script>
</body>
</html>