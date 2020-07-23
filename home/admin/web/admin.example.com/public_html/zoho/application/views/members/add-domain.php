<!DOCTYPE html>
<html>
    <head>
        <title>Zoho Portal</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/zoho/css/uikit.min.css" />
        <script src="/zoho/js/uikit.min.js"></script>
        <script src="/zoho/js/uikit-icons.min.js"></script>
    </head>
    <body>


    <div class="uk-container">
        <nav class="uk-navbar-container" uk-navbar>
            
            <div class="uk-navbar-left">

                <ul class="uk-navbar-nav">
                    <li ><img src="/zoho/gmi.png" alt="GMI"class="center"width="400" height="100"></li>
                    <li><a href="#">Sales Member</a></li>

                </ul>

            </div>

            <div class="uk-navbar-right">

                <ul class="uk-navbar-nav">
                    
<li><a href="#" style="cursor: none;">Welcome <?php echo $_SESSION['name']?></a></li>
                    <li><a href="<?=base_url().'login/logout';?>">Logout</a></li>
                </ul>
            </div>
          
        </nav> 


         <h1 class="uk-card-title">Add New Categories</h1>
<a class="uk-button uk-button-danger"href="<?=base_url().'members';?>">Back To List</a>
<hr>
<div  style="
    background: #fff;
" >

<!--<h4 id="text" class="uk-h5 tm-heading-fragment" style="color: #000 !important;">Add New Categories<br/>-->
<!--Full Name:<?php echo $member['sales_per_name']?><br/>
Sales ID:<?php echo $member['sales_id']?> <br/>
Token ID:<?php echo $member['tokan_id']?> <br/>-->

	

    <div class="uk-child-width-1-2 @m uk-grid-small uk-grid-match" uk-grid>
    <?php foreach($member1 as $memberdata): 
//var_dump($member1);
//exit;
?>

    <div>
        <div style="background-color:Orange"class="uk-card uk-card-primary uk-card-body" >
		 <form  action="/zoho/Members/add" name="submit" method="POST">  
         
 <h3 class="uk-card-title"><?php echo $memberdata['cat_name']?></h3>
 
 <?php
    
$product_id = $this->uri->segment(3);
//var_dump($product_id);
//exit;

?> 
<input type="hidden" name="cat_id" value="<?php echo $memberdata['cat_id'];?>">
<input type="hidden" name="cat_name" value="<?php echo $memberdata['cat_name'];?>">
<input type="hidden" name="saleteam_id" value="<?php echo $product_id;?>">

            <ul class="uk-list uk-list-bullet">
    <form>


       

        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
		 <form>
<label>
<input type="checkbox" class="uk-checkbox" name="businessType1[]" value="1"> Asia<br>
<input type="checkbox" class="uk-checkbox" name="businessType1[]" value="2"> Africa<br>
<input type="checkbox" class="uk-checkbox" name="businessType1[]" value="3"> America<br>
<input type="checkbox" class="uk-checkbox" name="businessType1[]" value="4"> South America<br>
<input type="checkbox" class="uk-checkbox" name="businessType1[]" value="5"> South America<br>
<input type="checkbox" class="uk-checkbox" name="businessType1[]" value="6"> Europe<br>
<input type="checkbox" class="uk-checkbox" name="businessType1[]" value="7"> Australia<br>







            </label>
        </div>

      

<input type="submit" value="submit" class="uk-button uk-button-primary">

</form>
</ul>
        </div>
    </div>



<?php endforeach; ?>
   
</div>

    </div>
	


</form>
  


  
         
                    

