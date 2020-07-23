

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/zoho/css/uikit.min.css" />
        <script src="/zoho/js/uikit.min.js"></script>
        <script src="/zoho/js/uikit-icons.min.js"></script>
		
		
		<div class="uk-container">
        <nav class="uk-navbar-container" uk-navbar>
            
            <div class="uk-navbar-left">

                <ul class="uk-navbar-nav">
                    <li <li> <li ><img src="/zoho/gmi.png" alt="GMI"class="center"width="400" height="100"></li></li>
                    <!--<li><a href="#"><?php echo $title; ?></a></li>-->

                </ul>

            </div>

            <div class="uk-navbar-right">

                <ul class="uk-navbar-nav">
                    

                </ul>
            </div>
          
        </nav> 

<div class="uk-section uk-section-primary">
    <div class="uk-container uk-container-small">
	<h2>Reset your password</h2>
    <h5>Hello <span><?php echo $name; ?></span>, Please enter your password 2x below to reset</h5>     
<?php 
    $fattr = array('class' => 'form-signin');
    echo form_open(site_url().'login/reset_password/token/', $fattr); ?>
    <div class="form-group">
      <?php echo form_password(array('name'=>'password', 'id'=> 'password', 'placeholder'=>'Password', 'class'=>'form-control', 'value' => set_value('password'))); ?>
      <?php echo form_error('password') ?>
    </div>
	
    <div class="form-group">
      <?php echo form_password(array('name'=>'passconf', 'id'=> 'passconf', 'placeholder'=>'Confirm Password', 'class'=>'form-control', 'value'=> set_value('passconf'))); ?>
      <?php echo form_error('passconf') ?>
    </div>
    <?php echo form_hidden('user_id', $user_id);?>
    <?php echo form_submit(array('value'=>'Reset Password', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
    <?php echo form_close(); ?>

  </div>
</div>


    </div>
</div>