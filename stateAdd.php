<?php
include("includes/core.inc.php");
if(isset($_POST["country_id"])){
	include("includes/DBConnection.inc.php");
        $getQuery="SELECT `id`,`name` FROM `tbl_states` WHERE `country_id`=".$_POST["country_id"];
				$result = $con->query($getQuery);
				if($result->num_rows){
					$data = array(0 => 'success');
					while($ret = $result->fetch_assoc()){
						$data[] = array(
							'state_id' => $ret["id"], 'state_name' => $ret["name"],
							);
					}
				}
				header('Content-Type: application/json');
				echo json_encode($data);
		}
		else{
      		echo 'failure empty';
    	}
    	$con->close();
    	exit();
?>
