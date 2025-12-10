<?php

namespace BrainGames\Cli;

use function BrainGames\Engine\greeting;
use function cli\line;
use function cli\prompt;

function runName(): void
{
    greeting();
}
