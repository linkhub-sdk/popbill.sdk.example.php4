<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';	# 팝빌회원 사업자번호
	$Presponse = $CashbillService->ListContact($testCorpNum);

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
				<legend>담당자 목록 조회</legend>
				<ul>
					<?php
						if(isset($code)) {
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						} else {
							for ($i = 0; $i < Count($Presponse); $i++) {
					?>
								<fieldset class="fieldset2">
									<legend> 담당자 목록[<?php echo $i+1?>]</legend>
									<ul>
										<li> id : <?php echo $Presponse[$i]->id ?></li>
                    <li> personName : <?php echo $Presponse[$i]->personName ?></li>
                    <li> email : <?php echo $Presponse[$i]->email ?></li>
                    <li> hp : <?php echo $Presponse[$i]->hp ?></li>
                    <li> searchAllAllowYN : <?php echo $Presponse[$i]->searchAllAllowYN ?></li>
                    <li> tel : <?php echo $Presponse[$i]->tel ?></li>
                    <li> fax : <?php echo $Presponse[$i]->fax ?></li>
                    <li> mgrYN : <?php echo $Presponse[$i]->mgrYN ?></li>
                    <li> regDT : <?php echo $Presponse[$i]->regDT ?></li>
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
