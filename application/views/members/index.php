	<?php ini_set('display_errors', 0); ?>
	<style>
	body,html {
    
    
    background-image: linear-gradient(rgb(197, 221, 234), rgb(115, 150, 187));
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
tr:nth-child(odd) {	
background-color: #f9f9f9;

}

.topnav a.active {
  background-color:#03293d;
color: white;}

	</style>
	<?php 
	if(isset($_SESSION['logged_in']))
	{
		
		?>
<!DOCTYPE html>
<html>
    <head>
        <title>Zoho Portal</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/zoho/css/uikit.min.css" />
        <script src="/zoho/js/uikit.min.js"></script>
        <script src="/zoho/js/uikit-icons.min.js"></script>
		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

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

<div class="uk-card uk-card-primary uk-card-body">

<!--

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





<!-- End here-->
<!--</div> -->

<div id="refresh">

<label for="cars"><h4>Choose Sales Member:</h4></label></b>

<select name="salesteam" id="salesteam" style="font-size: 17px;">
   <option value="Select Sales Member" name ="df">Select Sales Member</option>
    <?php if(!empty($members)){ foreach($members as $row){ ?>

             

            <option value="<?php echo $row['sales_id'];  ?>" name ="<?php echo $row['sales_per_name']; ?>"><?php echo $row['sales_per_name']; ?></option>

            <?php }} ?>
  
</select>



<label for="cars"><h4>Choose Category: </h4></label>

<select name="category" id="category" style="font-size: 17px;">
<option value="select Category">select Category</option>
<option value="Healthcare and Medical devices">Healthcare and Medical devices</option>
<option value="HVAC and Construction">HVAC and Construction</option>
<option value="Food, Nutrition and Animal Feed">Food, Nutrition and Animal Feed</option>
<option value="Polymers and Advanced Materials">Polymers and Advanced Materials</option>
<option value="Bulk and Specialty Chemicals">Bulk and Specialty Chemicals</option>
<option value="Energy, Mining, Oil and Gas">Energy, Mining, Oil and Gas</option>
<option value="Biomass, Bioenergy and Renewable Chemistry">Biomass, Bioenergy and Renewable Chemistry</option>
<option value="Automotive and Transportation">Automotive and Transportation</option>
<option value="Sustainable and Smart Technologies">Sustainable and Smart Technologies</option>
<option value="Electronics and Media">Electronics and Media</option>
<option value="Aerospace and Defense">Aerospace and Defense</option>
</select>


 <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
  <label for="cars"><h4>Choose Regions:</h4></label>
            <li>
  <?php if(!empty($region)){ for($i=0;$i< count($region);$i++){ ?>
                <input class="uk-checkbox" id="<?php echo $region[$i]['conti_id']  ?>" type="checkbox" name="businessType1" value="<?php echo $region[$i]['conti_name']?>"> <?php echo $region[$i]['conti_name'];  ?><br>
 <?php } ?>
<input class="uk-checkbox" id="1,2,5,7" type="checkbox" name="businessType1" value="APAC"> APAC<br>
<?php }?>

  
            </li>

        </div>

</div>


 <script type="text/javascript">
function add_row ()
{ var tbl = document.getElementById( "tbl" );
  
  var el= document.getElementById('salesteam');
  
  var salesteam = el.options[el.selectedIndex].innerHTML;

   var cat= document.getElementById('category').value;

     var reginname="";
  var reginid="";
   var el1="";
   var sles="";
  var checkbox_chk=0;
   
   $("input:checkbox[name=businessType1]:checked").each(function(){

   reginname=reginname +","+$(this).val();

   reginid=reginid +","+$(this).attr('id');

  

checkbox_chk=1;
});



$.ajax({
      async: false,
      url:'<?php echo base_url('members/getpreid');?>',
      method:'POST',
      data:{cat:cat,reginid:reginid},
      success:function(response){
     
	   
	    console.log(response);
		
	     
	
        el1= response;

      }
     
  });

 

if(salesteam=="Select Sales Member"){

alert("Please Choose sales person");
}else if(cat=="select Category"){

alert("Please select domain");
}else if(checkbox_chk==0){

alert("Please choose region");

}else{

var row = tbl.insertRow( -1 ); // INSERT ROW AT THE END OF TABLE.
  var cel = row.insertCell( -1 ); // INSERT CELL AT THE END OF ROW.

  var teamid= document.getElementById('salesteam').value;
  
      cel.innerHTML = "<input  style='width: 101%;' type='text' name='name[]' value='"+salesteam+"'/>"+"<input type='hidden' name='name_id[]' value='"+teamid+"'/>";    // ◄■■■ [] ARRAY.
  cel = row.insertCell( -1 ); // REUSING THE SAME VARIABLE.

 
  cel.innerHTML = "<input style='width: 101%;' type='text' name='cat[]' value='"+cat+"'/>";       // ◄■■■ [] ARRAY.
   cel = row.insertCell( -1 ); // REUSING THE SAME VARIABLE.



   var reginid = reginid.replace(/^,/, '');
    var reginname = reginname.replace(/^,/, '');
	//alert(reginname);
  cel.innerHTML = "<input style='width: 101%;' type='text' name='region[]' value='"+$.trim(reginname)+"'/>"+"<input type='hidden' name='region_id[]' value='"+$.trim(reginid)+"'/>";

    cel = row.insertCell( -1 ); // REUSING THE SAME VARIABLE.

  
  cel.innerHTML = "<input style='width: 101%;' type='text' id='sles' name='sles[]' value='"+el1+"'/>";

    cel = row.insertCell( -1 ); 

 
 
	
   
  cel.innerHTML = "<input style='width: 101%;    box-shadow: 0 5px 15px rgba(255,255,255);' class='btnDelete' type='button' value='Delete'/>";       // ◄■■■ [] ARRAY.
  
  
document.getElementById('salesteam').selectedIndex = 0;
document.getElementById('category').selectedIndex = 0;


 $("input:checkbox[name=businessType1]:checked").each(function(){

   this.checked = false;
});
 

  }
    // ◄■■■ [] ARRAY.
}


</script>

<script>
$(document).ready(function(){

 $("#tbl").on('click','.btnDelete',function(){
       $(this).closest('tr').remove();
     });


/*$("#submitBtn").click(function(){        
         

 var totalRowCount = $("#tbl tr").length;

  

         if(totalRowCount == 1) {
    //...dosomething here

alert("Please add above domain.");

}else{


if (confirm('Are you sure ?')) {
	
       $("#myForm").submit(); 
    }
          

        }
});*/

});

</script>

<script>
$(document).ready(function(){
$(document).on("click","#test-element",function() {
    alert("click");
});
 $("#tbl").on('click','.btnDelete',function(){
       $(this).closest('tr').remove();
     });


$("#submitBtn").click(function(){        
         

 var totalRowCount = $("#tbl tr").length;

  

         if(totalRowCount == 1) {
    //...dosomething here

alert("Please add above domain.");

}else{


if (confirm('Are you sure ?')) {

	          
		
       $("#myForm").submit(); 
    }
          

        }
});

});

</script>
 <script type = "text/javascript">
         $(function() {

            $("#toggle").click(function() {
				
               ($("#dialog-5").dialog("isOpen") == false) ? $(
                  "#dialog-5").dialog("open") : $("#dialog-5").dialog("close") ;
            });
            $("#dialog-5").dialog({autoOpen: false});
         });
      </script>


<button id="button"  class="uk-button uk-button-danger"onclick="add_row()">Assign Domain</button></br>
</div>
<br>
<div id="div1" class="uk-card uk-card-primary uk-card-body" style="display:none;">
<body>
<form id="myForm"  method="post" action="<?php echo base_url('members/tbldata') ?>">
      <table id="tbl" border="1" style="width: 100%;">
        <tr style="font-size: 23px;color: #fff;">
          <td ><p style="background-color:#527593">Sales Person</p></td>
          <td><p style="background-color:#527593">Category</p></td>
          <td><p style="background-color:#527593">Regions</p></td>
		  <td><p style="background-color:#527593">previous Allocated sales person</p></td>
          <td><p style="background-color:#527593">Action</p></td>
		  
		 
        </tr>
      </table>
      <br>
</body>	  

	<input id="button" data-toggle="modal" data-target="#exampleModalLong" value="Preview Domain" class="uk-button uk-button-danger"onclick="document.getElementById('exampleModalLongTitle1').innerHTML=document.getElementById('myForm').innerHTML" /> 
     
    </form>
	
	</div>
	
	<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> <img src="/zoho/gmi.png" width="330" height="430" alt=""></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  id="exampleModalLongTitle1" class="modal-body">
  <div id="div1" class="uk-card uk-card-primary uk-card-body" >
  <h5>Preview Allocation</h5>
<body>
<form id="myForm"  method="post" action="<?php echo base_url('members/tbldata') ?>">
      <table id="tbl" border="1" style="width: 100%;">
        <tr style="font-size: 23px;color: #fff;">
          <td ><p style="background-color:#527593">Sales Person</p></td>
          <td><p style="background-color:#527593">Category</p></td>
          <td><p style="background-color:#527593">Regions</p></td>
		  <td><p style="background-color:#527593">previous Allocated sales person</p></td>
          <td><p style="background-color:#527593">Action</p></td>
		  
		 
        </tr>
      </table>
      <br>
</body>	  

	<input id="button" data-toggle="modal" data-target="#exampleModalLong" value="Preview Domain" class="uk-button uk-button-danger" /> 
     
    </form>
	
	
	</div>
      </div>
      <div class="modal-footer">
	   <input class="uk-button uk-button-primary" type="button"  id="submitBtn"value="Submit Domain"/>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		
        
      </div>
    </div>
  </div>
</div>
	

     
 
 
	
  <?php
	}
	else{
	 redirect(base_url().'login');
	}
	?>
	<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("#div1").fadeIn(1000);
   // $("#div2").fadeIn("slow");
   // $("#div3").fadeIn(3000);
  });
});
</script>

<script>
$(document).ready(function(){
  $("toggle").click(function(){
    $("p").fadeOut();
  });
});
</script>


<!doctype html>
<html lang = "en">
   <head>
      <meta charset = "utf-8">
      <title>jQuery UI Dialog functionality</title>
      <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      
      <!-- CSS -->
      <style>
         .ui-widget-header,.ui-state-default, ui-button {
            background:#64859e;
            border: 1px solid #b9cd6d;
            color: #FFFFFF;
            font-weight: bold;
			width:300px;
         }
		 
.ui-dialog ui-widget ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable{
	
	    position: absolute;
    height: 260.46px;
    width: 716.46px;
    top: 505.977px;
    left: 482.98px;
    display: block;
}
}
		body{
  height: 100vh;
  text-align: center;
}
  /*Trigger Button*/
.login-trigger {
  font-weight: bold;
  color: #fff;
  background: linear-gradient(to bottom right, #B05574, #F87E7B);
  padding: 15px 30px;
  border-radius: 30px;
  position: relative; 
  top: 50%;
}

/*Modal*/
h4 {
  font-weight: bold;
  color: #fff;
}
.close {
  color: #fff;
  transform: scale(1.2)
}
.modal-content {
  font-weight: bold;
  width: 218%;
  margin-left:-260px;
  background: linear-gradient(to bottom right,#ffffff,#f9fafc);
}
.form-control {
  margin: 1em 0;
}
.form-control:hover, .form-control:focus {
  box-shadow: none;  
  border-color: #fff;
}
.username, .password {
  border: none;
  border-radius: 0;
  box-shadow: none;
  border-bottom: 2px solid #eee;
  padding-left: 0;
  font-weight: normal;
  background: transparent;  
}
.form-control::-webkit-input-placeholder {
  color: #eee;  
}
.form-control:focus::-webkit-input-placeholder {
  font-weight: bold;
  color: #fff;
}
.login {
  padding: 6px 20px;
  border-radius: 20px;
  background: none;
  border: 2px solid #FAB87F;
  color: #FAB87F;
  font-weight: bold;
  transition: all .5s;
  margin-top: 1em;
}
.login:hover {
  background: #FAB87F;
  color: #fff;
}	 

		
		
      </style>
      
      <!-- Javascript -->
     
   </head>
   
   
</html>

<!--Trigger-->


                    

