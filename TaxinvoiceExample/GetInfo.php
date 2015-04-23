<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
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
					<?
						if(!isset($code)) {
							if(is_null($Presponse->itemKey)){
					?>
								<ul>
									<li>해당 문서관리번호의 세금계산서가 존재하지 않습니다.</li>
								</ul>
					<?		} else {
					?>
								<li>itemKey : <? echo $Presponse->itemKey ?></li>							
								<li>taxType : <? echo $Presponse->taxType ?></li>
								<li>writeDate : <? echo $Presponse->writeDate ?></li>
								<li>regDT : <? echo $Presponse->regDT ?></li>
								<li>invoicerCorpName : <? echo $Presponse->invoicerCorpName ?></li>
								<li>invoicerCorpNum : <? echo $Presponse->invoicerCorpNum ?></li>
								<li>invoicerMgtKey : <? echo $Presponse->invoicerMgtKey ?></li>
								<li>invoiceeCorpName : <? echo $Presponse->invoiceeCorpName ?></li>
								<li>invoiceeCorpNum : <? echo $Presponse->invoiceeCorpNum ?></li>
								<li>invoiceeMgtKey : <? echo $Presponse->invoiceeMgtKey ?></li>
								<li>trusteeCorpName : <? echo $Presponse->trusteeCorpName ?></li>
								<li>trusteeCorpNum : <? echo $Presponse->trusteeCorpNum ?></li>
								<li>trusteeMgtKey : <? echo $Presponse->trusteeMgtKey ?></li>
								<li>supplyCostTotal : <? echo $Presponse->supplyCostTotal ?></li>
								<li>taxTotal : <? echo $Presponse->taxTotal ?></li>
								<li>purposeType : <? echo $Presponse->purposeType ?></li>
								<li>modifyCode : <? echo $Presponse->modifyCode ?></li>
								<li>issueType : <? echo $Presponse->issueType ?></li>
								<li>issueDT : <? echo $Presponse->issueDT ?></li>
								<li>preIssueDT : <? echo $Presponse->preIssueDT ?></li>
								<li>stateCode : <? echo $Presponse->stateCode ?></li>
								<li>stateDT : <? echo $Presponse->stateDT ?></li>
								<li>openYN : <? echo $Presponse->openYN ?></li>
								<li>openDT : <? echo $Presponse->openDT ?></li>
								<li>ntsconfirmNum : <? echo $Presponse->ntsconfirmNum ?></li>
								<li>ntssendDT : <? echo $Presponse->ntssendDT ?></li>
								<li>ntsresultDT : <? echo $Presponse->ntsresultDT ?></li>
								<li>ntssendErrCode : <? echo $Presponse->ntssendErrCode ?></li>
								<li>stateMemo : <? echo $Presponse->stateMemo ?></li>
								<li>ntsresult : <? echo $Presponse->ntsresult ?></li>
					<?
									if(isset($Presponse->detailList)){
					?>
										<fieldset class="fieldset2">
					<?
										for($i=0; $i<Count($Presponse->detaliList); $i++){
					?>		
											<legend>detailList[<?echo $i+1?>]</legend>
											<ul>
												<li>serialNum : <? echo $Presponse->detailList[$i]->serialNum?></li>
												<li>purchaseDT : <? echo $Presponse->detailList[$i]->purchaseDT?></li>
												<li>itemName : <? echo $Presponse->detailList[$i]->itemName?></li>
												<li>spec : <? echo $Presponse->detailList[$i]->spec?></li>
												<li>qty : <? echo $Presponse->detailList[$i]->qty?></li>
												<li>unitCost : <? echo $Presponse->detailList[$i]->unitCost?></li>
												<li>supplyCost : <? echo $Presponse->detailList[$i]->supplyCost?></li>
												<li>tax : <? echo $Presponse->detailList[$i]->tax?></li>
												<li>remark : <? echo $Presponse->detailList[$i]->remark?></li>
											</ul>
					<?
										}
									}

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
