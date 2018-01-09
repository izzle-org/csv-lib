<?php
namespace Izzle\Csv;

use SplFileObject;

class Config
{
    /**
     * @var string
     */
    private $delimiter = ',';
    
    /**
     * @var string
     */
    private $enclosure = '"';
    
    /**
     * @var string
     */
    private $escape = '\\';
    
    /**
     * @var string
     */
    private $fromCharset;
    
    /**
     * @var string
     */
    private $toCharset;
    
    /**
     * @var integer
     */
    private $flags = SplFileObject::READ_CSV;
    
    /**
     * @var bool
     */
    private $ignoreHeaderLine = false;
    
    /**
     * @return string
     */
    public function getDelimiter(): string
    {
        return $this->delimiter;
    }
    
    /**
     * @param string $delimiter
     * @return Config
     */
    public function setDelimiter(string $delimiter): Config
    {
        $this->delimiter = $delimiter;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getEnclosure(): string
    {
        return $this->enclosure;
    }
    
    /**
     * @param string $enclosure
     * @return Config
     */
    public function setEnclosure(string $enclosure): Config
    {
        $this->enclosure = $enclosure;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getEscape(): string
    {
        return $this->escape;
    }
    
    /**
     * @param string $escape
     * @return Config
     */
    public function setEscape(string $escape): Config
    {
        $this->escape = $escape;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getFromCharset(): string
    {
        return $this->fromCharset;
    }
    
    /**
     * @param string $fromCharset
     * @return Config
     */
    public function setFromCharset(string $fromCharset): Config
    {
        $this->fromCharset = $fromCharset;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getToCharset(): string
    {
        return $this->toCharset;
    }
    
    /**
     * @param string $toCharset
     * @return Config
     */
    public function setToCharset(string $toCharset): Config
    {
        $this->toCharset = $toCharset;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getFlags(): int
    {
        return $this->flags;
    }
    
    /**
     * @param int $flags Bit mask of the flags to set. See SplFileObject constants for the available flags.
     * @return Config
     * @see http://php.net/manual/en/class.splfileobject.php#splfileobject.constants
     */
    public function setFlags(int $flags): Config
    {
        $this->flags = $flags;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function isIgnoreHeaderLine(): bool
    {
        return $this->ignoreHeaderLine;
    }
    
    /**
     * @param bool $ignoreHeaderLine
     * @return Config
     */
    public function setIgnoreHeaderLine(bool $ignoreHeaderLine): Config
    {
        $this->ignoreHeaderLine = $ignoreHeaderLine;
        return $this;
    }
}
