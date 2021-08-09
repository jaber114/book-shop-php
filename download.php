<?php
include('connection.php');
require('includes/login_info.php');
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$current_user=$fetch_info['name'];
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    echo $id;
    $stat=mysqli_query($con,"SELECT * from books where book_isbn='$id'");
    
    while($row=mysqli_fetch_array($stat))
    {
        if($row['book_cat']=='h_digital_romantic_books' || $row['book_cat']=='E_digital_history_books' || $row['book_cat']=='E_digital_religion_books' || $row['book_cat']=='h_translate_books')
        {
        if(!empty($row['book_pdf']))
        {
            $mpdf->WriteHtml($row['book_pdf']);
            $mpdf->Output($row['book_name'].='.pdf','D');
            
            
            
        }
        else
        {
            echo "srry";
        }
        }
        else
        {
            echo "no";
        }
    }
}

?>
