<?php

namespace VladislavBogomolov\StatamicTranslationsGoogleSpreadsheet;

use Statamic\Facades\Utility;
use Illuminate\Routing\Router;
# use Illuminate\Support\Facades\Route;
use Statamic\Providers\AddonServiceProvider;
use Statamic\Statamic;

class StatamicTranslationsGoogleSpreadsheetServiceProvider extends AddonServiceProvider
{
    /*protected $scripts = [
        __DIR__.'/../resources/js/logbook.js'
    ];*/


    public function boot()
    {
        parent::boot();


        $this->publishes([
            __DIR__.'/../config/statamic-translations-google-spreadsheet.php' => config_path('statamic-translations-google-spreadsheet.php')
        ], 'config');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'statamic-translations-google-spreadsheet');

        Utility::make('statamic-translations-google-spreadsheet')
            ->title(__('statamic-translations-google-spreadsheet'))
            ->icon('addons')
            ->description(__('Sync translations Statamic V3 with Google Spreadsheet'))
            ->routes(function (Router $router) {
                $router->get('/', [StatamicTranslationsGoogleSpreadsheetController::class, 'index'])->name('index');
                $router->post('/save', [StatamicTranslationsGoogleSpreadsheetController::class, 'save'])->name('save');
            })
            ->register();

        Statamic::afterInstalled(function ($command) {
            # (new StatamicTranslationsGoogleSpreadsheetController)->createConfigFile();
            // $command->call('some:command');
        });
    }
}
