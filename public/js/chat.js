 

    Echo.channel(`message-added-channel`)
    .listen('MessageAdded', (e) => {
      console.log('received a message');
   
    });

document.addEventListener('DOMContentLoaded', () => {
    fetch('/allmessage')
        .then(response => response.json())
        .then(data => {
            const messageArea = document.querySelector('#message_area');
            data.forEach(message => {
                messageArea.innerHTML += `${message.user.name} ${message.message} ${message.created_at}<br>`;
            });
        })
        .catch(error => {
            console.error('通信エラーが発生しました。', error);
        });
});

// メッセージ送信ボタンのクリックイベントリスナー
const submitButton = document.querySelector('#submit');
submitButton.addEventListener('click', () => {
    const messageInput = document.querySelector('#message');
    const message = messageInput.value;

    if (!message.trim()) {
        return;
    }

    // メッセージを送信
    fetch('/newmessage', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: `message=${encodeURIComponent(message)}`,
    })
        .then(response => response.json())
        .then(data => {
            // メッセージ送信成功時の処理を追加
            messageInput.value = '';
        })
        .catch(error => {
            console.error('通信エラーが発生しました。', error);
        });
});

// Laravel Echoを使用して新しいメッセージを受信したときの処理
window.Echo.channel('message-added-channel')
    .listen('MessageAdded', (data) => {
        const newMessage = data.message;
        const messageArea = document.querySelector('#message_area');
        messageArea.innerHTML += `${newMessage.user.name} ${newMessage.message} ${newMessage.created_at}<br>`;
    });
