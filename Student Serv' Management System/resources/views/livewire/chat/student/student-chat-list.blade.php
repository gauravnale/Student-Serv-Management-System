<div>
    <div class="sidebar-left">
        <div class="sidebar">
            @livewire('chat.student.student-chat-side-profile')

            <!-- Chat Sidebar area -->
            <div class="sidebar-content">
                <span class="sidebar-close-icon">
                    <i data-feather="x"></i>
                </span>
                <!-- Sidebar header start -->
                <div class="chat-fixed-search">
                    <div class="d-flex align-items-center w-100">
                        <div class="sidebar-profile-toggle">
                            <div class="avatar avatar-border">
                                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="user_avatar"
                                    height="42" width="42" />
                                <span class="avatar-status-online"></span>
                            </div>
                        </div>
                        <div class="input-group input-group-merge ms-1 w-100">
                            <span class="input-group-text round"><i data-feather="search" class="text-muted"></i></span>
                            <input type="text" class="form-control round" id="chat-search"
                                placeholder="Search or start a new chat" aria-label="Search..."
                                aria-describedby="chat-search" />
                        </div>
                    </div>
                </div>
                <!-- Sidebar header end -->

                <!-- Sidebar Users start -->
                <div id="users-list" class="chat-user-list-wrapper list-group">
                    <h4 class="chat-list-title">Chats</h4>
                    <ul class="chat-users-list chat-list media-list">
                        @forelse ($conversations as $conversation)
                            <li wire:key='{{ $conversation->id }}'
                                wire:click="$emit('chatuserselected', {{ $conversation }},{{ $this->getuserinstance($conversation, $name = 'id') }})">
                                @if ($conversation->avatar == null)
                                    <span class="avatar"><img
                                            src="https://ui-avatars.com/api/?name={{ $this->getuserinstance($conversation, $name = 'name') }}"
                                            height="42" width="42" alt="Generic placeholder image" />
                                        <span class="avatar-status-offline"></span>
                                    </span>
                                @else
                                    <span class="avatar"><img
                                            src="{{ asset('storage/avatars/' . $conversation->consender->avatar) }}"
                                            height="42" width="42" alt="User Picture" />
                                    </span>
                                @endif
                                <div class="chat-info flex-grow-1">
                                    <h5 class="mb-0">{{ $this->getuserinstance($conversation, $name = 'name') }}</h5>
                                    <p class="card-text text-truncate">
                                        {{ $conversation->messages->last()->message }}
                                    </p>
                                </div>
                                <div class="chat-meta text-nowrap">
                                    <small class="float-end mb-25 chat-time w-75"
                                        style="padding-left:10px;">{{ $conversation->messages->last()?->created_at->shortAbsoluteDiffForHumans() }}</small>

                                        @php
                                        if(count($conversation->messages->where('is_read',0)->where('receiver_id',Auth()->user()->id))){

                                     echo ' <span class="badge bg-danger rounded-pill float-end"> '
                                         . count($conversation->messages->where('is_read',0)->where('receiver_id',Auth()->user()->id)) .'</span> ';

                                        }

                                    @endphp
                                    {{-- <span class="badge bg-danger rounded-pill float-end">3</span> --}}
                                </div>
                            </li>
                        @empty
                            <li class="no-results">
                                <h6 class="mb-0">No Chats Found</h6>
                            </li>
                        @endforelse



                    </ul>
                    <h4 class="chat-list-title">Contacts</h4>
                    <ul class="chat-users-list contact-list media-list">
                        @forelse ($users as $userchat)
                            <li wire:click="checkconversation({{ $userchat->id }})">
                                @if ($userchat->avatar == null)
                                    <span class="avatar"><img
                                            src="https://ui-avatars.com/api/?name={{ $userchat->name }}" height="42"
                                            width="42" alt="Generic placeholder image" />
                                        <span class="avatar-status-offline"></span>
                                    </span>
                                @else
                                    <span class="avatar"><img src="{{ asset('storage/avatars/' . $userchat->avatar) }}"
                                            height="42" width="42" alt="User Picture" />
                                    </span>
                                @endif
                                <div class="chat-info">
                                    <h5 class="mb-0">{{ $userchat->name }}</h5>
                                    <p class="card-text text-truncate">
                                        Macaroon candy canes apple pie soufflé lemon drops chocolate cake chocolate
                                        sweet roll.
                                    </p>
                                </div>
                            </li>
                        @empty
                            <li class="no-results">
                                <h6 class="mb-0">No Contacts Found</h6>
                            </li>
                        @endforelse


                    </ul>
                </div>
                <!-- Sidebar Users end -->
            </div>
            <!--/ Chat Sidebar area -->

        </div>
    </div>
</div>
