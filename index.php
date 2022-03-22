<?php session_start();?>

<!DOCTYPE html>
<html>

	<?php include("include/html_head.php");?>

	<body>

		<?php include("include/body_header.php")?>

		<div id="corps">
			<div id="labohelp">
			<div class="g"><img class="robot" src="LaboRobot.png" alt="broken"></div>
			<div class="d">
			<p class="lhDialog">Bienvenue sur laboHelp.</p>
			<p class="lhInfo">Je suis LaboRobot et je vais t'aider à résoudre tes problèmes sur labomep !</p>

			<?php include("ia_labohelp/ia.php");?>
			
				<?php 
					if (isset($_GET["ref"])) {dialog($_GET["ref"], $xml);}
					else {dialog("0", $xml);}
				?>

			</div>
			<br>
			<div id="labohelp">
			<?php 
				if (!isset($_GET["ref"])) {propose("0", $xml);}
				else {propose($_GET["ref"], $xml);}
			?>
			<a class="nav" href=<?php
				if (isset($_GET['ref']) && strlen($_GET['ref']) > 1){
					$retour = substr($_GET['ref'],0,strlen($_GET['ref'])-1);
				}
				else
				{
					$retour = 0;
				}
				echo "'index.php?ref={$retour}'";
			?>>Retour en arrière</a><a class="nav" href="index.php">Recommencer</a>
			</div>
		</div>
		</div>

		<?php include("include/body_footer.php")?>

	</body>

</html>