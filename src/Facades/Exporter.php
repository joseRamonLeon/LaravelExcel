<?php namespace Arcanedev\LaravelExcel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class     Exporter
 *
 * @package  Arcanedev\LaravelExcel\Facades
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Exporter extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'arcanedev.excel.exporter'; }
}
