<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  /**
  * 현금영수증 상태 변경이력을 확인합니다.
  * - 상태 변경이력 확인(GetLogs API) 응답항목에 대한 자세한 정보는
  *   "[현금영수증 API 연동매뉴얼] > 3.4.4 상태 변경이력 확인"
  *   을 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

  // 현금영수증 문서관리번호
	$mgtKey = '20150209-01';

	$Presponse = $CashbillService->GetLogs($testCorpNum,$mgtKey);

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
				<legend>현금영수증 문서이력 확인</legend>
				<ul>
					<?php
						if(isset($code)) {
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						} else {
							for ($i = 0; $i < Count($Presponse) ; $i++) {
					?>
								<fieldset class ="fieldset2">
								<legend>현금영수증 문서이력 [<?php echo $i+1 ?>] </legend>
									<ul>
										<li> docLogType : <?php echo $Presponse[$i]->docLogType ?></li>
										<li> log : <?php echo $Presponse[$i]->log ?></li>
										<li> procType : <?php echo $Presponse[$i]->procType ?></li>
										<li> procMemo : <?php echo $Presponse[$i]->procMemo ?></li>
										<li> regDT : <?php echo $Presponse[$i]->regDT ?></li>
										<li> ip : <?php echo $Presponse[$i]->ip ?></li>
									</ul>
								</fieldset>
					<?php
							}
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
