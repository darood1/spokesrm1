<?php
// Requires a PHP-enabled host with working outgoing mail transport.
header('Content-Type: application/json; charset=utf-8');
function respond($code,$msg,$ok=false){http_response_code($code);echo json_encode(['success'=>$ok,'message'=>$msg]);exit;}
if($_SERVER['REQUEST_METHOD']!=='POST')respond(405,'Method not allowed.');
if(!empty($_POST['website']))respond(200,'Received.',true);
$fields=['name','company','email','location','service','start','message'];$data=[];
foreach($fields as $key){$data[$key]=trim((string)($_POST[$key]??''));if(strlen($data[$key])>6000)respond(400,'Invalid field length.');}
foreach(['name','company','email','location','service','message'] as $key){if($data[$key]==='')respond(400,'Please complete all required fields.');}
if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))respond(400,'Please provide a valid email address.');
if(strlen($data['message'])<20)respond(400,'Please provide more detail about your requirements.');
if(($_POST['consent']??'')!=='yes')respond(400,'Please confirm your privacy consent.');
foreach($data as &$value){$value=str_replace(["\r","\0"],[' ',' '],$value);}unset($value);
$recipient='info@spokesrm.co.uk';$subject='New SPOKES website enquiry — '.preg_replace('/[\r\n]/',' ',$data['company']);
$body="New website enquiry\n\n";foreach($data as $k=>$v){$body.=ucfirst($k).": ".$v."\n\n";}
// Configure SPF/DKIM for your domain; this sender must be authorised by your hosting provider.
$headers=['From: SPOKES Website <no-reply@spokesrm.co.uk>','Reply-To: '.$data['email'],'Content-Type: text/plain; charset=UTF-8','X-Mailer: SPOKES Website'];
if(!mail($recipient,$subject,$body,implode("\r\n",$headers)))respond(503,'The mail service is not configured. Please contact the website administrator.');
respond(200,'Enquiry submitted.',true);
