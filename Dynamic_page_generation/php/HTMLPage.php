<?
	class HTMLPage
	{
		function __construct($title, $arrayMAIN, $arrayALL_DB)
		{
			$this->title = $title;
			$this->arrayMAIN = $arrayMAIN;
			$this->arrayALL_DB = $arrayALL_DB;
		}

		function header(){
			$txtHEADER = "<header>
			<div class='header_img'>";
			
			echo $txtHEADER;
			$this->logo();
			echo "</div><div class='header_h1'><h1>Достопримечательности Тюмени</h1></div></header>";
		}

		function footer(){
			$txtFOOTER = "<footer>©2023</footer>";
			echo $txtFOOTER;
		}

		function logo(){
			$txtLOGO = "<img src='../images/Logo.jpg' name='logo'>";
			echo $txtLOGO;
		}

		function menu(){
			$txtMENU="<menu>
				<h3>Меню</h3>
				<hr/>
				<ul>";
			foreach ($this->arrayMAIN as $value) {
				$arr = explode(': ', $value);
				$txtMENU.="<a href='item.php?id={$arr[0]}&attraction={$arr[1]}'><li>{$arr[1]}</li></a>";
			}
			$txtMENU.="</ul>
			</menu>";
			echo $txtMENU;
		}

		function content($check){
			if ($check == 'index.php') {
				$txtCONTENT = "<main>
					<div class='first_level'>";
				echo $txtCONTENT;
				$this->menu();
				echo "</div></main>";
			}
			else{
				if ($_GET['id'] < 10) {
					$imgPATH = '../images/t0'.$_GET['id'].'.jpg';
				}
				else{
					$imgPATH = '../images/t'.$_GET['id'].'.jpg';
				}
				$arr = explode(': ', $this->arrayALL_DB[$_GET['id']-1]);
				$txtCONTENT = "<main><div class='first_level'>";
				echo $txtCONTENT;
				$this->menu();
				echo "<div class='img'>
							<img class='imgcon' src='{$imgPATH}'>
						</div>
					</div>
					<div class='content'>
						<h2>{$arr[1]}</h2>
						<content>
							{$arr[2]}
						</content>
					</div>
				</main>";
			}
			
		}

		function write($check=''){
			if ($check == 'index.php') {
				$txt = "<!DOCTYPE html>
				<html>
				<head>
					<meta charset='utf-8'>
					<title>{$this->title}</title>
					<link rel='stylesheet' href='../css/style.css'>
				</head>
				<body>";
				echo $txt;
				$this->header();
				$this->content($check);
				$this->footer();
				echo "</body></html>";
			}
			else{
				$arr=explode(': ',$this->arrayALL_DB[$_GET['id']-1]);
				$txt = "<!DOCTYPE html>
				<html>
				<head>
					<meta charset='utf-8'>
					<title>{$arr[1]}</title>
					<link rel='stylesheet' href='../css/style.css'>
				</head>
				<body>";
				echo $txt;
				$this->header();
				$this->content($check);
				$this->footer();
				echo "</body></html>";
			}
		}
	}
?>