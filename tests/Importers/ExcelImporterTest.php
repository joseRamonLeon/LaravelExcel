<?php namespace Arcanedev\LaravelExcel\Tests\Importers;

use Arcanedev\LaravelExcel\Importers\ExcelImporter;
use Arcanedev\LaravelExcel\Tests\TestCase;
use Box\Spout\Common\Type;

/**
 * Class     ExcelImporterTest
 *
 * @package  Arcanedev\LaravelExcel\Tests\Importers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ExcelImporterTest extends TestCase
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /** @var  \Arcanedev\LaravelExcel\Importers\ExcelImporter */
    protected $importer;

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    public function setUp()
    {
        parent::setUp();

        $this->importer = new ExcelImporter;
    }

    public function tearDown()
    {
        unset($this->importer);

        parent::tearDown();
    }

    /* ------------------------------------------------------------------------------------------------
     |  Test Functions
     | ------------------------------------------------------------------------------------------------
     */
    /** @test */
    public function it_can_be_instantiated()
    {
        $expectations = [
            \Arcanedev\LaravelExcel\Contracts\Importer::class,
            \Arcanedev\LaravelExcel\Importers\AbstractImporter::class,
            ExcelImporter::class,
        ];

        foreach ($expectations as $expected) {
            $this->assertInstanceOf($expected, $this->importer);
        }

        $this->assertSame(Type::XLSX, $this->importer->getType());
    }

    /** @test */
    public function it_can_load_file()
    {
        $this->importer
            ->load($this->getFixture('xlsx/one_sheet_with_inline_strings.xlsx'))
            ->setSheet(1);

        $data = $this->importer->get();

        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $data);
        $this->assertSame([
            ['s1 - A1', 's1 - B1', 's1 - C1', 's1 - D1', 's1 - E1'],
            ['s1 - A2', 's1 - B2', 's1 - C2', 's1 - D2', 's1 - E2'],
            ['s1 - A3', 's1 - B3', 's1 - C3', 's1 - D3', 's1 - E3'],
            ['s1 - A4', 's1 - B4', 's1 - C4', 's1 - D4', 's1 - E4'],
            ['s1 - A5', 's1 - B5', 's1 - C5', 's1 - D5', 's1 - E5'],
        ], $data->toArray());
    }
}
