<div id="footer">
	<p class="small">
	Une idée originale de Vincent ROBERT, développé avec Kevin FEDYNA, illustré par Alexandre GUTIERREZ, maintenu par Ilyas RAHMOUN
	<br> Découvrez la <a href="https://nsi.xyz">spécialité NSI</a> (numérique et sciences informatiques) du Lycée Louis Pasteur <br>
	<?php
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'ia_labohelp' . DIRECTORY_SEPARATOR . 'ia.php';
	icounter();
	echo 'laboHelp a déjà pu aider un total de ' . getcounter() . ' élèves !';
	?>
	</p>
</div>