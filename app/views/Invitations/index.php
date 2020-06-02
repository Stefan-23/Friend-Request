<?php require APPROOT . '/views/inc/header.php';?>
<?php flash('post_message');?>
<div class="row">
    <div class="col-md-6">
      <h1>Invite user</h1>
    </div>
    
</div>


<?php foreach($data['users'] as $user): ?>
  <div class="card card-body mb-3"> 
    <h4 class="card-title"><?php echo $user->name; ?> </h4>
    <p class="card-text"><?php echo $user->email; ?></p>
    <div class="bg-light p-2 mb-3">
      <?php echo 'Joined:' .  $user->created_at;?>
    </div>
    <?php if($user->name == $_SESSION['user_name']) : ?>
     
    <?php else : ?>
      <a href="<?php echo URLROOT; ?>invitations/invite/<?php echo $user->id; ?>" class="btn btn-dark" >Invite</a>
    <?php endif;?>
    </div>

<?php endforeach ?>



<?php require APPROOT . '/views/inc/footer.php';?>