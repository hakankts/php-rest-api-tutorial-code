<?php

class auth {


	function auth_f($user_name,$password){
 		
		$api_url = "http://detaytrafik.com/ws/api/api_actions.php?action=auth&user_name=$user_name&password=$password";
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);		
		return $response;
	}
}




?>