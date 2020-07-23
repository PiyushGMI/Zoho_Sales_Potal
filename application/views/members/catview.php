

<div class="container">
    <h2><?php echo $title; ?></h2>
    <div class="col-md-6">
        <div class="card" style="width:400px">
            <div class="card-body">
			
                <h4 class="card-title"style="color:red;">Category Name*<?php echo $member3[0]['cat_name']?></h4></p>
               <!-- <p class="card-text"><b>Sales ID</b> <?php echo $member['sales_id']; ?></p>
                <p class="card-text"><b>Tokan_id:</b> <?php echo $member['tokan_id']; ?></p>-->
				<?php //var_dump($data1);
				//exit; ?>
				<?php foreach( $member3 as $clipRow): ?>
                
				 <h4 class="card-title"></b>Sales Name:*<?php echo $clipRow['sales_per_name']?></h4>

               

					   
					   <Tr>
					
					<Td>
			
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
					  
					
					<input <?php if(in_array('1',$arr)){echo "checked";}?> type="checkbox" name="arr[]" value="Asia"/>Asia<br>
					<input <?php if(in_array("2",$arr)){echo "checked";}?>  type="checkbox" name="arr[]" value="Africa"/>Africa<br>
					<input <?php if(in_array("3",$arr)){echo "checked";}?> type="checkbox" name="arr[]" value="North America"/>North America<br>
					<input <?php if(in_array("4",$arr)){echo "checked";}?> type="checkbox" name="arr[]" value="South America"/>South America<br>
					<input <?php if(in_array("5",$arr)){echo "checked";}?> type="checkbox" name="arr[]" value="Antarctica"/>Antarctica<br>
					<input <?php if(in_array("6",$arr)){echo "checked";}?> type="checkbox" name="arr[]" value="Europe"/>Europe<br>
					<input <?php if(in_array("7",$arr)){echo "checked";}?> type="checkbox" name="arr[]" value="Australia"/>Australia<br>
					
		
					
					</td>
				</tr>
				
 <?php endforeach; ?>
 
                <a href="<?php echo site_url('members'); ?>" class="btn btn-primary">Back To List</a>
            </div>
        </div>
    </div>
</div>
