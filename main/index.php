

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/fsuu.css">
    <link rel="stylesheet" href="css/modal.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <link rel="icon" type="icon/png" href="image/fsuulogo.jpeg" sizes="10x10">
    <script type="text/javascript" src="js/fontawesome.js"></script>
</head>
<body>

<!-- header -->
    <div class="box">
        <header>
            <div class="flex">
                <div class="title">
                    <div class="head">
                        <a href=""><img src="image/fsuu.png" alt="Logo"><span></span></a>
                    </div>
                </div>
                <div class="list">
                    <ul>
                   
                        <li><a href="http://www.urios.edu.ph/index.php/en/">fsuu website</a></li>
                        <!-- <li><a href="fsuu">Fsuu</a></li> -->
                    </ul>
                </div>
            </div>
        </header>
    </div>
    <hr>

    <!-- end of header -->

    <!-- section -->

    <div class="body">
        <div class="section_box">
        <div class="box-width">
            <center><h3>Online Clearance</h3></center>
            <br>
            <div class="flex">
                <div class="text">
                    <img src="image/urios3.jpg" alt="image" width="600" height="250" >
                </div>


                <div class="login">
                    <section>
                        <div class="form">
                        <!--   <?php  
                            require_once 'google/config.php';
                       ?>
 -->
                        <button id="google"><i class="fab fa-google" id="google_icon"></i> Google</button>
                       <!-- <button id="google" onclick="window.location= '<?php echo $login_url ?>';"><i class="fab fa-google" id="google_icon"></i>&nbsp&nbspgoogle</button> -->
                        </div>
                    </section>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>


        

    <div class="footer">
        <footer>
            <div class="foot">
                <div class="flex">
                    <div class="all-right-reserve">
                        <span>© {2020} All Rights Reserved</span>
                    </div>
                    <div class="term">
                        <div class="flex">
                            <div class="term-text">
                                <ul>
                                    <li><a href="">Terms & Conditions</a></li>
                                </ul>
                            </div>
                            <div class="privacy">
                                <ul>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end of footer -->

     <div class="modal">
        <section>
             <center><span id="login">Login</span></center>
            <center><img src="image/1.png" alt="logo" width="160" height="120" ></center>
            <div class="form">
                <?php  
                    require_once 'google/config.php';
                ?>
                <center><button onclick="window.location= '<?php echo $login_url ?>';">User</button></center>
            </div>
            <div class="admin">
                <?php  
                     require_once 'google/config_admin.php';
                ?>
                <center><button onclick="window.location= '<?php echo $login ?>';">Admin</button></center>
            </div>
            <span id="close"><img src="icon/times-solid.svg" alt="Icon" width="20" height="20"></span>
        </section>
    </div>

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>