<? include('header.php'); ?>    
  <div class="container">
    <div class="jumbotron text-center">
      <h1>TaxConomy</h1>
      <p>You Control the Taxi Economy</p>
      <a href="#create" data-toggle="modal" class="btn btn-success btn-lg btn-block">Submit Your Review</a>
      <!--#a href="#" class="btn btn-primary btn-lg btn-block">View All Reviews</a>-->
      <a href="companies.php" class="btn btn-default btn-lg btn-block">View All Companies</a>
    </div>
  </div>
         
    <!-- Fixed footer -->
    <div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
      <div class="container">
        <div class="navbar-text pull-left">
          <p>© 2014 TaxConomy.</p>
        </div>
        <div class="navbar-text pull-right">
          <p>Because it's your duty</p>
        </div>
      </div>
    </div>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- This is the Form -->
    
    <?php include('forms/edited_form.php') ?>

    <!-- This is the Form -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>