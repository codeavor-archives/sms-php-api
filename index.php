<?php
header('Access-Control-Allow-Origin: *');

$message = $_POST['message'];
$number = $_POST['number'];
$apinumber = $_POST['apinumber'];

if($apinumber == 1){
    $apicode = 'TR-CAWAL706978_XZBTT';
    $passwd = 'zi[mlt9fa&';
} else if ($apinumber == 2){
    $apicode = 'TR-MIDEL706988_1KXIS';
    $passwd = '1cp%}g6u44';
} else if ($apinumber == 4){
    $apicode = 'ST-ONETA473380_W6YS1';
    $passwd = '!f88]@]n&c';
} else {
    $apicode = 'TR-XEHOW706948_FJVBE';
    $passwd = '2vd@l(ehr(';    
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

