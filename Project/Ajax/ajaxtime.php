<?php 
include("../Connection/Connection.php");
?>
 <option value="">-----Select------</option> 
         <?php
		 						
							$tid=$_GET["tid"];
					
                   $selQry = "select * from tbl_time where time_value>'".$tid."'";
                   $rs = mysql_query($selQry);
                   while ($data = mysql_fetch_array($rs)) {
			?>
            	
                <option value="<?php echo $data["time_value"];?>"><?php echo $data["time_hr"];?></option>
            
            <?php
				   }
			?>