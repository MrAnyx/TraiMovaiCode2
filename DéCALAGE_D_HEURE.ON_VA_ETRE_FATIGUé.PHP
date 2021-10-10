<?php

function recurrent_value_increment(int $current, int $goal): int {
   if($current === $goal) {
      return $current;
   } else {
      return recurrent_value_increment($current+1, $goal);
   }
}

function switch_to_l_heure_d_hiver(DateTime $summerTime): DateTime {

   // On simule un traitement
   if($summerTime->getTimestamp() < 3600) {
      sleep((new DateTime())->getTimestamp()); // Bon, un traitement très long 😂
      echo "Oh mince, Une erreur s'est produite 🤔";
      die();
   }
   $currentTimestamp = recurrent_value_increment(0, $summerTime->getTimestamp());   

   $currentTimestamp = $currentTimestamp - 3600;
   $currentTimestampList = [];
   // On décompose et on inverse le timestamp
   for($thisismyvariable = strlen(strval($currentTimestamp)) - 1; $thisismyvariable>= 0; $thisismyvariable = $thisismyvariable - 1) {
      $currentTimestampList[] = (int) strval($currentTimestamp)[$thisismyvariable];
   }

   foreach($currentTimestampList as $indexPower => $value) {
      $tmpValue = 0;
      while($tmpValue !== $value * (10 ** $indexPower)) {
         $tmpValue = $tmpValue + 1;
      }

      $currentTimestampList[$indexPower] = $tmpValue;
   }

   $newTimestamp = array_sum($currentTimestampList);

   return (new DateTime())->setTimestamp($newTimestamp);
}

// Pour tester 👇
// $today = (new DateTime())->setTimestamp(10000);
// echo "Heure d'aujourd'hui : " . $today->format("Y-m-d H:i:s") . PHP_EOL;
// echo "Heure d'hiver : ";
// echo switch_to_l_heure_d_hiver($today)->format("Y-m-d H:i:s");


// Pour avoir l'heure a'aujourd'hui en heure d'hiver
// Prenez un truc à grignoter, ça va être long 😰
$today = new DateTime();
echo "Heure d'aujourd'hui : " . $today->format("Y-m-d H:i:s") . PHP_EOL;
echo "Heure d'hiver : ";
echo switch_to_l_heure_d_hiver($today)->format("Y-m-d H:i:s");
