<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\Event;
use App\AuctionItem;

class AdminController extends Controller
{
    public function logs()
    {
        $logs = Log::with('user')->orderBy('created_at')->paginate(15);
        return view('tables.logs', compact('logs'));
    }

    public function log_show($id)
    {
        $log = Log::with('user')->findOrFail($id);
        return view('tables.log_show', compact('log'));
    }

    public function finished_events()
    {
        $events = Event::where('ends_at', '<', date("Y-m-d H:i:s", time()))
            ->orderBy('ends_at', 'DESC')
            ->with('auctionItems', 'auctionItems.bids')
            ->get();
        return view('tables.finished_events', compact('events'));
    }

    public function finished_event_info($id)
    {
        $event = Event::with('auctionItems', 'auctionItems.user')->findOrFail($id);

        
        return view('tables.finished_event_info', compact('event'));
    }

    public function confirm_payment($id)
    {
        $auction = AuctionItem::findOrFail($id);
        $auction->payed = true;
        $auction->save();

        $event_id = $auction->event->id;

        return redirect('/finished/events/'.$event_id)->with('success', 'Payment confirmed!');
    }
}
