<?php
namespace Izzle\Csv;

class Interpreter implements InterpreterInterface
{
    /**
     * @var array
     */
    private $observers = [];
    
    /**
     * @param array $line
     * @return void
     */
    public function interpret(array $line)
    {
        foreach ($this->observers as $observer) {
            if ($observer instanceof ObserverInterface) {
                /** @var $observer ObserverInterface */
                $observer->notify($line);
            } else {
                call_user_func($observer, $line);
            }
        }
    }
    
    /**
     * @param callable|ObserverInterface $observer
     * @return Interpreter
     * @throws \InvalidArgumentException
     */
    public function addObserver($observer): Interpreter
    {
        if (!($observer instanceof ObserverInterface) && !is_callable($observer)) {
            throw new \InvalidArgumentException('Observer must be callable or an instance of ObserverInterface');
        }
        
        $this->observers[] = $observer;
        return $this;
    }
}
