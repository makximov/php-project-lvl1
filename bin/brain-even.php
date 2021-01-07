#!/usr/bin/env php

<?php

use function cli\line;
use function cli\prompt;

require_once __DIR__ .'/../vendor/autoload.php';

$name = Brain\Games\Cli::run();

line('Answer "yes" if the number is even, otherwise answer "no".');

$game = true;
$count = 0;

const ANSWER_YES = 'yes';
const ANSWER_NO = 'no';

do {
    $questionNumber = random_int(0, 100);
    $correctAnswer = $questionNumber & 1 ? ANSWER_NO : ANSWER_YES;

    line(sprintf('Question: %d', $questionNumber));
    $answer = prompt('Your answer: ');

    if ( ! in_array($answer, [ANSWER_YES, ANSWER_NO])) {
        $game = false;
    } else {

        if ($answer === $correctAnswer) {
            line('Correct!');
        } else {
            line(sprintf('Let\'s try again, %s!', $name));
            $game = false;
        }
    }

    $count++;

} while ($game && $count < 4);



