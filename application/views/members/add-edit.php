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
                    <li><a href="#">Sales Member </a></li>

                </ul>

            </div>

            <div class="uk-navbar-right">

                <ul class="uk-navbar-nav">
                    
<li><a href="#" style="cursor: none;">Welcome <?php echo $_SESSION['name']?></a></li>
                    <li><a href="<?=base_url().'login/logout';?>">Logout</a></li>
                </ul>
            </div>
          
        </nav> 


         <h1 class="uk-card-title">Add/Remove Domain Regions</h1>
<hr>
<div  style="
    background: #fff;
" >

<h4 id="text" class="uk-h5 tm-heading-fragment" style="color: #000 !important;">Sales Member Details<br/>
Full Name:<?php echo $member['sales_per_name']?><br/>
Sales ID:<?php echo $member['sales_id']?> <br/>
Token ID:<?php echo $member['tokan_id']?> <br/>

<hr>

    <div class="uk-child-width-1-2 @m uk-grid-small uk-grid-match" uk-grid>

    <?php foreach($memberdata as $memberdata):
     // var_dump($memberdata);
	  //exit;
	?>
	
    <div>
        <div class="uk-card uk-card-primary uk-card-body">
		
        <form  action="/zoho/Members/update" name="submit" method="POST">    
 <h3 name ="cat_name"class="uk-card-title"><?php echo $memberdata['cat_name']; ?></h3>
 
 
<?php
    
$product_id = $this->uri->segment(3);


?> 

<input type="hidden" name="cat_name" value="<?php echo $memberdata['cat_name'];?>">
<input type="hidden" name="id" value="<?php echo $memberdata['id'];?>">
<input type="hidden" name="saleteam_id" value="<?php echo $product_id;?>">

            <ul class="uk-list uk-list-bullet">
   
<?php 
				//var_dump($member1);
				//exit;
				$str=$memberdata['conti_asign_id'];
					$arr=explode(",",$str);
					//$str=$clipRow->conti_asign_id;
					//$chkbox=$res['hobbies'];
					//$arr=explode(",",$str);
					//var_dump($arr);
					//exit;
					
					?>

       

        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
            <label><input <?php if(in_array('1',$arr)){echo "checked";}?> class="uk-checkbox" type="checkbox" name="businessType1[]" value="1"/> Asia<br>
					<input <?php if(in_array("2",$arr)){echo "checked";}?> class="uk-checkbox"  type="checkbox" name="businessType1[]" value="2"/> Africa<br>
					<input <?php if(in_array("3",$arr)){echo "checked";}?> class="uk-checkbox" type="checkbox" name="businessType1[]" value="3"/> North America<br>
					<input <?php if(in_array("4",$arr)){echo "checked";}?> class="uk-checkbox" type="checkbox" name="businessType1[]" value="4"/> South America<br>
					<input <?php if(in_array("5",$arr)){echo "checked";}?> class="uk-checkbox" type="checkbox" name="businessType1[]" value="5"/> Antarctica<br>
					<input <?php if(in_array("6",$arr)){echo "checked";}?> class="uk-checkbox" type="checkbox" name="businessType1[]" value="6"/> Europe<br>
					<input <?php if(in_array("7",$arr)){echo "checked";}?> class="uk-checkbox" type="checkbox" name="businessType1[]" value="7"/> Australia<br></label>

        </div>

      

<!-- href="<?php echo site_url('members/update/'.$memberdata['saleteam_id']); ?>" -->

<input type="submit" value="submit" class="uk-button uk-button-secondary">
<a href="<?php echo site_url('members/add/'.$memberdata['saleteam_id']); ?>" class="uk-button uk-button-secondary">Add New Category</a>
<a href="<?php echo site_url('members/delete/'.$memberdata['id']); ?>" class="uk-button uk-button-danger" onclick="return confirm('Are you sure to delete?')">delete</a>
</form>

</ul>
        </div>
    </div>



<?php endforeach; ?>
   
</div>

    </div>
	<a class="uk-button uk-button-danger"href="<?=base_url().'members';?>">Back To List</a>
   


         
                    

