<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rinvex\Countries\Repositories\CountryRepository;


class TesController extends Controller
{
    public function index() {
        $us = country('us');

        echo $us->getIsoAlpha3();
    }
}
