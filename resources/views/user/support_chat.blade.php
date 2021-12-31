<x-app-layout title="Support Chat">
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
                            <div class="msg justify-content-center">
                                <div class="font-weight-semibold font-size-12"> 7:57PM </div>
                            </div>
                            <div class="msg msg-recipient">
                                <div class="m-r-10">
                                    <div class="avatar avatar-image">
                                        <img src="{{ asset('images/others/loading.gif') }}" alt="">
                                    </div>
                                </div>
                                <div class="bubble">
                                    <div class="bubble-wrapper">
                                        <span>Hey, let me show you something nice!</span>
                                    </div>
                                </div>
                            </div>
                            <div class="msg msg-sent">
                                <div class="bubble">
                                    <div class="bubble-wrapper">
                                        <span>Oh! What is it?</span>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="conversation-footer">
                            <input class="chat-input" type="text" placeholder="Type a message...">
                            <ul class="list-inline d-flex align-items-center m-b-0">    
                                <li class="list-inline-item">
                                    <button class="d-none d-md-block btn btn-primary">
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
</x-app-layout>