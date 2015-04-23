<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';	#팝빌 회원 사업자 번호, "-"제외 10자리

	$Presponse = $TaxinvoiceService->GetEmailPublicKeys($testCorpNum);

	if(is_a($Presponse, 'PopbillException')){
		$code = $Presponse->code;
		$message = $Presponse->message;
	}
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>ASP사업자 유통메일 목록 확인</legend>
				<ul>
					<?
						if(!isset($code)) { 
							for($i=0; $i< Count($Presponse); $i++){
					?>
							 <fieldset class ="fieldset2">
							 <ul>
					<?
								foreach($Presponse[$i] as $key=>$val) {
					?>
									<li> <? echo $key; ?> : <? echo $val; ?> </li>
					<?
								}
					?>
							</ul>
							</fieldset>
					<?
							}
						} else {
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>
					<?
						}
					?>		
				</ul>
			</fieldset>
		 </div>
	</body>
</html>