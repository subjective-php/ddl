<?php

namespace SubjectivePHPTest\DDL\Mysql;

use PHPUnit\Framework\TestCase;
use SubjectivePHP\DDL\Mysql\DropTable;

/**
 * @coversDefaultClass \SubjectivePHP\DDL\Mysql\DropTable
 */
final class DropTableTest extends TestCase
{
    /**
     * @test
     * @covers ::table
     * @covers ::getDDL
     */
    public function dropTable()
    {
        $ddl = new DropTable();
        $ddl->table('schema_name.table_name');
        $this->assertSame('DROP  TABLE  schema_name.table_name', $ddl->getDDL());
    }

    /**
     * @test
     * @covers ::ifExists
     * @covers ::getDDL
     */
    public function dropTableIfExists()
    {
        $ddl = new DropTable();
        $ddl->table('schema_name.table_name')->ifExists();
        $this->assertSame('DROP  TABLE IF EXISTS schema_name.table_name', $ddl->getDDL());
    }

    /**
     * @test
     * @covers ::ifExists
     * @covers ::temporary
     * @covers ::getDDL
     */
    public function dropTemporaryTableIfExists()
    {
        $ddl = new DropTable();
        $ddl->temporary()->table('schema_name.table_name')->ifExists();
        $this->assertSame('DROP TEMPORARY TABLE IF EXISTS schema_name.table_name', $ddl->getDDL());
    }

    /**
     * @test
     * @covers ::cascade
     * @covers ::getDDL
     */
    public function dropTableCascade()
    {
        $ddl = new DropTable();
        $ddl->table('schema_name.table_name')->cascade();
        $this->assertSame('DROP  TABLE  schema_name.table_name CASCADE', $ddl->getDDL());
    }

    /**
     * @test
     * @covers ::restrict
     * @covers ::getDDL
     */
    public function dropTableRestrict()
    {
        $ddl = new DropTable();
        $ddl->table('schema_name.table_name')->restrict();
        $this->assertSame('DROP  TABLE  schema_name.table_name RESTRICT', $ddl->getDDL());
    }
}
