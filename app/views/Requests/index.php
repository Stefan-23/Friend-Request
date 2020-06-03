<?php require APPROOT . '/views/inc/header.php';?>
<?php flash('post_message');?>
<div class="row">
    <div class="col-md-6">
      <h1>Requests</h1>
    </div>
    
</div>


<?php foreach($data['requests'] as $request): ?>
  <div class="card card-body mb-3"> 
  <?php if($request->user_from == $_SESSION['user_name']) : ?>
      <h4 class="card-title"> No requests </h4>
      <?php 
        break;
        continue;
      ?>
    <?php else : ?>
    <p class="card-text"><?php echo 'Request sent from: ' . $request->user_from; ?></p> 
    <a href="<?php echo URLROOT; ?>requests/accept/ <?php echo $request->id; ?>" class="btn btn-success" >Accept</a>
    <a href="<?php echo URLROOT; ?>requests/decline/ <?php echo $request->id; ?>" class="btn btn-link" >Decline</a>
    
    
    <?php endif;?>
    </div>

<?php endforeach ?>



<?php require APPROOT . '/views/inc/footer.php';?>