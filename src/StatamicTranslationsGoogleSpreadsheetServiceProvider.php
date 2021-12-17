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

    protected $modifiers = [
        'VladislavBogomolov\StatamicTranslationsGoogleSpreadsheet\StatamicRepoModifier'
    ];

    protected $commands = [
        'VladislavBogomolov\StatamicTranslationsGoogleSpreadsheet\StatamicRepoCommand'
    ];

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


                $router->get('/add', [StatamicTranslationsGoogleSpreadsheetController::class, 'create'])->name('create');
                $router->post('/add', [StatamicTranslationsGoogleSpreadsheetController::class, 'store'])->name('store');
                $router->post('/{index}/download', [StatamicTranslationsGoogleSpreadsheetController::class, 'download'])->name('download');

                $router->get('/{index}', [StatamicTranslationsGoogleSpreadsheetController::class, 'show'])->name('show');

                $router->put('/{index}', [StatamicTranslationsGoogleSpreadsheetController::class, 'update'])->name('update');
                $router->delete('/{index}', [StatamicTranslationsGoogleSpreadsheetController::class, 'delete'])->name('delete');
            })
            ->register();

        Statamic::afterInstalled(function ($command) {
            # (new StatamicTranslationsGoogleSpreadsheetController)->createConfigFile();
            // $command->call('some:command');
        });
    }
}
