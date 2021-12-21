<?php
/**
 * Astashenkov
 */

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\PingJob;
use App\Models\Message;

class InfoController extends Controller
{

    /**
     * Show the form to create a new message.
     *
     * @return \Illuminate\View\View
     */
    public function input()
    {
        return view('info.input');
    }

    /**
     * Store a new input form.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'message' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
            ]);
            $input = $request->all();
            if (!empty($input['title']) 
                && !empty($input['message'])
                && !empty($input['email'])
            ) {
                PingJob::dispatch($input);
                return redirect()->route('output');
            }
        }

        return back()->withInput();
    }

    /**
     * Display the info.output view.
     *
     * @return \Illuminate\View\View
     */
    public function output()
    {
        $messages = Message::all();

        return view('info.output', compact('messages'));
    }
}
