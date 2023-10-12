<template>
  <div>
    <div id="message_area">
      <!-- メッセージが表示されるエリア -->
      <div v-for="message in messages" :key="message.id">
        <strong>{{ message.user.name }}:</strong> {{ message.message }}
      </div>
    </div>
    <div>
      <textarea v-model="newMessage" @keydown.enter="sendMessage"></textarea>
      <button @click="sendMessage">送信</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      messages: [],      // メッセージ一覧
      newMessage: '',    // 新しいメッセージのテキスト
    };
  },
  created() {
    // Laravel Echoを使用して、メッセージが追加されたときのリアルタイムリスナーを設定
    window.Echo.channel('message-added-channel')
      .listen('MessageAdded', (data) => {
        this.messages.push(data.message);
      });
  },
  methods: {
    sendMessage() {
      // メッセージを送信
      if (this.newMessage.trim() === '') {
        return;
      }

      // バックエンドに新しいメッセージを送信
      axios.post('/newmessage', { message: this.newMessage })
        .then((response) => {
          this.newMessage = ''; // テキストエリアをクリア
        })
        .catch((error) => {
          console.error('メッセージの送信エラー:', error);
        });
    },
  },
};
</script>
