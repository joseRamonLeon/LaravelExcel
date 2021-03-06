<?php namespace Arcanedev\LaravelExcel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class     Importer
 *
 * @package  Arcanedev\LaravelExcel\Facades
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Importer extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'arcanedev.excel.importer'; }
}
