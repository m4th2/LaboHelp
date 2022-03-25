<?php
$xml = simplexml_load_file("ia_labohelp/arborescence.xml");
$prop = 0;

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
	$green = 1;
	foreach ($xmlClass->children() as $child) {
		if ($child->getName() == "prop")
		{
			$green = 0;
		}
	}
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
					echo "<p class='lh" . str_repeat("f", $green) . "Dialog'>". $child . "</p>\n";
				}
				if ($child->getName() == "url")
				{
					echo "<a class='lh" . str_repeat("l", $green) . "Dialog' href=\"{$child}\">". $child . "</a>\n";	
				}
				if ($child->getName() == "t")
				{
					echo "<p class='usDialog'>". $child . "</p>\n";	
				}
			}	
		}
	}
}

function propose($ref, $xmlClass,$type="visible")
{
	foreach ($xmlClass->children() as $child) {
		if ($child->count() != 0)
		{
			$GLOBALS["prop"] = $child["ref"];
			propose($ref,$child,$child["type"]);
		}
		else{
			if ($ref != "0")
			{
				if (substr($GLOBALS["prop"],0,strlen($ref)) == $ref && strlen($GLOBALS["prop"]) == strlen($ref)+1)
				{
					if($child->getName() == "t" && $type != "hidden")
					{
						echo "<a class='proposition' href='index.php?ref={$GLOBALS["prop"]}'>{$child}</a>";
					}
				}
			}
			else{
				if (strlen($GLOBALS["prop"]) == 1)
				{
					if($child->getName() == "t" && $type != "hidden")
					{
						echo "<a class='proposition' href='index.php?ref={$GLOBALS["prop"]}'>{$child}</a>";
					}
				}	
			}
		}
	}
}

function icounter()
{
	$file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'ia_labohelp' . DIRECTORY_SEPARATOR . 'counter.txt';
	$frefs = array('11', '12', '13', '14', '21', '221', '222', '23', '24', '31', '32', '33', '34', '411', '412', '413', '414', '43', '511', '512', '513', '514', '52', '61', '62', '63', '64', '71', '72', '81', '82', '83', '84', '85', '86', '88');
	if (file_exists($file))
	{
		if (isset($_GET['ref']))
		{
			if (in_array($_GET['ref'], $frefs))
			{
				$counter = intval(file_get_contents($file));
				$counter++;
				file_put_contents($file, $counter);
			}
		}
	}
	else{
		echo 'Une erreur est survenue lors du chargement du compteur. Si le problème persiste : <a href="mailto:cent20@gmail.com">cent20@gmail.com</a>';
	}
}

function getcounter()
{
	$file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'ia_labohelp' . DIRECTORY_SEPARATOR . 'counter.txt';
	if (file_exists($file))
	{
		return file_get_contents($file);
	}
}
?>