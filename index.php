<? include('header.php'); ?>
    
  <div class="container">
    <div class="jumbotron text-center">
      <h1>TaxConomy</h1>
      <p>You Control the Taxi Economy</p>
      <a href="#create" data-toggle="modal" class="btn btn-success btn-lg btn-block">Submit Your Review</a>
      <!--#a href="#" class="btn btn-primary btn-lg btn-block">View All Reviews</a>-->
      <a href="/simple/companies.php" class="btn btn-default btn-lg btn-block">View All Companies</a>
    </div>
  </div>
         
    <!-- Fixed footer -->
    <div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
      <div class="container">
        <div class="navbar-text pull-left">
          <p>© 2014 BootstrapBay.</p>
        </div>
        <div class="navbar-text pull-right">
          <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
          <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
          <a href="#"><i class="fa fa-google-plus fa-2x"></i></a>
        </div>
      </div>
    </div>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <?php include('forms/_form_create.php') ?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>