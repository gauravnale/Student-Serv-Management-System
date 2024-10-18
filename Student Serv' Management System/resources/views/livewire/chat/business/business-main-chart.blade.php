<div>
    <div class="content-area-wrapper container-xxl p-0">
        @livewire('chat.business.business-chat-list')
        <div class="content-right">
            @livewire('chat.business.business-chat-box')
        </div>
    </div>
    <script src="{{ asset('app-assets/js/scripts/pages/app-chat.js') }}"></script>
</div>
<script>
    window.addEventListener('chatselected', event => {
        $('.user-chats').scrollTop($('.user-chats')[0].scrollHeight);

        let height = $('.user-chats')[0].scrollHeight;

        window.livewire.emit('updateHeight', {
            height: height,
        })
    });
</script>
