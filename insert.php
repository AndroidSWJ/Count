<?php
/**
 * Created by PhpStorm.
 * User: SWJ
 * Date: 2016/3/21
 * Time: 13:20
 */
require_once('./dbconnect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = DBConnect::get_instance()->connect();
    $reason = $_POST["reason"];
    $place = $_POST["place"];
    $gone_time = $_POST["gone_time"];
    $back_time = $_POST["back_time"];
    $other = $_POST["other"];
    $student_num = $_POST["student_num"];

    if($reason==null&&$place==null&&$gone_time==null&&$back_time==null){
        echo "删除记录成功";
        mysqli_query($conn,"update massage set reason=NULL,place=NULL,other=NULL,gone_time=NULL,back_time=NULL where student_num=$student_num;");
        return;
    }

    if($reason==null||$place==null||$gone_time==null||$back_time==null||$student_num==null){
        echo "请填写完整";
        mysqli_close($conn);
        return;
    }

    $sql = "update massage set gone_time='$gone_time' where student_num='$student_num';";

    if (!mysqli_query($conn, $sql)){
        echo "可能提交失败了，日期请按\"2016.1.1\"格式输入，请检查";
        mysqli_close($conn);
        return;
    };

    $sql = "update massage set back_time='$back_time' where student_num='$student_num';";

    if (!mysqli_query($conn, $sql)){
        echo "可能提交失败了，日期请按\"2016.1.1\"格式输入，请检查";
        mysqli_close($conn);
        return;
    };

    $sql = "update massage set
            reason='$reason',
            place='$place',
            other='$other'
            where student_num='$student_num'
            ;";

    if (mysqli_query($conn, $sql)) {
        echo "可能提交成功了";
    } else {
        echo "可能部分提交失败了，请检查";
    };

    mysqli_close($conn);
}
