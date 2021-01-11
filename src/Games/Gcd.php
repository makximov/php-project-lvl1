<?php declare(strict_types=1);

namespace Brain\Games\Games;

final class Gcd implements GameInterface
{
    public function getTitle(): string
    {
        return 'Find the greatest common divisor of given numbers.';
    }

    public function getRandom(): GameRound
    {
        $firstOperand = \random_int(0, 100);
        $secondOperand = \random_int(0, 100);

        $result = $this->gcd($firstOperand, $secondOperand);

        $gameRound = new GameRound();

        $gameRound->question = sprintf('Question: %d %d', $firstOperand, $secondOperand);

        settype($result, 'string');

        $gameRound->answer = $result;

        return $gameRound;
    }

    private function gcd($a, $b)
    {
        return ($a % $b) ? $this->gcd($b,$a % $b) : $b;
    }
}