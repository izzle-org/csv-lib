<?php
namespace Izzle\Csv;

interface ReaderInterface
{
    /**
     * @param string $filename
     * @param InterpreterInterface $interpreter
     * @return bool
     */
    public function parse(string $filename, InterpreterInterface $interpreter): bool;
}