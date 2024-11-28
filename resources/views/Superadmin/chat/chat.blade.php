<!-- resources/views/chat.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Chat</h1>
        <input type="hidden" id="receiver-id" value="{{ $receiverId }}">
        <div id="chat-box" style="border: 1px solid #ccc; height: 400px; overflow-y: scroll;">
            <!-- Pesan akan ditampilkan di sini -->
        </div>
        <textarea id="message" placeholder="Ketik pesan di sini..."></textarea>
        <button id="send-message">Kirim</button>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        document.getElementById('send-message').addEventListener('click', function() {
            const message = document.getElementById('message').value;
            const receiverId = document.getElementById('receiver-id').value;

            fetch('/send-message', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ id_receiver: receiverId, message: message }),
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                document.getElementById('message').value = ''; // Clear message input
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
