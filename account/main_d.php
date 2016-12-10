<?php

?>
<!DOCTYPE html>
<html lang='en'>

<head>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''>
    <meta name='author' content=''>

    <title>Feedify</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href='/account/css/bootstrap.min.css' rel='stylesheet'>

    <!-- Custom CSS -->
    <link href='/account/css/freelancer.css' rel='stylesheet'>
    <link rel='stylesheet' href='http://www.w3schools.com/lib/w3.css'>
    <!-- Custom Fonts -->
    <link href='font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
        <script src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'></script>
    <![endif]-->

</head>


<body id='page-top' class='index'>
    <!-- Navigation -->
    <nav class='navbar navbar-default navbar-fixed-top'>
        <div class='container'>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class='navbar-header page-scroll'>
                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
                    <span class='sr-only'>Toggle navigation</span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
                <a class='navbar-brand' href='#page-top'>Feedify</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
                <ul class='nav navbar-nav navbar-right'>
                    <li class='hidden'>
                        <a href='#page-top'></a>
                    </li>
                    <li class='page-scroll'>
                        <a href='#portfolio'>Categories</a>
                    </li>
                    <li class='page-scroll'>
                        <a href='#about'>About</a>
                    </li>
                    <li class='page-scroll'>
                        <a href='#contact'>Contact</a>
                    </li>
                   <li class='page-scroll'>
                        <a href='/login/logout.php'>Logout</a>
                        </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

<!-- Header -->
    <header>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-12'>
                    <img class='img-responsive' src='img/logo.png' alt='fe'>
                    <div class='intro-text'>
                        <br><br><br><br>
                        <span class='name'>Feedify</span>
                        <hr class='star-light'>
                        <span class='skills'>What's &nbsp;Buzzing&nbsp; Around!</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id='portfolio' class='collage'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-12 text-center'>
               <!-- <a href='#' class='btn btn-info btn-lg'>
          <span class='glyphicon glyphicon-plus'></span> Plus 
        </a>--><a href='/account/category'>
                <button  href='#' class='b1 glyphicon glyphicon-plus'>Category</button>
                </a>
            <a href='/account/category/remove_category.php'>
                <button class='b2 glyphicon glyphicon-minus'>Category</button>
                </a>
                    <h2>Categories</h2>
                    <hr class='star-primary'>
                </div>
            </div>

            <div class='row'>
                <div class='col-sm-4 portfolio-item'>
                    <a href='show_data.php?cat=jiit feeds' class='portfolio-link' data-toggle='modal' title='JIIT FEEDS'>
                        <div class='caption'>
                            <div class='caption-content'>
                               <!-- <i class='fa fa-search-plus fa-3x'></i>-->
                            </div>
                        </div> 
                        <img src='img/jiit.jpg' class='img-responsive' alt='' style='width:400px;height:250px;'>
                      
                    </a> 
                </div>
<?php
    $user_t = "zzz01".$user;
    $sql = "SELECT DISTINCT category FROM $user_t WHERE 1";
    $cat_list = $con->query($sql);
    if($cat_list->num_rows > 0)
    {
        while($cat_row = $cat_list->fetch_assoc())
        {
            echo "<div class='col-sm-4 portfolio-item'>
                    <a href=show_data.php?cat=".$cat_row['category'] ." class='portfolio-link' data-toggle='modal' title=".$cat_row['category'].">
                        <div class='caption'>
                            <div class='caption-content'>
                                <!--<i class='fa fa-search-plus fa-3x'></i>-->
                            </div>
                            </div>
                        <img src='img/".$cat_row['category'][0].".jpg' class='img-responsive' alt='' style='width:400px;height:250px;'>
                    </a>
                </div>";
        }
    }
?>
        </div>
    </div>
    </section>

    <!-- About Section -->
    <section class='success' id='about'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-12 text-center'>
                    <h2>About</h2>
                    <hr class='star-light'>
                </div>
            </div>
            <div class='row'>
            <p id='s1'>Feedify&nbsp; is&nbsp; a&nbsp; RSS&nbsp; feed&nbsp; website&nbsp;.It&nbsp; is&nbsp; a&nbsp; platform&nbsp; to&nbsp; implement&nbsp; the&nbsp; modern&nbsp; RSS&nbsp; feed&nbsp; system&nbsp; which&nbsp; provides&nbsp; information&nbsp; from&nbsp; various&nbsp; resources&nbsp; onto&nbsp; a&nbsp; single&nbsp; platform&nbsp;.It&nbsp; provides&nbsp; information&nbsp; on&nbsp; hour&nbsp; to&nbsp; hour&nbsp; basis&nbsp; providing&nbsp; a&nbsp; range&nbsp; of&nbsp; different&nbsp; news&nbsp; category&nbsp; and&nbsp; other&nbsp; interests.</p> 

                <div class='col-lg-8 col-lg-offset-2 text-center'>
                    <!-- <a href='#' class='btn btn-lg btn-outline'> -->
                        <!-- <i class='fa fa-download'></i> Download Theme -->
                    <!-- </a> -->
                </div>
            </div>
        </div>
        </section>

        <!-- Contact Section -->
        <section id='contact'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-12 text-center'>
                    <h2>Contact Us</h2>
                    <hr class='star-primary'>
                </div>
            </div>
            <div class='row'>
                <div class='col-lg-8 col-lg-offset-2'>
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name='sentMessage' id='contactForm' novalidate>
                        <div class='row control-group'>
                            <div class='form-group col-xs-12 floating-label-form-group controls'>
                                <label>Name</label>
                                <input type='text' class='form-control' placeholder='Name' id='name' required data-validation-required-message='Please enter your name.'>
                                <p class='help-block text-danger'></p>
                            </div>
                        </div>
                        <div class='row control-group'>
                            <div class='form-group col-xs-12 floating-label-form-group controls'>
                                <label>Email Address</label>
                                <input type='email' class='form-control' placeholder='Email Address' id='email' required data-validation-required-message='Please enter your email address.'>
                                <p class='help-block text-danger'></p>
                            </div>
                        </div>
                        <div class='row control-group'>
                            <div class='form-group col-xs-12 floating-label-form-group controls'>
                                <label>Phone Number</label>
                                <input type='tel' class='form-control' placeholder='Phone Number' id='phone' required data-validation-required-message='Please enter your phone number.'>
                                <p class='help-block text-danger'></p>
                            </div>
                        </div>
                        <div class='row control-group'>
                            <div class='form-group col-xs-12 floating-label-form-group controls'>
                                <label>Message</label>
                                <textarea rows='5' class='form-control' placeholder='Message' id='message' required data-validation-required-message='Please enter a message.'></textarea>
                                <p class='help-block text-danger'></p>
                            </div>
                        </div>
                        <br>
                        <div id='success'></div>
                        <div class='row'>
                            <div class='form-group col-xs-12'>
                                <button class='button1' style='vertical-align:middle'><span>Send</span></button>
                            </div>
                        </div>
                     
                </div>
            </div>
        </div>
        </section>

    <!-- Footer -->
    <footer class='text-center'>
        <div class='footer-above'>
            <div class='container'>
                <div class='row'>
                    <div class='footer-col col-md-4'>
                        <h3><strong>Location</strong></h3>
                        <p class='d1'><em>A-10<br>Jaypee Institute Of Info. Tech<br>Sec-62 Noida</em></p>
                    </div>
                    <div class='footer-col col-md-4'>
                        <h3><strong>Around the Web</strong></h3>
                        <ul class='list-inline'>
                            <li>
                                <a href='https://www.facebook.com/feedify.co.in/'  target='_blank' class='btn-social btn-outline'><i class='fa fa-fw fa-facebook'></i></a>
                            </li>
                            <li>
                                <a href='#' class='btn-social btn-outline'><i class='fa fa-fw fa-google-plus'></i></a>
                            </li>
                            <li>
                                <a href='#' class='btn-social btn-outline'><i class='fa fa-fw fa-twitter'></i></a>
                            </li>
                    </ul>
                    </div>
                    <div class='footer-col col-md-4'>
                        <h3><strong>About Us</strong></h3>
                        <p class='d1'><em>We are Students of CSE dept 3rd Year <a href='' target='_blank'>contact us on facebook</a></em></p>
                    </div>
                </div>
            </div>
        </div>
        <div class='footer-below'>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-12'>
                        Copyright &copy; Feedify 2015
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class='scroll-top page-scroll visible-xs visible-sm'>
        <a class='btn btn-primary' href='#page-top'>
            <i class='fa fa-chevron-up'></i>
        </a>
    </div>

    <!-- jQuery -->
    <script src='/account/js/jquery.js'></script>

    <!-- Bootstrap Core JavaScript -->
    <script src='/account/js/bootstrap.min.js'></script>

    <!-- Plugin JavaScript -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
    <script src='/account/js/classie.js'></script>
    <script src='/account/js/cbpAnimatedHeader.js'></script>

    <!-- Contact Form JavaScript -->
    <script src='/account/js/jqBootstrapValidation.js'></script>
    <script src='/account/js/contact_me.js'></script>

    <!-- Custom Theme JavaScript -->
    <script src='/account/js/freelancer.js'></script>

</body>

</html>