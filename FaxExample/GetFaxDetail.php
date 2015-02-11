<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';	#팝빌 회원 사업자 번호, "-"제외 10자리
	$testUserID = 'testkorea';		#팝빌 회원 아이디
	$ReceiptNum = '015021018234300001';		#팩스전송 접수번호

	$Presponse = $FaxService->GetFaxDetail($testCorpNum ,$ReceiptNum, $testUserID);
	if(is_a($Preponse,'PopbillException')){
		$code = $Presponse->code;
		$message = $Presponse->message;
	}
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>팩스전송 내역 및 전송상태 확인</legend>
				<ul>
					<?
						if(isset($code)) { 
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : "<? echo $message ?></li>
					<?
						} else {
					?>
							<li> sendState : <? echo $Presponse->sendState; ?> </li>
							<li> convState : <? echo $Presponse->convState; ?> </li>
							<li> sendNum : <? echo $Presponse->sendNum; ?> </li>
							<li> receiveNum : <? echo $Presponse->receiveNum; ?> </li>
							<li> receiveName : <? echo $Presponse->receiveName; ?> </li>
							<li> sendPageCnt : <? echo $Presponse->sendPageCnt; ?> </li>
							<li> successPageCnt : <? echo $Presponse->successPageCnt; ?> </li>
							<li> failPageCnt : <? echo $Presponse->failPageCnt; ?> </li>
							<li> refundPageCnt : <? echo $Presponse->refundPageCnt; ?> </li>
							<li> cancelPageCnt : <? echo $Presponse->cancelPageCnt; ?> </li>
							<li> reserveDT : <? echo $Presponse->reserveDT; ?> </li>
							<li> sendDT : <? echo $Presponse->sendDT; ?> </li>
							<li> resultDT : <? echo $Presponse->resultDT; ?> </li>
							<li> sendResult : <? echo $Presponse->sendResult; ?> </li>

					<?
						}
					?>				
				</ul>
			</fieldset>
		 </div>
	</body>
</html>