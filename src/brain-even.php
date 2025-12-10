<?php
declare(strict_types=1);
namespace BrainGames\BrainEven;

use function BrainGames\Engine\greeting;
use function cli\line;
use function cli\prompt;

function runNumber(): void
{
    $name = greeting();

    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 0; $i < 3; $i++) {
        $number = rand(1, 100);

        $isEven = $number % 2 === 0;
        $correctAnswer = $isEven ? 'yes' : 'no';

        line("Question: %s", $number);
        $answer = prompt("Your answer");

        if ($answer === $correctAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
