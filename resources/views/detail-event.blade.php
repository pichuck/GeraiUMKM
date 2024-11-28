<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link href="{{ asset('assets/img/logo.png') }}" rel="icon" type="image/png">


    <meta name="description" content="{{ $artikel->judul }}" />
    <meta name="keywords" content="event, UMKM, {{ $artikel->judul }}" />

    <title>{{ $artikel->judul }} | GeraiUMKM</title>

    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        .img-zoomin {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .img-zoomin:hover {
            transform: scale(1.05);
        }

        .article-content {
            line-height: 1.8;
            font-size: 1.1rem;
        }
    </style>
</head>

<body class="bg-gray-50">
    @include('layouts.header')

    <!-- Event Detail Section Start -->
    <div class="container mx-auto py-10 px-4 mt-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="col-span-2">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-8" data-aos="fade-up">
                    <img src="{{ Storage::url($artikel->foto) }}" class="img-zoomin" alt="{{ $artikel->judul }}">
                    <div class="p-6">
                        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $artikel->judul }}</h1>
                        <!-- Meta Info -->
                        <div class="flex items-center text-gray-500 space-x-4 mb-4">
                            <span><i class="far fa-clock mr-1"></i> {{ $artikel->created_at->diffForHumans() }}</span>
                            <span><i class="far fa-eye mr-1"></i> {{ number_format($artikel->views) }} Views</span>
                            <span><i class="fas fa-share-alt mr-1"></i> {{ number_format($artikel->shares) }} Shares</span>
                            <span><i class="far fa-comment-dots mr-1"></i> {{ $artikel->comments_count ?? rand(5, 50) }} Comments</span>
                        </div>
                        <div class="article-content text-gray-700">
                            {!! nl2br(e($artikel->isi)) !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="bg-white rounded-lg shadow-lg p-6" data-aos="fade-left">
                <h3 class="text-2xl font-semibold mb-4">Related Articles</h3>
                <div class="space-y-4">
                    @foreach ($relatedArticles as $related)
                        <div class="flex space-x-4" data-aos="fade-up">
                            <img src="{{ Storage::url($related->foto) }}" class="w-24 h-24 rounded-lg object-cover" alt="{{ $related->judul }}">
                            <div>
                                <a href="{{ route('event.detail', $related->id) }}" class="text-lg font-semibold text-gray-800 hover:text-teal-600">{{ $related->judul }}</a>
                                <p class="text-gray-500 text-sm"><i class="far fa-clock mr-1"></i> {{ $related->created_at->diffForHumans() }}</p>
                                <p class="text-gray-500 text-sm"><i class="far fa-eye mr-1"></i> {{ number_format($related->views) }} Views</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Event Detail Section End -->

    <!-- AOS Animation Script -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'slide',
            once: true,
            mirror: false,
        });
    </script>

    @include('layouts.footer')
</body>

</html>
