<?php
include('connection.php');
require('includes/login_info.php');
include('includes/navbar.php');
$current_user=$fetch_info['name'];
$arr1=array();
$j=0;
$arr=array();
$index=0;
$query="SELECT * FROM search_results Where user_name='$current_user'";
$sql=mysqli_query($con,$query);
while($row=mysqli_fetch_array($sql))
{
    $user_book=$row["book_name"];
    $user_name=$row['user_name'];
    $arr1[$j++]=$user_book;
   
    
    
}
$query1="SELECT * FROM search_results Where NOT user_name='$current_user'";
$sql1=mysqli_query($con,$query1);
$count=0;
while($row1=mysqli_fetch_array($sql1))
{
    for($i=0;$i<count($arr1);$i++)
    {
        if($row1["book_name"]==$arr1[$i])
        {
           $arr[$index]=$row1["user_name"];
           $index++;
           
        }
    }
}
for($i=0;$i<count($arr);$i++)
{
    echo $arr[$i].='<br>';
}


// for($i=0;$i<count($arr);$i++)
// {
//     echo $arr[$i];
// }
// if($another_user!=$current_user && $user_book==$same_book)
// {
//     $sql2="SELECT * FROM books WHERE not book_name='$same_book'";
//     $query2=mysqli_query($con,$sql2);
//     while($result=mysqli_fetch_array($query2))
//     {
//         echo $result['book_name'].='</br>';
//     }
// }
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
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<table>
  <tr>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
    <td>Austria</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
  </tr>
</table>
    
</body>
</html>
<?php
include('includes/footer.php');
mysqli_close($con);
?>