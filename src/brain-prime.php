<?php
declare(strict_types=1);
namespace BrainGames\BrainPrime;

use function BrainGames\Engine\greeting;
use function cli\line;
use function cli\prompt;

function runPrime(): void
{
    $name = greeting();

    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    for ($i = 0; $i < 3; $i++) {
        $number = rand(1, 100);

        $isPrime = true;
        if ($number < 2) {
            $isPrime = false;
        } else {
            if ($number === 2) {
                $isPrime = true;
            } else {
                if ($number % 2 === 0) {
                    $isPrime = false;
                } else {
                    for ($j = 2; $j <= sqrt($number); $j++) {
                        if ($number % $j === 0) {
                            $isPrime = false;
                            break;
                        }
                    }
                }
            }
        }

        $correctAnswer = $isPrime ? 'yes' : 'no';

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
