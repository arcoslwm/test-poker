<?php

//testCAses
// $cards = [14,2,3,4,5];
// $cards = [9,10,11,12,13];
// $cards = [2,7,8,5,10,9,11];
// $cards = [7,8,12,13,14];
// $cards = [2,3,4,5,6];
$cards = [14,5,4,2,3];
// $cards = [7,7,12,11,3,4,14];
// $cards = [7,3,2];
$result = isStraight($cards);
if ($result) {
    echo "Es una escalera \n";
} else {
    echo "No es una escalera \n";
}

/**
 * retorna true cuando con las "cartas" recibidas
 * se puede formar unas escalera de Poker
 * (5 cartas con valores consecutivos).
 * las cartas siempre tienen valores entre 2 y 14, donde 14 es el AS.
 * el AS también cuenta como 1.
 * La cantidad de cartas puede variar, pero nunca es superior a 7.
 * @param  array $cards [description]
 * @return bool            [description]
 */
function isStraight( array $cards ): bool
{
    // verify number of cards
    if (count($cards)<5 || count($cards) >7) {
        return false;
    }

    if (sort($cards)===false) {
        return false;
    }
    $cards = array_unique($cards);
    if (count($cards)<5) {
        return false;
    }

    if (in_array(14, $cards)) {
        array_unshift($cards,1);
    }

    $numOfSegments = count($cards) - 4;
    for ($i=0; $i < $numOfSegments; $i++) {

        $straightCandidate = array_slice($cards, $i, 5);
        if ($straightCandidate[4] - $straightCandidate[0] + 1 === 5 ) {
            return true;
        }
    }
    return false;
}
