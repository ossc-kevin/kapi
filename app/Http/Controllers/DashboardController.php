<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class DashboardController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $events = [];

        $events[] = \Calendar::event(
                        'Event One', //event title
                        false, //full day event?
                        '2016-05-26', //start time (you can also use Carbon instead of DateTime)
                        '2016-05-26', //end time (you can also use Carbon instead of DateTime)
                        0 //optionally, you can specify an event ID
        );
        

        $events[] = \Calendar::event(
                        "Valentine's Day", //event title
                        true, //full day event?
                        new \DateTime('2016-05-24'), //start time (you can also use Carbon instead of DateTime)
                        new \DateTime('2016-05-24'), //end time (you can also use Carbon instead of DateTime)
                        'stringEventId' //optionally, you can specify an event ID
        );
        

        //$eloquentEvent = EventModel::first(); //EventModel implements MaddHatter\LaravelFullcalendar\Event
//echo "<pre>";print_r($events);exit;
        $calendar = \Calendar::addEvents($events) //add an array with addEvents
//                        ->addEvent($eloquentEvent, [ //set custom color fo this event
//                            'color' => '#800',
//                        ])
                ->setOptions([ //set fullcalendar options
                    'firstDay' => 1
                ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
            'viewRender' => 'function() {/*alert("Callbacks!");*/}'
        ]);

        return view('dash', compact('calendar'));
    }

}
