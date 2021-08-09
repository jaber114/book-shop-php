<?php
include('includes/navbar.php');
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
<script src="javascript files/cardslider.js"></script>
<link rel="stylesheet" href="css files/cardslider.css">
<style>
      #img
      {
        height: 200px;
        width: 150px;
      }
    </style>
</head>
<body>
<div class="bbb_viewed">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="bbb_main_container">
                    <div class="bbb_viewed_title_container">
                        <center>
                        <h3 class="bbb_viewed_title">religion books</h3>
                       </center> 
                        <div class="bbb_viewed_nav_container">
                            <div class="bbb_viewed_nav bbb_viewed_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="bbb_viewed_nav bbb_viewed_next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>
                    <div class="bbb_viewed_slider_container">
                        <div class="owl-carousel owl-theme bbb_viewed_slider">
                        <?php
                            
                             $query = "SELECT * FROM books  Where book_cat='E_digital_religion_books'";
                              $result = mysqli_query($con,$query);
                              if(mysqli_num_rows($result) > 0)
                                  {
                                while ($row = mysqli_fetch_array($result))
                                  {
                                   ?>
                            <div class="owl-item">
                                    <div class="bbb_viewed_image"><img id="img"  src="books_images/<?php echo $row['book_cat'];?>/<?php echo $row["book_image"]; ?>" height="150px" alt=""></div>
                                    <div class="bbb_viewed_content text-center">
                                        <br><br>
                                        <div class="bbb_viewed_price"><?php echo $row['book_price']; ?>₪</div>
                                        <br>
                                        <div class="bbb_viewed_name"><a href="book_detail.php?book_id=<?php echo $row['book_isbn'];?>"><?php echo $row['book_name']; ?></a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                
                            </div>
                            <?php
                                  }
                                }
                            ?>
                            </div>
                        </div>
                        <!-- //ds -->
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="bbb_viewed">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="bbb_main_container">
                    <div class="bbb_viewed_title_container">
                        <center>
                        <h3 class="bbb_viewed_title">history books</h3>
                       </center> 
                        <div class="bbb_viewed_nav_container">
                            <div class="bbb_viewed_nav bbb_viewed_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="bbb_viewed_nav bbb_viewed_next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>
                    <div class="bbb_viewed_slider_container">
                        <div class="owl-carousel owl-theme bbb_viewed_slider">
                        <?php
                             
                             $query = "SELECT * FROM books  Where book_cat='E_digital_history_books'" ;
                              $result = mysqli_query($con,$query);
                              if(mysqli_num_rows($result) > 0)
                                  {
                                while ($row = mysqli_fetch_array($result))
                                  {
                                   ?>
                            <div class="owl-item">
                                    <div class="bbb_viewed_image"><img id="img"  src="books_images/<?php echo $row['book_cat'];?>/<?php echo $row["book_image"]; ?>" height="150px" alt=""></div>
                                    <div class="bbb_viewed_content text-center">
                                        <br><br>
                                        <div class="bbb_viewed_price"><?php echo $row['book_price']; ?>₪</div>
                                        <br>
                                        <div class="bbb_viewed_name"><a href="book_detail.php?book_id=<?php echo $row['book_isbn'];?>"><?php echo $row['book_name']; ?></a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                
                            </div>
                            <?php
                                  }
                                }
                            ?>
                            </div>
                        </div>
                        <!-- //ds -->
                    </div> 
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
 include('includes/footer.php');
 mysqli_close($con);
?>