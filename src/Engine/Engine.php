<?php declare(strict_types=1);

namespace Brain\Games\Engine;

use Brain\Games\Games\GameRound;
use function cli\line;
use function cli\prompt;

use Brain\Games\Cli;
use Brain\Games\Games\GameInterface;

final class Engine implements EngineInterface
{
    private GameInterface $game;
    private Cli $cli;

    private bool $gameContinue = true;
    private int $gameStep = 0;

    public function __construct(GameInterface $game, Cli $cli)
    {
        $this->game = $game;
        $this->cli = $cli;
    }

    public function run(): void
    {
        $playerName = $this->cli->getPlayerName();

        line($this->game->getTitle());

        do {
            /** @var GameRound $gameRound */
            $gameRound = $this->game->getRandom();

            line($gameRound->question);
            $playerAnswer = prompt('Your answer: ');

            $correctAnswer = $gameRound->answer;

            $this->checkAnswer($playerAnswer, $correctAnswer, $playerName);

            $this->gameStep++;

        } while ($this->gameContinue && $this->gameStep < self::TOTAL_GAME_ROUNDS);

        if ($this->gameContinue) {
            line('Congratulations, %s!', $playerName);
        }
    }

    private function checkAnswer(string $playerAnswer, string $correctAnswer, string $playerName): void
    {
        if ($playerAnswer === $correctAnswer) {
            line('Correct!');
        } else {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $playerAnswer, $correctAnswer);
            line('Let\'s try again, %s!', $playerName);
            $this->gameContinue = false;
        }
    }
}