
<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	 warning: <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>

<style type="text/css">
	.error{
		color: red;
	}

</style>