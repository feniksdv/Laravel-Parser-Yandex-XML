<?php


namespace App\Contracts;


interface SaveDataValueParser
{
    public function setTheParserValueToTheDB(array $data): array;
}
