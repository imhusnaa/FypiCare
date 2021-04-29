<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Communicationmessage;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        // count how many message are unread from the selected user
        $users = DB::select("select users.id, users.name, users.image, users.email, count(is_viewed) as unread 
        from users LEFT  JOIN  communicationmessages ON users.id = communicationmessages.sender and is_viewed = 0 and communicationmessages.receiver = " . Auth::id() . "
        where users.id != " . Auth::id() . " 
        group by users.id, users.name, users.image, users.email");
    
        return view('Chat.message', ['users' => $users]);
    }
    public function receivemessage($user_id)
    {
      $authuser_id = Auth::id();

        // Make read all unread message
        Communicationmessage::where(['sender' => $user_id, 'receiver' => $authuser_id])->update(['is_viewed' => 1]);

        // Get all message from selected user
        
        $communicationmessages = Communicationmessage::where(function ($query) use ($user_id, $authuser_id) {
            $query->where('sender', $user_id)->where('receiver', $authuser_id);
        })->oRwhere(function ($query) use ($user_id, $authuser_id) {
            $query->where('sender', $authuser_id)->where('receiver', $user_id);
        })->get();

        return view('communicationmessages.index', ['communicationmessages' => $communicationmessages]);
    }

    public function sendmessage(Request $request)
    {

      $sender = Auth::id();
      $receiver = $request->rec_id;

      $communicationmessage = $request->communicationmessage;

      $data = new Communicationmessage();
      $data->sender = $sender;
      $data->receiver = $receiver;
      $data->communicationmessage = $communicationmessage;
      $data->is_viewed = 0;
      $data->save();

      // pusher
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['sender' => $sender, 'receiver' => $receiver]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);
    }
}
