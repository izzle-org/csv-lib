<?php
namespace Izzle\Csv;

use SplFileObject;

class Reader implements ReaderInterface
{
    /**
     * @var Config
     */
    private $config;
    
    /**
     * Reader constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }
    
    /**
     * @param string $filename
     * @param InterpreterInterface $interpreter
     * @return bool
     */
    public function parse(string $filename, InterpreterInterface $interpreter): bool
    {
        ini_set('auto_detect_line_endings', true); // For mac's office excel csv
    
        $csv = new SplFileObject($filename);
        $csv->setCsvControl($this->config->getDelimiter(), $this->config->getEnclosure(), $this->config->getEscape());
        $csv->setFlags($this->config->getFlags());
        
        foreach ($csv as $number => $line) {
            if ($this->config->isIgnoreHeaderLine() && $number == 0 || (count($line) === 1 && trim($line[0]) === '')) {
                continue;
            }
            
            $interpreter->interpret($line);
        }
        
        return true;
    }
}
