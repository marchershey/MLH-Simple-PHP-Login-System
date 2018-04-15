<?php

  # This is required on all pages. Don't forget to include it.
  require_once '../php/init.php';

  # To require someone to login to view a page, add the following function:
  securePage();

 ?>
 <!doctype html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="<?=$global['site']['meta']['description'];?>">
     <meta name="author" content="<?=$global['site']['meta']['author'];?>">
     <meta name="keyword" content="<?=$global['site']['meta']['author'];?>">
     <?=$global['site']['favicon']['enabled'] ? '<link rel="icon" type="image/png" href="'.$global['site']['favicon']['path'].'" />' : '';?>

     <title>Secured Page | <?=$global['site']['name']; echo (!empty($global['site']['tagline']) ? ' - '.$global['site']['tagline']:'')?></title>

     <!-- Stylesheet -->
     <link href="assets/css/style.css" rel="stylesheet">

   </head>

   <body class="login flex-row align-items-center">
     <div class="container mt-">
       <div class="row justify-content-center">
         <div class="col-md-5">
           <div class="card mx-1">
             <div class="card-body p-4">
               <h1 class="text-center">Secured Page</h1>
               <p class="text-muted text-center pb-2">To view this page, you are required to login.</p>
               <?php if(!empty($alert)){alert($alert[0], $alert[1]);}?>
               <?php if(empty($alert)){globalAlert();} ?>
               <h4 class="text-center">Hello, <?=$_SESSION['user'];?></h4>
               <p class="text-center">You have successfully logged in.</p>
               <p class="text-center"><a href="logout.php">Logout</a></p>

             </div>
             <!-- /.card-body p-4 -->
           </div>
           <!-- /.card mx-1 -->
         </div>
         <!-- /.col-md-6 -->
       </div>
       <!-- /.row justify-content-center -->
     </div>
     <!-- /.container -->

     <!-- Javacsript and necessary plugins -->
     <script src="assets/plugins/jquery-3.3.1/jquery.min.js"></script>
     <script src="assets/plugins/bootstrap-4.1.0/dist/js/bootstrap.min.js"></script>
   </body>
 </html>
