<?PHP
# Счетчик
function TimerSet(){
	list($seconds, $microSeconds) = explode(' ', microtime());
	return $seconds + (float) $microSeconds;
}

$_timer_a = TimerSet();

# Старт сессии
@session_start();

# Старт буфера
@ob_start();

# Константа для Include
define("CONST_RUFUS", true);

# Автоподгрузка классов
function __autoload($name){ include("classes/_class.".$name.".php");}

# Класс конфига 
$config = new config;

# Функции
$func = new func;

# База данных
$db = new db($config->HostDB, $config->UserDB, $config->PassDB, $config->BaseDB);

# Шапка
@include("inc/_header.php");

		if(isset($_GET["menu"])){
		
			$menu = strval($_GET["menu"]);
			
			switch($menu){
			
				case "404": include("pages/_404.php"); break; // Страница ошибки
				case "account": include("pages/_account.php"); break; // Аккаунт
				case "download": include("pages/_download.php"); break; // Скачать превью
				case "admin": include("pages/_admin.php"); break; // Авторизация в админ-панель

			# Страница ошибки
			default: @include("pages/_404.php"); break;
			
			}
			
		}else @include("pages/_index.php");


# Подвал
@include("inc/_footer.php");


# Заносим контент в переменную
$content = ob_get_contents();

# Очищаем буфер
ob_end_clean();
	
	# Заменяем данные
	$content = str_replace('{!GEN_PAGE!}', sprintf("%.5f", (TimerSet() - $_timer_a)) ,$content);
	
	
// Выводим контент
echo $content;
?>