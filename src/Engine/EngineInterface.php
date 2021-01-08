<?php declare(strict_types=1);

namespace Brain\Games\Engine;

interface EngineInterface
{
    public const TOTAL_GAME_ROUNDS = 3;

    public function run();
}