<?php
namespace Izzle\Csv\Observer;

use Izzle\Csv\ObserverInterface;

class PdoObserver implements ObserverInterface
{
    /**
     * @var \Pdo
     */
    private $pdo;
    
    /**
     * @var string
     */
    private $table;
    
    /**
     * @var string[]
     */
    private $columns;
    
    /**
     * @var callable
     */
    private $func;
    
    /**
     * PdoObserver constructor.
     * @param \Pdo $pdo
     * @param string $table
     * @param array $columns
     * @param callable|null $func
     */
    public function __construct(\Pdo $pdo, string $table, array $columns, callable $func = null)
    {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->columns = $columns;
        $this->func = $func;
    }
    
    /**
     * @param array $line
     * @return void
     */
    public function notify(array $line)
    {
        if (!is_null($this->func) && is_callable($this->func)) {
            $result = call_user_func($this->func, $line);
            if (is_array($result)) {
                $line = $result;
            }
        }
        
        $line = array_map(function($value) {
            $number = filter_var($value, FILTER_VALIDATE_INT);
            if ($number !== false) {
                return $number;
            }
            
            if (is_string($value)) {
                if (strtolower($value) === 'null') {
                    return 'NULL';
                }
                
                if (strtolower($value) === 'true') {
                    return 1;
                }
                
                if (strtolower($value) === 'false') {
                    return 0;
                }
                
                return $value;
            }
            
            throw new \InvalidArgumentException('value is invalid: ' . var_export($value, 1));
        }, $line);
    
        $prepare = array_map(function() {
            return '?';
        }, $line);
        
        $sql = 'INSERT INTO ' . $this->table . '(' . join(', ', $this->columns) . ')' .
            ' VALUES(' . join(',', $prepare) . ')';
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($line);
    }
}
