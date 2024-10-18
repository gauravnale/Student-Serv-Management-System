<div>

    <form method="post" wire:submit.prevent="addconversation" autocomplete="off" class="chat-app-form"
        enctype="multipart/form-data">
        @csrf


        <div class="input-group input-group-merge me-1 form-send-message">
            <input type="text" class="form-control message" placeholder="Type your message here"
                wire:model="compose_message" />

            <span class="input-group-text">

        </div>
        <button type="submit" class="btn btn-primary send">
            <span class="d-lg-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-send d-lg-none">
                    <line x1="22" y1="2" x2="11" y2="13"></line>
                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                </svg>
            </span>
            {{--  --}}
            <span class="d-none d-lg-block">Send</span>
        </button>
    </form>
</div>
