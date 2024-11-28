import Echo from "laravel-echo";
window.Pusher = require("pusher-js");

window.Echo = new Echo({
    broadcaster: "pusher",
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true,
});

// Mendengarkan channel chat
function listenToChat(receiver_id) {
    window.Echo.private(`chat.${receiver_id}`).listen("MessageSent", (e) => {
        console.log(e.message);
        // Logika untuk menampilkan pesan di frontend
        displayMessage(e.message);
    });
}

function displayMessage(message) {
    const chatBox = document.getElementById("chat-box");
    const messageElement = document.createElement("div");
    messageElement.innerText = `${message.pesan} (Dari: ${message.id_sender})`;
    chatBox.appendChild(messageElement);
}

export { listenToChat };
