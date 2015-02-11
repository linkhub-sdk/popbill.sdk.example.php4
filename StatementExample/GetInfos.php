<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php 
	include 'common.php';	

	$testCorpNum = '1234567890';	# 팝빌회원 사업자번호, '-'제외 10자리
	$testUserID = 'testkorea';		# 팝빌회원 아이디
	$itemCode = '121';				# 명세서 코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
	
	$MgtKeyList = array(			# 문서관리번호 배열, 최대 1000건
			'20150210-01',
			'20150210-02',
	);

	$Presponse = $StatementService->GetInfos($testCorpNum, $itemCode, $MgtKeyList, $testUserID);

	if(is_a($Presponse,'PopbillException')){
		$code = $Presponse->code;
		$message = $Presponse->message;
	}
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>전자명세서 요약정보 대량 확인</legend>
				<ul>
					<?
						if(isset($code)) { 
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>
					<?
						} else {
							for ($i = 0; $i < Count($Presponse); $i++) { 
					?>
							<fieldset class="fieldset2">
								<legend> 전자명세서 요약정보[<? echo $i+1?>]</legend>
								<ul>
									<li> itemKey : <? echo $Presponse[$i]->itemKey ?></li>
									<li> stateCode : <? echo $Presponse[$i]->stateCode ?></li>
									<li> taxType : <? echo $Presponse[$i]->taxType ?></li>
									<li> purposeType : <? echo $Presponse[$i]->purposeType ?></li>
									<li> writeDate : <? echo $Presponse[$i]->writeDate ?></li>
									<li> senderCorpName : <? echo $Presponse[$i]->senderCorpName ?></li>
									<li> senderCorpNum : <? echo $Presponse[$i]->senderCorpNum ?></li>
									<li> receiverCorpName : <? echo $Presponse[$i]->receiverCorpName ?></li>
									<li> receiverCorpNum : <? echo $Presponse[$i]->receiverCorpNum ?></li>
									<li> supplyCostTotal : <? echo $Presponse[$i]->supplyCostTotal ?></li>
									<li> taxTotal : <? echo $Presponse[$i]->taxTotal ?></li>
									<li> issueDT : <? echo $Presponse[$i]->issueDT ?></li>
									<li> stateDT : <? echo $Presponse[$i]->stateDT ?></li>
									<li> openYN : <? echo $Presponse[$i]->openYN ?></li>
									<li> openDT : <? echo $Presponse[$i]->openDT ?></li>
									<li> stateMemo : <? echo $Presponse[$i]->stateMemo ?></li>
									<li> regDT : <? echo $Presponse[$i]->regDT ?></li>
								</ul>
							</fieldset>
					<?
							}
						}
					?>
					
				</ul>
			</fieldset>
		 </div>
	</body>
</html>