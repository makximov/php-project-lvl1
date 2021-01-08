<?php declare(strict_types=1);

namespace Brain\Games\Games;

interface GameInterface
{
    public function getRandom(): GameRound;
    public function getTitle(): string;
}