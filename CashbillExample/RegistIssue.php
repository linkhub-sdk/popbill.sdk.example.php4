<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  include 'common.php';

  // 팝빌 회원 사업자번호, '-' 제외 10자리
  $testCorpNum = '1234567890';

  // 문서관리번호, 사업자별로 중복없이 1~24자리 영문, 숫자, '-', '_' 조합으로 구성
  $mgtKey = '20170717-07';

  // 메모
  $memo = '현금영수증 즉시발행 메모';


  // 현금영수증 객체 생성
  $Cashbill = new Cashbill();

  // [필수] 현금영수증 문서관리번호,
  $Cashbill->mgtKey = $mgtKey;

  // [필수] 거래유형, (승인거래, 취소거래) 중 기재
  $Cashbill->tradeType = '승인거래';

  // [취소 현금영수증 발행시 필수] 원본 현금영수증 국세청 승인번호
  // 국세청 승인번호는 GetInfo API의 ConfirmNum 항목으로 확인할 수 있습니다.
  $Cashbill->orgConfirmNum = '';

  // [취소 현금영수증 발행시 필수] 원본 현금영수증 거래일자
  // 현금영수증 거래일자는 GetInfo API의 TradeDate 항목으로 확인할 수 있습니다.
  $Cashbill->orgTradeDate = '';


  // [필수] 거래처 식별번호, 거래유형에 따라 작성
  // 소득공제용 - 주민등록/휴대폰/카드번호 기재가능
  // 지출증빙용 - 사업자번호/주민등록/휴대폰/카드번호 기재가능
  $Cashbill->identityNum = '0101112222';

  // [필수] 과세, 비과세 중 기재
  $Cashbill->taxationType = '과세';

  // [필수] 공급가액, ','콤마 불가 숫자만 가능
  $Cashbill->supplyCost = '10000';

  // [필수] 세액, ','콤마 불가 숫자만 가능
  $Cashbill->tax = '1000';

  // [필수] 봉사료, ','콤마 불가 숫자만 가능
  $Cashbill->serviceFee = '0';

  // [필수] 거래금액, ','콤마 불가 숫자만 가능
  $Cashbill->totalAmount = '11000';

  // [필수] 소득공제용, 지출증빙용 중 기재
  $Cashbill->tradeUsage = '소득공제용';

  // [필수] 발행자 사업자번호
  $Cashbill->franchiseCorpNum = $testCorpNum;

  // 발행자 상호
  $Cashbill->franchiseCorpName = '발행자 상호';

  // 발행자 대표자 성명
  $Cashbill->franchiseCEOName = '발행자 대표자명';

  // 발행자 주소
  $Cashbill->franchiseAddr = '발행자 주소';

  // 발항자 연락처
  $Cashbill->franchiseTEL = '070-1234-1234';

  // 고객명
  $Cashbill->customerName = '고객명';

  // 상품명
  $Cashbill->itemName = '상품명';

  // 주문번호
  $Cashbill->orderNumber = '주문번호';

  // 고객 메일주소
  $Cashbill->email = 'test@test.com';

  // 고객 휴대폰 번호
  $Cashbill->hp = '010-111-222';

  // 발행시 알림문자 전송여부
  $Cashbill->smssendYN = false;

	$Presponse = $CashbillService->RegistIssue($testCorpNum, $Cashbill, $memo);
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>현금영수증 즉시발행</legend>
				<ul>
					<li>Response.code : <? echo $Presponse->code ?></li>
					<li>Response.message : <? echo $Presponse->message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
