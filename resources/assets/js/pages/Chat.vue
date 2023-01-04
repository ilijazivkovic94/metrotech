<template>
    <div class="vue-app-container">
        <div class="container">
            <div class="chat-message-box">
                <template v-if="channel_info.channel_type === 1 && !channel_info.can_access">
                    <div class="message-box-notify-panel">
                        <template v-if="channel_info.type === 2">
                            <i class="fa fa-exclamation-triangle"></i>
                            This channel is only for Followers!
                        </template>
                        <template v-else-if="channel_info.type === 3">
                            <i class="fa fa-exclamation-triangle"></i>
                            This channel is only for Subscribers!
                        </template>
                        <template v-else-if="channel_info.type === 4">
                            <i class="fa fa-exclamation-triangle"></i>
                            This channel is only for Staff!
                        </template>
                        <template v-else>
                            <i class="fa fa-exclamation-triangle"></i>
                            Follow this server to view the chat history on DB
                        </template>
                    </div>
                </template>
                <template v-else-if="token_value === ''">
                    <div class="message-box-notify-panel">
                        <i class="fa fa-exclamation-triangle"></i>
                        You need to login.
                    </div>
                </template>
                <template v-else>
                    <div class="chat-message-box-body">
                        <div v-for="(msg, $index) in messages" :key="$index"
                             :data-num="messages.length - $index">
                            <template v-if="msg.date">
                                <div class="message_item_day_divider">
                                    <div class="message_item_day_divider_before"></div>
                                    {{msg.date}}
                                    <div class="message_item_day_divider_after"></div>
                                </div>
                            </template>
                            <div class="message_item">
                                <div class="message_item_sender">
                                    <img :src="msg.profile_image"
                                         @click.prevent="openProfileMenu($event, msg.user_id)">
                                </div>
                                <div class="message_item_body">
                                    <div class="message_item_sender_name">
                                        <span class="message_sender_name">{{msg.user_name}}</span>
                                        <span class="message_sender_time">{{ changeTimeZone(msg.created_at) }}</span>
                                    </div>
                                    <div class="message_item_content">
                                        <template v-for="content in msg.msg_contents"
                                                  v-if="content">
                                            <template v-if="content.msg_type === 'image'">
                                                <img class="message_uploaded_image"
                                                     :src="content.uploaded_image"
                                                     v-on:contextmenu="openMsgMenu($event,msg.id,content.msg_id, 'image')">
                                            </template>
                                            <template v-else-if="content.msg != ''">
                                                                            <span v-html="convertMsg(content.msg)"
                                                                                  style="display: flex;"
                                                                                  v-on:contextmenu="openMsgMenu($event,msg.id, content.msg_id)"
                                                                                  v-linkified></span>
                                            </template>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-message-box-footer">
                        <div class="preview_file" v-if="preview_image">
                            <button @click.prevent="clearImageFile"><i class="fa fa-close"></i>
                            </button>
                            <img :src="preview_image"/>
                        </div>

                        <Picker
                            style="position: absolute;bottom: 90px;width: 350px;right: 50px;"
                            :title="emojiTitle"
                            :emoji-size="emojiSize"
                            :per-line="perLine"
                            :skins="skin"
                            :native="native"
                            :set="set"
                            :darkMode="true"
                            :auto-focus="autoFocus"
                            :include="include"
                            :exclude="exclude"
                            :onItemClick="insertSymbol"
                            v-if="showEmojiPanel"
                        />

                        <div class="chat-message-box-footer-inner">
                            <div class="pending_wrap"
                                 v-if="(isTyping && typist !== '') || sendingMsg">
                                <div class="is_typing" style="color: #adadad">{{typist}} is typing...</div>
                                <div class="sending_msg" style="color: #adadad">Sending Message</div>
                            </div>
                            <!--<textarea placeholder="Enter your message..." class="message-typing-box"></textarea>-->
                            <at-textarea name-key="name">
                            <textarea v-model="newMsg.msg" @keyup="textAreaAdjust"
                                      ref="messageTextareaBox"
                                      @keypress="onEnterPress($event)"
                                      id="msg_box"></textarea>
                                <button class="emoji-element-toggle-btn"
                                        @click.prevent="showEmojiPanel = !showEmojiPanel">🙂
                                </button>
                            </at-textarea>
                        </div>
                        <div class="upload-btn-wrapper">
                            <template v-if="newMsg.msg_id">
                                <button @click.prevent="clearNewMsg"
                                        class="btn clear_edit_message_draft"><span
                                    class="fa fa-remove"></span></button>
                            </template>
                            <template v-else>
                                <template v-if="!preview_image">
                                    <button class="btn"><i class="fa fa-file-image-o"></i>
                                    </button>
                                    <input type="file" name="file_name"
                                           ref="fileInput"
                                           @input="onSelectFile"/>
                                </template>
                                <template v-else>
                                    <button :class="{'btn':true, 'disabled':sendingMsg}"
                                            @click.prevent="sendFile()"><i
                                        class="fa fa-send"></i></button>
                                </template>
                            </template>
                        </div>
                    </div>
                </template>
            </div>
            <right-click-menu v-if="msgClickMenu.viewMenu">
                <template slot="menu-body">
                    <ul tabindex="-1" v-on:blur="closeMsgMenu" ref="msgClickMenu"
                        :style="{top:msgClickMenu.top, left:msgClickMenu.left}">
                        <li v-if="msgClickMenu.msg_type === ''"
                            @click.prevent="onEditMsg(msgClickMenu.parent_msg_id, msgClickMenu.msg_id)">Edit
                            Message{{msgClickMenu.msg_type}}
                        </li>
                        <li @click.prevent="onDeleteMsg(msgClickMenu.parent_msg_id, msgClickMenu.msg_id)">Delete</li>
                    </ul>
                </template>
            </right-click-menu>
        </div>
        <transition>
            <div class="mask-panel" style="position: absolute;left:0;top:0;width: 100%;z-index: 999;height: 100%;flex: 1; display: flex; justify-content: center;align-items: center;flex-direction: column" v-if="show_image_box">
                <img v-bind:src="mask_image" style="position: relative;z-index: 999;" />
                <a v-bind:href="mask_image" style="position: relative;z-index: 999;font-weight: bold" target="_blank">Open Original</a>
                <div class="panel-back" style="position: fixed;z-index:998;left:0;top:0;width: 100%;height: 100%;background-color: rgba(54, 57, 62, 0.9)"></div>
            </div>
        </transition>
    </div>
</template>

<script>
    import Vue from 'vue';
    import pfetch from "../pfetch/pfetch";
    import AtTextarea from 'vue-at/dist/vue-at-textarea';
    import 'vue-emoji-mart/css/emoji-mart.css';
    import {Picker} from 'vue-emoji-mart';
    import {Emoji} from 'emoji-mart';
    import RightClickMenu from "../components/common/RightClickMenu";

    export default {
        name: "Chat",
        components: {AtTextarea, Picker, Emoji, RightClickMenu},
        data() {
            return {
                user_info: {
                    first_name: '',
                    last_name: '',
                    email: '',
                    subject: '',
                    message: ''
                },
                subscribe_info: {
                    first_name: '',
                    email: ''
                },
                preview_image: null,
                showEmojiPanel: false,
                isTyping: false,
                typist: '',
                sendingMsg: false,
                newMsg: {
                    msg: '',
                    channel_id: '',
                    receiver: '',
                    file_name: null,
                    msg_id: 0,
                    parent_msg_id: 0,
                    flag: 'insert'
                },
                emojiTitle: '',
                emojiSize: 24,
                perLine: 9,
                skin: 5,
                native: false,
                set: 'apple',
                hidden: false,
                currentEmoji: {id: '+1'},
                autoFocus: false,
                include: [],
                exclude: [],
                channel_info: {},
                messages: [],

                token_value: '',
                user: {},
                mask_image: '',

                msgClickMenu: {
                    viewMenu: false,
                    top: '0px',
                    left: '0px',
                    msg_id: 0,
                    parent_msg_id: 0,
                    msg_type: ''
                },

                show_image_box: false
            }
        },
        computed: {
            authorizor() {
                return {
                    id: 1123,
                    name: '123'
                };
            },
            channel() {
                return {
                    server_id: '5ee530a2824ac',
                    channel_id: '5f0b4a82677a3',
                };
            },
            server_id() {
                return '5ee530a2824ac';
            },
            channel_id() {
                return '5f0b4a82677a3';
            },
            token() {
                return this.token_value;
            },
            channelUsers() {
                return this.channel_info.channel_users;
            }
        },
        created() {
            this.initFunctions();
        },
        mounted() {
            document.onreadystatechange = () => {
                if (document.readyState == "complete") {
                    // run code here
                    if (document.querySelector('.pagination')) {
                        document.querySelector('.pagination').style.display = 'none';
                    }

                    $(document).on('click', '.linkified', (e) => {
                        e.preventDefault();
                        console.log($(this)[0].href);
                        let link = $(this)[0].href;
                        let host = document.location.hostname;
                        if(link.indexOf(host) > -1) {
                            this.show_outside_link = link;
                            this.openURL();
                        } else {
                            this.show_outside_modal = true;
                            this.show_outside_link = link;
                        }
                        return true;
                    });

                    $(document).on('click', '.message_uploaded_image', (e) => {
                        console.log(e);
                        this.show_image_box = true;
                        this.mask_image = e.target.src;
                    });

                    $(document).on('click', '.panel-back', (e) => {
                        this.show_image_box = false;
                        this.mask_image = '';
                    });

                    setTimeout(() => {
                        this.scrollToDown();
                    }, 500);
                }
            }
            document.onpaste = (event) => {
                let fileInput = document.getElementsByName('file_name')[0];
                fileInput.files = event.clipboardData.files;
                this.onSelectFile();
            }
        },
        sockets: {
            broadcast_new_msg: function (data) {
                console.log('broadcast', data);
            },
            new_channel_member_added: function (data) {
                console.log('added', data);
            },
            newMsg(data) {
                console.log('newMsg', data);
            },
        },
        methods: {
            async initFunctions() {
                await this.loadChannelInfo({
                    server_id: this.server_id,
                    channel_id: this.channel_id
                });
            },
            loadChannelInfo(info) {
                $.ajax({
                    url: '/api/token',
                    method: 'GET',
                    dataType: 'JSON',
                    success: (res) => {
                        if (res.token) {
                            this.token_value = res.token;
                            this.loadUserInfo();
                            $.ajax({
                                url: 'https://doctorbattles.com/api/v1/channel/load_channel_info',
                                method: 'GET',
                                data: info,
                                beforeSend: function (xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer " + res.token);
                                },
                                dataType: 'JSON',
                                success: (res) => {
                                    this.channel_info = res;

                                    if(res.can_access) {
                                        this.loadMessages({
                                            channel_id: this.channel_id
                                        });
                                    }
                                },
                                error: function (err) {
                                    console.log(err);
                                }
                            });
                        } else {
                            window.location.href = '/signin_with_doctorbattles';
                        }
                    }
                });
            },
            loadMessages(channel_info) {
                $.ajax({
                    url: '/api/token',
                    method: 'GET',
                    dataType: 'JSON',
                    success: (res) => {
                        if (res.token) {
                            this.token_value = res.token;
                            $.ajax({
                                url: 'https://doctorbattles.com/api/v1/load_messages',
                                method: 'GET',
                                data: channel_info,
                                dataType: 'JSON',
                                beforeSend: function (xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer " + res.token);
                                },
                                success: (res) => {
                                    this.messages = res.result;

                                    setTimeout(() => {
                                        this.scrollToDown();
                                    }, 100);
                                },
                                error: function (err) {
                                    console.log(err);
                                }
                            });
                        } else {
                            window.location.href = '/signin_with_doctorbattles';
                        }
                    }
                });
            },
            initSocket() {
                let channel_id = this.channel_id;
                this.$socket.emit('join', this.user);

                this.$socket.emit('add_channel', {
                    channel: channel_id
                });

                if (this.channel_info.id) {
                    this.$socket.emit('add_channel_member', {
                        channel: channel_id,
                        new_member: this.channelUsers.find(item => item.id === this.user.id)
                    });
                }
                this.$socket.on('broadcast_new_msg', function (data) {
                    console.log(data);
                });
                this.$socket.on('newMsg', (data) => {
                    let last_history = localStorage.getItem("last_history");
                    console.log()
                    if (data.channel === channel_id) {
                        if (data.message.parent_msg_id) {
                            data.message.parent_msg_id *= 1;
                            data.message.id *= 1;
                            if (this.messages.find(item => item.id === data.message.parent_msg_id)) {
                                let msg_contents = this.messages.find(item => item.id === data.message.parent_msg_id)['msg_contents'];
                                if (data.message.flag && data.message.flag === 'delete') {
                                    console.log(this.messages.find(item => item.id === data.message.parent_msg_id)['msg_contents'].find(item => item.msg_id == data.message.id), 'a');
                                    this.messages.find(item => item.id === data.message.parent_msg_id)['msg_contents'] = this.messages.find(item => item.id === data.message.parent_msg_id)['msg_contents'].filter(item => item.msg_id != data.message.id);
                                } else {
                                    const msg = msg_contents.find(item => item.msg_id === data.message.id);
                                    msg.msg = data.msg;
                                }
                            }
                        } else {
                            if (last_history !== null) {
                                last_history = JSON.parse(last_history);
                                if (last_history.message && last_history.message.channel_id === channel_id && last_history.message.user_id === data.message.user_id) {
                                    if (data.message.time - last_history.message.time < 10 * 60 && data.receiver === '') {
                                        let msg_id = 0;
                                        console.log(this.messages[this.messages.length - 1].user_id);
                                        if (this.messages[this.messages.length - 1].user_id === data.message.user_id) {
                                            this.messages[this.messages.length - 1].msg_contents.push({
                                                msg: data.msg,
                                                msg_id: data.message.id
                                            });
                                            if (data.message.uploaded_image) {
                                                this.messages[this.messages.length - 1].msg_contents.push({
                                                    msg_id: data.message.id,
                                                    msg_type: 'image',
                                                    uploaded_image: data.message.uploaded_image
                                                });
                                                console.log(this.messages[this.messages.length - 1].msg_contents, 'aadd uploaded image');
                                            }
                                        } else {
                                            this.messages.push(data.message);
                                        }
                                    } else {
                                        this.messages.push(data.message);
                                    }
                                } else {
                                    this.messages.push(data.message);
                                }
                            } else {
                                this.messages.push(data.message);
                            }
                            localStorage.setItem('last_history', JSON.stringify(data));
                            this.scrollToDown();
                        }
                        console.log(this.messages);
                        var token = this.token;
                        $.ajax({
                            url: 'https://doctorbattles.com/api/v1/channel/mark_msg_read',
                            method: 'POST',
                            beforeSend: function (xhr) {
                                xhr.setRequestHeader("Authorization", "Bearer " + token);
                            },
                            dataType: 'JSON',
                            data: {
                                msg_id: data.message.id,
                                channel_id: data.channel,
                            },
                            success: (res) => {
                                console.log(res);
                            },
                            error: function (err) {
                                console.log(err);
                            }
                        });
                    }
                });
            },
            loadUserInfo() {
                var token = this.token;
                $.ajax({
                    url: 'https://doctorbattles.com/api/v1/user',
                    method: 'GET',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader("Authorization", "Bearer " + token);
                    },
                    dataType: 'JSON',
                    success: (res) => {
                        this.user = res;
                        this.initSocket();
                    },
                    error: function (err) {
                        console.log(err);
                    }
                })
            },
            async subscribe() {
                let metro_regist = 'subscribe';
                let data = this.subscribe_info;
                data._token = $('meta[name="csrf-token"]').attr('content');
                let metro_res = await pfetch(metro_regist, {
                    method: "POST",
                    body: data
                });
                if (metro_res) {
                    alert('Thanks for subscribe us!');
                }
            },
            async contactUS() {
                let metro_regist = 'contactus';
                let data = this.user_info;
                data._token = $('meta[name="csrf-token"]').attr('content');
                let metro_res = await pfetch(metro_regist, {
                    method: "POST",
                    body: data
                });
                if (metro_res) {
                    alert('Thanks for contacting us!');
                }
            },
            textAreaAdjust() {
                this.$refs.messageTextareaBox.style.height = "1px";
                this.$refs.messageTextareaBox.style.height = (25 + this.$refs.messageTextareaBox.scrollHeight) + "px";
            },
            onSelectFile() {
                const input = this.$refs.fileInput;
                const files = input.files;
                let that = this;
                if (files && files[0]) {
                    var exts = ['png', 'jpg', 'gif', 'jpeg'];

                    // split file name at dot
                    var get_ext = files[0]['name'].split('.');
                    // reverse name to check extension
                    get_ext = get_ext.reverse();
                    // check file type is valid as given in 'exts' array
                    if ($.inArray(get_ext[0].toLowerCase(), exts) < 0) {
                        alert('You can upload only Image File!');
                        return false;
                    }
                    const fsize = files[0].size;
                    const file = Math.round((fsize / 1024));
                    // The size of the file.
                    if (file >= 4096) {
                        alert("File too Big, please select a file less than 4mb");
                        return false;
                    }
                    const reader = new FileReader;
                    reader.onload = e => {
                        that.preview_image = e.target.result
                    };
                    reader.readAsDataURL(files[0]);
                    this.newMsg.file_name = files[0];
                }
            },
            clearImageFile() {
                this.newMsg.file_name = null;
                this.preview_image = null;
                if (this.$refs.fileInput)
                    this.$refs.fileInput.value = '';
            },
            insertSymbol(emoji) {
                this.newMsg.msg += emoji.colons;
                this.showEmojiPanel = false;
            },
            async onEnterPress(event) {
                if (event.keyCode === 13 && !event.shiftKey) {
                    event.preventDefault();
                    localStorage.removeItem('draft_msg');
                    localStorage.removeItem('draft_channel');
                    this.sendMsg();
                } else {
                    localStorage.setItem('draft_msg', event.target.value);
                    localStorage.setItem('draft_channel', this.channel_id);
                    this.emitTypingEvents();
                }
                return true;
            },
            async sendMsg() {
                let div;
                let html_str = '';
                if (this.newMsg.msg === '' && !this.newMsg.file_name && this.newMsg.flag !== 'delete') return false;
                if (this.sendingMsg) return false;
                this.newMsg.channel_id = this.channel_id;
                this.sendingMsg = true;
                let dateval = new Date();
                let create_at = dateval.getFullYear() + '-' + (dateval.getMonth() + 1) + '-' + dateval.getDate() + ' ' +
                    +dateval.getHours() + ':' + dateval.getMinutes() + ':' + dateval.getSeconds();
                let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                if (!this.newMsg.file_name) {
                    this.scrollToDown();
                }

                const res = await this.saveNewMsg(this.newMsg);

                if (res) {
                    let data = {
                        channel: this.newMsg.channel_id,
                        channel_type: this.channel_info.channel_type,
                        msg: this.newMsg.msg,
                        receiver: this.newMsg.receiver,
                        uploaded_image: res.uploaded_image,
                        message: res.msg_item
                    };
                    if (this.channel_info.channel_type === 1) {
                        data.category_id = this.channel_info.category_id;
                        data.server_id = this.channel_info.server_id;
                    }

                    this.$socket.emit('sendMsg', data);
                    this.sendingMsg = false;
                }
                this.clearNewMsg();
                if (div) {
                    let elem = document.getElementById('added_msg_element');
                    elem.parentNode.removeChild(elem);
                }
                this.scrollToDown();
            },
            scrollToDown() {
                if (document.querySelector(".chat-message-box-body")) {
                    let scrollHeight = document.querySelector(".chat-message-box-body").scrollHeight;
                    document.querySelector(".chat-message-box-body").scrollTop = scrollHeight * 100 + 200;
                }
            },
            clearNewMsg() {
                this.newMsg.msg = '';
                this.newMsg.msg_id = 0;
                this.newMsg.parent_msg_id = 0;
                this.newMsg.receiver = '';
                this.newMsg.file_name = null;
                this.preview_image = null;
                this.newMsg.flag = 'insert';
                if (this.$refs.fileInput) {
                    this.$refs.fileInput.value = '';
                }
                setTimeout(this.textAreaAdjust, 100);
            },
            emitTypingEvents() {
                let self = this;
                this.timeOut && clearTimeout(this.timeOut);
                this.timeOut = setTimeout(function () {
                    self.$socket.emit('is typing', {
                        channel: self.channel_id,
                        user_id: self.authorizor.id,
                        user_name: self.authorizor.user_name
                    });
                }, 1000);

            },
            typing: function (data) {
                if (data.user_id !== this.user.id) {
                    if (!this.isTyping) {
                        this.isTyping = true;
                        this.typist = data.user_name;
                        let that = this;
                        setTimeout(function () {
                            that.typist = data.user_name;
                            that.isTyping = false;
                        }, 2500);
                    }
                }
            },
            saveNewMsg(msg) {
                var token = this.token;

                var formData = new FormData();
                Object.keys(msg).forEach((i) => {
                    formData.append(i, msg[i]);
                });

                return $.ajax({
                    url: 'https://doctorbattles.com/api/v1/channel/send_msg',
                    method: 'POST',
                    dataType: 'JSON',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader("Authorization", "Bearer " + token);
                    },
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (res) {
                        return res;
                    },
                    error: function (err) {
                        console.log(err);
                    }
                })
            },
            changeTimeZone(time_value) {
                let timeval = new Date(time_value).getTime();
                let d = new Date();
                let today = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();

                let n = d.getTimezoneOffset();
                let current = new Date(timeval + n * (-1) * 60000);
                let currentHours = current.getHours();
                let current_hour = currentHours;
                if (currentHours > 12) {
                    current_hour = currentHours - 12;
                }
                if (current_hour < 10) {
                    if (current_hour == 0) {
                        current_hour == '12';
                    } else {
                        current_hour = '0' + current_hour;
                    }
                }
                let current_minute = current.getMinutes() < 10 ? '0' + current.getMinutes() : current.getMinutes();
                return current_hour + ':' + current_minute + ' ' + (currentHours > 12 ? 'PM' : 'AM');

            },
            openURL() {
                if(this.show_outside_link) {
                    window.open(this.show_outside_link, '_blank');
                    this.show_outside_modal = false;
                    this.show_outside_link = '';
                }
            },
            convertMsg(msg) {
                const COLONS_REGEX = new RegExp(
                    '(:[a-zA-Z0-9-_+]+:?)',
                    'g'
                )
                return msg.replace(COLONS_REGEX, function (match, p1, p2) {
                    if (match) {
                        return Emoji({
                            emoji: match,
                            html: true,
                            set: 'apple',
                            size: 24,
                            native: false
                        });
                    }
                });
            },
            /*MSG MENU*/
            setMsgMenu: function (top, left) {
                let largestHeight = window.innerHeight - this.$refs.msgClickMenu.offsetHeight - 25;
                let largestWidth = window.innerWidth - this.$refs.msgClickMenu.offsetWidth - 25;

                if (top > largestHeight) top = largestHeight - this.$refs.msgClickMenu.offsetHeight + 25;

                if (left > largestWidth) left = largestWidth - this.$refs.msgClickMenu.offsetWidth + 25;

                this.msgClickMenu.top = top + 'px';
                this.msgClickMenu.left = left + 'px';
            },
            openMsgMenu: function (e, parent_msg_id, msg_id, msg_type) {
                const msg = this.messages.find(item => item.id === parent_msg_id);
                if (msg.user_id !== this.user.id) {
                    e.preventDefault();
                    return false;
                }
                this.msgClickMenu.msg_type = msg_type || '';
                this.msgClickMenu.parent_msg_id = parent_msg_id;
                this.msgClickMenu.msg_id = msg_id;
                this.msgClickMenu.viewMenu = true;
                Vue.nextTick(function () {
                    this.$refs.msgClickMenu.focus();
                    this.setMsgMenu(e.y, e.x);
                }.bind(this));
                e.preventDefault();
            },
            closeMsgMenu: function () {
                this.msgClickMenu.viewMenu = false;
                this.msgClickMenu.parent_msg_id = 0;
                this.msgClickMenu.msg_id = 0;
                this.msgClickMenu.msg_type = '';
            },
            async onEditMsg(parent_msg_id, msg_id) {
                let msg_contents = this.messages.find(item => item.id === parent_msg_id);
                let msg = msg_contents['msg_contents'].find(item => item.msg_id === msg_id);
                if (msg) {
                    this.newMsg.msg = msg.msg;
                    this.newMsg.msg_id = msg_id;
                    this.newMsg.parent_msg_id = parent_msg_id;
                }
                this.closeMsgMenu();
                // this.textAreaAdjust();
                setTimeout(this.textAreaAdjust, 100);
            },
            async onDeleteMsg(parent_msg_id, msg_id) {
                let msg_contents = this.messages.find(item => item.id === parent_msg_id);
                let msg = msg_contents['msg_contents'].find(item => item.msg_id === msg_id);
                if (msg) {
                    this.newMsg.msg_id = msg_id;
                    this.newMsg.parent_msg_id = parent_msg_id;
                    this.newMsg.flag = 'delete';
                }
                this.sendMsg();
                this.closeMsgMenu();
            },
        }
    }
</script>

<style scoped>
    @import '../../../sass/theme/css/classes.css';
</style>
