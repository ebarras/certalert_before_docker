<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class HelperController extends Controller
{
    public static function DaysFromNow ($date) {
        $now = Carbon::now();
        $expiration_date = Carbon::parse($date);
        //The 2nd param is to not return absoloute value and instead include the '-' sign.
        return $now->startOfDay()->diffInDays($expiration_date, false);
    }

    public static function ValidateCertInformation () {
    	
    }
}