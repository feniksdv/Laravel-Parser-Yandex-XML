<?php


namespace App\Contracts;

interface Parser
{
    public function getDate(string $url): void;
}
