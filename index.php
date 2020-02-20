<?php
  
    require_once 'classes/autoload.php';
   
    $connection = new Connection();
    $connection = ($connection->conn) ? $connection->conn : false;


	$data = new Prikaz($connection);
	$main = new Main;

    if(isset($_GET['d']) && $_GET['d'] != "" && is_numeric($_GET['d'])) {

		$date = $main->newDate($_GET['d']);

		if($date == false) {
			http_response_code(404);
			die();
		}
		$svg = $data->getStatsByDate($date->format('Y-m-d'));
		if(empty($svg) || $date == false) {
			http_response_code(404);
			die();
		}

    } else {
		$date = new DateTime();
		$svg = $data->getStatsByDate($date->format('Y-m-d'));
	}
	
	
?>
<!doctype html>
<html>
<head>
	<title>Test 02</title>
	<style>
		* { font-family: Arial; box-sizing: border-box;}
		.page-wrapper { max-width: 1280px; margin: auto; }
		header, footer, .content { overflow: auto; }
		.main {
            text-align: center;
        }
		.hidden { display: none; }
	</style>
	<script src = "//code.jquery.com/jquery-3.3.1.min.js"></script>

	<script>
	
	</script>
</head>
<body>
	<div class="page-wrapper">
		<header>
			<h1>Karta Hrvatske</h1>
		</header>
		<div class="content">
			<div class="main">
                <svg width="1000" height="800">
                
                    <?php
                    foreach($svg as $s) {
						$color = $main->newColor($s['red'], $s['blue']);

                        echo "<path fill='" . $color . "'  stroke='black' fill='transparent' d='" . $s['svg_path'] . "' />";
                    }
                    ?>   
                </svg>
			</div>
		
		</div>
		<footer>
			<hr>
			Za GET metodu potrebno je upisati npr. /index.php?d=20180813
		</footer>
	</div>
</body>		