<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\PusherBroadcast;

class PusherController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('freelancer.message.index');
    }

    /**
     * @param Request $request
     *
     * @return Application|Factory|View
     */
    public function broadcast(Request $request)
    {
        $message = $request->get('message') ?? 'You wrote a blank message';

        broadcast(new PusherBroadcast($message))->toOthers();

        return view('freelancer.message.recieve', [
            'timestamp' => date('H:i'),
            'message'   => $message,
        ]);
    }

    /**
     * @param Request $request
     *
     * @return Application|Factory|View
     */
    public function message(Request $request)
    {
        return view('freelancer.message.broadcast', [
            'timestamp' => date('H:i'),
            'message'   => $request->get('message'),
        ]);
    }
}
