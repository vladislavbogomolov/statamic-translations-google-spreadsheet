<?php

namespace VladislavBogomolov\StatamicTranslationsGoogleSpreadsheet\Tests\Unit;


use VladislavBogomolov\StatamicTranslationsGoogleSpreadsheet\StatamicTranslationsGoogleSpreadsheetController;
use VladislavBogomolov\StatamicTranslationsGoogleSpreadsheet\Tests\TestCase;

class SheetTest extends TestCase {

    /** @test
     * @throws \Google\Exception
     */
    public function it_returns_a_collection_with_random_facts() {

        $ct = new StatamicTranslationsGoogleSpreadsheetController;
        $this->assertTrue($ct->downloadTranslations());
    }

}
