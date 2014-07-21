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
                  <form method="POST">
              
                  <div class='bs-example table-responsive'>
                    <table class='table table-striped table-bordered table-hover'>
                        <tbody>
                        
                        <tr class='success'>
                            <td>App Name: </td><td><input type="text" name="name"></td>
                        </tr>
                        <tr class='success'>
                            <td>Price: </td><td><input type="text" name="price" ></td>
                        </tr>
                        <tr class='success'>
                            <td>Version: </td><td> <input type="text" name="version" ></td>
                        </tr>
                        </tbody>
                    </table>
                  </div>
              <input type="submit" value="submit" name="submit">
              </form>

                </div>
              </div>
              <a href="<?php echo CONSTANTS::APP_URL;  ?>" alt="app list">Return to the app list</a>
            </div>
          </div>
  </div>
 </body>
</html>