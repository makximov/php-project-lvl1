<?php declare(strict_types=1);

namespace Brain\Games\Games;

final class Even implements GameInterface
{
    private const ANSWER_YES = 'yes';
    private const ANSWER_NO = 'no';

    public function getTitle(): string
    {
        return 'Answer "yes" if the number is even, otherwise answer "no".';
    }

    public function getRandom(): GameRound
    {
        $questionNumber = \random_int(0, 100);

        $gameRound = new GameRound();

        $gameRound->question = sprintf('Question: %d', $questionNumber);
        $gameRound->answer = $questionNumber & 1 ? self::ANSWER_NO : self::ANSWER_YES;

        return $gameRound;
    }
}