<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  /**
  * 팝빌 회원아이디 중복여부를 확인합니다.
  */

	include 'common.php';

  // 중복조회할 아이디
	$ID = 'testkoera';

	$Presponse = $CashbillService->CheckID($ID);
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>연동회원 아이디 중복확인</legend>
				<ul>
					<li>Response.code : <? echo $Presponse->code ?></li>
					<li>Response.message : <? echo $Presponse->message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
