<?PHP
# Блокировка сессии
if(!isset($_SESSION["user_id"])){ Header("Location: /"); return; }

if(isset($_GET["sel"])){
		
	$smenu = strval($_GET["sel"]);
			
	switch($smenu){
		
		case "404": include("pages/_404.php"); break; // Страница ошибки                
		case "add_preset": include("pages/account/_add_preset.php"); break;                
		case "edit_preset": include("pages/account/_edit_preset.php"); break;               
				
		case "exit": @session_destroy(); Header("Location: /"); return; break; // Выход
				
	# Страница ошибки
	default: @include("pages/_404.php"); break;
			
	}
			
}else @include("pages/account/_user_account.php");
