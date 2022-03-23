<?php 
session_start();
if (isset($_GET['ref'])){
$redir = NULL;
switch ($_GET['ref']) {
	case 'nsi':
		$redir = 'NSI';
	break;
	case '120':
	case 'robert':
		$redir = 'ROBERT';
	break;
	case 'fedyna':
		$redir = 'FEDYNA';
	break;
	case 'gutierrez':
		$redir = 'GUTIERREZ';
	break;
	case '87':
		$redir = '7';
	break;
}

if ($redir != NULL) {header('Location: index.php?ref=' . $redir);}
}
?>

<!DOCTYPE html>
<html>

	<?php include("include/html_head.php");?>

	<body>

		<?php include("include/body_header.php");?>

		<div id="corps">
			<div id="labohelp">
			<div class="g"><img class="robot" src="LaboRobot.png" alt="broken"></div>
			<div class="d">
			<p class="lhDialog">Bienvenue sur laboHelp.</p>
			<p class="lhInfo">Je suis LaboRobot et je vais t'aider à résoudre tes problèmes sur <a class="labomep_redir" href="https://labomep.sesamath.net/" target="blank">labomep</a> !</p>

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
				$retour = (isset($_GET['ref']) && strlen($_GET['ref']) > 1 && intval($_GET['ref']) != 0) ? substr($_GET['ref'],0,strlen($_GET['ref'])-1) : 0;
				echo 'index.php?ref=' . $retour;
			?>>Retour en arrière</a><a class="nav" href="index.php">Recommencer</a>
			</div>
		</div>
		</div>

		<?php include("include/body_footer.php");?>

	</body>

</html>