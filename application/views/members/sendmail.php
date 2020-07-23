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


<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8" />



  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>

<div>

 

<p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px">Hello <?php echo $_SESSION['name'];?>,</p>

<p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px">You have made below changes in Zoho allocation:</p>

</div>

</body>

</html>
<br>	
	
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

<br>
<a class="underlineHover" href="https://www.gminsights.com/">Global Market Insights© 2020 All Rights Reserved</a>





