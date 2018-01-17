<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';	# 팝빌회원 사업자번호

	$MgtKeyList = array(			# 문서관리번호 배열, 최대 1000건
			'20150210-01',
			'20150210-02',
	);

	$Presponse = $CashbillService->GetInfos($testCorpNum, $MgtKeyList);

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
				<legend>현금영수증 요약정보 대량 확인</legend>
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
									<legend> 현금영수증 요약정보[<? echo $i+1?>]</legend>
									<ul>
										<li> itemKey : <? echo $Presponse[$i]->itemKey ?></li>
										<li> mgtKey : <? echo $Presponse[$i]->mgtKey ?></li>
										<li> tradeDate : <? echo $Presponse[$i]->tradeDate ?></li>
										<li> issueDT : <? echo $Presponse[$i]->issueDT ?></li>
										<li> customerName : <? echo $Presponse[$i]->customerName ?></li>
										<li> itemName : <? echo $Presponse[$i]->itemName ?></li>
										<li> identityNum : <? echo $Presponse[$i]->identityNum ?></li>
										<li> taxationType : <? echo $Presponse[$i]->taxationType ?></li>
										<li> totalAmount : <? echo $Presponse[$i]->totalAmount ?></li>
										<li> tradeUsage : <? echo $Presponse[$i]->tradeUsage ?></li>
										<li> tradeType : <? echo $Presponse[$i]->tradeType ?></li>
										<li> stateCode : <? echo $Presponse[$i]->stateCode ?></li>
										<li> stateDT : <? echo $Presponse[$i]->stateDT ?></li>
										<li> printYN : <? echo $Presponse[$i]->printYN ?></li>
										<li> confirmNum : <? echo $Presponse[$i]->confirmNum ?></li>
										<li> orgTradeDate : <? echo $Presponse[$i]->orgTradeDate ?></li>
										<li> orgConfirmNum : <? echo $Presponse[$i]->orgConfirmNum ?></li>
										<li> ntssendDT : <? echo $Presponse[$i]->ntssendDT ?></li>
										<li> ntsresult : <? echo $Presponse[$i]->ntsresult ?></li>
										<li> ntsresultDT : <? echo $Presponse[$i]->ntsresultDT ?></li>
										<li> ntsresultCode : <? echo $Presponse[$i]->ntsresultCode ?></li>
										<li> ntsresultMessage : <? echo $Presponse[$i]->ntsresultMessage ?></li>
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
