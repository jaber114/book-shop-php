
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css files/prod_search.css">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
</head>
<body>

<?php
include('includes/navbar.php');
require('includes/login_info.php');
require('connection.php');
$book_price="book_price:";
$book_name="book_name:";
$current_user=$fetch_info['name'];
$con=mysqli_connect("localhost","root","","final_project");
$flag;
if(!$con)
{
    echo "failed to connect to database";
}
    $res=$_POST['search'];
    if($res)
    {
        $row="SELECT * FROM books WHERE book_name='$res'";  
        $result=mysqli_query($con,$row);
        if(mysqli_num_rows($result) > 0)
        {
            while($rows=mysqli_fetch_array($result))
            {
                $cat=$rows["book_cat"];
               

               echo "<div class='container-fluid' style=margin:right;>";
               echo   '<div class="card mx-auto col-md-3 col-10 mt-5"> <img class="mx-auto img-thumbnail" src="books_images/'.$rows['book_cat'].'/'. $rows["book_image"].'"width="auto" height="auto"/>';
             
               echo   '<div class="card-body text-center mx-auto">';
               echo  "<div class='cvp'>";
               echo    '<h5 class="card-title font-weight-bold">';
               echo $book_name.= $rows['book_name'];
               echo '</h5>';
               echo   '<p class="card-text">';
                   echo $book_price.=$rows["book_price"].='₪';
               echo '</p>';
               echo '<a " style="color:white; background-color:orange; width:50px;" href="book_detail.php?book_id='. $rows['book_isbn'].'" ">view details</a>';
              echo "<br /> ";
             
               echo   "</div>";
               echo   "</div>";
               echo  "</div>";
               echo "</div>";
            }
            
            $user_query="SELECT * FROM usertable where name='$current_user'";
            $q=mysqli_query($con,$user_query);
            while($results=mysqli_fetch_array($q))
            {
               if($results["group_joining"]=="yes")
               {
                    $sql="INSERT INTO search_results(book_name,user_name) VALUES
                ('$res','$current_user')
                ";
                $query=mysqli_query($con,$sql);
               }
            }
            $delete_query="WITH CTE AS (
                SELECT 
                    book_name, 
                    user_name,
                    ROW_NUMBER() OVER (
                        PARTITION BY 
                        book_name, 
                        user_name,
                        ORDER BY 
                        book_name, 
                        user_name,
                    ) row_num
                 FROM 
                    search_results
            )
            DELETE FROM CTE
            WHERE row_num > 1";
            $res1=mysqli_query($con,$delete_query);
            if($res1)
            {
                echo "yes";
            }
            else
            {
                echo "no";
            }
            include('match_search.php');
        }
        else
        {
            echo '<center>';
            echo "<h1>nothing found like this</h1>";
            echo $res;
            echo '</center>';
        }
    }
    else
    {
        echo '<center>';
        echo "write something to search";
        echo '</center>';
    }
?> 

  
</body>
</html>
<?php
include('includes/footer.php'); 
    mysqli_close($con);
?>
