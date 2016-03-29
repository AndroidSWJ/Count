<?php
/**
 * Created by PhpStorm.
 * User: SWJ
 * Date: 2016/3/21
 * Time: 18:24
 */
require_once ("./dbconnect.php");
$conn=DBConnect::get_instance()->connect();
$sql="select *from massage where reason is not null and not reason ='';";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
    $back_date=strtotime($row['back_time']);
    $student_num=$row['student_num'];
    if ((date("y") >= date("y", $back_date)) &&
        (date("n") >= date("n", $back_date)) &&
        (date("j") >= date("j", $back_date))
    ) {
        $sql_update = "update massage set reason=NULL,place=NULL,other=NULL,gone_time=NULL,back_time=NULL where student_num=$student_num;";
        mysqli_query($conn,$sql_update);
    }
}


