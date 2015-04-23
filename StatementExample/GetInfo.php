<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php 
	include 'common.php';	

	$testCorpNum = '1234567890';	# 팝빌회원 사업자번호, '-' 제외 10자리
	$testUserID = 'testkorea';		# 팝빌회원 아이디
	$itemCode = '121';				# 명세서 코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
	$mgtKey = '20150210-02';		# 문서관리번호

	$Presponse = $StatementService->GetInfo($testCorpNum, $itemCode, $mgtKey, $testUserID);

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
				<legend>전자명세서 요약정보 및 상태정보 확인</legend>
				<ul>
					<?
						if(isset($code)) { 
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>
					<?
						} else {
					?>
							<li> itemKey : <? echo $Presponse->itemKey ?></li>
							<li> stateCode : <? echo $Presponse->stateCode ?></li>
							<li> taxType : <? echo $Presponse->taxType ?></li>
							<li> purposeType : <? echo $Presponse->purposeType ?></li>
							<li> writeDate : <? echo $Presponse->writeDate ?></li>
							<li> senderCorpName : <? echo $Presponse->senderCorpName ?></li>
							<li> senderCorpNum : <? echo $Presponse->senderCorpNum ?></li>
							<li> receiverCorpName : <? echo $Presponse->receiverCorpName ?></li>
							<li> receiverCorpNum : <? echo $Presponse->receiverCorpNum ?></li>
							<li> supplyCostTotal : <? echo $Presponse->supplyCostTotal ?></li>
							<li> taxTotal : <? echo $Presponse->taxTotal ?></li>
							<li> issueDT : <? echo $Presponse->issueDT ?></li>
							<li> stateDT : <? echo $Presponse->stateDT ?></li>
							<li> openYN : <? echo $Presponse->openYN ?></li>
							<li> openDT : <? echo $Presponse->openDT ?></li>
							<li> stateMemo : <? echo $Presponse->stateMemo ?></li>
							<li> regDT : <? echo $Presponse->regDT ?></li>
					<?
						}
					?>		
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
