<!DOCTYPE html>
<html lang="en">
  <head>
    <title>REST: MVC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/bootswatch.min.css">
   
  </head>
  <body>
  <!--<script src="js/bsa.js"></script>-->

    <div class="container">

      <div class="row">
          <div class="col-lg-6">
            <div class="bs-example">
              <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">Applications</h3>
                </div>

                <div class="panel-body">
                    <?php 
                    $app_list = json_decode($data,true);
                      foreach ($app_list as $app){ 
                    ?>
                    <a href="<?php echo CONSTANTS::APP_URL ."?page=get_app_by_id&id=" . $app["id"];  ?>" alt=<?php echo "app_" . $app["id"]; ?> class='list-group-item'><?php echo $app["name"]; ?></a>
                    <?php 
                          } 
                    ?>
                </div>
              </div>
              <a href="http://localhost/rest_mvc?page=add_app" alt="add app list">ADD APP</a>
            </div>
          </div>

  </div>
 </body>
</html>