<?php declare(strict_types=1);

namespace Brain\Games\Games;

final class Calc implements GameInterface
{
    private const OPERATIONS = ['+', '-', '*'];

    public function getTitle(): string
    {
        return 'What is the result of the expression?';
    }

    public function getRandom(): GameRound
    {
        $firstOperand = \random_int(0, 100);
        $secondOperand = \random_int(0, 100);

        $operator = self::OPERATIONS[\random_int(0, 2)];

        switch($operator) {
            case '+':
                $result = $firstOperand + $secondOperand;
                break;
            case '-':
                $result = $firstOperand - $secondOperand;
                break;
            case '*':
                $result = $firstOperand * $secondOperand;
                break;
            default:
                $result = '';
        }

        $question = sprintf('%d%s%d', $firstOperand, $operator, $secondOperand);

        $gameRound = new GameRound();

        $gameRound->question = sprintf('Question: %s', $question);

        settype($result, 'string');
        $gameRound->answer = $result;

        return $gameRound;
    }
}