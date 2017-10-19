<?php
if(isset($_POST["country_id"])){
	include("includes/DBConnection.inc.php"); //get database connector instance
			//query DB to get states of a perticular country
        $getQuery="SELECT `id`,`name` FROM `tbl_states` WHERE `country_id`=".$_POST["country_id"];
				$result = $con->query($getQuery);
				if($result->num_rows){
					$data = array(0 => 'success'); //to indicate successfull retrieval
					while($ret = $result->fetch_assoc()){
						//all the states will be stored in associative array $data
						$data[] = array(
							'state_id' => $ret["id"], 'state_name' => $ret["name"],
							);
					}
				}
				//json encoded data printed, to be recieved by the XHR
				header('Content-Type: application/json');
				echo json_encode($data);
				$con->close();
		}
		else{
      		echo 'failure empty';
    	}
?>
