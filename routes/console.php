<?php

//use App;
use App\Models\Generate;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('generate:requests', function () {
    $start = now();
    $this->comment('Processing');
    $res = app(Generate::class)->index();
    //$this->comment("\n");
    $this->comment("Response: $res");
    $time = $start->diffInSeconds(now());
    $this->comment("Processed in $time seconds");
});
