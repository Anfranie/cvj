<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\http\Request;

use Calendar;
use DB;

class AddEventController extends Controller
{
	public function index()
	{
		$events = Event::all();
		return view('events.index')->with('events', $events);
	}

	public function create()
	{
		return view('create');
    }
    
    public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
		]);
		
		$event= new Event;
		$event->title = $request->input('title');
		$event->start_date = $request->input('startdate');
		$event->end_date = $request->input('enddate');
		$event->save();
		
        
        $events = [];

       	$data = Event::all();

       	if($data->count()){

        	foreach ($data as $key => $value) {

            $events[] = Calendar::event(

                $value->title,

                true,

                new \DateTime($value->start_date),

                new \DateTime($value->end_date.' +1 day')

            );

          	}

       	}

      	$calendar = Calendar::addEvents($events); 

      return view('mycalender', compact('calendar'));
	}

	public function show($id)
	{
		$post = Posts::find($id);
		return view('posts.show')->with('post', $post);
	}

	public function edit()
	{
		
	}


}