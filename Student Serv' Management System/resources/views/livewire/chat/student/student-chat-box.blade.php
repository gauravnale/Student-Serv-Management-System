<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <div class="body-content-overlay" id="body-content-overlay"></div>
        <!-- Main chat area -->
        <section class="chat-app-window">
            @if (!$selectedconversation)
                <!-- To load Conversation -->
                <div class="start-chat-area">
                    <div class="mb-1 start-chat-icon">
                        <i data-feather="message-square"></i>
                    </div>
                    <h4 class="sidebar-toggle start-chat-text">No conversation Selected its empty</h4>
                </div>
                <!--/ To load Conversation -->
            @endif
            <!-- To load Conversation -->
            <div class="start-chat-area d-none">
                <div class="mb-1 start-chat-icon">
                    <i data-feather="message-square"></i>
                </div>
                <h4 class="sidebar-toggle start-chat-text">Start Conversations now</h4>
            </div>
            <!--/ To load Conversation -->

            @if ($selectedconversation)
                <!-- Active Chat -->
                <div class="active-chat active">
                    <!-- Chat Header -->
                    <div class="chat-navbar">
                        <header class="chat-header">
                            <div class="d-flex align-items-center">
                                <div class="sdebar-toggle d-block d-lg-none me-1" id="sidebar-toggle-check">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-menu ficon">
                                        <line x1="3" y1="12" x2="21" y2="12">
                                        </line>
                                        <line x1="3" y1="6" x2="21" y2="6">
                                        </line>
                                        <line x1="3" y1="18" x2="21" y2="18">
                                        </line>
                                    </svg>
                                </div>
                                <div class="avatar avatar-border user-profile-toggle m-0 me-1">
                                    @if ($receiverinstance->avatar == null)
                                        <img src="https://ui-avatars.com/api/?name={{ $receiverinstance->name }}"
                                            alt="avatar" height="36" width="36" />
                                        <span class="avatar-status-online"></span>
                                    @else
                                        <img src="{{ asset('storage/avatars/' . $receiverinstance->avatar) }}"
                                            alt="avatar" height="36" width="36" />
                                        <span class="avatar-status-online"></span>
                                    @endif

                                </div>
                                <h6 class="mb-0">{{ $receiverinstance->name }}</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <i data-feather="phone-call"
                                    class="cursor-pointer d-sm-block d-none font-medium-2 me-1"></i>
                                <i data-feather="video" class="cursor-pointer d-sm-block d-none font-medium-2 me-1"></i>
                                <i data-feather="search" class="cursor-pointer d-sm-block d-none font-medium-2"></i>
                                <div class="dropdown">
                                    <button class="btn-icon btn btn-transparent hide-arrow btn-sm dropdown-toggle"
                                        type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i data-feather="more-vertical" id="chat-header-actions"
                                            class="font-medium-2"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="chat-header-actions">
                                        <a class="dropdown-item" href="#">View Contact</a>
                                        <a class="dropdown-item" href="#">Mute Notifications</a>
                                        <a class="dropdown-item" href="#">Block Contact</a>
                                        <a class="dropdown-item" href="#">Clear Chat</a>
                                        <a class="dropdown-item" href="#">Report</a>
                                    </div>
                                </div>
                            </div>
                        </header>
                    </div>
                    <!--/ Chat Header -->
                    <!-- User Chat messages -->
                    <div class="user-chats" style="overflow: scroll !important;">
                        <div class="chats">

                            @forelse ($messages as $message)
                                <div class="chat {{ auth()->id() == $message->sender_id ? '' : 'chat-left' }}">
                                    <div class="chat-avatar">
                                        <span class="avatar box-shadow-1 cursor-pointer">
                                            <img src="https://ui-avatars.com/api/?name=Online Writing" alt="avatar"
                                                height="36" width="36" />
                                        </span>
                                    </div>
                                    <div class="chat-body">

                                        <div class="chat-content">
                                            <p>{{ $message->message }}</p>
                                            <br>
                                            <p>{{ $message->created_at->format('D, d M y, h:i:s a') }}

                                                @php

                                                    if ($message->user->id === auth()->id()) {
                                                        if ($message->is_read == 0) {
                                                            echo '<span class="text-default">√√</span> ';
                                                        } else {
                                                            echo ' <span class="text-success">√√</span> ';
                                                        }
                                                    }

                                                @endphp
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    $('.user-chats').scroll(function() {
                                        var top = $('.user-chats').scrollTop();
                                        if (top == 0) {
                                            window.livewire.emit('loadMoreMessages');
                                        }
                                    });
                                </script>


                                <script>
                                    window.addEventListener('updatedHeight', event => {
                                        let old = event.detail.height;
                                        let newHeight = $('.user-chats')[0].scrollHeight;
                                        let height = $('.user-chats').scrollTop(newHeight - old);
                                        window.livewire.emit('updateHeight', {
                                            height: height,
                                        });
                                    });
                                </script>
                                <script>
                                    const button = document.getElementById('sidebar-toggle-check');
                                    const chatoverlay = document.getElementById('body-content-overlay');
                                </script>
                            @empty
                                <div class="divider">
                                    <div class="divider-text">No Messages in this conversation</div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <!-- User Chat messages -->


                    @livewire('chat.student.student-create-chat')
                </div>
                <!--/ Active Chat -->
            @endif
        </section>
        <!--/ Main chat area -->



    </div>
    <script>
        window.addEventListener('rowChatToBottom', event => {
            //
            $('.user-chats').scrollTop($('.user-chats')[0].scrollHeight);
        });
    </script>


</div>
