<?php

require_once('./dbconnect.php');
$db = new DBConnect();
$conn=$db->connect();
$result = mysqli_query($conn,"SELECT * FROM massage");
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>".
            "<td>".$row['student_num']."</td>".
            "<td>".$row['reason']."</td>".
            "<td>".$row['place']."</td>".
             "<td>".$row['gone_time']."</td>".
             "<td>".$row['other']."</td>".
          "</tr>"
    ;
}
?>
