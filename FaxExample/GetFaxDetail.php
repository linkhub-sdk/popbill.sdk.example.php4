<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';	#팝빌 회원 사업자 번호, "-"제외 10자리
	$testUserID = 'testkorea';		#팝빌 회원 아이디
	$ReceiptNum = '015042316435100001';		#팩스전송 접수번호

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
					<?php
						if(isset($code)) {
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						} else {
							for ($i = 0; $i < Count($Presponse); $i++){
					?>
						<fieldset class="fieldset2">
							<legend> 팩스전송내역 조회 결과 [<?php echo $i+1 ?>/<?php echo Count($Presponse)?>]</legend>
							<ul>

								<li> sendState : <?php echo $Presponse[$i]->sendState; ?> </li>
								<li> convState : <?php echo $Presponse[$i]->convState; ?> </li>
								<li> sendNum : <?php echo $Presponse[$i]->sendNum; ?> </li>
								<li> receiveNum : <?php echo $Presponse[$i]>receiveNum; ?> </li>
								<li> receiveName : <?php echo $Presponse[$i]->receiveName; ?> </li>
								<li> sendPageCnt : <?php echo $Presponse[$i]->sendPageCnt; ?> </li>
								<li> successPageCnt : <?php echo $Presponse[$i]->successPageCnt; ?> </li>
								<li> failPageCnt : <?php echo $Presponse[$i]->failPageCnt; ?> </li>
								<li> refundPageCnt : <?php echo $Presponse[$i]->refundPageCnt; ?> </li>
								<li> cancelPageCnt : <?php echo $Presponse[$i]->cancelPageCnt; ?> </li>
								<li> reserveDT : <?php echo $Presponse[$i]->reserveDT; ?> </li>
								<li> sendDT : <?php echo $Presponse[$i]->sendDT; ?> </li>
								<li> resultDT : <?php echo $Presponse[$i]->resultDT; ?> </li>
								<li> sendResult : <?php echo $Presponse[$i]->sendResult; ?> </li>
							</ul>
						</fieldset>
					<?php
							}
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
