<?php

namespace App\Http\Livewire\Chat\Business;

use App\Events\MessageRead;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class BusinessChatBox extends Component
{
    public $selectedconversation;
    public $receiverinstance;
    public $paginatevar = 10;
    public $messages;
    public $messagecount;
    public $message_receiver;
    public $message_body;
    public $messagereceiver;
    public $height;

    // protected $listeners = ['loadconversation', 'pushmessages', 'loadMoreMessages', 'updateHeight'];
    // public function broadcastAs()
    // {
    //     return 'MessageSent';
    // }
    public function  getListeners()
    {
        $auth_id = auth()->user()->id;
        return [
            "echo-private:chat.{$auth_id},MessageSent" => 'broadcastedMessageReceived',
            "echo-private:chat.{$auth_id},MessageRead" => 'broadcastedMessageRead',
            'loadconversation', 'pushmessages', 'loadMoreMessages', 'updateHeight', 'broadcastMessageRead'
        ];
    }


    public function broadcastedMessageRead($event)
    {



        if ($this->selectedconversation) {



            if ((int) $this->selectedconversation->id === (int) $event['conversation_id']) {

                // dd("opened this chat");
                // $this->dispatchBrowserEvent('markMessageAsRead');
                // dd($event);
                $messages = Message::where('conversation_id', $event['conversation_id'])->where('receiver_id', $event['receiver_id'])->where('sender_id', auth()->id())->get();
                foreach ($messages as $message) {
                    $message->is_read = 1;
                    $message->save();
                }
            }
        }

        # code...
    }
    function broadcastedMessageReceived($event)
    {


        $this->emitTo('chat.business.business-chat-list', 'refresh');
        // code...

        $broadcastedMessage = Message::find($event['message']);


        // check if any selected conversation is set
        if ($this->selectedconversation) {
            // check if Auth/current selected conversation is same as broadcasted selecetedConversationgfg
            if ((int) $this->selectedconversation->id  === (int)$event['conversation_id']) {
                //  if true  mark message as read
                $broadcastedMessage->is_read = 1;
                $broadcastedMessage->save();
                $this->pushmessages($broadcastedMessage->id);


                $this->emitSelf('broadcastMessageRead');
            }
        }
    }
    public function broadcastMessageRead()
    {

        broadcast(new MessageRead($this->selectedconversation->id, $this->receiverinstance->id));
        # code...
    }
    public function pushmessages($newmessage)
    {
        $newmessages = Message::find($newmessage);
        $this->messages->push($newmessages);
        $this->dispatchBrowserEvent('rowChatToBottom');
    }
    public function loadMoreMessages()
    {
        $this->paginatevar = $this->paginatevar + 10;
        $this->emitTo('chat.business.business-create-chat', 'loadmessagereceiver', $this->selectedconversation, $this->receiverinstance);
        $this->messagecount = Message::where('conversation_id', $this->selectedconversation->id)->count();
        $this->messages = Message::where('conversation_id', $this->selectedconversation->id)
            ->skip($this->messagecount - $this->paginatevar)
            ->take($this->paginatevar)
            ->get();

        $height = $this->height;
        $this->dispatchBrowserEvent('updatedHeight', ($height));
    }

    function updateHeight($height)
    {

        // dd($height);
        $this->height = $height;

        # code...
    }
    public function loadconversation(Conversation $conversation, User $receiver)
    {
        $this->selectedconversation = $conversation;
        $this->receiverinstance = $receiver;

        $this->emitTo('chat.business.business-create-chat', 'loadmessagereceiver', $this->selectedconversation, $this->receiverinstance);
        $this->messagecount = Message::where('conversation_id', $this->selectedconversation->id)->count();
        $this->messages = Message::where('conversation_id', $this->selectedconversation->id)
            ->skip($this->messagecount - $this->paginatevar)
            ->take($this->paginatevar)
            ->get();
        Message::where('conversation_id', $this->selectedconversation->id)
            ->where('receiver_id', auth()->user()->id)->update(['is_read' => 1]);
        $this->emitSelf('broadcastMessageRead');
        $this->dispatchBrowserEvent('chatselected');
    }
    public function addconversation()
    {
        $this->validate([
            'message_body' => 'required',
            'messagereceiver' => 'required',
        ]);
    }
    public function render()
    {
        return view('livewire.chat.business.business-chat-box');
    }
}
