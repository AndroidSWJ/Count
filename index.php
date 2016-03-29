<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>R4班离校情况统计</title>
    <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>

<div class="float_clear">
    <div class="float_left">
        <table border="1" cellspacing="0" cellpadding="5">
            <tr>
                <th colspan="5">数学与信息学院 软件学院离校情况统计表</th>
            </tr>
            <tr>
                <th>学号</th>
                <th>离校原因</th>
                <th>离校去向</th>
                <th>离校时间</th>
                <th>备注</th>
            </tr>
            <?php
            require_once('./dbconnect.php');
            $conn=DBConnect::get_instance()->connect();
            $result = mysqli_query($conn,"SELECT * FROM massage");
            while ($row = mysqli_fetch_array($result)) {

                //格式化离校时间
                if($row["gone_time"]!=null){
                $gone_date=strtotime($row["gone_time"]);
                $gone_time = date("n",$gone_date).".".date("j",$gone_date);
                }
                else{
                    $gone_time=null;
                }

                //格式化回校时间
                if($row["back_time"]!=null){
                    $back_date=strtotime($row["back_time"]);
                    $back_time = date("n",$back_date).".".date("j",$back_date);
                }
                else{
                    $back_time=null;
                }

                echo "<tr>".
                    "<td>".$row['student_num']."</td>".
                    "<td>".$row['reason']."</td>".
                    "<td>".$row['place']."</td>".
                    "<td>".$gone_time."-".$back_time."</td>".
                    "<td>".$row['other']."</td>".
                    "</tr>"
                ;
            }
            mysqli_close($conn);
            ?>
        </table>
    </div>
    <div class="float_left">
        <p><b>提交我的情况</b></p>
        <form action="insert.php" method="post">
            <table border="0">
                <tr>
                    <td class="col-1">学号</td>
                    <td class="col-2"><input type="text" name="student_num"></td>
                </tr>
                <tr>
                    <td>离校去向</td>
                    <td><input type="text" name="place" ></td>
                </tr>
                <tr>
                    <td>离校时间</td>
                    <td><input type="text" name="gone_time" ></td>
                </tr>
                <tr>
                    <td>返校时间</td>
                    <td><input type="text" name="back_time" ></td>
                </tr>
                <tr>
                    <td>离校原因</td>
                </tr>
                <tr>
                    <td colspan="2"><textarea name="reason"></textarea></td>
                </tr>
                <tr>
                    <td>备注</td>
                </tr>
                <tr>
                    <td colspan="2"><textarea name="other"></textarea></td>
                </tr>
                <tr>
                    <td class="col-1"><input type="submit"></td>
                </tr>
            </table>

        </form>
    </div>
</div>
</body>
</html>