<?php

$tosend = "elitafur@mail.ru"; //To:
//$tosend = "sanjar-home@yandex.ru, elitafur@mail.ru"; //To:
//$tosend = "sanjar-home@yandex.ru"; //To:
$subject = "Заказ товара - EliteFurs.ru"; //Subject:
$from_name = "EliteFurs.ru"; //From:
$from_email = "no-replay@elitefurs.ru"; //From:
$error = 0;

if(empty($_POST['phone']) || $_POST['phone'] == '') {
	$error = 1;
} else {
	
	$phone = $_POST['phone'];
	if ($_POST['razmer'] == 'undefined') $subject = "Заказ обратного звонка - EliteFurs.ru";
	else {
		$size = $_POST['razmer'];
		$tovar_id = $_POST['tovar_id'];
	}
	$msg  = "<p><strong>Заказ с сайта ".$from_name."</strong></p>\r\n";
	$msg .= "<p><strong>Телефон:</strong> ".$phone."</p>\r\n";
	if ($_POST['razmer'] != 'undefined') $msg .= "<p><strong>Размер:</strong> ".$size."</p>\r\n";
	if ($_POST['tovar_id'] != '') $msg .= "<p><strong>Товар:</strong> ".$tovar_id."</p>\r\n";

	$headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8\r\n";
	$headers .= "From: =?UTF-8?B?".base64_encode($from_name)."?= <".$from_email.">\r\n";

	if(mail($tosend, "=?UTF-8?B?".base64_encode($subject)."?=", $msg, $headers)) {
		//echo json_encode(array('status' => 'OK'));
	} else {
		//echo json_encode(array('result' => 'ERROR'));
		$error = 1;
	}
}

if ($error != 1) {
	$page_title = 'Спасибо! Ваш заказ принят!';
	$page_message = 'В ближайшее время с Вами свяжется наш менеджер.';
} else {
	$page_title = 'Ошибка';
	$page_message = 'Вы ввели неверные номер телефона';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ru">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
<title><?php echo $page_title; ?></title>
</head>
<body>
<div class="wrap_block_success">
<div class="block_success">
<h2>Спасибо! Ваш заказ принят!</h2>
<p style="text-align: center;"><span style="font-size:20px;"><?php echo $page_message; ?></span></p><br/><br/><br/>
<p style="text-align: center;"><a class="button" href="/">Вернуться на сайт</a></p>
<?php //print_r($_POST);?>
</div>
</div>
<style type="text/css">
body {line-height: 0;height: 100%;font-family: 'Open Sans', sans-serif;font-size: 0;color: #000;margin:0;padding:0;}
html{height: 100%;}
ol, ul {list-style: none;}
h2 {font-size: 36px;line-height: 44px;color: #313e47;text-align: center;text-transform: uppercase;font-weight: bold;}
a{color: #69B9FF;}
a:hover{color: #e14740;}
.wrap_block_success{width: 100%;height: 100%;background:url("https://1.downloader.disk.yandex.ru/preview/aed6aa547930a290f9db3697043f136a17ad53d29eff491657bd5e0d3416b2ae/inf/YbDe_iTsq6Ern5De38wAxpMfRc6WCUJjbdmHYu3k7VRS9EXfeWmoPSEv51er5ck0vnQTznTsDXhcwdXSxVSceQ%3D%3D?uid=192706720&filename=point-bg.png&disposition=inline&hash=&limit=0&content_type=image%2Fpng&tknv=v2&size=1280x821");}
.block_success{max-width: 960px;padding:70px 30px 0 30px;margin: 0px auto;font-size:15px;line-height:1.1;}
.success {text-align: center;}
@media (max-width:750px){h2 {font-size: 24px;}   }
a.button24{display:inline-block;color:white;text-decoration:none;padding:.5em 2em;outline:none;border-width:2px 0;border-style:solid none;border-color:#FDBE33 #000 #D77206;border-radius:4px;background:linear-gradient(#F3AE0F, #E38916) #E38916;transition: 0.2s;} 
a.button24:hover { background: linear-gradient(#f5ae00, #f59500) #f5ae00; }
a.button24:active { background: linear-gradient(#f59500, #f5ae00) #f59500; }
</style>

</body>
</html>