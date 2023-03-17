<?php

include 'connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  function func($e){
    if($e !== '------'){
      return $e;
    }
  }
  $sql = "SELECT * FROM ex222";
  $filtered = array_filter($_POST, "func");


  if (count($filtered)) { // not empty
    $sql .= " WHERE";
    $keynames = array_keys($filtered); // make array of key names from $filtered
    $i = 0;
    foreach($filtered as $key => $value){
      $sql .= " `$keynames[$i]` = '$value'";  // $filtered keyname = $filtered['keyname'] value
      $i++;
      if (count($filtered) > 1 && (count($filtered) > $i)) { // more than one search filter, and not the last
        $sql .= " AND";
     }
    }
  }

  $sql .= ";"; 
  

  $stmt = $conn -> prepare($sql);
  $stmt -> execute();
  $rows = $stmt -> fetchAll(PDO::FETCH_ASSOC);
  $output ='
    <table>
      <thead>
        <tr class="data">
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
      <tbody>';
  foreach($rows as $r){ 
    $output .= "<tr>
      <td>". $r['id'] ."</td>
      <td>". $r['email'] ."</td>
      <td>". $r['course'] ."</td>
      <td>". $r['sec'] ."</td>
      <td>". $r['room'] ."</td>
      <td>". $r['seat'] ."</td>
      <td>". $r['note'] ."</td>
      <td>". $r['date'] ."</td>
    </tr>"; 
  }
  $output .= '
      </tbody>
    </table>';

echo $output;
}