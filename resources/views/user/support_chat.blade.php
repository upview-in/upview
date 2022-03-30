@section('custom-css')
    <link rel="stylesheet" href="{{ asset('support/css/styles.css') }}">
@endsection

@section('custom-scripts')
    <script>
        $(document).ready(function() {

            var last_message_id = null, user_list_hash = "xxxxxxxxxxxxxxxx", activeChatUserID, activeChatUserName, activeChatUserEmail, chatBoxHeightBak, chatBoxWidthBak, chatBoxHeadBorderRadiusBak, chatBoxBorderRadiusBak, chatBoxTopBak, chatBoxBottomBak, chatBoxLeftBak, chatBoxRightBak;
            var dateOptions = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            var timeOptions = {
                timeStyle: 'short'
            };
            var toggleStatus = false;
            var message_date = new Date(1970).toLocaleDateString("en-US", dateOptions);
            var maleProfile = "{{ asset('support/images/circled-user-male-skin-type.png') }}";
            var femaleProfile = "{{ asset('support/images/circled-user-female-skin-type.png') }}";
            var doubleTicks = "{{ asset('support/images/double-tick.svg') }}";

            $(".support-chat").css('visibility', 'hidden');

            $("#SendMessage").click(function() {
                $("#supportChatTypingUser").remove();
                let message = $("#messageInputBox").val();
                $.ajax({
                    url: '{{ route("support.chat.sendMessage") }}',
                    type: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        message: message,
                        sendTo: activeChatUserID,
                    },
                    dataType: 'json',
                    success: function() {
                        $("#messageInputBox").val("");
                        loadMessages();
                        $("#messageInputBox").focus();
                    }
                });
            });

            $("#messageInputBox").keypress(function() {
                if ($("#supportChatTypingUser").length < 1) {
                    let typingHtml = '<div class="msg msg-sent" id="supportChatTypingUser">' +
                        '    <div class="bubble">' +
                        '        <div class="text-muted bubble-wrapper" style="padding: 10px 25px;">' +
                        '            <div class="dot-flashing"></div>' +
                        '        </div>' +
                        '    </div>' +
                        '</div>';

                    $(".conversation-body").append(typingHtml);
                    $(".conversation-body").scrollTop($(".conversation-body")[0].scrollHeight);
                }
            });

            $("#messageInputBox").keyup(function() {
                setTimeout(function() {
                    $("#supportChatTypingUser").remove();
                }, 3000);
            });

            $(document).on('click', ".userListItem", function() {
                $(".support-chat").css('visibility', 'visible');
                $(".conversation-body").html(`<div class="spinner-border text-success vertical-center horizontal-center" role="status" id="chatLoading"><span class="sr-only">Loading...</span></div>`);

                activeChatUserID = $(this).data('id');
                activeChatUserName = $(this).data('name');
                activeChatUserEmail = $(this).data('email');
                activeChatUserProfile = $(this).data('profile');

                $("#activeChatUserName").html(activeChatUserName);
                $("#activeChatUserEmail").html(activeChatUserEmail);
                $("#activeChatUserProfile").attr('src', activeChatUserProfile);
                last_message_id = null;
                loadMessages();
            });

            function loadMessages() {
                $.ajax({
                    url: '{{ route("support.chat.messages") }}',
                    type: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        last_message_id: last_message_id,
                        userID: activeChatUserID,
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.length > 0) {
                            last_message_id = data[data.length - 1]._id;
                            data.forEach(message => {
                                if (message.created_at != null) {
                                    let date = new Date(message.created_at).toLocaleDateString("en-US", dateOptions);
                                    if (date != message_date) {
                                        message_date = date;
                                        if (date == new Date().toLocaleDateString("en-US", dateOptions)) {
                                            pushDate("Today");
                                        } else {
                                            pushDate(date);
                                        }
                                    }
                                }

                                if (message.is_sended_by_user != null && message.is_sended_by_user) {
                                    pushUserMessage(message);
                                } else {
                                    pushSystemMessage(message);
                                }

                                $(".conversation-body").scrollTop($(".conversation-body")[0].scrollHeight);
                            });
                        }
                        $("#chatLoading").remove();
                    }
                });
            }

            setInterval(() => {
                if ($("#searchUser").val().length < 1) {
                    loadUsers();
                }
                if (activeChatUserID != null) {
                    loadMessages();
                    updateSeenStatus();
                }
            }, 3000);

            function pushSystemMessage(message) {
                let isSeen = '';
                if (message.seen_by_user != null) {
                    isSeen = '<img src="' + doubleTicks + '" width="16" height="16">';
                }
                let userMessage = '<div class="d-flex flex-row p-3 justify-content-end supportChatUserMessage" data-message-id="' + message._id + '" data-message-seen-status=' + ((isSeen != "") ? true : false) + '>' +
                    '   <div class="d-flex flex-column">' +
                    '       <div class="bg-white p-2 ps-3 pe-3">' +
                    '           <span class="text-muted">' +
                    '           ' + encodeMessage(message.message) +
                    '           </span>' +
                    '       </div>' +
                    '       <div class="pe-2 text-end">' +
                    '           <span class="text-muted text-opacity-25" style="font-size: 12px;">' + new Date(message.created_at).toLocaleTimeString('en-US', timeOptions) + '</span>' +
                    '           <span class="seenStatus ms-1">' + isSeen + '</span>' +
                    '       </div>' +
                    '   </div>' +
                    '   <img src="' + femaleProfile + '" width="40" height="40">' +
                    '</div>';

                $(".conversation-body").append(userMessage);
            }

            function pushUserMessage(message) {
                let sysMessage = '<div class="d-flex flex-row p-3 supportChatSysMessage" data-message-id="' + message._id + '">' +
                    '   <img src="' + maleProfile + '" width="40" height="40">' +
                    '   <div class="d-flex flex-column">' +
                    '       <div class="chat p-2 ps-3 pe-3">' +
                    '       ' + encodeMessage(message.message) +
                    '       </div>' +
                    '       <div class="ps-2 text-start">' +
                    '           <span class="text-muted text-opacity-25" style="font-size: 12px;">' + new Date(message.created_at).toLocaleTimeString('en-US', timeOptions) + '</span>' +
                    '       </div>' +
                    '   </div>' +
                    '</div>';

                $(".conversation-body").append(sysMessage);
            }

            function pushDate(text) {
                var dateMessage = '<div class="d-flex flex-row p-3">' +
                    '    <div class="strike">' +
                    '        <span>' + text + '</span>' +
                    '    </div>' +
                    '</div>';
                $(".conversation-body").append(dateMessage);
            }

            function updateSeenStatus() {
                let _ids = [];
                let elements = $(".conversation-body").find('[data-message-seen-status=false]');
                elements.each(function(key, element) {
                    _ids.push($(element).data('message-id'));
                });

                if (_ids.length > 0) {
                    $.ajax({
                        url: '{{ route("support.chat.seenStatus") }}',
                        type: 'post',
                        data: {
                            _token: "{{ csrf_token() }}",
                            ids: _ids,
                            userID: activeChatUserID
                        },
                        dataType: 'json',
                        success: function(data) {
                            data.forEach(message => {
                                if (message.seen_by_user != null) {
                                    let ele = $(".conversation-body").find('[data-message-id="' + message._id + '"]')[0];
                                    $(ele).find('.seenStatus').html('<img src="' + doubleTicks + '" width="16" height="16">');
                                }
                            });
                        }
                    });
                }
            }

            function encodeMessage(message) {
                return message.replace(/[\u00A0-\u9999<>\&]/g, function(i) {
                    return '&#' + i.charCodeAt(0) + ';';
                });
            }
        });
    </script>
@endsection

<x-app.app-layout title="Support Chat">
    <div class="container-fluid">
        <div class="chat chat-app row">
            <div class="chat-content"  style="width:100% !important">
                <div class="conversation">
                    <div class="conversation-wrapper">
                        <div class="conversation-header justify-content-between">
                            <div class="media align-items-center">
                                <a href="javascript:void(0);" class="chat-close m-r-20 d-md-none d-block text-dark font-size-18 m-t-5" >
                                    <em class="anticon anticon-left-circle"></em>
                                </a>
                                <div class="avatar avatar-image">
                                    <img src="{{ asset('images/others/loading.gif') }}" alt="">
                                </div>
                                <div class="p-l-15">
                                    <h6 class="m-b-0">Prince Suman</h6>
                                    <p class="m-b-0 text-muted font-size-13 m-b-0">
                                        <span class="badge badge-success badge-dot m-r-5"></span>
                                        <span>Online</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="conversation-body">
                            <!-- chat starts here -->
                        </div>
                        <div class="conversation-footer">
                            <input class="chat-input" id="messageInputBox" style="max-width: 90%;" name="messageInputBox" type="text" placeholder="Type a message...">
                            <ul class="list-inline d-flex align-items-center m-b-0">
                                <li class="list-inline-item">
                                    <button class="d-none d-md-block btn btn-primary" id="SendMessage">
                                        <span class="m-r-10">Send</span>
                                        <em class="far fa-paper-plane"></em>
                                    </button>
                                    <a href="javascript:void(0);" class="text-gray font-size-20 d-md-none d-block">
                                        <em class="far fa-paper-plane"></em>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app.app-layout>