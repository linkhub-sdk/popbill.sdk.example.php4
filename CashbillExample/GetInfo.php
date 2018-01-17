<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  /**
  * 1건의 현금영수증 상태/요약 정보를 확인합니다.
  * - 응답항목에 대한 자세한 정보는 "[현금영수증 API 연동매뉴얼] > 4.2.
  *   현금영수증 상태정보 구성"을 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

  // 현금영수증 문서관리번호
	$mgtKey = '20150210-00';

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
					<?php
						if(isset($code)) {
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						} else {
							{
					?>
								<li> itemKey : <?php echo $Presponse->itemKey ?></li>
								<li> mgtKey : <?php echo $Presponse->mgtKey ?></li>
								<li> tradeDate : <?php echo $Presponse->tradeDate ?></li>
								<li> issueDT : <?php echo $Presponse->issueDT ?></li>
								<li> customerName : <?php echo $Presponse->customerName ?></li>
								<li> itemName : <?php echo $Presponse->itemName ?></li>
								<li> identityNum : <?php echo $Presponse->identityNum ?></li>
								<li> taxationType : <?php echo $Presponse->taxationType ?></li>
								<li> totalAmount : <?php echo $Presponse->totalAmount ?></li>
								<li> tradeUsage : <?php echo $Presponse->tradeUsage ?></li>
								<li> tradeType : <?php echo $Presponse->tradeType ?></li>
								<li> stateCode : <?php echo $Presponse->stateCode ?></li>
								<li> stateDT : <?php echo $Presponse->stateDT ?></li>
								<li> printYN : <?php echo $Presponse->printYN ?></li>
								<li> confirmNum : <?php echo $Presponse->confirmNum ?></li>
								<li> orgTradeDate : <?php echo $Presponse->orgTradeDate ?></li>
								<li> orgConfirmNum : <?php echo $Presponse->orgConfirmNum ?></li>
								<li> ntssendDT : <?php echo $Presponse->ntssendDT ?></li>
								<li> ntsresult : <?php echo $Presponse->ntsresult ?></li>
								<li> ntsresultDT : <?php echo $Presponse->ntsresultDT ?></li>
								<li> ntsresultCode : <?php echo $Presponse->ntsresultCode ?></li>
								<li> ntsresultMessage : <?php echo $Presponse->ntsresultMessage ?></li>
								<li> regDT : <?php echo $Presponse->regDT ?></li>
					<?php
							}
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
