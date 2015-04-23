<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php 
	include 'common.php';	

	$testCorpNum = '1234567890';			# 팝빌회원 사업자번호, '-'제외 10자리
	$mgtKeyType = MgtKeyType_SELL;			# 발행유형, MgtKeyType_SELL:매출, MgtKeyType_BUY:매입, MgtKeyType_TURSEE:위수탁

	$MgtKeyList = array(			# 문서관리번호 배열, 최대 1000건
			'20150209-01',
			'20150211-01',
	);

	$Presponse = $TaxinvoiceService->GetInfos($testCorpNum, $mgtKeyType, $MgtKeyList);


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
				<legend>세금계산서 요약정보 대량 확인</legend>
				<ul>
					<?
						if(isset($code)) { 
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>
					<?
						} else {
							for ($i = 0; $i < Count($Presponse); $i++) { 
								if (is_null($Presponse[$i]->itemKey)){
					?>
									<fieldset class="fieldset2">
										<legend> 세금계산서 요약정보[<? echo $i+1?>]</legend>
											<ul>
												<li>해당 문서관리번호의 세금계산서가 존재하지 않습니다.</li>
											</ul>
									</fieldset>
					<?
								} else {
					?>
									<fieldset class="fieldset2">
									<legend> 세금계산서 요약정보[<? echo $i+1?>]</legend>
										<ul>
											<li>itemKey : <? echo $Presponse[$i]->itemKey ?></li>							
											<li>taxType : <? echo $Presponse[$i]->taxType ?></li>
											<li>writeDate : <? echo $Presponse[$i]->writeDate ?></li>
											<li>regDT : <? echo $Presponse[$i]->regDT ?></li>
											<li>invoicerCorpName : <? echo $Presponse[$i]->invoicerCorpName ?></li>
											<li>invoicerCorpNum : <? echo $Presponse[$i]->invoicerCorpNum ?></li>
											<li>invoicerMgtKey : <? echo $Presponse[$i]->invoicerMgtKey ?></li>
											<li>invoiceeCorpName : <? echo $Presponse[$i]->invoiceeCorpName ?></li>
											<li>invoiceeCorpNum : <? echo $Presponse[$i]->invoiceeCorpNum ?></li>
											<li>invoiceeMgtKey : <? echo $Presponse[$i]->invoiceeMgtKey ?></li>
											<li>trusteeCorpName : <? echo $Presponse[$i]->trusteeCorpName ?></li>
											<li>trusteeCorpNum : <? echo $Presponse[$i]->trusteeCorpNum ?></li>
											<li>trusteeMgtKey : <? echo $Presponse[$i]->trusteeMgtKey ?></li>
											<li>supplyCostTotal : <? echo $Presponse[$i]->supplyCostTotal ?></li>
											<li>taxTotal : <? echo $Presponse[$i]->taxTotal ?></li>
											<li>purposeType : <? echo $Presponse[$i]->purposeType ?></li>
											<li>modifyCode : <? echo $Presponse[$i]->modifyCode ?></li>
											<li>issueType : <? echo $Presponse[$i]->issueType ?></li>
											<li>issueDT : <? echo $Presponse[$i]->issueDT ?></li>
											<li>preIssueDT : <? echo $Presponse[$i]->preIssueDT ?></li>
											<li>stateCode : <? echo $Presponse[$i]->stateCode ?></li>
											<li>stateDT : <? echo $Presponse[$i]->stateDT ?></li>
											<li>openYN : <? echo $Presponse[$i]->openYN ?></li>
											<li>openDT : <? echo $Presponse[$i]->openDT ?></li>
											<li>ntsconfirmNum : <? echo $Presponse[$i]->ntsconfirmNum ?></li>
											<li>ntssendDT : <? echo $Presponse[$i]->ntssendDT ?></li>
											<li>ntsresultDT : <? echo $Presponse[$i]->ntsresultDT ?></li>
											<li>ntssendErrCode : <? echo $Presponse[$i]->ntssendErrCode ?></li>
											<li>stateMemo : <? echo $Presponse[$i]->stateMemo ?></li>
											<li>ntsresult : <? echo $Presponse[$i]->ntsresult ?></li>
										</ul>
									</fieldset>
					<?
								}	
							}
						}
					?>
					
				</ul>
			</fieldset>
		 </div>
	</body>
</html>