<?php

$email = "daniel@nexlink.cloud";
$email_b64 = base64_encode($email);

$req_headers = getallheaders();

echo $email_b64;

?>