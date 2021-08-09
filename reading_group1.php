<?php
include('connection.php');
include('includes/navbar.php');
include('includes/login_info.php');
$current_user=$fetch_info['name'];
$arr=array();
$i=0;
$query="SELECT * FROM books";
$sql=mysqli_query($con,$query);
while($row=mysqli_fetch_array($sql))
{
    $arr[$i++]=$row['book_name'];
}
$check="SELECT * FROM usertable Where name='$current_user'";
$sql1=mysqli_query($con,$check);
while($row1=mysqli_fetch_array($sql1))
{
    if($row1['group_joining']=="yes")
    {
        $temp="SELECT * FROM search_results Where user_name='$current_user'";
        $sql2=mysqli_query($con,$temp);
        while($row2=mysqli_fetch_array($sql2))
        {
            //  echo $row2['book_name'].='<br>';
        }
    }
}

// $select=
// "SELECT user_name, book_name
// FROM search_results
// INNER JOIN(
// SELECT book_name
// FROM item
// GROUP BY book_name
// HAVING COUNT(user_name) >1
// )temp ON search_results.book_name= temp.book_name";
$arr1=array();
$j=0;
$select="SELECT book_name,user_name from search_results group by book_name having count(book_name)>1";
// $select="SELECT book_name COUNT(book_name) FROM search_results GROUP BY book_name HAVING COUNT(book_name) > 1";
$sql3=mysqli_query($con,$select);
while($row3=mysqli_fetch_array($sql3))
{
    echo $row3['book_name'];
    $query="SELECT * FROM search_results Where s"
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>