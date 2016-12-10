<html lang="en">

<head>
    <title>Feedify</title>
    <!--card w3>-->
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="/account/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/account/css/freelancer.css" rel="stylesheet">
    <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>Remove Category</title>
    <style>
    .cssmenu ul ul li 
    {
      background:url(images/redm.png) 96% center no-repeat;
    }
    .x
    {
      colo:red;
    }
   </style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
   function rm_category(cat, sub_cat, site, id)
   {
      if(site == 'indianexpress')
      {
        site = 'indian express';
      }
      else if(site == 'indiatv')
      {
        site = 'india tv';
      }

      var string = 'cat='+cat+'&sub_cat='+sub_cat+'&site='+site;
      //console.log(string); 
         jQuery.ajax( {
            url: 'remove_cat.php',
            data: string,
            type: 'POST',
            success: function(data)
            {
              //alert(data);
              $("#row"+id).hide();
               console.log(data);
            },
            error:function(){},
         });
   }

</script>
<style>
#page-top
{
  padding-top: 100px;
  background-color: #18BC9C;
}
table,th,td,tr
{
  border-collapse: collapse;
  border:2px solid orange;
  color:white;
  white-space: -100px;
}
</style>
</head>
<body id="page-top" class="index">

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
                        <a href="/account/index.php#portfolio">My Categories</a>
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

<div class='container'>
<!--
  <div id='cssmenu' class='cssmenu'>
    <ul>
      <li class='active'><a href='#'><span>Sports</span></a></li>
      <li class='has-sub'><a href='#'><span>All</span></a>
        <ul>
          <li onclick="rm_category('sports','all','toi')"><a href='#'><span>Times of India</span></a></li>
           <li onclick="rm_category('sports','all','hindu')"><a href='#'><span>The Hindu</span></a></li>
           </ul>
      </li>
    </ul>
  </div>
-->
<center>
  <?php
    include "../../file.php";
    $user = $_COOKIE['user'];
    $pass = $_COOKIE['pass'];
    $check = "SELECT username from fd_users WHERE username = '$user' AND pass='$pass'";
    $res = $con->query($check);
    if($res->num_rows > 0)
    {
      $user = "zzz01".$user;
      $list = "SELECT * from ".$user;
      $list_res = $con->query($list);
      if($list_res->num_rows > 0)
      {
        echo "<table>
              <th> CATEGORY </th>
              <th> SUB-CAT. </th>
              <th> WEB. </th>
              <th class='x'> X </th>";
              $i=0;
        while($list_row = $list_res->fetch_assoc())
        {
          $cat = $list_row['category'];
          $sub = $list_row['sub_cat'];
         $site = trim($list_row['site']);
          $site = str_replace(' ', '', $site);

          $data = "'".$cat."','".$sub."','".$site."',".$i;
          echo "<tr id=row$i>
                <td> $cat </td>
                <td> $sub </td>
                <td> $site </td>
                <td style='margin-left:10px'><button onclick = rm_category($data) style='background-color:orange'> remove </button></td>
                </tr>
                ";
                $i++;
        }
        echo "</table>";
      }
    }
  ?>
</center>
</div>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
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
                        <p><em>We are Students of CSE dept 3rd Year <a href="" target="_blank">contact us on facebook</a></em></p>
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

</body>
<html>
