

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/fsuu.css">
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
                        <li><a id="home" href="#">home</a></li>
                        <li><a href="http://www.urios.edu.ph/index.php/en/">fsuu website</a></li>
                        <li><a href="form">sign up</a></li>
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
                             <form action="" method="post" >
                            <center><span>login</span></center>
                            <input type="text" placeholder="Email" name="email" autocomplete="off" autocomplete="off">
                            <input type="password" placeholder="Password" name="pass" autocomplete="off" autocomplete="off">
                            <button type="submit" name="login">Sign In</button>
                            
                        </form>
                          <?php  
                            require_once 'google/config.php';
                       ?>

                       <button id="google" onclick="window.location= '<?php echo $login_url ?>';"><i class="fab fa-google" id="google_icon"></i>&nbsp&nbspgoogle</button>
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
            
           <!--  <div class="box-section">
                <div class="box-text">
                    
                    <h3>APPLICATION FOR GRADUATION</h3>
                    <h4>Graduates & Collegiate Course</h4>
                    <p>Requirement needed:</p>
                    <p><b>I</b>. Duly signed Graduation Application Clearance Form;</p>
                    <p><b>II</b>. Signed Advance Grade Slip(Summer AY 2020-2021) with complete grades printed from your OPIS account (portrait format);and</p>
                    <p><b>III</b>. Evaluation Sheet endorsed by your Program Dean(for those who were able to submit their evaluation sheet during Enrollment). </p>
                    <p>Above document should be properly placed in long thick brown envelope with a small black binder/paper clip (c/o FSUU Bookstore)</p>
                    <p>Upon submission of the mentioned documents, please include a documentary stamp worth P30.00 for your diploma(c/o BIR Office)</p>
                    <br>
                    <br>
                    <h3>UNIVERSITY CLEARANCE</h3>
                    <h4>Teaching Personnel</h4>
                    <h4>Non-Teaching Personnel</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur at vitae optio officiis quod, esse accusamus expedita facere quas veritatis cupiditate dicta quo enim culpa deleniti odit officia soluta mollitia..</p>
                    <br>
                    <br>
                    <h3>Retirement/Separation Clearance</h3>
                    <h4>Teaching Personnel</h4>
                    <h4>Non-Teaching Personnel</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quasi quaerat ipsum impedit quam quod placeat facere laudantium, veritatis eveniet ipsam deleniti obcaecati iusto, corporis? Commodi quibusdam possimus, animi optio.</p>
                </div>
            </div>
        </div>
    </div>
    </div> -->
  <!--   end of section
 -->
    <!-- footer -->

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

    <script type="text/javascript" src="js/function.js">
        
    </script>
    
</body>
</html>