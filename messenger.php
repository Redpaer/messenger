<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Messenger</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
	<link rel='stylesheet' href='/lib/fonts/Geometria/stylesheet.css'>
	<link rel='stylesheet' href='/engine/styles/main.css'>
	<script src='https://code.jquery.com/jquery-3.4.1.min.js' integrity='sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=' crossorigin='anonymous'></script>
    <script src ='/engine/scripts/main.js'></script>
    <script type="text/javascript" src="/engine/scripts/js.cookie.min.js"></script>
	<title></title>
</head>

<body class='body_test_mess'>

	<div class='wrapper'>
		<div class='new__container _container'>
			<div class='flex_mess_block'>
				<div class='main_mess_block'>


					<div class='mess_content_block'>
						<div class='messenger_user_block'>
							<div class='messenger_list'>


							<?php
							session_start();
							$uname = $_SESSION['uid'];
							$db = mysqli_connect('localhost', '', '', '');
							if (!$db){die('Ошибка соединения: ' . $db->connect_error);}
							$db->set_charset("utf8");

							$ck = $db->query("SELECT COUNT(*) FROM `messanger`");
							while ($row = mysqli_fetch_array($ck)) {
								$cnt = $row['COUNT(*)'];
							}

							$key = $_SESSION['ukey'];
							$method = "AES-192-CBC";

							$res = $db->query("SELECT * FROM `messanger` ");
								while ($get_chat = mysqli_fetch_array($res)) {
									$id = $get_chat['id'];
									$log = $get_chat['author'];		
									$mess = $get_chat['text'];
									$time = $get_chat['time'];


									$mess = openssl_decrypt($mess, $method, $key);




									echo"
										<div class='mess_user' cnt=".$cnt.">
											<div class='nickname_user'>".$log."</div>
											<div class='mess_user_main_cont'>
												<div class='mess_content'>".$mess."
													<div class='mess_time'>".$time."</div>
												</div>
												<div class='delete' id_mess=".$id."></div>
											</div>
										</div>

									";

								}

							?>


							</div>
						</div>
					</div>
					<div class='mess_area_user'>
						<div class='mess_block_text'>
							<input type='text' name='area_text' class='area_text' placeholder='Сооoбщение' value>
							<button class='mess_button'></button>
						</div>
					</div>


				</div>
				<div class='nickname_get_block'>
			
					<div class='main_nickname_block_text'>Введите логин</div>
					<input type='text' name='give_text' class='give_text' placeholder='Ваш логин' value='<?php echo $uname ?>'>

				</div>
			</div>		
		</div>
	</div>

</body>
</html>	