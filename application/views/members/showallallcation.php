<style>

body,html {
    
    
    background-image: linear-gradient(rgb(197, 221, 234), rgb(115, 150, 187));
}


tr:nth-child(odd) {
background-color: #f9f9f9;

}

td,
th {
    border: 1px solid rgb(218, 211, 211,1);
    padding: 10px;
}

td {
    text-align: center;
}

tr:nth-child(even) {
    background-color: #eee;
}

th[scope="col"] {
    background-color: #696969;
    color: #fff;
}

th[scope="row"] {
    background-color: #d7d9f2;
}

caption {
    padding: 10px;
    caption-side: bottom;
}

table {
    border-collapse: collapse;
    border: 2px solid rgb(200, 200, 200);
    letter-spacing: 1px;
    font-family: sans-serif;
    font-size: .8rem;
}
.topnav {
  overflow: hidden;
  background-color: #7a7b7c;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color:#03293d;
  color: white;
}
.dot {
  height: 16px;
  width: 15px;
  background-color: #bed7e6;
  border-radius: 50%;
  display: inline-block;
}

</style>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
 <head>
        <title>Zoho Portal</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/zoho/css/uikit.min.css" />
        <script src="/zoho/js/uikit.min.js"></script>
        <script src="/zoho/js/uikit-icons.min.js"></script>
    </head>
    <body>
<div class="topnav">

  <a class="active" style="float: right;"href="<?=base_url().'login/logout';?>">Logout</a>
  <a href=""style="float: right;cursor: none;">Welcome <?php echo $_SESSION['name']?></a>
  
</div>

    <div class="uk-container">
       <nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="/zoho/gmi.png" width="430" height="530" alt="">
	 <a class="uk-button uk-button-danger"style="float: right;margin-left: 502px;" href="<?php echo base_url('members/index') ?>">Update Allocation</a>
	
  </a>
  <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        
      </li>
	  </ul>
</nav> 

<br>		
<table>
  
    <tr>
        
        <th scope="col">Sales member Name </th>
        <th scope="col">Category Name</th>
		<th scope="col">Region Name</th>
    </tr>
	<?php if(!empty($memberdata)){ foreach($memberdata as $row){ ?>

    <tr>

 
		
        <td><h4><?php echo $row->sales_per_name; ?></h4></td>
        <td><h4><?php echo $row->cat_name; ?><h4></td>
		<td><h4><?php 
				//var_dump($member1);
				//exit;
				$str=$row->conti_asign_id;
					$arr=explode(",",$str);
					
				
					//$str=$clipRow->conti_asign_id;
					//$chkbox=$res['hobbies'];
					//$arr=explode(",",$str);
					//var_dump($arr);
					//exit;
					
					?>
					<?php if(!empty($arr)){  ?>
					<label>

                     <?php    if(in_array('1',$arr)){ ?>
                   <?php if(in_array('1',$arr)){}else{}?> <span class="dot"></span> <b>Asia</b>
					<?php } if(in_array("2",$arr)){ ?>
					 <?php if(in_array("2",$arr)){}?><span class="dot"></span> <b>Africa</b><?php } if(in_array("3",$arr)){ ?>
					<?php if(in_array("3",$arr)){}?> <span class="dot"></span> <b>North America</b><?php } if(in_array("4",$arr)){ ?>
					<?php if(in_array("4",$arr)){}?> <span class="dot"></span> <b>South America</b><?php } if(in_array("5",$arr)){ ?>
					<?php if(in_array("5",$arr)){}?> <span class="dot"></span> <b>Antarctica</b><?php } if(in_array("6",$arr)){ ?>
					<?php if(in_array("6",$arr)){}?> <span class="dot"></span> <b>Europe</b><?php } if(in_array("7",$arr)){?>
				 <?php if(in_array("7",$arr)){}?> <span class="dot"></span> <b>Australia</b></label><?php } ?>
					
					</h4></td>
    </tr>
	  <?php } } ?>
	  <?php } ?>
</table>
