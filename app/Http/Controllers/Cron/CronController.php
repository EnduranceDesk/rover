<?php

namespace App\Http\Controllers\Cron;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Classes\Endeavour\Endeavour;


class CronController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->session()->get(Auth::user()->username);
        $endeavour = new Endeavour($token);
        $cronStatusResponse = $endeavour->getCronStatus();
        if (!$cronStatusResponse->success) {
            return redirect()->back()->withError("Cannot fetch the current cron status: " . $domainResponse->message);
        }
        $status = $cronStatusResponse->data->status;
        return view("cron.index", ['cronAllowed' => $status]);
    }
    public function postTurnOn(Request $request)
    {
        $token = $request->session()->get(Auth::user()->username);
        $endeavour = new Endeavour($token);
        $cronStatusChangeResponse = $endeavour->turnCronOn();
        if (!$cronStatusChangeResponse->success) {
            return redirect()->back()->withError("Cannot change the current cron status: " . $cronStatusChangeResponse->message);
        }
        return redirect(route("cron.index"))->withSuccess("Cron successfully turned on.");
    }
    public function postTurnOff(Request $request)
    {
        $token = $request->session()->get(Auth::user()->username);
        $endeavour = new Endeavour($token);
        $cronStatusChangeResponse = $endeavour->turnCronOff();
        if (!$cronStatusChangeResponse->success) {
            return redirect()->back()->withError("Cannot change the current cron status: " . $cronStatusChangeResponse->message);
        }
        return redirect(route("cron.index"))->withSuccess("Cron successfully turned off.");
    }
}
