<?php

namespace App\Http\Livewire\Chat\Admin;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class AdminChatList extends Component
{
    public $conversations;
    public $auth_id;
    public $receiverInstance;
    public $name;
    public $selectedconversation;
    protected $listeners = ['chatuserselected', 'refresh' => '$refresh'];
    public function chatuserselected(Conversation $conversation, $receiversid)
    {

        $this->selectedconversation = $conversation;
        $receiverinstance = User::findOrFail($receiversid);

        $this->emitTo('chat.admin.admin-chat-box', 'loadconversation', $this->selectedconversation, $receiverinstance);
    }
    public function getuserinstance(Conversation $conversation, $request)
    {
        $this->auth_id = auth()->id();

        if ($conversation->sender_id == $this->auth_id) {
            $this->receiverinstance = User::firstWhere('id', $conversation->receiver_id);
            # code...
        } else {
            $this->receiverinstance = User::firstWhere('id', $conversation->sender_id);
        }

        if (isset($request)) {

            return $this->receiverinstance->$request;
            # code...
        }
    }
    public function mount()
    {
        $this->auth_id = auth()->id();
        $this->conversations = Conversation::where('sender_id', $this->auth_id)->orWhere('receiver_id', $this->auth_id)->orderBy('last_time_message', 'DESC')->get();
    }
    public function render()
    {

        $users  = User::all();
        return view('livewire.chat.admin.admin-chat-list', compact('users'));
    }
    public function checkconversation($receiverid)
    {

        $checkconversation = Conversation::where('receiver_id', auth()->user()->id)->where('sender_id', $receiverid)->orWhere('receiver_id', $receiverid)->where('sender_id', auth()->user()->id)->get();

        if ($checkconversation->count() == 0) {
            $newconversation = new Conversation;
            $newconversation->sender_id = auth()->user()->id;
            $newconversation->receiver_id = $receiverid;
            $newconversation->last_time_message = Carbon::now();
            $newconversation->save();

            $newmessage = new Message();
            $newmessage->conversation_id = $newconversation->id;
            $newmessage->sender_id = auth()->user()->id;
            $newmessage->receiver_id = $receiverid;
            $newmessage->message = 'Hi, I am ' . auth()->user()->name . '. Welcome to our chat system.';
            $newmessage->save();
            $this->emitSelf('refresh');
        } else {
            return null;
        }
    }

}
