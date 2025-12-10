<?php

declare(strict_types=1);

namespace BrainGames\Cli;

use function BrainGames\Engine\greeting;
use function cli\line;
use function cli\prompt;

function runName(): void
{
    greeting();
}
