// resources/js/app.js
import "./bootstrap"; // Memastikan bootstrap Laravel Echo dan Pusher sudah di-load
import { listenToChat } from "./chat";

// Mendapatkan receiver_id dari elemen data atau URL
const receiverId = document.getElementById("receiver-id").value;
listenToChat(receiverId);
