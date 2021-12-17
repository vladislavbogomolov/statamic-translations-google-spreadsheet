<?php

namespace VladislavBogomolov\StatamicTranslationsGoogleSpreadsheet\Tests;

use VladislavBogomolov\StatamicTranslationsGoogleSpreadsheet\StatamicTranslationsGoogleSpreadsheetServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    protected function getPackageProviders($app)
    {
        return [
            StatamicTranslationsGoogleSpreadsheetServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment set
    }
}
