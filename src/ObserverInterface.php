<?php
namespace Izzle\Csv;

interface ObserverInterface
{
    /**
     * @param array $line
     * @return void
     */
    public function notify(array $line);
}
