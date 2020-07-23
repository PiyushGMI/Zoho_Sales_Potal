
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
	<?php if ($this->session->flashdata()) { ?>
        <div class="alert alert-warning">
            <?= $this->session->flashdata('msg'); ?>
        </div>
    <?php } ?>
    	 <form action="<?= base_url(); ?>login/doLogin" method="post">

    <div class="uk-margin">
        <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input class="uk-input" name="email"type="email"id="email">
        </div>
    </div>

    <div class="uk-margin">
        <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: lock"></span>
            <input class="uk-input" name="password" type="password"id="pwd">
        </div>
    </div>
 <button type="submit" class="uk-button uk-button-secondary">Submit</button>

  

</form>

    </div>
</div>

 <h2>Forgot Password</h2>
    <p>Please enter your email address and we'll send you instructions on how to reset your password</p>
    <?php $fattr = array('class' => 'form-signin');
         echo form_open(site_url().'login/forgot/', $fattr); ?>
    <div class="form-group">
      <?php echo form_input(array(
          'name'=>'email', 
          'id'=> 'email', 
          'placeholder'=>'Email', 
          'class'=>'form-control', 
          'value'=> set_value('email'))); ?>
      <?php echo form_error('email') ?>
    </div>
    <?php echo form_submit(array('value'=>'Submit', 'class'=>'uk-button uk-button-secondary')); ?>
    <?php echo form_close(); ?>    


    </div>
</div>
         
                    

