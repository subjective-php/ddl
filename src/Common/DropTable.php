<?php

namespace SubjectivePHP\DDL\Common;

final class DropTable implements DropTableInterface
{
    /**
     * @var string
     */
    private $table = '';

    /**
     * @var string
     */
    private $ifExists = '';

    /**
     * @param string $table The table to use in the statement
     *
     * @return DropTableInterface
     */
    public function table(string $table) : DropTableInterface
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @return DropTableInterface
     */
    public function ifExists() : DropTableInterface
    {
        $this->ifExists = 'IF EXISTS';
        return $this;
    }

    /**
     * @return string
     */
    public function getDDL() : string
    {
        return "DROP TABLE {$this->ifExists} {$this->table}";
    }
}
