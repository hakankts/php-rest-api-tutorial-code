<?php

require_once("autoload.php");

$api_url = "http://localhost/MY_API/api/api_actions.php?action=fetch_all";

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);



$output = '';

if(count($result) > 0)
{
 foreach($result as $row)
 {
  $output .= '
  <tr>
   <td>'.$row->first_name.'</td>
   <td>'.$row->last_name.'</td>
   <td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">'.$lang["update"].'</button></td>
   <td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">'.$lang["delete"].'</button></td>
  </tr>
  ';
 }
}
else
{
 $output .= '
 <tr>
  <td colspan="4" align="center">'.$lang["found"].'</td>
 </tr>
 ';
}

echo $output;

?>