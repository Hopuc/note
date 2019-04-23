<?php
header('Content-Type:text/html;Charset=utf-8'); 
if(isset($_POST['note'])){
$userInfo = $_POST;
$json = json_encode($userInfo,320);
$file = fopen('note.txt','w+');
fwrite($file,$json);
fclose($file);
$reuslt = array(
'status' => 1,
'message' => 'sucess',
//'data' => $json,
);
exit(json_encode($reuslt));
}else{
$json_string = file_get_contents('note.txt');
$data = json_decode($json_string, true);
var_dump($data);
}
?>