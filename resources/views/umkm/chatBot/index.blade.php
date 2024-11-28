@extends('layouts.umkm.app')

@section('title', 'ChatBot')
@section('content')

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Chat Header -->
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">ChatBot UMKM</h4>
                </div>
                
                <!-- Chat Messages Area -->
                <div id="messages" class="card-body overflow-auto" style="height: 500px;">
                    @foreach ($context as $item)
                        @if ($item['role'] === 'user')
                            <!-- User's message bubble aligned to the right -->
                            <div class="d-flex justify-content-end mb-3">
                                <div class="text-end">
                                    <small class="text-muted">{{ ucfirst($item['role']) }}</small>
                                    <div class="bg-primary text-white p-3 rounded shadow-sm">
                                        <p class="mb-0">{{ $item['content'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- Assistant's message bubble aligned to the left -->
                            <div class="d-flex justify-content-start mb-3">
                                <div>
                                    <small class="text-muted">{{ ucfirst($item['role']) }}</small>
                                    <div class="bg-light text-dark p-3 rounded shadow-sm">
                                        <p class="mb-0">{{ $item['content'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Scroll to Bottom Button -->
                <button id="scrollToBottom" class="btn btn-primary rounded-circle position-fixed" style="bottom: 90px; right: 20px;" onclick="scrollToBottom()">
                    <i class="bi bi-arrow-down"></i>
                </button>

                <!-- Input Area - fixed at the bottom -->
                <div class="card-footer">
                    <form action="{{ route('umkm.chatbot.send') }}" method="POST" class="d-flex">
                        @csrf
                        <input id="user-input" name="content" type="text" placeholder="Tulis pesan Anda..." class="form-control me-2" required>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
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
@endsection
