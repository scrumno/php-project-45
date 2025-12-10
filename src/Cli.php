<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function RunName(): void
{
	line('Welcome to the Brain Game!');

	$name = prompt('May i have your name?');

	line("Hello, %s!", $name);
}
