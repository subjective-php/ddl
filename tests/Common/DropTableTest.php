<?php

namespace SubjectivePHPTest\DDL\Common;

use PHPUnit\Framework\TestCase;
use SubjectivePHP\DDL\Common\DropTable;

/**
 * @coversDefaultClass \SubjectivePHP\DDL\Common\DropTable
 */
final class DropTableTest extends TestCase
{
    /**
     * @test
     * @covers ::table
     */
    public function dropTable()
    {
        $ddl = new DropTable();
        $ddl->table('schema_name.table_name');
        $this->assertSame('DROP TABLE  schema_name.table_name', $ddl->getDDL());
    }

    /**
     * @test
     * @covers ::ifExists
     */
    public function dropTableIfExists()
    {
        $ddl = new DropTable();
        $ddl->table('schema_name.table_name')->ifExists();
        $this->assertSame('DROP TABLE IF EXISTS schema_name.table_name', $ddl->getDDL());
    }
}
