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
                    <li <li> <li ><img src="/zoho/gmi.png" alt="GMI"class="center"width="400" height="100"></li></li>
 <li><a href="#">Sales Member </a></li>
                    <!--<li><a href="#"><?php echo $title; ?></a></li>-->

                </ul>

            </div>

            <div class="uk-navbar-right">

                <ul class="uk-navbar-nav">
                    
<li><a href="#" style="cursor: none;">Welcome <?php echo $_SESSION['name']?></a></li>
                    <li><a href="<?=base_url().'login/logout';?>">Logout</a></li>
                </ul>
            </div>
          
        </nav> 

<div class="uk-section uk-section-primary" style="
    background: #fff;
" >

<h4 id="text" class="uk-h5 tm-heading-fragment" style="color: #000 !important;"><b>Sales Member Details</b><br/>
Full Name:<?php echo $member['sales_per_name']?><br/>
Sales_ID :<?php echo $member['sales_id']; ?> <br/>
Tokan_id:<?php echo $member['tokan_id']; ?>
 <hr>



    <div class="uk-child-width-1-2 @m uk-grid-small uk-grid-match" uk-grid>
    <?php foreach( $member1 as $clipRow): ?>
    <div>
        <div class="uk-card uk-card-primary uk-card-body">

            <h3 class="uk-card-title"><?php echo $clipRow['cat_name']?></h3>
            <ul class="uk-list uk-list-bullet">
<?php 
				//var_dump($member1);
				//exit;
				$str=$clipRow['conti_asign_id'];
					$arr=explode(",",$str);
					//$str=$clipRow->conti_asign_id;
					//$chkbox=$res['hobbies'];
					//$arr=explode(",",$str);
					//var_dump($arr);
					//exit;
					
					?>
    <label><input <?php if(in_array('1',$arr)){echo "checked";}?> class="uk-checkbox" type="checkbox" name="arr[]" value="Asia"/disabled> Asia<br>
					<input <?php if(in_array("2",$arr)){echo "checked";}?> class="uk-checkbox" type="checkbox" name="arr[]" value="Africa"/disabled> Africa<br>
					<input <?php if(in_array("3",$arr)){echo "checked";}?> class="uk-checkbox" type="checkbox" name="arr[]" value="North America"/disabled> North America<br>
					<input <?php if(in_array("4",$arr)){echo "checked";}?> class="uk-checkbox" type="checkbox" name="arr[]" value="South America"/disabled> South America<br>
					<input <?php if(in_array("5",$arr)){echo "checked";}?> class="uk-checkbox" type="checkbox" name="arr[]" value="Antarctica"/disabled> Antarctica<br>
					<input <?php if(in_array("6",$arr)){echo "checked";}?> class="uk-checkbox"type="checkbox" name="arr[]" value="Europe"/disabled> Europe<br>
					<input <?php if(in_array("7",$arr)){echo "checked";}?> class="uk-checkbox"type="checkbox" name="arr[]" value="Australia"/disabled> Australia<br></label>
  
</ul>

        </div>
    </div>
 <?php endforeach; ?>
  

</div>

    </div>
 <a class="uk-button uk-button-danger"href="<?=base_url().'members';?>">Back To List</a>
         
                    

