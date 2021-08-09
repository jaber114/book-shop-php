<?php
$con = mysqli_connect('localhost', 'root', '', 'old_scroll');
if ($con -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
$sql="SELECT * from employees";
$result=mysqli_query($con,$sql);
$arr=array();
while($row=mysqli_fetch_assoc($result))
{
    $arr[]=$row;
}
echo json_encode($arr);
?>