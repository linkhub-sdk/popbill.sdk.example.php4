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
					<?
						if(isset($code)) { 
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>
					<?
						} else {
					?>
								<li>mgtKey : <? echo $Presponse->mgtKey?> </li>
								<li>tradeDate : <? echo $Presponse->tradeDate?> </li>
								<li>tradeUsage : <? echo $Presponse->tradeUsage?> </li>
								<li>tradeType : <? echo $Presponse->tradeType ?> </li>
								<li>taxationType : <? echo $Presponse->taxationType ?> </li>
								<li>supplyCost : <? echo $Presponse->supplyCost ?> </li>
								<li>tax : <? echo $Presponse->tax ?> </li>
								<li>serviceFee : <? echo $Presponse->serviceFee ?> </li>
								<li>totalAmount : <? echo $Presponse->totalAmount ?> </li>
								<li>franchiseCorpNum : <? echo $Presponse->franchiseCorpNum ?> </li>
								<li>franchiseCorpName : <? echo $Presponse->franchiseCorpName ?> </li>
								<li>franchiseCEOName : <? echo $Presponse->franchiseCEOName ?> </li>
								<li>franchiseAddr : <? echo $Presponse->franchiseAddr ?> </li>
								<li>franchiseTEL : <? echo $Presponse->franchiseTEL ?> </li>
								<li>identityNum : <? echo $Presponse->identityNum ?> </li>
								<li>customerName : <? echo $Presponse->customerName ?> </li>
								<li>itemName : <? echo $Presponse->itemName ?> </li>
								<li>orderNumber : <? echo $Presponse->orderNumber ?> </li>
								<li>email : <? echo $Presponse->email ?> </li>
								<li>hp : <? echo $Presponse->hp ?> </li>
								<li>fax : <? echo $Presponse->fax ?> </li>
								<li>smssendYN : <? echo $Presponse->smssendYN ?> </li>
								<li>faxsendYN : <? echo $Presponse->faxsendYN ?> </li>
								<li>orgConfirmNum : <? echo $Presponse->orgConfirmNum ?> </li>

					<?
						}
					?>			

				</ul>
			</fieldset>
		 </div>
	</body>
</html>