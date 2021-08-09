<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
</head>
<body>
<style>


.container-fluid {
    background-color: #F57C00;
    width: 100%;
    margin-top: 100px;
    margin-bottom: 0px !important;
    position: relative;
    padding: 120px 80px 23.5px 80px;
    bottom: 0 !important
}

@media screen and (max-width: 576px) {
    .container-fluid {
        padding-top: 350px;
        padding-left: 20px;
        padding-right: 20px
    }
}

.form-card input {
    padding: 5px 2px 3px 2px;
    border: none;
    border-bottom: 1px solid lightgrey;
    border-radius: 0px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    font-size: 20px;
    letter-spacing: 1px
}

.form-card input:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: none;
    border-bottom: 1px solid #F57C00;
    outline-width: 0
}

.row-1 {
    border: 1px solid #F57C00;
    background-color: #fff;
    position: absolute;
    top: -100px;
    margin-right: 65px
}

@media screen and (max-width: 576px) {
    .row-1 {
        margin-right: 5px;
        padding-left: 10px
    }

    .form-card input {
        margin-left: 10px
    }
}

.heading {
    color: #F57C00
}

.btn-orange {
    background-color: #F57C00;
    color: #fff !important;
    height: 40px;
    padding: 2px 10px 6px 10px !important
}

.img-1 {
    width: 120px;
    height: 120px;
    margin-top: 16px;
    margin-bottom: 5px
}

@media screen and (max-width: 576px) {
    .img-1 {
        visibility: hidden
    }
}

.row-2 {
    border: 1px solid #F57C00;
    background-color: #FB8C00;
    color: #fff;
    padding-top: 10px;
    position: relative;
    margin-bottom: 20px
}

.block-item {
    text-align: center;
    width: 20%;
    margin-top: 20px;
    padding-left: 3px;
    padding-right: 3px
}

@media screen and (max-width: 576px) {
    .block-item {
        width: 80%;
        margin-right: auto;
        margin-left: auto
    }
}

.fa {
    font-size: 30px
}

.desc {
    font-size: 14px
}

.block-footer {
    padding-bottom: 20px
}

.footer-headings {
    color: #fff;
    border-bottom: 1px #FFB74D solid;
    padding-bottom: 10px
}

.list-items {
    color: #fff;
    margin-bottom: 0px;
    font-size: 14px
}

@media screen and (max-width: 576px) {
    .block-footer {
        width: 80%;
        margin-right: auto;
        margin-left: auto
    }
}

.img-g {
    width: 120px;
    height: 50px
}

.border-left {
    border-left: #FFB74D 1px solid !important;
    padding-left: 20px !important
}

@media screen and (max-width: 576px) {
    .border-left {
        border-left: none !important;
        padding-left: 0 !important
    }
}

.fa-sm {
    font-size: 15px;
    color: #fff;
    padding-left: 10px;
    padding-right: 10px;
    padding-bottom: 10px
}
</style>
<div class="container-fluid mx-auto">
    <div class="row justify-content-center mt-4 row-1">
        <div class="col-md-10">
            <div class="row mt-2">
                <div class="col-md-6">
                    <h1 class="heading">Newsletter Signup</h1>
                    <p>Get Best Deals On The Internet Delivered Right In Your Inbox</p>
                </div>
                <div class="col-md-6">
                    <form class="form-card row mt-5">
                        <div class="form-group"> <input type="email" name="email" placeholder="Enter Your Email ID"> </div>
                        <div class="form-group"> <input class="btn btn-orange" type="submit" name="submit" value="Subscribe Now"> </div>
                    </form>
                </div>
            </div>
            <div class="terms d-flex pb-3"> <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</small> </div>
        </div>
        <div class="col-md-2"> <img class="img-1" src="https://i.imgur.com/jBlQcMI.png"> </div>
    </div>
    <div class="row d-flex justify-content-between row-2">
        <div class="block-item">
            <div class="fa fa-envelope"></div>
            <div class="sub-head">Newsletter</div>
            <p class="desc">5,00,000 People have already subscribed special newsletter</p>
        </div>
        <div class="block-item">
            <div class="fa fa-eye"></div>
            <div class="sub-head">Page Views</div>
            <p class="desc">1 Billion Page views we receive every year</p>
        </div>
        <div class="block-item">
            <div class="fa fa-fire"></div>
            <div class="sub-head">Ranking</div>
            <p class="desc">Top 200+ We are among top 200 sites in India</p>
        </div>
        <div class="block-item">
            <div class="fa fa-home"></div>
            <div class="sub-head">Merchants</div>
            <p class="desc">Top 200 Merchants who are promoting their products</p>
        </div>
        <div class="block-item">
            <div class="fa fa-facebook"></div>
            <div class="sub-head">Fan's on Facebook</div>
            <p class="desc">2,00,000+ fans on Facebook</p>
        </div>
    </div>
    <div class="row d-flex pb-4 px-4">
        <div class="col-md-8">
            <div class="row d-flex justify-content-between">
                <div class="d-flex flex-column block-footer">
                    <h5 class="footer-headings">About</h5>
                    <p class="list-items">About Us</p>
                    <p class="list-items">Advertising Opportunities</p>
                    <p class="list-items">Contact Us</p>
                    <p class="list-items">Work With Us</p>
                    <p class="list-items">Blog</p>
                </div>
                <div class="d-flex flex-column block-footer">
                    <h5 class="footer-headings">Festival Deals</h5>
                    <p class="list-items">Diwali Offers</p>
                    <p class="list-items">New Year Offers</p>
                    <p class="list-items">Holi Offers</p>
                    <p class="list-items">Rakhi Offers</p>
                    <p class="list-items">Valentine's Day Offers</p>
                </div>
                <div class="d-flex flex-column block-footer">
                    <h5 class="footer-headings">Top Stories</h5>
                    <p class="list-items">Jabong Coupons</p>
                    <p class="list-items">TataCliq Coupons</p>
                    <p class="list-items">Shopclues Coupons</p>
                    <p class="list-items">Koovs Coupons</p>
                    <p class="list-items">Paytm Coupons</p>
                    <p class="list-items">Zomato Coupons</p>
                    <p class="list-items">Goair Coupons</p>
                    <p class="list-items">Justrelief Coupons</p>
                </div>
                <div class="d-flex flex-column block-footer">
                    <h5 class="footer-headings">Need Help?</h5>
                    <p class="list-items">Getting Started</p>
                    <p class="list-items">Contact Us</p>
                    <p class="list-items">FAQ's</p>
                    <p class="list-items">Press</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="d-flex flex-column pl-md-5 px-4">
                <h5 class="footer-headings pl-md-2">Download App</h5>
                <div class="g-play pb-5 border-left"> <img class="img-g" src="https://i.imgur.com/9Txjm5w.png"> </div>
                <div class="d-flex flex-column pl-md-2 border-left pb-3">
                    <h5 class="footer-headings mb-3">Follow Us</h5>
                    <div class="row d-flex pl-2">
                        <div class="fa fa-sm fa-facebook"></div>
                        <div class="fa fa-sm fa-twitter"></div>
                        <div class="fa fa-sm fa-google-plus"></div>
                        <div class="fa fa-sm fa-pinterest"></div>
                        <div class="fa fa-sm fa-linkedin"></div>
                        <div class="fa fa-sm fa-youtube-play"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>