<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
					<?
						if(isset($code)) { 
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>
					<?
						} else {
					?>
							<li> itemCode : <? echo $Presponse->itemCode ?> </li>
							<li> mgtKey : <? echo $Presponse->mgtKey ?> </li>			
							<li> invoiceNum : <? echo $Presponse->invoiceNum ?> </li>			
							<li> formCode : <? echo $Presponse->formCode ?> </li>			
							<li> writeDate : <? echo $Presponse->writeDate ?> </li>			
							<li> taxType : <? echo $Presponse->taxType  ?> </li>			

							<li> senderCorpNum : <? echo $Presponse->senderCorpNum ?> </li>			
							<li> senderTaxRegID : <? echo $Presponse->senderTaxRegID ?> </li>			
							<li> senderCorpName : <? echo $Presponse->senderCEOName ?> </li>			
							<li> senderCEOName : <? echo $Presponse->senderCEOName ?> </li>			
							<li> senderAddr : <? echo $Presponse->senderAddr ?> </li>			
							<li> senderBizClass : <? echo $Presponse->senderBizClass ?> </li>			
							<li> senderBizType : <? echo $Presponse->senderBizType ?> </li>			
							<li> senderContactName : <? echo $Presponse->senderContactName ?> </li>			
							<li> senderDeptName : <? echo $Presponse->senderDeptName ?> </li>			
							<li> senderTEL : <? echo $Presponse->senderTEL ?> </li>			
							<li> senderHP : <? echo $Presponse->senderHP ?> </li>			
							<li> senderEmail : <? echo $Presponse->senderEmail ?> </li>			
							<li> senderFAX : <? echo $Presponse->senderFAX ?> </li>			

							<li> receiverCorpNum : <? echo $Presponse->receiverCorpNum ?> </li>			
							<li> receiverTaxRegID : <? echo $Presponse->receiverTaxRegID ?> </li>			
							<li> receiverCorpName : <? echo $Presponse->receiverCorpName ?> </li>			
							<li> receiverCEOName : <? echo $Presponse->receiverCEOName ?> </li>			
							<li> receiverAddr : <? echo $Presponse->receiverAddr ?> </li>			
							<li> receiverBizClass : <? echo $Presponse->receiverBizClass ?> </li>			
							<li> receiverBizType : <? echo $Presponse->receiverBizType ?> </li>			
							<li> receiverContactName : <? echo $Presponse->receiverContactName ?> </li>			
							<li> receiverDeptName : <? echo $Presponse->receiverDeptName ?> </li>			
							<li> receiverTEL : <? echo $Presponse->receiverTEL ?> </li>			
							<li> receiverHP : <? echo $Presponse->receiverHP ?> </li>			
							<li> receiverEmail : <? echo $Presponse->receiverEmail ?> </li>			
							<li> receiverFAX : <? echo $Presponse->receiverFAX ?> </li>			

							<li> taxTotal : <? echo $Presponse->taxTotal ?> </li>			
							<li> supplyCostTotal : <? echo $Presponse->supplyCostTotal ?> </li>
							<li> totalAmount : <? echo $Presponse->totalAmount ?> </li>
							<li> purposeType : <? echo $Presponse->purposeType ?> </li>
							<li> serialNum : <? echo $Presponse->serialNum ?> </li>
							<li> remark1 : <? echo $Presponse->remark1 ?> </li>
							<li> remark2 : <? echo $Presponse->remark2 ?> </li>
							<li> remark3 : <? echo $Presponse->remark3 ?> </li>
							<li> businessLicenseYN : <? echo $Presponse->businessLicenseYN ?> </li>
							<li> bankBookYN : <? echo $Presponse->bankBookYN ?> </li>
							<li> faxsendYN : <? echo $Presponse->faxsendYN ?> </li>
							<li> smssendYN : <? echo $Presponse->smssendYN ?> </li>
							<li> autoacceptYN : <? echo $Presponse->autoacceptYN ?> </li>
						
					<?
							if(!is_null($Presponse->detailList)){	
								for($i=0;$i<Count($Presponse->detailList);$i++){
					?>
								<fieldset class="fieldset2">
									<legend>detailList <?echo $i+1 ?></legend>
										<ul>	
											<li> serialNum : <? echo $Presponse->detailList[$i]->serialNum ?> </li>
											<li> purchaseDT : <? echo $Presponse->detailList[$i]->purchaseDT ?> </li>
											<li> itemName : <? echo $Presponse->detailList[$i]->itemName ?> </li>
											<li> spec : <? echo $Presponse->detailList[$i]->spec ?> </li>
											<li> unit : <? echo $Presponse->detailList[$i]->unit ?> </li>
											<li> qty : <? echo $Presponse->detailList[$i]->qty ?> </li>
											<li> unitCost : <? echo $Presponse->detailList[$i]->unitCost ?> </li>
											<li> supplyCost : <? echo $Presponse->detailList[$i]->supplyCost ?> </li>
											<li> tax : <? echo $Presponse->detailList[$i]->tax ?> </li>
											<li> remark : <? echo $Presponse->detailList[$i]->remark ?> </li>
											<li> spare1 : <? echo $Presponse->detailList[$i]->spare1 ?> </li>
											<li> spare2 : <? echo $Presponse->detailList[$i]->spare2 ?> </li>
											<li> spare3 : <? echo $Presponse->detailList[$i]->spare3 ?> </li>
											<li> spare4 : <? echo $Presponse->detailList[$i]->spare4 ?> </li>
											<li> spare5 : <? echo $Presponse->detailList[$i]->spare5 ?> </li>
										</ul>
								</fieldset>
					<?
								}
							}

							if(!is_null($Presponse->propertyBag)){

					?>
								<fieldset class="fieldset2">
									<legend>propertyBag</legend>
									<ul>
					<?
										foreach ($Presponse->propertyBag as $key=>$data){
					?>
											<li> <? echo $key ?> : <? echo $data ?> </li>								
					<?			
								}
					?>
									</ul>	
					<?
							}
						}
					?>		
				</ul>
			</fieldset>
		 </div>
	</body>
</html>