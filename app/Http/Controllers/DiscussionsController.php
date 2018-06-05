<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Discussion;
use Session;
class DiscussionsController extends Controller
{
    public function create()
    {
    	return view('discuss');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'channel_id' => 'required',
    		'title' => 'required',
    		'content' => 'required'
    	]);

    	$discussion = Discussion::create([
    		'title' => $request->title,
    		'content' => $request->content,
    		'channel_id' => $request->channel_id,
    		'user_id' => Auth::id(),
    		'slug' => str_slug($request->title)
    	]);

    	Session::flash('success', 'Dicussion created successfully!');

    	return redirect()->route('discussion', ['slug' => $discussion->slug]);
    }

    public function show($slug)
    {
    	return view('discussions.show')->with('discussion', Discussion::where('slug', $slug)->first());
    }
}
