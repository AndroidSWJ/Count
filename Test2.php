<?php
$con=mysqli_connect("127.0.0.1","root","61388","BackCount");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM massage
");

while($row = mysqli_fetch_array($result))
{
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