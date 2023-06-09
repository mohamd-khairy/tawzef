<style>
    .col-md-2,
    .col-md-10 {
        padding: 0;
    }

    .panel {
        margin-bottom: 0px;

    }

    .chat-window {
        bottom: 0;
        position: absolute;
        margin-left: 10px;
        right: 0;
    }

    .chat-window>div>.panel {
        border-radius: 5px 5px 0 0;
    }

    .icon_minim {
        padding: 2px 2px;
        color: #fff;
    }

    .msg_container_base {
        background: #e5e5e5;
        margin: 0;
        padding: 0 10px 10px;
        max-height: 300px;
        overflow-x: hidden;
    }

    .top-bar {
        background: #666;
        color: white;
        padding: 2px;
        position: relative;
        overflow: hidden;
    }

    .msg_receive {
        padding-left: 0;
        margin-left: 0;
    }

    .msg_sent {
        padding-bottom: 20px !important;
        margin-right: 0;
    }

    .messages {
        background: white;
        padding: 10px;
        border-radius: 2px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        max-width: 100%;
    }

    .messages>p {
        font-size: 13px;
        margin: 0 0 0.2rem 0;
        color: black;
    }

    .messages>time {
        font-size: 11px;
        color: #ccc;
    }

    .msg_container {
        padding: 10px;
        overflow: hidden;
        display: flex;
    }

    img {
        display: block;
        width: 100%;
    }

    .avatar {
        position: relative;
    }

    .base_receive>.avatar:after {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        width: 0;
        height: 0;
        border: 5px solid #FFF;
        border-left-color: rgba(0, 0, 0, 0);
        border-bottom-color: rgba(0, 0, 0, 0);
    }

    .base_sent {
        justify-content: flex-end;
        align-items: flex-end;
    }

    .base_sent>.avatar:after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 0;
        border: 5px solid white;
        border-right-color: transparent;
        border-top-color: transparent;
        box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close
    }

    .msg_sent>time {
        float: right;
    }

    .msg_container_base::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        background-color: #F5F5F5;
    }

    .msg_container_base::-webkit-scrollbar {
        width: 12px;
        background-color: #F5F5F5;
    }

    .msg_container_base::-webkit-scrollbar-thumb {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #555;
    }

    .btn-group.dropup {
        position: fixed;
        left: 0px;
        bottom: 0;
    }
</style>

<div class="row chat-window" id="chat_window_1">
    <div class="col-xs-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading top-bar">
                <a href="#" id="minim_chat_window" class="icon_minim">
                    <div class="col-md-8 col-xs-8">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> </h3>
                    </div>
                </a>
            </div>
            <div class="panel-body msg_container_base">

            </div>
            <div class="panel-footer">
                <div class="input-group">
                    <input id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                    <span class="input-group-btn">
                        <button class="btn btn-primary btn-sm" id="btn-chat">Send</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>