<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  /**
  * 1건의 취소현금영수증을 즉시발행합니다.
  * - 발행일 기준 오후 5시 이전에 발행된 현금영수증은 다음날 오후 2시에 국세청
  *   전송결과를 확인할 수 있습니다.
  * - 현금영수증 국세청 전송 정책에 대한 정보는 "[현금영수증 API 연동매뉴얼]
  *   > 1.4. 국세청 전송정책"을 참조하시기 바랍니다.
  * - 취소현금영수증 작성방법 안내 - http://blog.linkhub.co.kr/702
  */

  include 'common.php';

  // 팝빌 회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

  // 문서관리번호, 1~24자리 영문, 숫자, '-', '_' 조합으로 구성, 사업자별 중복되지 않도록 구성
	$mgtKey = '20180116-01';

  // 원본현금영수증 승인번호, 문서정보 확인(GetInfo API)을 통해 확인가능.
  $orgConfirmNum = '820116333';

  // 원본현금영수증 거래일자, 문서정보 확인(GetInfo API)을 통해 확인가능.
  $orgTradeDate = '20170711';

  $Presponse = $CashbillService->RevokeRegistIssue($testCorpNum, $mgtKey,
    $orgConfirmNum, $orgTradeDate);
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>취소현금영수증 즉시발행</legend>
				<ul>
					<li>Response.code : <?php echo $Presponse->code ?></li>
					<li>Response.message : <?php echo $Presponse->message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
