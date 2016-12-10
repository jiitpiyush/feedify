<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Feedify</title>
        <!--card w3>-->
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

        <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
        <link href="/account/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="/account/css/freelancer.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <style type="text/css">
            #cat-name
            {
                margin-top: 10px;
                margin-bottom: -5px;
            }
        </style>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
    </head>
    <body id="page-top" class="index">
        <div class="row">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/account/">Feedify</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="hidden">
                                <a href="#page-top"></a>
                            </li>
                            <li class="page-scroll">
                                <a href="/account/#portfolio">Categories</a>
                            </li>
                            <li class="page-scroll">
                                <a href="#about">About</a>
                            </li>
                            <li class="page-scroll">
                                <a href="#contact">Contact</a>
                            </li>
                            <li class="page-scroll">
                                <a href="/login/logout.php"><span class="s4">Logout</span></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>

            <div  id="s2" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-content">
                    <div class="container">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                               <!--  <button class="button2" style="vertical-align:middle"><span>Close</span>
                               <i class="fa fa-times"></i>--> 
                               <h2 id="cat-name" style="text-transform:uppercase"><?php echo $_GET['cat'];?></h2>
                               <!--<hr class="star-primary">-->
                               <!--  <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>-->
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <div class="container">
                <div class="panel-group" id="accordion">
                    <?php include "display_query.php"; ?>
                </div>
            </div>

            <footer class="text-center">
                <div class="footer-above">
                    <div class="container">
                        <div class="row">
                            <div class="footer-col col-md-4">
                                <h3>Location</h3>
                                <pz><em>A-10<br>Jaypee Institute Of Info. Tech<br>Sec-62 Noida</em></p>
                            </div>
                            <div class="footer-col col-md-4">
                                <h3>Around the Web</h3>
                                <ul class="list-inline">
                                    <li>
                                        <a  href="https://www.facebook.com/feedify.co.in/" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="footer-col col-md-4">
                                <h3>About Us</h3>
                                <p><em>We are Students of CSE dept 3rd Year <a href="https://www.facebook.com/shantanu.gupta.9883" target="_blank">contact us on facebook</a></em></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-below">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                Copyright &copy; Feedify 2015
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
            <div class="scroll-top page-scroll visible-xs visible-sm">
                <a class="btn btn-primary" href="#page-top">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>


        </div>
    </body>
</html>
 <!-- jQuery -->
<script src="/account/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/account/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="/account/js/classie.js"></script>
<script src="/account/js/cbpAnimatedHeader.js"></script>

<!-- Contact Form JavaScript -->
<script src="/account/js/jqBootstrapValidation.js"></script>
<script src="/account/js/contact_me.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/account/js/freelancer.js"></script>
