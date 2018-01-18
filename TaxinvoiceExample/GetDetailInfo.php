<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  /**
  * 1건의 세금계산서 상세정보를 확인합니다.
  * - 응답항목에 대한 자세한 사항은 "[전자세금계산서 API 연동매뉴얼] > 4.1 (세금)계산서 구성" 을 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

  // 발행유형, MgtKeyType_SELL:매출, MgtKeyType_BUY:매입, MgtKeyType_TURSEE:위수탁
	$mgtKeyType = MgtKeyType_SELL;

  // 문서관리번호
	$mgtKey = '20150211-01';

	$result = $TaxinvoiceService->GetDetailInfo($testCorpNum, $mgtKeyType, $mgtKey);

	if(is_a($result, 'PopbillException')){
		$code = $result->code;
		$message = $result->message;
	}
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>세금계산서 상세정보 확인</legend>
				<ul>
					<?php
						if(isset($code)){
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						}else {
					?>
							<li> writeSpecification : <?php echo $result->writeSpecification ?> </li>
							<li> writeDate  : <?php echo $result->writeDate  ?> </li>
							<li> chargeDirection  : <?php echo $result->chargeDirection  ?> </li>
							<li> issueType  : <?php echo $result->issueType  ?> </li>
							<li> issueTiming  : <?php echo $result->issueTiming  ?> </li>
							<li> taxType  : <?php echo $result->taxType  ?> </li>
							<li> invoicerCorpNum  : <?php echo $result->invoicerCorpNum ?> </li>
							<li> invoicerMgtKey  : <?php echo $result->invoicerMgtKey  ?> </li>
							<li> invoicerCorpName  : <?php echo $result->invoicerCorpName  ?> </li>
							<li> invoicerCEOName  : <?php echo $result->invoicerCEOName  ?> </li>
							<li> invoicerAddr  : <?php echo $result->invoicerAddr  ?> </li>
							<li> invoicerContactName  : <?php echo $result->invoicerContactName  ?> </li>
							<li> invoicerTEL  : <?php echo $result->invoicerTEL  ?> </li>
							<li> invoicerHP  : <?php echo $result->invoicerHP  ?> </li>
							<li> invoicerEmail  : <?php echo $result->invoicerEmail  ?> </li>
							<li> invoicerSMSSendYN  : <?php echo $result->invoicerSMSSendYN  ?> </li>
							<li> invoiceeCorpNum  : <?php echo $result->invoiceeCorpNum  ?> </li>
							<li> invoiceeType  : <?php echo $result->invoiceeType ?>  </li>
							<li> invoiceeMgtKey  : <?php echo $result->invoiceeMgtKey  ?> </li>
							<li> invoiceeCorpName  : <?php echo $result->invoiceeCorpName  ?> </li>
							<li> invoiceeCEOName  : <?php echo $result->invoiceeCEOName  ?> </li>
							<li> invoiceeAddr  : <?php echo $result->invoiceeAddr  ?> </li>
							<li> invoiceeContactName1  : <?php echo $result->invoiceeContactName1  ?> </li>
							<li> invoiceeTEL1  : <?php echo $result->invoiceeTEL1  ?> </li>
							<li> invoiceeHP1  : <?php echo $result->invoiceeHP1  ?> </li>
							<li> invoiceeEmail1  : <?php echo $result->invoiceeEmail1 ?> </li>
							<li> invoiceeSMSSendYN  : <?php echo $result->invoiceeSMSSendYN  ?> </li>
							<li> trusteeSMSSendYN  : <?php echo $result->trusteeSMSSendYN  ?> </li>
							<li> taxTotal  : <?php echo $result->taxTotal ?>  </li>
							<li> supplyCostTotal  : <?php echo $result->supplyCostTotal  ?> </li>
							<li> totalAmount  : <?php echo $result->totalAmount  ?> </li>
							<li> purposeType  : <?php echo $result->purposeType  ?> </li>
							<li> serialNum  : <?php echo $result->serialNum ?>  </li>
							<li> remark1  : <?php echo $result->remark1 ?>  </li>
							<li> remark2  : <?php echo $result->remark2  ?> </li>
							<li> remark3  : <?php echo $result->remark3  ?> </li>
							<li> kwon  : <?php echo $result->kwon  ?> </li>
							<li> ho  : <?php echo $result->ho  ?> </li>
							<li> businessLicenseYN  : <?php echo $result->businessLicenseYN  ?> </li>
							<li> bankBookYN  : <?php echo $result->bankBookYN  ?> </li>
							<li> faxsendYN  : <?php echo $result->faxsendYN  ?> </li>
							<li> ntsconfirmNum  : <?php echo $result->ntsconfirmNum  ?> </li>
					<?php
							if (isset($result->detailList)){
								for ($i=0; $i < Count($result->detailList); $i++){
									?>
									<fieldset class="fieldset2">
										<legend> detailList[<?php echo $i+1 ?>] </legend>
										<ul>
											<li> serialNum : <?php echo $result->detailList[$i]->serialNum ?> </li>
											<li> purchaseDT : <?php echo $result->detailList[$i]->purchaseDT ?> </li>
											<li> itemName : <?php echo $result->detailList[$i]->itemName ?> </li>
											<li> spec : <?php echo $result->detailList[$i]->spec ?> </li>
											<li> qty : <?php echo $result->detailList[$i]->qty ?> </li>
											<li> unitCost : <?php echo $result->detailList[$i]->unitCost ?> </li>
											<li> supplyCost : <?php echo $result->detailList[$i]->supplyCost ?> </li>
											<li> tax : <?php echo $result->detailList[$i]->tax ?> </li>
											<li> remark : <?php echo $result->detailList[$i]->remark ?> </li>
										</ul>
									</fieldset>
									<?
								}
							}

							if (isset($result->addContactList)){
								for ($i=0; $i < Count($result->addContactList); $i++){
						?>
									<fieldset class="fieldset2">
										<legend> addContactList[<?php echo $i+1 ?>] </legend>
										<ul>
											<li> serialNum : <?php echo $result->addContactList[$i]->serialNum ?> </li>
											<li> email : <?php echo $result->addContactList[$i]->email ?> </li>
											<li> contactName : <?php echo $result->addContactList[$i]->contactName ?> </li>
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
