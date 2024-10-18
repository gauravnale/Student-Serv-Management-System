<?php

namespace App\Http\Livewire\Chat\Student;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class StudentCreateChat extends Component
{
    public $selectedconversation;
    public $receiverinstance;
    public $compose_message;
    public $newmessage;
    protected $listeners = ['loadmessagereceiver',];
    function loadmessagereceiver(Conversation $conversation, User $receiver)
    {
        $this->selectedconversation = $conversation;
        $this->receiverinstance = $receiver;
    }

    public function render()
    {
        return view('livewire.chat.student.student-create-chat');
    }
    public function addconversation()
    {
        if ($this->compose_message == null) {
            return null;
        } else {
            $newmessage = new Message;
            $newmessage->message = $this->compose_message;
            $newmessage->sender_id = auth()->user()->id;
            $newmessage->receiver_id = $this->receiverinstance->id;
            $newmessage->conversation_id = $this->selectedconversation->id;
            $newmessage->type = "text";
            $newmessage->save();

            $this->selectedconversation->last_time_message = $newmessage->created_at;
            $this->selectedconversation->save();
            $this->compose_message = null;

            $this->emitTo('chat.student.student-chat-box', 'pushmessages', $newmessage->id);
            $this->emitTo('chat.student.student-chat-list', 'refresh');
            broadcast(new MessageSent(auth()->user(),  $this->selectedconversation, $newmessage,$this->receiverinstance));
        }
    }

}
