<?php
function sayHello(string $name= 'Bulbi') : string
{
    return "Hello ".$name."<br/>";
}


function fight(string $pokemon1,string $pokemon2, array $pokemons) : string
{
    $type1 = type($pokemon1, $pokemons);
    $type2 = type($pokemon2, $pokemons);
    if($type1 === 'Feu' && $type2 === 'Plante') {
        return $pokemon1." a gagné contre ".$pokemon2;
    }elseif($type1 === 'Plante' && $type2 === 'Eau') {
        return $pokemon1." a gagné contre ".$pokemon2;
    }elseif($type1 === 'Eau' && $type2 === 'Feu') {
        return $pokemon1." a gagné contre ".$pokemon2;
    }elseif($type2 === 'Feu' && $type1 === 'Plante') {
        return $pokemon2." a gagné contre ".$pokemon1;
    }elseif($type2 === 'Plante' && $type1 === 'Eau') {
        return $pokemon2." a gagné contre ".$pokemon1;
    }elseif($type2 === 'Eau' && $type1 === 'Feu') {
        return $pokemon2." a gagné contre ".$pokemon1;
    }elseif($type2 === $type1) {
        return "Match nul pour ".$pokemon1." et ".$pokemon2;
    }else{
        return "Match ... Il y a un match";
    }
}

function type(string $namePokemon, array $pokemons) : string
{
    foreach($pokemons as $type => $pokemonType)
    {
        if(in_array($namePokemon, $pokemonType)){
            return $type;
        }
    }
}

// Bonus 
function win(array $team1, array $team2, array $pokemons)
{   
    if(count($team1)>= count($team2)) {
        $biggerTeam = $team1;
        $smallerTeam = $team2;
    }else{
        $biggerTeam = $team2;
        $smallerTeam = $team1;
    }

    $type = [
        'Feu' => 'Plante',
        'Plante' =>  'Eau',
        'Eau' =>  'Feu'
    ];
    
    $counter =  $scoreBigger = $scoreSmaller = 0;
    foreach($biggerTeam as $pokemon)
    {
        if(empty($smallerTeam[$counter]) || $type[type($pokemon, $pokemons)] === type($smallerTeam[$counter], $pokemons) && isset($smallerTeam[$counter])) {
            $scoreBigger +=1;
        }elseif(isset($smallerTeam[$counter]) && type($pokemon, $pokemons) === type($smallerTeam[$counter], $pokemons)) {
            $scoreBigger +=1;
            $scoreSmaller +=1;
        }else{
            $scoreSmaller +=1;
        }
        $counter++;
    }

    return "L'équipe [".implode(', ',$biggerTeam)."] <b>".$scoreBigger."-".$scoreSmaller."</b>  [".implode(', ',$smallerTeam)."] ";


}