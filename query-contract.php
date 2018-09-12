<?php
//header('Content-Type:application/json; charset=utf-8');
ini_set('date.timezone','Asia/Shanghai');

require_once 'lib/Cmb.Request.php';
require_once 'lib/Cmb.Builder.php';
require_once 'lib/log.php';

$logHandler= new CLogFileHandler("logs/".date('Y-m-d').'.ccb.log');
$log = Log::Init($logHandler, 15);

//解约参数
$merchantSerialNo = '100000000000001';
$agrNo = '100000000000001';

//查询用户签约协议
$inputObj = new CmbSignContractQuery();
$inputObj->SetMerchantSerialNo($merchantSerialNo);
$inputObj->SetAgrNo($agrNo);

$gateway = 'http://121.15.180.72';
$result = CmbApi::signContractQuery($gateway, $inputObj);
Log::DEBUG("contract-query:" . json_encode($result, JSON_UNESCAPED_UNICODE));

echo json_encode($result);
