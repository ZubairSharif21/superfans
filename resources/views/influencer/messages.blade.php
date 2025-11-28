@extends('layouts_influencer.main')
<style>
    .navbar {
        min-height: 0 !important;
    }
</style>

@section('content')
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 42px;
  height: 24px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0; left: 0;
  right: 0; bottom: 0;
  background-color: #ccc;
  transition: 0.4s;
  border-radius: 24px;
}

.slider:before {
  position: absolute;
  content: "";
  height: 18px;
  width: 18px;
  left: 3px;
  bottom: 3px;
  background-color: white;
  transition: 0.4s;
  border-radius: 50%;
}

input:checked + .slider {
  background-color: #409c40;
}

input:checked + .slider:before {
  transform: translateX(18px);
}

@media (max-width: 991.98px) {
.chat-footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background: #f0f2f5;
        padding: 10px 15px;
        border-top: 1px solid #e9edef;
        display: flex;
        z-index: 999;
    }
.class-footer-m {
    margin-top: 70px;
}

}
</style>

<style>
.tooltip-container {
    position: relative;
    display: inline-block;
    cursor: pointer;
}

.tooltip-container .tooltip-text {
    visibility: hidden;
    background-color: #333;
    color: #fff;
    font-size: 13px;
    text-align: center;
    border-radius: 4px;
    padding: 6px 10px;
    position: absolute;
    z-index: 10;
    top: 125%;
    left: 50%;
    transform: translateX(-50%);
    opacity: 0;
    transition: opacity 0.1s;
    white-space: nowrap;
}


.tooltip-container:hover .tooltip-text {
    visibility: visible;
    opacity: 1;
}
</style>
<div id="chat-container" style="height: 100vh; width: 100%; margin: 0; overflow: hidden;">
    <div class="row g-0" style="height: 100%; margin: 0;">

        <div class="col-md-4 d-md-block" id="userListColumn" style="height: 100%; display: flex; flex-direction: column; border-right: 1px solid #e9edef; background: #f8f9fa;">
            <div style="padding: 15px; border-bottom: 1px solid #e9edef; background: #fff; display: flex; align-items: center; justify-content: space-between;">
    <a href="/" style="text-decoration: none; display: flex; align-items: center;">
        <img src="https://live.superfanss.app/assets/images/logosmall/Superworld-01.svg" alt="SuperFans Logo" style="height: 26.5px;">
    </a>
@if(auth()->user()->role == 'influencer')
    <!-- Toggle Switch -->
   
  <div style="display: flex; align-items: center; gap: 8px;">
    <span class="tooltip-container" style="font-size: 18px; position: relative; bottom: 2.5px;">
        ⓘ
        <span class="tooltip-text">
            Putting the status in Busy will activate <br />  a premium account at $10.
        </span>
    </span>
    <span style="position: relative; bottom: 3px">Busy/ON</span>
    <label class="switch">
        <input type="checkbox" id="chatToggle" {{ auth()->user()->chat_toggle ? 'checked' : '' }}>
        <span class="slider round"></span>
    </label>
</div>

    @endif
</div>

            
            <!-- User List -->
            <div style="flex: 1; overflow-y: auto; overflow-x: hidden;">
                <div style="padding: 15px 0;">
                    <h5 style="color: #667781; font-size: 14px; padding: 0 15px 10px 15px; margin: 0; text-transform: uppercase;">✉️ Cards</h5>
                    <ul id="userList" class="list-group" style="border: none; margin: 0;"></ul>
                </div>
            </div>
        </div>

        <!-- Chat Area -->
        <div id="chatArea" style="display: none; height: 100%; position: relative; margin: 0;">
            <div style="height: 100%; display: flex; flex-direction: column; overflow: hidden;">

               <div id="chatHeader" style="padding: 15px; background: #f0f2f5; border-bottom: 1px solid #e9edef; display: flex; align-items: center;">
    <button id="backButton" class="d-md-none" style="background: none; border: none; margin-right: 15px; padding: 5px;">
<h1><</h1>
    </button>
    <div style="flex: 1; display: flex; align-items: center;">
        <div>
            <div style="font-weight: 500; font-size: 16px; display: flex; align-items: center;">
                <span id="currentChatUser"></span>
            </div>
            <div style="font-size: 12px; color: #667781;" id="userStatus">Online</div>
        </div>
    </div>
</div>
                
         
                <div id="chatbox" style="flex: 1; overflow-y: scroll; overflow-x: hidden; padding: 15px; background: #e5ddd5; 
                    background-image: url('https://web.whatsapp.com/img/bg-chat-tile-light_a4be512e7195b6b733d9110b408f075d.png'); -webkit-overflow-scrolling: touch;">
                </div>
                
<div class="class-footer-m"></div>
                <div class="chat-footer" style="background: #f0f2f5; padding: 15px; border-top: 1px solid #e9edef; display:flex;">
                    <textarea id="chatMessageInput" class="form-control" placeholder="Type your message..." 
                        style="width: 90%; height: 60px; resize: none; border-radius: 8px; border: none; padding: 10px; box-shadow: none;"></textarea>
                    <button id="sendMessageButton" class="btn btn-success" 
                        style="border: 2px solid #409c40 !important; width:65px; height: 59px; display: inline-block; margin-left: 1px;" 
                        disabled>✉️</button>
                </div>
            </div>
        </div>


        <div class="col-md-8 d-flex justify-content-center align-items-center" id="placeholderArea" 
            style="height: 100%; color: #999; background: #f8f9fa; margin: 0;" >
            <div style="width: 100%; text-align: center; padding: 20px; margin-top: 30%">
                 ✉️
                <h4 style="font-weight: 300; color: #555;">Select a conversation to start chatting</h4>
                <p style="color: #999; font-size: 14px;">Your messages will appear here</p>
            </div>
        </div>
    </div>
</div>

<style>

    @media (max-width: 991.98px) {
        #userListColumn {
            width: 100%;
            position: absolute;
            z-index: 1;
        }
        
        #chatArea, #placeholderArea {
            width: 100%;
        }
        
        #backButton {
            display: block !important;
        }
        
        body {
            overflow-x: hidden;
        }
        
        #chatbox {
            padding-bottom: 80px; 
        }
         #chatbox div {
             color: #111;
             white-space: pre-wrap !important;  
             word-wrap: break-word !important;
        }
    }
</style>


<script>
document.getElementById('chatToggle').addEventListener('change', function () {
    if (this.checked) {
        console.log('Toggle ON');
        updateChatToggle(1);
    } else {
        console.log('Toggle OFF');
        updateChatToggle(0);
    }
});

function updateChatToggle(state) {
    fetch('{{ route('update.chat_toggle') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ chat_toggle: state })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Chat toggle updated successfully');
        }
    })
    .catch(error => {
        console.log('Error updating chat toggle:', error);
    });
}
</script>

<script>
    let userId = "{{ auth()->id() }}"; 
    let apiBaseUrl = "https://live.superfanss.app/api"; 
    let selectedUser = null;
    let isSending = false;

    document.getElementById('backButton').addEventListener('click', function() {
        document.getElementById('chatArea').style.display = 'none';
        document.getElementById('userListColumn').style.display = 'flex';
        document.getElementById('placeholderArea').style.display = 'flex';
    });
    
       // 1️⃣ Add the function here
    function moveUserToTop(userId) {
        const userList = document.getElementById('userList');
        const userItems = Array.from(userList.children);

        const targetItem = userItems.find(item => item.dataset.userId == userId);
        if (targetItem) {
            userList.insertBefore(targetItem, userList.firstChild);
        }
    }

    async function fetchChatUsers() {
        try {
            const response = await fetch(`${apiBaseUrl}/chatbox/getChatUsers`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    influencer_id: userId,
                })
            });

            const users = await response.json();

            let userList = document.getElementById('userList');
            userList.innerHTML = '';

            users.forEach(user => {
                let listItem = document.createElement('li');
                listItem.dataset.userId = user.id; 
                listItem.className = 'list-group-item';
                listItem.style.border = 'none';
                listItem.style.borderBottom = '1px solid #e9edef';
                listItem.style.padding = '12px 15px';
                listItem.style.margin = '0';
                listItem.style.cursor = 'pointer';
                listItem.style.transition = 'background 0.2s';
                listItem.style.display = 'flex';
                listItem.style.alignItems = 'center';
                listItem.style.justifyContent = 'space-between';
                
                listItem.innerHTML = `
                    <div style="flex: 1;">
                        <div style="font-weight: 500; color: #111;">${user.name}</div>
                        <div style="font-size: 12px; color: #667781;">Last seen today</div>
                    </div>
                    <div style="font-size: 10px; color: #667781;">2:30 PM</div>
                `;
                
                listItem.onmouseover = () => listItem.style.background = '#f5f5f5';
                listItem.onmouseout = () => listItem.style.background = '';
                listItem.onclick = () => {
                    openChat(user);
                    if (window.innerWidth <= 991.98) {
                        document.getElementById('userListColumn').style.display = 'none';
                        document.getElementById('backButton').style.display = 'block';
                        document.getElementById('placeholderArea').style.display = 'none';
                    }
                };
                
                userList.appendChild(listItem);
            });

        } catch (error) {
            console.error('Error fetching chat users:', error);
        }
    }

    async function openChat(user) {
        selectedUser = user;

        document.getElementById('currentChatUser').textContent = user.name;
        document.getElementById('chatMessageInput').disabled = false;
        document.getElementById('sendMessageButton').disabled = true;

        document.getElementById('chatArea').style.display = 'block';
        document.getElementById('placeholderArea').style.display = 'none';

        try {
            const response = await fetch(`${apiBaseUrl}/chatbox/fetch`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    user_id: userId,
                    influencer_id: user.id
                })
            });

            const messages = await response.json();

            const chatbox = document.getElementById('chatbox');
            chatbox.innerHTML = '';

            messages.forEach(msg => {
                let msgDiv = document.createElement('div');
                let timeDiv = document.createElement('div');
                timeDiv.style.fontSize = '11px';
                timeDiv.style.color = '#667781';
                timeDiv.style.marginTop = '2px';
                timeDiv.style.textAlign = msg.sender_id == userId ? 'right' : 'left';
                
                let formattedTime = new Date(msg.created_at).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
                timeDiv.textContent = formattedTime;
                
                msgDiv.innerHTML = msg.message;
                msgDiv.appendChild(timeDiv);
                msgDiv.style.marginBottom = '15px';
                msgDiv.style.padding = '8px 12px';
                msgDiv.style.borderRadius = '8px';
                msgDiv.style.maxWidth = '80%';
                msgDiv.style.wordBreak = 'break-word';
                msgDiv.style.boxShadow = '0 1px 0.5px rgba(0,0,0,0.13)';

                if (msg.sender_id == userId) {
                    msgDiv.style.background = '#DCF8C6';
                    msgDiv.style.marginLeft = 'auto';
                } else {
                    msgDiv.style.background = 'white';
                    msgDiv.style.marginRight = 'auto';
                }

                chatbox.appendChild(msgDiv);
            });

            chatbox.scrollTop = chatbox.scrollHeight;
        } catch (error) {
            console.error('Error fetching messages:', error);
        }
    }

    async function sendMessage(messageText) {
        if (isSending) return;
        isSending = true;
        document.getElementById('sendMessageButton').disabled = true;

        try {
            const response = await fetch(`${apiBaseUrl}/chatbox/send`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    sender_id: userId,
                    receiver_id: selectedUser.id,
                    message: messageText
                })
            });

            await response.json();
            document.getElementById('chatMessageInput').value = '';
            await openChat(selectedUser);
            moveUserToTop(selectedUser.id);
        } catch (error) {
            console.error('Error sending message:', error);
        } finally {
            isSending = false;
            checkSendButton(); // recheck if input has text
        }
    }

    // Event Listeners
    const inputField = document.getElementById('chatMessageInput');
    const sendButton = document.getElementById('sendMessageButton');

    inputField.addEventListener('input', checkSendButton);

    function checkSendButton() {
        sendButton.disabled = inputField.value.trim() === '' || isSending;
    }

    sendButton.addEventListener('click', async () => {
        const messageText = inputField.value.trim();
        if (messageText && selectedUser && !isSending) {
            await sendMessage(messageText);
        }
    });

const isMobile = /Mobi|Android/i.test(navigator.userAgent);

inputField.addEventListener('keypress', async (e) => {
    if (!isMobile) { // only send on Enter for desktop
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            const messageText = inputField.value.trim();
            if (messageText && selectedUser && !isSending) {
                await sendMessage(messageText);
                inputField.value = '';
            }
        }
    }
    // on mobile, Enter always creates a new line
});


    window.addEventListener('resize', function() {
        const chatbox = document.getElementById('chatbox');
        if (chatbox) {
            chatbox.scrollTop = chatbox.scrollHeight;
        }
    });

    document.addEventListener('DOMContentLoaded', fetchChatUsers);
</script>

@endsection