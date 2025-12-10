<?php

declare(strict_types=1);

namespace BrainGames\BrainGcd;

use function BrainGames\Engine\greeting;
use function cli\line;
use function cli\prompt;

function nod(int $a, int $b): int
{
    return $b !== 0 ? gcd($b, $a % $b) : $a;
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

        if ($userCurrentAnswer === (string) $correctAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userCurrentAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
