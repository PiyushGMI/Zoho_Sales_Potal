<style>

body,html {
    
    
    background-image: linear-gradient(rgb(197, 221, 234), rgb(115, 150, 187));
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
	 <a class="uk-button uk-button-danger"style="float: right;margin-left: 458px;" href="<?php echo base_url('members/showallallcation') ?>">Check Current Allocation</a>
	
  </a>
  
  <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        
      </li>
	  </ul>
</nav> 

<br>	
<h1>You have done below changes in domain allocation</h1>	
<table>
  
    <tr>
        
        <th scope="col">Sales person </th>
        <th scope="col">Category</th>
		<th scope="col">Assign Regions</th>
		<th scope="col">Action(Complete or not)</th>
    </tr>
	<?php   for($i=0;$i< count($succes_array);$i++)
        {  ?>

    <tr>

 
		
        <td><?php echo $succes_array[$i]['sales_name'] ?></td>
        <td><?php echo $succes_array[$i]['cat'] ?></td>
		<td><?php echo $succes_array[$i]['region'] ?></td>
		<td><?php if($succes_array[$i]['action']==0){echo "This is not updated";}else{ echo "Assign successfully";} ?></td>
	
	  <?php } ?>
</table>
