<?php

namespace BrainGames\BrainGcd;

use function BrainGames\Engine\greeting;
use function cli\line;
use function cli\prompt;

function nod($a, $b): int
{
    return $a ? nod($b % $a, $a) : $b;
}

function runNod(): void
{
    $name = greeting();

    line('Find the greatest common divisor of given numbers.');

    for ($i = 0; $i < 3; $i++) {
        $numberOne = rand(1, 100);
        $numberTwo = rand(1, 100);

        $correctAnswer = nod($numberOne, $numberTwo);

        line("Question: %s", $numberOne . ' ' . $numberTwo);

        $userCurrentAnswer = prompt("Your answer");

        if ($userCurrentAnswer == $correctAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userCurrentAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
