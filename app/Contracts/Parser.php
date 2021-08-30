<?php


namespace App\Contracts;


interface Parser
{
    public function getDate(array $urls): array;
}
