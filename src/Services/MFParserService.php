<?php

namespace EvolutionCMS\MFParser\Services;

use EvolutionCMS\MFParser\Parsers\Parser;

class MFParserService
{
    protected string $parser;
    public function __construct(string $parser = Parser::class)
    {
        $this->parser = $parser;
    }

    public function parse($value):array
    {
        return (new $this->parser())->parse($value);
    }
}