<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  /**
  * 연동회원의 회사정보를 확인합니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

	$Presponse = $CashbillService->GetCorpInfo($testCorpNum);

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
				<legend>회사정보 확인</legend>
				<ul>
					<?php
						if(isset($code)) {
					?>
            <li>Response.code : <?php echo $Presponse->$code ?> </li>
            <li>Response.message : <?php echo $Presponse->$message ?></li>
					<?php
						} else {
					?>
            <li>ceoname (대표자명) : <?php echo $Presponse->ceoname ?></li>
            <li>corpName (상호명) : <?php echo $Presponse->corpName ?></li>
            <li>addr (주소) : <?php echo $Presponse->addr ?></li>
            <li>bizType (업태) : <?php echo $Presponse->bizType ?></li>
            <li>bizClass (종목) : <?php echo $Presponse->bizClass ?></li>
					<?php
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
