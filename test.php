<?php

require __DIR__.'/vendor/autoload.php';

use App\Models\Oeuvre;

$oeuvres = Oeuvre::all();
dd($oeuvres);
