<?php

namespace SubjectivePHP\DDL\Mysql;

use SubjectivePHP\DDL\Common\DropTableInterface;

final class DropTable implements DropTableInterface
{
    /**
     * @var array
     */
    private $tables;

    /**
     * @var string
     */
    private $ifExists = '';

    /**
     * @var string
     */
    private $temporary = '';

    /**
     * @var string
     */
    private $restrictCascade = '';

    /**
     * @param string $table The table to use in the statement
     *
     * @return DropTableInterface|DropTable
     */
    public function table(string $table) : DropTableInterface
    {
        $this->tables[$table] = 1;
        return $this;
    }

    /**
     * @return DropTableInterface|DropTable
     */
    public function ifExists() : DropTableInterface
    {
        $this->ifExists = 'IF EXISTS';
        return $this;
    }

    /**
     * @return DropTable
     */
    public function temporary() : DropTable
    {
        $this->temporary = 'TEMPORARY';
        return $this;
    }

    /**
     * @return DropTable
     */
    public function cascade() : DropTable
    {
        $this->restrictCascade = 'CASCADE';
        return $this;
    }

    /**
     * @return DropTable
     */
    public function restrict() : DropTable
    {
        $this->restrictCascade = 'RESTRICT';
        return $this;
    }

    /**
     * @return string
     */
    public function getDDL() : string
    {
        $implodedTables = implode(', ', array_keys($this->tables));
        return trim("DROP {$this->temporary} TABLE {$this->ifExists} {$implodedTables} {$this->restrictCascade}");
    }
}
