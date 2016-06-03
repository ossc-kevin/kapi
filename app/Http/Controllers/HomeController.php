<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Jobs\SendReminderEmail;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$user = collect(['id'=>1,'email'=>'kevin@ossquad.com']);
	$job = (new SendReminderEmail($user))->onQueue('email')->delay(60 * 1);
	$this->dispatch($job);
	return view('home');
    }
}
