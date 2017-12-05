<?php
$guessedWord="";
$deathLevel=0;
$lettersFound=0;
$randomWord=getWord();
while($deathLevel<6 && $lettersFound<strlen($randomWord)){
	$ch=readline("Enter character\n");
	if(strchr($randomWord,$ch)==FALSE){
			echo "Wrong Guess".PHP_EOL."";
			$deathLevel++;
	}
	else{
		$iterator=0;
		while ($iterator<strlen($randomWord)) {
			if($ch==$randomWord[$iterator]){
				$guessedWord[$iterator]=$ch;
				$lettersFound++;
			}
			$iterator++;
		}
	}
	echo "Word:";
	print_r ($guessedWord);
	echo PHP_EOL."";
	echo "Death Level :".$deathLevel.PHP_EOL."";
}
if(6==$deathLevel){
	echo "You lose".PHP_EOL."";
}
else{
	echo "You won".PHP_EOL."";
}
echo "Word was :".$randomWord.PHP_EOL."";

function getWord(){
		$file="flowers_name.txt";
		$fopen = fopen($file, "r");
		$fread = fread($fopen,filesize($file));
		$split = explode("\n", $fread);
		$array[] = null;
	    	foreach ($split as $string){
			array_push($array,$string);
		}
		$wordIndex = array_rand($array,1);
	    	$word = $array[$wordIndex];
	    	return $word;
	}
?>

