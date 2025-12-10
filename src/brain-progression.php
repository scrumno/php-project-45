<?php

declare(strict_types=1);

namespace BrainGames\BrainProgression;

use function BrainGames\Engine\greeting;
use function cli\line;
use function cli\prompt;

function runProgression(): void
{
    $name = greeting();

    line('What number is missing in the progression?');

    for ($i = 0; $i < 3; $i++) {
        $startProgression = rand(1, 10);
        $stepProgression = rand(1, 10);
        $maxlength = 10;
        $minlength = 5;
        $length = rand($minlength, $maxlength);

        $progression = [];
        for ($j = 0; $j < $length; $j++) {
            $progression[] = $startProgression + $j * $stepProgression;
        }

        $hiddenIndex = rand(0, $length - 1);
        $correctAnswer = $progression[$hiddenIndex];
        $progression[$hiddenIndex] = '..';

        line("Question: %s", implode(' ', $progression));
        $answer = prompt("Your answer");

        if ($answer === (string) $correctAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
