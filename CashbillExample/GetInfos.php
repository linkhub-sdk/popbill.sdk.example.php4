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
					<?php
						if(isset($code)) {
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						} else {
							for ($i = 0; $i < Count($Presponse); $i++) {
					?>
							<fieldset class="fieldset2">
								<legend> 현금영수증 요약정보[<?php echo $i+1?>]</legend>
								<ul>
									<li> itemKey : <?php echo $Presponse[$i]->itemKey ?></li>
									<li> mgtKey : <?php echo $Presponse[$i]->mgtKey ?></li>
									<li> tradeDate : <?php echo $Presponse[$i]->tradeDate ?></li>
									<li> issueDT : <?php echo $Presponse[$i]->issueDT ?></li>
									<li> customerName : <?php echo $Presponse[$i]->customerName ?></li>
									<li> itemName : <?php echo $Presponse[$i]->itemName ?></li>
									<li> identityNum : <?php echo $Presponse[$i]->identityNum ?></li>
									<li> taxationType : <?php echo $Presponse[$i]->taxationType ?></li>
									<li> totalAmount : <?php echo $Presponse[$i]->totalAmount ?></li>
									<li> tradeUsage : <?php echo $Presponse[$i]->tradeUsage ?></li>
									<li> tradeType : <?php echo $Presponse[$i]->tradeType ?></li>
									<li> stateCode : <?php echo $Presponse[$i]->stateCode ?></li>
									<li> stateDT : <?php echo $Presponse[$i]->stateDT ?></li>
									<li> printYN : <?php echo $Presponse[$i]->printYN ?></li>
									<li> confirmNum : <?php echo $Presponse[$i]->confirmNum ?></li>
									<li> orgTradeDate : <?php echo $Presponse[$i]->orgTradeDate ?></li>
									<li> orgConfirmNum : <?php echo $Presponse[$i]->orgConfirmNum ?></li>
									<li> ntssendDT : <?php echo $Presponse[$i]->ntssendDT ?></li>
									<li> ntsresult : <?php echo $Presponse[$i]->ntsresult ?></li>
									<li> ntsresultDT : <?php echo $Presponse[$i]->ntsresultDT ?></li>
									<li> ntsresultCode : <?php echo $Presponse[$i]->ntsresultCode ?></li>
									<li> ntsresultMessage : <?php echo $Presponse[$i]->ntsresultMessage ?></li>
									<li> regDT : <?php echo $Presponse[$i]->regDT ?></li>
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
