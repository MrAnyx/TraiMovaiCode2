La fonction générée par Github Copilot met  0,000075s pour effectuer la conversion (Ce qui est bien trop efficace 😂 à mon goût)

Du coup, je suis parti sur quelque de totalement différent. Grâce à mon algorithme, vous (développeurs expérimentés) aurez le temps de prendre un café avant que la fonction termine son exécution (Pas con 😄)

La première version à laquelle j'avais pensé mettait environ 2h30 à s'exécuter (Ce n'était pas assez). Du coup, plutôt que "d'améliorer" la complexité temporelle, j'ai plutôt voulu "améliorer" la complexité spatiale de mon algorithme.

Voici la première version (qui s'exécute en 2h30 environ en fonction des processeurs) : 

> ⚠️ Si on est le **19 Janvier 2038 à 04h14 et 07 secondes** et que vous êtes sur un ordinateur **32-bits**, **NE LANCEZ PAS CE PROGRAMME !!**

```php
<?php

// Github Copilot a généré cette fonction qui est bien trop appropriée pour notre problème.
// Donc nous allons bien évidemment ne pas l'utiliser 😂
// function convert_to_winter_time(DateTime $datetime): DateTime {
//    return $datetime->modify('-1 hour');
// }

function switch_to_l_heure_d_hiver(DateTime $summerTime): DateTime {

   // On simule un traitement
   if($summerTime->getTimestamp() < 3600) {
      sleep((new DateTime())->getTimestamp()); // Bon, un traitement très long 😂
      echo "Oh mince, Une erreur s'est produite 🤔";
      die();
   }
   $currentTimestamp = 0;

   // ~ 1 634 000 000 opérations
   while((new DateTime())->setTimestamp($currentTimestamp)->format("Y-m-d H:i:s") !== $summerTime->format("Y-m-d H:i:s")) {
      $currentTimestamp = $currentTimestamp + 1;
   }

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
// $today = (new DateTime())->setTimestamp(12350);
// echo "Heure d'aujourd'hui : " . $today->format("Y-m-d H:i:s") . PHP_EOL;
// echo "Heure d'hiver : ";
// echo switch_to_l_heure_d_hiver($today)->format("Y-m-d H:i:s");


// Pour avoir l'heure d'aujourd'hui en heure d'hiver
// Prenez un truc à grignoter, ça va être long 😰
$today = new DateTime();
echo "Heure d'aujourd'hui : " . $today->format("Y-m-d H:i:s") . PHP_EOL;
echo "Heure d'hiver : ";
echo switch_to_l_heure_d_hiver($today)->format("Y-m-d H:i:s");
```

Et voici maintenant la dernière version. Je vous laisse admirer ce chef-d'oeuvre 🤣

```php
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
// $today = (new DateTime())->setTimestamp(12350);
// echo "Heure d'aujourd'hui : " . $today->format("Y-m-d H:i:s") . PHP_EOL;
// echo "Heure d'hiver : ";
// echo switch_to_l_heure_d_hiver($today)->format("Y-m-d H:i:s");


// Pour avoir l'heure d'aujourd'hui en heure d'hiver
// Cherchez pas, ça va planter 😛
$today = new DateTime();
echo "Heure d'aujourd'hui : " . $today->format("Y-m-d H:i:s") . PHP_EOL;
echo "Heure d'hiver : ";
echo switch_to_l_heure_d_hiver($today)->format("Y-m-d H:i:s");
```

Après quelques tests, j'ai déterminé que pour exécuter ce programme, il faudrait environ 370 Go de mémoire réservée uniquement à l'exécution de l'algorithme.

Je laisse les plus scientifiques d'entre vous calculer précisement la complexité spatiale 😂. 