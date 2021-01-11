<?php declare(strict_types=1);

namespace Brain\Games\Games;

final class Progression implements GameInterface
{
    private const PROGRESSION_SIZE = 10;

    public function getTitle(): string
    {
        return 'What number is missing in the progression?';
    }

    public function getRandom(): GameRound
    {
        $start = \random_int(0, 100);
        $diff = \random_int(0, 10);
        $shadow = \random_int(0, 9);

        $progression = $this->seq($start, self::PROGRESSION_SIZE, $diff);
        $result = '';
        $answer = '';

        foreach ($progression as $pos => $seq) {

            if ($pos === $shadow) {
                $result .= ' ...';
                $answer = $seq;
            } else {
                $result .= ' ' . $seq;
            }
        }

        $gameRound = new GameRound();

        $gameRound->question = sprintf('Question: %s', $result);

        settype($answer, 'string');
        $gameRound->answer = $answer;

        return $gameRound;
    }

    private function seq(int $start, int $size, int $diff): \Generator
    {
        $cur = $start;
        for ($i = 0; $i < $size; $i++) {
            yield $cur;

            $cur += $diff;
        }
    }
}