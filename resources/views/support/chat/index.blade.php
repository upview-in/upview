@section('custom-styles')
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

            $("#btnSendMessage").click(function() {
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
                    let typingHtml = '<div class="d-flex flex-row p-3 justify-content-end" id="supportChatTypingUser">' +
                        '    <div class="me-2 p-3 pe-4">' +
                        '        <span class="text-muted">' +
                        '            <div class="dot-flashing"></div>' +
                        '        </span>' +
                        '    </div>' +
                        '    <img src="' + femaleProfile + '" width="40" height="40">' +
                        '</div>';

                    $(".chat-body").append(typingHtml);
                    $(".chat-body").scrollTop($(".chat-body")[0].scrollHeight);
                }
            });

            $("#messageInputBox").keyup(function() {
                setTimeout(function() {
                    $("#supportChatTypingUser").remove();
                }, 3000);
            });

            $(document).on('click', ".userListItem", function() {
                $(".support-chat").css('visibility', 'visible');
                $(".chat-body").html(`<div class="spinner-border text-success vertical-center horizontal-center" role="status" id="chatLoading"><span class="sr-only">Loading...</span></div>`);

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

            $("#searchUser").keyup(function() {
                loadUsers($(this).val());
            });

            function loadUsers(query = null) {
                $.ajax({
                    url: '{{ route("support.chat.users") }}',
                    type: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        q: query,
                        hash: user_list_hash
                    },
                    dataType: 'json',
                    success: function(response) {
                        user_list_hash = response.hash;
                        let data = response.data;
                        if (data.length > 0) {
                            $(".chat-users-list").empty();
                            data.forEach(user => {
                                var itemTemplate = $("#userListItemTemplate").html();
                                itemTemplate = itemTemplate.replaceAll('$(id)', user._id);
                                itemTemplate = itemTemplate.replaceAll('$(name)', user.name);
                                itemTemplate = itemTemplate.replaceAll('$(email)', user.email);

                                if (user.profile != null) {
                                    itemTemplate = itemTemplate.replaceAll('$(profile)', user.profile.conversion_urls.md);
                                } else {
                                    itemTemplate = itemTemplate.replaceAll('$(profile)', maleProfile);
                                }

                                if (user.support_chat_unseen_count > 0) {
                                    itemTemplate = itemTemplate.replaceAll('${unseenCounter}', user.support_chat_unseen_count);
                                } else {
                                    itemTemplate = itemTemplate.replace('<div class="col d-flex flex-row justify-content-end"><div class="align-self-center"><span class="badge badge-success rounded-circle">${unseenCounter}</span></div></div>', '');
                                }

                                $(".chat-users-list").append(itemTemplate);
                            });
                        }
                    }
                });
            }

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

                                $(".chat-body").scrollTop($(".chat-body")[0].scrollHeight);
                            });
                        }
                        $("#chatLoading").remove();
                    }
                });
            }

            if ($("#searchUser").val().length < 1) {
                loadUsers();
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

                $(".chat-body").append(userMessage);
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

                $(".chat-body").append(sysMessage);
            }

            function pushDate(text) {
                var dateMessage = '<div class="d-flex flex-row p-3">' +
                    '    <div class="strike">' +
                    '        <span>' + text + '</span>' +
                    '    </div>' +
                    '</div>';
                $(".chat-body").append(dateMessage);
            }

            function updateSeenStatus() {
                let _ids = [];
                let elements = $(".chat-body").find('[data-message-seen-status=false]');
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
                                    let ele = $(".chat-body").find('[data-message-id="' + message._id + '"]')[0];
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

<x-support.app-layout>
    <div class="h-100" id="mainChat">
        <div class="row h-100">
            <div class="col-3 border-light border-end pe-0">
                <div class="row p-3">
                    <div class="col">
                        <input type="text" class="form-control" id="searchUser" placeholder="Search users" />
                    </div>
                </div>
                <div class="chat-users-list"></div>
            </div>
            <div class="col-9 ps-0 h-100">
                <div class="d-flex flex-column support-chat h-100">
                    <div class="d-flex flex-row p-3 text-white chat-head">
                        <img src="{{ asset('support/images/circled-user-male-skin-type.png') }}" class="rounded-circle" alt="" id="activeChatUserProfile" width="50px" height="auto">
                        <div class="d-flex flex-column ms-3">
                            <label id="activeChatUserName"></label>
                            <span style="font-size: 12px;" id="activeChatUserEmail"></span>
                        </div>
                    </div>
                    <div class="chat-body">
                    </div>
                    <div class="chat-foot">
                        <div class="d-flex flex-row m-2">
                            <textarea class="form-control" id="messageInputBox" rows="1" placeholder="Type your message"></textarea>
                            <button class="btn btn-success btn-lg rounded-circle" id="btnSendMessage"><em class="fas fa-paper-plane"></em></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <template id="userListItemTemplate">
        <div class="row p-3 pointer userListItem" data-id="$(id)" data-name="$(name)" data-email="$(email)" data-profile="$(profile)">
            <div class="col-auto d-flex align-content-center">
                <img class="rounded-circle" src="$(profile)" alt="Profile" width="60px" height="auto">
            </div>
            <div class="col-auto d-flex flex-column justify-content-center ps-0">
                <label>$(name)</label>
                <span class="text-muted" style="font-size: 14px;">$(email)</span>
            </div>
            <div class="col d-flex flex-row justify-content-end">
                <div class="align-self-center">
                    <span class="badge badge-success rounded-circle">${unseenCounter}</span>
                </div>
            </div>
        </div>
    </template>
</x-support.app-layout>