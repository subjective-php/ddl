<?php

namespace SubjectivePHP\DDL\Common;

use SubjectivePHP\DDL\DDLInterface;

interface DropTableInterface extends DDLInterface
{
    /**
     * @param string $table The table to use in the statement
     *
     * @return DropTableInterface
     */
    public function table(string $table) : DropTableInterface;

    /**
     * @return DropTableInterface
     */
    public function ifExists() : DropTableInterface;
}
