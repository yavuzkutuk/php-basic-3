<?php

include_once('functions.php');

echo sayHello('yavuz');

$pokemons = [
    'Plante' => ['Bulbizarre', 'Mystherbe', 'Chetiflor'],
    'Eau' => ['Carapuce', 'Stari', 'Magicarpe'],
    'Feu' => ['Salamèche'],
];

echo fight('Bulbizarre', 'Magicarpe', $pokemons);
echo '<hr/>';
echo win(['Bulbizarre', 'Chetiflor', 'Carapuce'], ['Salamèche','Stari'], $pokemons);