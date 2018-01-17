<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';	# 팝빌 회원 사업자번호, '-' 제외 10자리
	$mgtKey = '20150210-01';		# 문서관리번호
	$testUserID = 'testkorea';		# 팝빌 회원 아이디

	# 현금영수증 구성에 관한 자세한 사항은 "현금영수증 API 연동매뉴얼 [4.1 현금영수증 구성]"을 참조하시기 바랍니다
	$Cashbill = new Cashbill();
	$Cashbill->mgtKey = $mgtKey;						# [필수] 연동관리번호
	$Cashbill->tradeType = '승인거래';					# [필수] 거래유형, (승인거래, 취소거래) 중 기재
#	$Cashbill->orgConfirmNum = '';						# 원본 현금영수증 국세청 승인번호 [취소거래시 필수]
	$Cashbill->franchiseCorpNum = $testCorpNum;			# [필수] 발행자 사업자번호
	$Cashbill->franchiseCorpName = '발행자 상호_수정';
	$Cashbill->franchiseCEOName = '발행자 대표자명';
	$Cashbill->franchiseAddr = '발행자 주소';
	$Cashbill->franchiseTEL = '070-1234-1234';
	$Cashbill->identityNum = '01041680206';				# [필수] 거래처 식별번호
	$Cashbill->customerName = '고객명';
	$Cashbill->itemName = '상품명';
	$Cashbill->orderNumber = '주문번호';
	$Cashbill->email = 'test@test.com';
	$Cashbill->hp = '111-1234-1234';
	$Cashbill->serviceFee = '0';						# [필수] 봉사료, ','콤마 불가 숫자만 가능
	$Cashbill->supplyCost = '10000';					# [필수] 공급가액, ','콤마 불가 숫자만 가능
	$Cashbill->tax = '1000';							# [필수] 세액, ','콤마 불가 숫자만 가능
	$Cashbill->totalAmount = '11000';					# [필수] 거래금액, ','콤마 불가 숫자만 가능
	$Cashbill->tradeUsage = '소득공제용';				# [필수] 소득공제용, 지출증빙용 중 기재
	$Cashbill->taxationType = '과세';					# [필수] 과세, 비과세 중 기재
	$Cashbill->smssendYN = false;						# 발행시 알림문자 전송여부

	$Presponse = $CashbillService->Update($testCorpNum,$mgtKey,$Cashbill);
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>현금영수증 수정</legend>
				<ul>
					<li>Response.code : <?php echo $Presponse->code ?></li>
					<li>Response.message : <?php echo $Presponse->message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
