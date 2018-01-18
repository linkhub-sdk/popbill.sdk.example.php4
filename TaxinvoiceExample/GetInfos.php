<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  /**
  * 대량의 세금계산서 상태/요약 정보를 확인합니다. (최대 1000건)
  * - 세금계산서 상태정보(GetInfos API) 응답항목에 대한 자세한 정보는 "[전자세금계산서 API 연동매뉴얼]
  * > 4.2. (세금)계산서 상태정보 구성" 을 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

  // 발행유형, MgtKeyType_SELL:매출, MgtKeyType_BUY:매입, MgtKeyType_TURSEE:위수탁
	$mgtKeyType = MgtKeyType_SELL;

  // 문서관리번호 배열, 최대 1000건
	$MgtKeyList = array(
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
					<?php
						if(isset($code)) {
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						} else {
							for ($i = 0; $i < Count($Presponse); $i++) {
								if (is_null($Presponse[$i]->itemKey)){
					?>
									<fieldset class="fieldset2">
										<legend> 세금계산서 요약정보[<?php echo $i+1?>]</legend>
											<ul>
												<li>해당 문서관리번호의 세금계산서가 존재하지 않습니다.</li>
											</ul>
									</fieldset>
					<?php
								} else {
					?>
									<fieldset class="fieldset2">
									<legend> 세금계산서 요약정보[<?php echo $i+1?>]</legend>
										<ul>
											<li>itemKey : <?php echo $Presponse[$i]->itemKey ?></li>
											<li>taxType : <?php echo $Presponse[$i]->taxType ?></li>
											<li>writeDate : <?php echo $Presponse[$i]->writeDate ?></li>
											<li>regDT : <?php echo $Presponse[$i]->regDT ?></li>
											<li>invoicerCorpName : <?php echo $Presponse[$i]->invoicerCorpName ?></li>
											<li>invoicerCorpNum : <?php echo $Presponse[$i]->invoicerCorpNum ?></li>
											<li>invoicerMgtKey : <?php echo $Presponse[$i]->invoicerMgtKey ?></li>
											<li>invoiceeCorpName : <?php echo $Presponse[$i]->invoiceeCorpName ?></li>
											<li>invoiceeCorpNum : <?php echo $Presponse[$i]->invoiceeCorpNum ?></li>
											<li>invoiceeMgtKey : <?php echo $Presponse[$i]->invoiceeMgtKey ?></li>
											<li>trusteeCorpName : <?php echo $Presponse[$i]->trusteeCorpName ?></li>
											<li>trusteeCorpNum : <?php echo $Presponse[$i]->trusteeCorpNum ?></li>
											<li>trusteeMgtKey : <?php echo $Presponse[$i]->trusteeMgtKey ?></li>
											<li>supplyCostTotal : <?php echo $Presponse[$i]->supplyCostTotal ?></li>
											<li>taxTotal : <?php echo $Presponse[$i]->taxTotal ?></li>
											<li>purposeType : <?php echo $Presponse[$i]->purposeType ?></li>
											<li>modifyCode : <?php echo $Presponse[$i]->modifyCode ?></li>
											<li>issueType : <?php echo $Presponse[$i]->issueType ?></li>
											<li>issueDT : <?php echo $Presponse[$i]->issueDT ?></li>
											<li>preIssueDT : <?php echo $Presponse[$i]->preIssueDT ?></li>
											<li>stateCode : <?php echo $Presponse[$i]->stateCode ?></li>
											<li>stateDT : <?php echo $Presponse[$i]->stateDT ?></li>
											<li>openYN : <?php echo $Presponse[$i]->openYN ?></li>
											<li>openDT : <?php echo $Presponse[$i]->openDT ?></li>
											<li>ntsconfirmNum : <?php echo $Presponse[$i]->ntsconfirmNum ?></li>
											<li>ntssendDT : <?php echo $Presponse[$i]->ntssendDT ?></li>
											<li>ntsresultDT : <?php echo $Presponse[$i]->ntsresultDT ?></li>
											<li>ntssendErrCode : <?php echo $Presponse[$i]->ntssendErrCode ?></li>
											<li>stateMemo : <?php echo $Presponse[$i]->stateMemo ?></li>
											<li>ntsresult : <?php echo $Presponse[$i]->ntsresult ?></li>
										</ul>
									</fieldset>
					<?php
								}
							}
						}
					?>
			    </ul>
			</fieldset>
		 </div>
	</body>
</html>
