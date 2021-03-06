<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  /**
  * 현금영수증 1건의 상세정보를 조회합니다.
  * - 응답항목에 대한 자세한 사항은 "[현금영수증 API 연동매뉴얼] > 4.1.
  *   현금영수증 구성" 을 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

  // 현금영수증 문서관리번호
	$mgtKey = '20180117-01';

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
            <li>mgtKey (현금영수증 관리번호) : <?php echo $Presponse->mgtKey ?> </li>
            <li>tradeDate (거래일자) : <?php echo $Presponse->tradeDate ?> </li>
            <li>tradeUsage (거래유형) : <?php echo $Presponse->tradeUsage ?> </li>
            <li>tradeType (현금영수증 형태) : <?php echo $Presponse->tradeType ?> </li>
            <li>taxationType (과세형태) : <?php echo $Presponse->taxationType ?> </li>
            <li>supplyCost (공급가액) : <?php echo $Presponse->supplyCost ?> </li>
            <li>tax (세액) : <?php echo $Presponse->tax ?> </li>
            <li>serviceFee (봉사료) : <?php echo $Presponse->serviceFee ?> </li>
            <li>totalAmount (거래금액) : <?php echo $Presponse->totalAmount ?> </li>

            <li>franchiseCorpNum (발행자 사업자번호) : <?php echo $Presponse->franchiseCorpNum ?> </li>
            <li>franchiseCorpName (발행자 상호) : <?php echo $Presponse->franchiseCorpName ?> </li>
            <li>franchiseCEOName (발행자 대표자 성명) : <?php echo $Presponse->franchiseCEOName ?> </li>
            <li>franchiseAddr (발행자 주소) : <?php echo $Presponse->franchiseAddr ?> </li>
            <li>franchiseTEL (발행자 연락처) : <?php echo $Presponse->franchiseTEL ?> </li>

            <li>identityNum (거래처 식별번호) : <?php echo $Presponse->identityNum ?> </li>
            <li>customerName (고객명) : <?php echo $Presponse->customerName ?> </li>
            <li>itemName (상품명) : <?php echo $Presponse->itemName ?> </li>
            <li>orderNumber (가맹점주문번호) : <?php echo $Presponse->orderNumber ?> </li>
            <li>email (고객 이메일) : <?php echo $Presponse->email ?> </li>
            <li>hp (고객 휴대폰번호) : <?php echo $Presponse->hp ?> </li>
            <li>smssendYN (발행 안내문자 전송여부) : <?php echo $Presponse->smssendYN ?> </li>
            <li>orgConfirmNum (원본 현금영수증 국세청승인번호) : <?php echo $Presponse->orgConfirmNum ?> </li>
            <li>orgTradeDate (원본 현금영수증 거래일자) : <?php echo $Presponse->orgTradeDate ?> </li>
            <li>cancelType (취소사유) : <?php echo $Presponse->cancelType ?> </li>
					<?php
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
