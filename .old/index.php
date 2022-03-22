<?php session_start();?>

<!DOCTYPE html>
<html>

	<?php include("include/html_head.php");?>

	<body>

		<?php include("include/body_header.php")?>

		<div id="corps">
			<p>Bienvenue sur le site de laboHelp.</p>
			<p>Ce site a pour but de vous aider à résoudre vos problèmes concernant labomep grâce à laboHelp, notre assistant.</p>

			<?php include("ia_labohelp/ia.php");?>
			<form action="ia_labohelp/session.php" method="get">
				<fieldset id="espaceProf">
					<legend>Vous êtes professeur ?</legend>
					<input type="text" name="ref" placeholder="Entrez référence ici" />
					<input type="submit" value="Résultat">
				</fieldset>
			</form>
			<br>

			<?php
			if (isset($_SESSION["code"]) && isset($_SESSION["ref"])) {echo "<p>La référence à envoyer à votre professeur est <span style='font-weight:bold;color:#cd5c5c'>" . $_SESSION["ref"] . "</span>.</p>";}
			?>

			<div id="labohelp">
				<?php 
					if (isset($_SESSION["ref"])) {dialog($_SESSION["ref"], $xml);}
					else {dialog("0", $xml);}
				?>
			</div>

			<br>

			<form action="ia_labohelp/session.php" method="post">
				<?php 
					if (!isset($_SESSION["ref"])) {propose("0", $xml);}
					else {propose($_SESSION["ref"], $xml);}
					echo "<input type='hidden' name='nombre' value='{$GLOBALS['compteur']}' />\n";
				?>
				<p><input type="submit" name="destroy" value="Retour au début"/> <input type="submit" name="code" value="Récuperer référence"></p>
			</form>
		</div>

		<?php include("include/body_footer.php")?>

	</body>

</html>