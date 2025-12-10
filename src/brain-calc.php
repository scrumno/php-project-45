<?php

namespace BrainGames\BrainCalc;

use function BrainGames\Engine\greeting;
use function cli\line;
use function cli\prompt;

function runCalc(): void
{
	$name = greeting();

	line('What is the result of the expression?');

	for ($i = 0; $i < 3; $i++) {
		$numberOne = rand(1, 100);
		$numberTwo = rand(1, 100);
		$operations = ['+', '-', '*'];

		$operation = $operations[array_rand($operations)];
		switch ($operation) {
			case '+':
				$correctAnswer = $numberOne + $numberTwo;
				break;
			case '-':
				$correctAnswer = $numberOne - $numberTwo;
				break;
			case '*':
				$correctAnswer = $numberOne * $numberTwo;
				break;
		}
		line("Question: %s %s %s", $numberOne, $operation, $numberTwo);

		$answer = prompt("Your answer");

		if ((string)$correctAnswer === $answer) {
			line("Correct!");
		} else {
			line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
			line("Let's try again, %s!", $name);
			return;
		}
	}
	line("Congratulations, %s!", $name);
}
