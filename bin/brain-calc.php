#!/usr/bin/env php

<?php

use function cli\line;
use function cli\prompt;

require_once __DIR__ .'/../vendor/autoload.php';

$gameContinue = true;
$gameRound = 0;
$totalGameRounds = 3;

const ANSWER_YES = 'yes';
const ANSWER_NO = 'no';

$playerName = Brain\Games\Cli::run();

line('What is the result of the expression?');

do {
    $questionNumber = random_int(0, 100);
    $correctAnswer = $questionNumber & 1 ? ANSWER_NO : ANSWER_YES;

    line('Question: %d', $questionNumber);
    $playerAnswer = prompt('Your answer: ');

    if ( ! in_array($playerAnswer, [ANSWER_YES, ANSWER_NO])) {
        $gameContinue = false;
    } else {

        if ($playerAnswer === $correctAnswer) {
            line('Correct!');
        } else {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $playerAnswer, $correctAnswer);
            line('Let\'s try again, %s!', $playerName);
            $gameContinue = false;
        }
    }

    $gameRound++;

} while ($gameContinue && $gameRound < $totalGameRounds);

if ($gameContinue) {
    line('Congratulations, %s!', $playerName);
}



