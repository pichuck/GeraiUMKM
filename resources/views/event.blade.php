@include('layouts.header')

<!-- Intro Section -->
<section class="bg-secondary text-primary py-9 pt-20 m-11">
    <div class="container mx-auto text-center px-6 md:px-0">
        <div class="bg-teal-500 text-white py-8 px-10 rounded-lg shadow-lg max-w-5xl mx-auto">
            <h2 class="text-2xl md:text-3xl font-bold">Temukan Event, Artikel, dan Tips</h2>
            <h2 class="text-2xl md:text-3xl font-bold">Yang Menarik</h2>
        </div>
    </div>
</section>

<!-- Main Content Section with Tabs -->
<div class="container mx-auto py-10">
    <div class="flex justify-center space-x-6 mb-8">
        <button onclick="showTab('event')" id="event-tab" class="tab-button px-4 py-2 font-semibold rounded-t-lg focus:outline-none text-teal-700 border-b-2 border-teal-700">Events</button>
        <button onclick="showTab('news')" id="news-tab" class="tab-button px-4 py-2 font-semibold rounded-t-lg focus:outline-none text-gray-600">News</button>
        <button onclick="showTab('tips')" id="tips-tab" class="tab-button px-4 py-2 font-semibold rounded-t-lg focus:outline-none text-gray-600">Tips</button>
    </div>

    <div id="event" class="tab-content">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($artikel->where('category', 'event') as $item)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->judul }}" class="h-48 w-full object-cover">
                    <div class="p-4">
                        <h5 class="font-bold text-lg">{{ $item->judul }}</h5>
                        <div class="flex text-gray-500 text-sm mb-2">
                            <span class="mr-3"><i class="far fa-clock"></i> {{ $item->created_at->diffForHumans() }}</span>
                            <span><i class="far fa-comment"></i> {{ rand(5, 50) }} Comments</span>
                        </div>
                        <p class="text-gray-700">{{ Str::limit($item->isi, 80) }}</p>
                        <a href="{{ route('event.detail', $item->id) }}" class="text-teal-700 font-semibold">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="news" class="tab-content hidden">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($artikel->where('category', 'news') as $item)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->judul }}" class="h-48 w-full object-cover">
                    <div class="p-4">
                        <h5 class="font-bold text-lg">{{ $item->judul }}</h5>
                        <div class="flex text-gray-500 text-sm mb-2">
                            <span class="mr-3"><i class="far fa-clock"></i> {{ $item->created_at->diffForHumans() }}</span>
                            <span><i class="far fa-comment"></i> {{ rand(5, 50) }} Comments</span>
                        </div>
                        <p class="text-gray-700">{{ Str::limit($item->isi, 80) }}</p>
                        <a href="{{ route('event.detail', $item->id) }}" class="text-teal-700 font-semibold">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="tips" class="tab-content hidden m-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($artikel->where('category', 'tips') as $item)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->judul }}" class="h-48 w-full object-cover">
                    <div class="p-4">
                        <h5 class="font-bold text-lg">{{ $item->judul }}</h5>
                        <div class="flex text-gray-500 text-sm mb-2">
                            <span class="mr-3"><i class="far fa-clock"></i> {{ $item->created_at->diffForHumans() }}</span>
                            <span><i class="far fa-comment"></i> {{ rand(5, 50) }} Comments</span>
                        </div>
                        <p class="text-gray-700">{{ Str::limit($item->isi, 80) }}</p>
                        <a href="{{ route('event.detail', $item->id) }}" class="text-teal-700 font-semibold">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- JavaScript for Tab Switching -->
<script>
    function showTab(tabName) {
        const tabs = document.querySelectorAll('.tab-content');
        const buttons = document.querySelectorAll('.tab-button');
        tabs.forEach(tab => tab.classList.add('hidden'));
        buttons.forEach(button => button.classList.remove('text-teal-700', 'border-b-2', 'border-teal-700'));
        document.getElementById(tabName).classList.remove('hidden');
        document.getElementById(`${tabName}-tab`).classList.add('text-teal-700', 'border-b-2', 'border-teal-700');
    }

    document.addEventListener('DOMContentLoaded', function() {
        showTab('event'); // Default tab
    });
</script>

@include('layouts.footer')
