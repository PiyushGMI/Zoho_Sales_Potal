	
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
                    <li> <li ><img src="/zoho/gmi.png" alt="GMI"class="center"width="400" height="100"></li>
                    <!--<li><?php echo $title; ?></li>-->

                </ul>

            </div>

            <div class="uk-navbar-right">

                <ul class="uk-navbar-nav">
          
<li><a href="#" style="cursor: none;">Welcome 	<?php echo $_SESSION['name']?></a></li>
  
                    <li><a href="<?=base_url().'/login/logout';?>">Logout</a></li>
                </ul>
            </div>
          
        </nav> 



<div class="uk-card uk-card-primary uk-card-body">
  <table class="uk-table uk-table-justify uk-table-divider">
    <thead>
        <tr>
          <th class="uk-width-medium">  <b>Sales Member Name </b></th>
         <th></th>
         <th style="float:right;">  <b> Actions</b></th> 
        </tr>
    </thead>
    <tbody>
  <?php if(!empty($members)){ foreach($members as $row){ ?>
        <tr>
            <td><?php echo $row['sales_per_name']; ?></td>
            <td></td>
            <td><p uk-margin style="float:right;">
 <a href="<?php echo site_url('members/view/'.$row['sales_id']); ?>" class="uk-button uk-button-primary">View</a>
 <a href="<?php echo site_url('members/edit/'.$row['sales_id']); ?>" class="uk-button uk-button-danger">Edit</a>
  
    
        </tr>
        <tr>
          
            
      
   <?php } }else{ ?>
        </tr>

  <?php } ?>
    </tbody>
</table>
</div>

    
   

         
                    

