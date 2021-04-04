<?php
header('Access-Control-Allow-Origin: *');

$message = $_POST['message'];
$number = $_POST['number'];
$apinumber = $_POST['apinumber'];

if($apinumber == 1){
    $apicode = 'TR-DOFIL546253_KYRE8';
    $passwd = 'm6cjzk}]%z';
} else if ($apinumber == 2){
    $apicode = 'TR-RIBOM371624_DDYCE';
    $passwd = '}n5tebd$%z';
} else {
    $apicode = 'TR-TIFIH706966_D8LTB';
    $passwd = 'v9u})ve@jc';    
}

 //##########################################################################
// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
// Visit www.itexmo.com/developers.php for more info about this API
//##########################################################################
function itexmo($number,$message,$apicode,$passwd){
    $url = 'https://www.itexmo.com/php_api/api.php';
    $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
    $param = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($itexmo),
        ),
    );
    $context  = stream_context_create($param);
    return file_get_contents($url, false, $context);
}
//##########################################################################

// function itexmo($number,$message,$apicode,$passwd){
// 			$ch = curl_init();
// 			$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
// 			curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
// 			curl_setopt($ch, CURLOPT_POST, 1);
// 			 curl_setopt($ch, CURLOPT_POSTFIELDS, 
// 			          http_build_query($itexmo));
// 			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 			return curl_exec ($ch);
// 			curl_close ($ch);
// }


// echo "" . $number . "" . $message . "" . $apicode . "" . $passwd;

$result = itexmo($number,$message,$apicode,$passwd);
if ($result == ""){
echo "iTexMo: No response from server!!!
Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.  
Please CONTACT US for help. ";  
}else if ($result == 0){
echo "Message Sent!" . $result ."";
}
else{ 
echo "Error Num ". $result . " was encountered!";
}


?>

