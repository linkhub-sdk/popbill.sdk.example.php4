<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';			# 팝빌회원 사업자번호, '-'제외 10자리
	$mgtKeyType = MgtKeyType_SELL;			# 발행유형, MgtKeyType_SELL:매출, MgtKeyType_BUY:매입, MgtKeyType_TURSEE:위수탁
	$mgtKey = '20150211-01';				# 문서관리번호

	$Presponse = $TaxinvoiceService->GetInfo($testCorpNum, $mgtKeyType, $mgtKey);

	if(is_a($Presponse, 'PopbillException')) {
		$code = $Presponse->code;
		$message = $Presponse->message;
	}
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>세금계산서 요약정보 및 상태정보 확인</legend>
				<ul>
					<?php
						if(!isset($code)) {
							if(is_null($Presponse->itemKey)){
					?>
								<ul>
									<li>해당 문서관리번호의 세금계산서가 존재하지 않습니다.</li>
								</ul>
					<?php
            } else {
					?>
								<li>itemKey : <?php echo $Presponse->itemKey ?></li>
								<li>taxType : <?php echo $Presponse->taxType ?></li>
								<li>writeDate : <?php echo $Presponse->writeDate ?></li>
								<li>regDT : <?php echo $Presponse->regDT ?></li>
								<li>invoicerCorpName : <?php echo $Presponse->invoicerCorpName ?></li>
								<li>invoicerCorpNum : <?php echo $Presponse->invoicerCorpNum ?></li>
								<li>invoicerMgtKey : <?php echo $Presponse->invoicerMgtKey ?></li>
								<li>invoiceeCorpName : <?php echo $Presponse->invoiceeCorpName ?></li>
								<li>invoiceeCorpNum : <?php echo $Presponse->invoiceeCorpNum ?></li>
								<li>invoiceeMgtKey : <?php echo $Presponse->invoiceeMgtKey ?></li>
								<li>trusteeCorpName : <?php echo $Presponse->trusteeCorpName ?></li>
								<li>trusteeCorpNum : <?php echo $Presponse->trusteeCorpNum ?></li>
								<li>trusteeMgtKey : <?php echo $Presponse->trusteeMgtKey ?></li>
								<li>supplyCostTotal : <?php echo $Presponse->supplyCostTotal ?></li>
								<li>taxTotal : <?php echo $Presponse->taxTotal ?></li>
								<li>purposeType : <?php echo $Presponse->purposeType ?></li>
								<li>modifyCode : <?php echo $Presponse->modifyCode ?></li>
								<li>issueType : <?php echo $Presponse->issueType ?></li>
								<li>issueDT : <?php echo $Presponse->issueDT ?></li>
								<li>preIssueDT : <?php echo $Presponse->preIssueDT ?></li>
								<li>stateCode : <?php echo $Presponse->stateCode ?></li>
								<li>stateDT : <?php echo $Presponse->stateDT ?></li>
								<li>openYN : <?php echo $Presponse->openYN ?></li>
								<li>openDT : <?php echo $Presponse->openDT ?></li>
								<li>ntsconfirmNum : <?php echo $Presponse->ntsconfirmNum ?></li>
								<li>ntssendDT : <?php echo $Presponse->ntssendDT ?></li>
								<li>ntsresultDT : <?php echo $Presponse->ntsresultDT ?></li>
								<li>ntssendErrCode : <?php echo $Presponse->ntssendErrCode ?></li>
								<li>stateMemo : <?php echo $Presponse->stateMemo ?></li>
								<li>ntsresult : <?php echo $Presponse->ntsresult ?></li>
					<?php
									if(isset($Presponse->detailList)){
					?>
										<fieldset class="fieldset2">
					<?php
										for($i=0; $i<Count($Presponse->detaliList); $i++){
					?>
											<legend>detailList[<?echo $i+1?>]</legend>
											<ul>
												<li>serialNum : <?php echo $Presponse->detailList[$i]->serialNum?></li>
												<li>purchaseDT : <?php echo $Presponse->detailList[$i]->purchaseDT?></li>
												<li>itemName : <?php echo $Presponse->detailList[$i]->itemName?></li>
												<li>spec : <?php echo $Presponse->detailList[$i]->spec?></li>
												<li>qty : <?php echo $Presponse->detailList[$i]->qty?></li>
												<li>unitCost : <?php echo $Presponse->detailList[$i]->unitCost?></li>
												<li>supplyCost : <?php echo $Presponse->detailList[$i]->supplyCost?></li>
												<li>tax : <?php echo $Presponse->detailList[$i]->tax?></li>
												<li>remark : <?php echo $Presponse->detailList[$i]->remark?></li>
											</ul>
					<?php
										}
									}

							}
						} else {
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
