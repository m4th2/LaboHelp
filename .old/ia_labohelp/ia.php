<?php
$xml = simplexml_load_file("ia_labohelp/arborescence.xml");
$prop = 0;
$compteur = 0;

function aff($xmlClass, $ref = -1){
	foreach ($xmlClass->children() as $child) {
		if ($child->count() != 0)
		{
			if ($child["ref"] != 0)
			{
				$GLOBALS["prop"] = $child["ref"];
			}
			aff($child, $ref);
		}
		else{
			if ($GLOBALS["prop"] == $ref)
			{

				echo $child->getName() . ":" . $child . "<br>";
			}
		}
	}
}

function dialog($ref, $xmlClass)
{
	foreach ($xmlClass->children() as $child) {
		if ($child->count() != 0)
		{
			$GLOBALS["prop"] = $child["ref"];
			dialog($ref,$child);
		}
		else{
			if ($GLOBALS["prop"] == $ref || substr($ref,0,strlen($GLOBALS["prop"])) == $GLOBALS["prop"] || ($GLOBALS["prop"] == "0" && $ref != "0"))
			{
				if($child->getName() == "r")
				{
					echo "<p class='lhDialog'>". $child . "</p>\n";
				}
				if ($child->getName() == "url")
				{
					echo "<p class='lhDialog'><a href=\"{$child}\">". $child . "</a></p>\n";	
				}
				if ($child->getName() == "t")
				{
					echo "<p class='usDialog'>". $child . "</p>\n";	
				}
			}	
		}
	}
}

function propose($ref, $xmlClass)
{
	foreach ($xmlClass->children() as $child) {
		if ($child->count() != 0)
		{
			$GLOBALS["prop"] = $child["ref"];
			propose($ref,$child);
		}
		else{
			if ($ref != "0")
			{
				if (substr($GLOBALS["prop"],0,strlen($ref)) == $ref && strlen($GLOBALS["prop"]) == strlen($ref)+1)
				{
					if($child->getName() == "t")
					{
						echo "<p><input type='submit' name=\"bouton-{$GLOBALS['compteur']}\" value=\"{$child}\" /></p>";
						echo "<input type='hidden' name='ref-{$GLOBALS['compteur']}' value='{$GLOBALS['prop']}'>\n";
						$GLOBALS['compteur']++;
					}
				}
			}
			else{
				if (strlen($GLOBALS["prop"]) == 1)
				{
					if($child->getName() == "t")
					{
						echo "<p><input type='submit' name=\"bouton-{$GLOBALS['compteur']}\" value=\"{$child}\" /></p>";
						echo "<input type='hidden' name='ref-{$GLOBALS['compteur']}' value='{$GLOBALS['prop']}'>\n";
						$GLOBALS['compteur']++;
					}
				}	
			}
		}
	}
}
?>