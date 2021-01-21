<?php

namespace App\Http\Controllers\Domain;

use App\Classes\Endeavour\Endeavour;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DomainController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->session()->get(Auth::user()->username);
        $endeavour = new Endeavour($token);
        $domainResponse = $endeavour->getMyDomains();
        if (!$domainResponse->success) {
            return redirect()->back()->withError("Cannot fetch the domains. " . $domainResponse->message);
        }
        $domains = collect($domainResponse->data->domains);
        return view("domains.multiple", compact("domains"));
    }
    public function getUpdateSSL(Request $request, $domain)
    {
        return view("domains.ssl.update", compact("domain"));
    }
    public function postUpdateSSL(Request $request)
    {
        $ca = $request->input("ca_bundle");
        $key = $request->input("key");
        $cert = $request->input("crt");
        $domain = $request->input("domain");
        $chain = trim($key) .  PHP_EOL  . PHP_EOL  . trim($cert) . PHP_EOL . PHP_EOL . trim($ca);

        $token = $request->session()->get(Auth::user()->username);
        $endeavour = new Endeavour($token);
        $domainResponse = $endeavour->updateSSL($domain, $chain);
        if (!$domainResponse->success) {
            return redirect()->back()->withError("Cannot update SSL :" . $domainResponse->message);
        }
        return redirect(route("domain.index"))->withSuccess($domain . ": SSL successfully updated.");
    }
    public function autoSSL(Request $request, $domain)
    {
        if (!$domain) {
            return redirect(route("domain.ssl.update", ['domain' => $domain]))->withError("Cannot update SSL due to irregularities with the domain provided." );
        }
        $token = $request->session()->get(Auth::user()->username);
        $endeavour = new Endeavour($token);
        $domainResponse = $endeavour->getMyDomains();
        if (!$domainResponse->success) {
            return redirect()->back()->withError("Cannot fetch the domains. " . $domainResponse->message);
        }
        $domains = collect($domainResponse->data->domains);
        $check = $domains->where("name", $domain)->first();
        if (!$check) {
            return redirect(route("domain.ssl.update", ['domain' => $domain]))->withError("Cannot update SSL due to irregularities with the domain provided." );
        }
        $sslResponse = $endeavour->autoSSL($domain);
        if (is_null($sslResponse)) {
            return redirect(route("domain.ssl.update", ['domain' => $domain]))->withError("SSL not updated" );
        } 
        if ($sslResponse->success) {
            return redirect(route("domain.ssl.update", ['domain' => $domain]))->withSuccess("SSL updated" );
        }
        return redirect(route("domain.ssl.update", ['domain' => $domain]))->withError("SSL not updated" );
    }
}
