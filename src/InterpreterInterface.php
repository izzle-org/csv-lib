<?php
namespace Izzle\Csv;

interface InterpreterInterface
{
    /**
     * @param array $line
     * @return void
     */
    public function interpret(array $line);
}
