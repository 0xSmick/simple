<? require_once('database.php'); ?>

<?php try {
      $results = $db->query('select companies.name from companies');
} catch(Exception $e) {
 echo $e->getMessage(); 
} 

$companies = $results->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="modal fade" id="create" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <form class="form-horizontal" role="form">
            <div class="modal-header">
              <h4>Create Review<h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="company-name" class="col-md-4 control-label">Company Name</label>
              <div class="col-md-4">
                <select class="input-xlarge" id="companyName" name="companyName">
                  <?php foreach ($companies as $company) { ?>
                  <?php  echo '<option>'.$company["name"].'</option>';} ?>
                </select>
                </div>
              </div>
              <div class="form-group">
                <label for="review-title" class="col-sm-2 control-label">Review Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="review-title" placeholder="Review Title">
                </div>
              </div>
              
              <div class="form-group">
                <label for="Review" class="col-sm-2 control-label">Review</label>
                <div class="col-sm-10">
                  <textarea class="form-control" rows="15"></textarea>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="rating">Company Rating</label>
                <div class="controls">
                  <select id="rating" name="rating" class="input-xlarge">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
              </div>
            <div class="modal-footer">
              <a class="btn btn-default" data-dismiss="modal">Close</a>
              <button type="submit" class="btn btn-primary">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>