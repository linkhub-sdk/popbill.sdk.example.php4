<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php 
	include 'common.php';	

	$testCorpNum = '1234567890';	# 팝빌회원 사업자번호
	$mgtKey = '20150210-00';		# 문서관리번호

	$Presponse = $CashbillService->GetInfo($testCorpNum, $mgtKey);
	
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
				<legend>현금영수증 요약정보 및 상태정보 확인</legend>
				<ul>
					<?
						if(isset($code)) { 
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>
					<?
						} else {
							{
					?>
								<li> itemKey : <? echo $Presponse->itemKey ?></li>
								<li> mgtKey : <? echo $Presponse->mgtKey ?></li>
								<li> tradeDate : <? echo $Presponse->tradeDate ?></li>
								<li> issueDT : <? echo $Presponse->issueDT ?></li>
								<li> customerName : <? echo $Presponse->customerName ?></li>
								<li> itemName : <? echo $Presponse->itemName ?></li>
								<li> identityNum : <? echo $Presponse->identityNum ?></li>
								<li> taxationType : <? echo $Presponse->taxationType ?></li>
								<li> totalAmount : <? echo $Presponse->totalAmount ?></li>
								<li> tradeUsage : <? echo $Presponse->tradeUsage ?></li>
								<li> tradeType : <? echo $Presponse->tradeType ?></li>
								<li> stateCode : <? echo $Presponse->stateCode ?></li>
								<li> stateDT : <? echo $Presponse->stateDT ?></li>
								<li> printYN : <? echo $Presponse->printYN ?></li>
								<li> confirmNum : <? echo $Presponse->confirmNum ?></li>
								<li> orgTradeDate : <? echo $Presponse->orgTradeDate ?></li>
								<li> orgConfirmNum : <? echo $Presponse->orgConfirmNum ?></li>
								<li> ntssendDT : <? echo $Presponse->ntssendDT ?></li>
								<li> ntsresult : <? echo $Presponse->ntsresult ?></li>
								<li> ntsresultDT : <? echo $Presponse->ntsresultDT ?></li>
								<li> ntsresultCode : <? echo $Presponse->ntsresultCode ?></li>
								<li> ntsresultMessage : <? echo $Presponse->ntsresultMessage ?></li>
								<li> regDT : <? echo $Presponse->regDT ?></li>
					<?
							}
						}
					?>		
				</ul>
			</fieldset>
		 </div>
	</body>
</html>