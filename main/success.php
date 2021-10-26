<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="css/success.css">
</head>
<body>

	<!-- header -->
    <div class="box">
        <header>
            <div class="flex">
                <div class="title">
                    <div class="head">
                        <a href="index"><img src="image/fsuu.png" alt="Logo"><span></span></a>
                    </div>
                </div>
                <!-- <div class="list">
                    <ul>
                        <li><a id="home" href="#">home</a></li>
                        <li><a href="http://www.urios.edu.ph/index.php/en/">fsuu website</a></li>
                        <li><a href="form">sign up</a></li>
                      
                    </ul>
                </div> -->
            </div>
        </header>
    </div>
    <hr>
    <!-- end of header -->

    <?php  

        session_start();

        $email = $_SESSION['tmp_email'];

    ?>

    <!-- section -->

    	<div class="box">
    		<div class="size">
    			<img src="icon/check.png" alt="Logo" width="40" height="40"><span>&nbsp&nbsp&nbspPlease check you email <b><?php echo $email; ?></b> for verification. </span>
    		</div>
    	</div>


    <!-- end of section -->
	
</body>
</html>