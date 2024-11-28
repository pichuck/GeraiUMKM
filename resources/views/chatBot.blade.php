@include('layouts.header')

<div class="flex flex-col h-screen mt-20">
    <!-- Chat Messages Area -->
    <div id="messages" class="flex-grow overflow-y-auto p-4 space-y-4 pb-24 rounded-t-lg mb-20">
        <!-- Display messages dynamically -->
        <div class="flex flex-col space-y-4">
            @foreach ($context as $item)
                @if ($item['role'] === 'user')
                    <!-- User's message bubble aligned to the right -->
                    <div class="flex justify-end">
                        <div class="max-w-xs w-full text-right">
                            <strong class="text-gray-500 text-sm mb-1 block">{{ ucfirst($item['role']) }}</strong>
                            <div class="bg-teal-700 text-white p-3 rounded-lg shadow-md">
                                <p>{{ $item['content'] }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Assistant's message bubble aligned to the left -->
                    <div class="flex justify-start">
                        <div class="max-w-xs w-full">
                            <strong class="text-gray-500 text-sm mb-1 block">{{ ucfirst($item['role']) }}</strong>
                            <div class="bg-gray-200 text-gray-800 p-3 rounded-lg shadow-md">
                                <p>{{ $item['content'] }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <!-- Scroll to Bottom Button -->
    <button id="scrollToBottom"
        class="fixed bottom-24 right-8 bg-teal-600 text-white p-3 rounded-full shadow-lg hover:bg-teal-700 transition duration-300"
        onclick="scrollToBottom()">
        <!-- Inline SVG for Arrow Down -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <!-- Input Area - fixed at the bottom -->
    <div class="flex items-center p-4 bg-gray-200 shadow-md fixed bottom-0 left-0 right-0">
        <form action="{{ route('mahasiswa.chatbot.send') }}" method="POST" class="flex w-full">
            @csrf
            <input id="user-input" name="content" type="text" placeholder="Tulis pesan Anda..." class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500">
            <button type="submit" class="ml-3 px-4 py-2 bg-teal-700 text-white font-semibold rounded-lg hover:bg-teal-500">Kirim</button>
        </form>
    </div>
</div>

<script>
    // Scroll to bottom function
    function scrollToBottom() {
        const messages = document.getElementById('messages');
        messages.scrollTop = messages.scrollHeight;
    }

    // Show scroll to bottom button when not at the bottom
    const messages = document.getElementById('messages');
    const scrollToBottomBtn = document.getElementById('scrollToBottom');

    messages.addEventListener('scroll', function() {
        if (messages.scrollTop + messages.clientHeight >= messages.scrollHeight - 10) {
            scrollToBottomBtn.style.display = 'none';
        } else {
            scrollToBottomBtn.style.display = 'block';
        }
    });

    // Scroll to bottom on page load
    document.addEventListener('DOMContentLoaded', function() {
        scrollToBottom();
    });
</script>

