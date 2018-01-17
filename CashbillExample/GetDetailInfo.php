<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';	# 팝빌회원 사업자번호, "-"제외 10자리
	$mgtKey = '20150210-01';		# 문서관리번호

	$Presponse = $CashbillService->GetDetailInfo($testCorpNum, $mgtKey);

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
				<legend>현금영수증 상세정보 확인</legend>
				<ul>
					<?php
						if(isset($code)) {
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						} else {
					?>
							<li>mgtKey : <?php echo $Presponse->mgtKey?> </li>
							<li>tradeDate : <?php echo $Presponse->tradeDate?> </li>
							<li>tradeUsage : <?php echo $Presponse->tradeUsage?> </li>
							<li>tradeType : <?php echo $Presponse->tradeType ?> </li>
							<li>taxationType : <?php echo $Presponse->taxationType ?> </li>
							<li>supplyCost : <?php echo $Presponse->supplyCost ?> </li>
							<li>tax : <?php echo $Presponse->tax ?> </li>
							<li>serviceFee : <?php echo $Presponse->serviceFee ?> </li>
							<li>totalAmount : <?php echo $Presponse->totalAmount ?> </li>
							<li>franchiseCorpNum : <?php echo $Presponse->franchiseCorpNum ?> </li>
							<li>franchiseCorpName : <?php echo $Presponse->franchiseCorpName ?> </li>
							<li>franchiseCEOName : <?php echo $Presponse->franchiseCEOName ?> </li>
							<li>franchiseAddr : <?php echo $Presponse->franchiseAddr ?> </li>
							<li>franchiseTEL : <?php echo $Presponse->franchiseTEL ?> </li>
							<li>identityNum : <?php echo $Presponse->identityNum ?> </li>
							<li>customerName : <?php echo $Presponse->customerName ?> </li>
							<li>itemName : <?php echo $Presponse->itemName ?> </li>
							<li>orderNumber : <?php echo $Presponse->orderNumber ?> </li>
							<li>email : <?php echo $Presponse->email ?> </li>
							<li>hp : <?php echo $Presponse->hp ?> </li>
							<li>fax : <?php echo $Presponse->fax ?> </li>
							<li>smssendYN : <?php echo $Presponse->smssendYN ?> </li>
							<li>faxsendYN : <?php echo $Presponse->faxsendYN ?> </li>
							<li>orgConfirmNum : <?php echo $Presponse->orgConfirmNum ?> </li>
					<?php
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
