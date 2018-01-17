<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';	# 팝빌회원 사업자번호, "-"제외 10자리
	$testUserID = 'testkorea';		# 팝빌회원 아이디
	$itemCode = '121';				# 명세서 코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
	$mgtKey = '20150210-01';		# 문서관리번호

	$Presponse = $StatementService->GetDetailInfo($testCorpNum, $itemCode, $mgtKey, $testUserID);

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
				<legend>전자명세서 상세정보 확인</legend>
				<ul>
					<?php
						if(isset($code)) {
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						} else {
					?>
							<li> itemCode : <?php echo $Presponse->itemCode ?> </li>
							<li> mgtKey : <?php echo $Presponse->mgtKey ?> </li>
							<li> invoiceNum : <?php echo $Presponse->invoiceNum ?> </li>
							<li> formCode : <?php echo $Presponse->formCode ?> </li>
							<li> writeDate : <?php echo $Presponse->writeDate ?> </li>
							<li> taxType : <?php echo $Presponse->taxType  ?> </li>

							<li> senderCorpNum : <?php echo $Presponse->senderCorpNum ?> </li>
							<li> senderTaxRegID : <?php echo $Presponse->senderTaxRegID ?> </li>
							<li> senderCorpName : <?php echo $Presponse->senderCEOName ?> </li>
							<li> senderCEOName : <?php echo $Presponse->senderCEOName ?> </li>
							<li> senderAddr : <?php echo $Presponse->senderAddr ?> </li>
							<li> senderBizClass : <?php echo $Presponse->senderBizClass ?> </li>
							<li> senderBizType : <?php echo $Presponse->senderBizType ?> </li>
							<li> senderContactName : <?php echo $Presponse->senderContactName ?> </li>
							<li> senderDeptName : <?php echo $Presponse->senderDeptName ?> </li>
							<li> senderTEL : <?php echo $Presponse->senderTEL ?> </li>
							<li> senderHP : <?php echo $Presponse->senderHP ?> </li>
							<li> senderEmail : <?php echo $Presponse->senderEmail ?> </li>
							<li> senderFAX : <?php echo $Presponse->senderFAX ?> </li>

							<li> receiverCorpNum : <?php echo $Presponse->receiverCorpNum ?> </li>
							<li> receiverTaxRegID : <?php echo $Presponse->receiverTaxRegID ?> </li>
							<li> receiverCorpName : <?php echo $Presponse->receiverCorpName ?> </li>
							<li> receiverCEOName : <?php echo $Presponse->receiverCEOName ?> </li>
							<li> receiverAddr : <?php echo $Presponse->receiverAddr ?> </li>
							<li> receiverBizClass : <?php echo $Presponse->receiverBizClass ?> </li>
							<li> receiverBizType : <?php echo $Presponse->receiverBizType ?> </li>
							<li> receiverContactName : <?php echo $Presponse->receiverContactName ?> </li>
							<li> receiverDeptName : <?php echo $Presponse->receiverDeptName ?> </li>
							<li> receiverTEL : <?php echo $Presponse->receiverTEL ?> </li>
							<li> receiverHP : <?php echo $Presponse->receiverHP ?> </li>
							<li> receiverEmail : <?php echo $Presponse->receiverEmail ?> </li>
							<li> receiverFAX : <?php echo $Presponse->receiverFAX ?> </li>

							<li> taxTotal : <?php echo $Presponse->taxTotal ?> </li>
							<li> supplyCostTotal : <?php echo $Presponse->supplyCostTotal ?> </li>
							<li> totalAmount : <?php echo $Presponse->totalAmount ?> </li>
							<li> purposeType : <?php echo $Presponse->purposeType ?> </li>
							<li> serialNum : <?php echo $Presponse->serialNum ?> </li>
							<li> remark1 : <?php echo $Presponse->remark1 ?> </li>
							<li> remark2 : <?php echo $Presponse->remark2 ?> </li>
							<li> remark3 : <?php echo $Presponse->remark3 ?> </li>
							<li> businessLicenseYN : <?php echo $Presponse->businessLicenseYN ?> </li>
							<li> bankBookYN : <?php echo $Presponse->bankBookYN ?> </li>
							<li> faxsendYN : <?php echo $Presponse->faxsendYN ?> </li>
							<li> smssendYN : <?php echo $Presponse->smssendYN ?> </li>
							<li> autoacceptYN : <?php echo $Presponse->autoacceptYN ?> </li>
					<?php
							if(!is_null($Presponse->detailList)){
								for($i=0;$i<Count($Presponse->detailList);$i++){
					?>
								<fieldset class="fieldset2">
									<legend>detailList <?echo $i+1 ?></legend>
										<ul>
											<li> serialNum : <?php echo $Presponse->detailList[$i]->serialNum ?> </li>
											<li> purchaseDT : <?php echo $Presponse->detailList[$i]->purchaseDT ?> </li>
											<li> itemName : <?php echo $Presponse->detailList[$i]->itemName ?> </li>
											<li> spec : <?php echo $Presponse->detailList[$i]->spec ?> </li>
											<li> unit : <?php echo $Presponse->detailList[$i]->unit ?> </li>
											<li> qty : <?php echo $Presponse->detailList[$i]->qty ?> </li>
											<li> unitCost : <?php echo $Presponse->detailList[$i]->unitCost ?> </li>
											<li> supplyCost : <?php echo $Presponse->detailList[$i]->supplyCost ?> </li>
											<li> tax : <?php echo $Presponse->detailList[$i]->tax ?> </li>
											<li> remark : <?php echo $Presponse->detailList[$i]->remark ?> </li>
											<li> spare1 : <?php echo $Presponse->detailList[$i]->spare1 ?> </li>
											<li> spare2 : <?php echo $Presponse->detailList[$i]->spare2 ?> </li>
											<li> spare3 : <?php echo $Presponse->detailList[$i]->spare3 ?> </li>
											<li> spare4 : <?php echo $Presponse->detailList[$i]->spare4 ?> </li>
											<li> spare5 : <?php echo $Presponse->detailList[$i]->spare5 ?> </li>
										</ul>
								</fieldset>
					<?php
								}
							}

							if(!is_null($Presponse->propertyBag)){

					?>
								<fieldset class="fieldset2">
									<legend>propertyBag</legend>
									<ul>
					<?php
										foreach ($Presponse->propertyBag as $key=>$data){
					?>
											<li> <?php echo $key ?> : <?php echo $data ?> </li>
					<?php
								}
					?>
									</ul>
					<?php
							}
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
