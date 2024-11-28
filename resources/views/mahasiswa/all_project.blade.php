@extends('layouts.header')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<style>
    .card {
        transition: transform 0.3s ease-in-out;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .list-group-item {
        transition: background-color 0.3s ease;
    }
    .list-group-item:hover {
        background-color: #f8f9fa;
    }
    .btn-primary {
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        transform: scale(1.05);
    }
    .category-filter {
        cursor: pointer;
        padding: 5px 10px;
        margin: 5px;
        border-radius: 15px;
        background-color: #f0f0f0;
        transition: all 0.3s ease;
        display: inline-block;
    }
    .category-filter.active {
        background-color: #0DBDE5;
        color: white;
    }
    @media (max-width: 768px) {
        .container {
            padding-left: 15px;
            padding-right: 15px;
        }
        h1 {
            font-size: 2rem;
        }
        .card-header h5 {
            font-size: 1.2rem;
        }
    }
</style>
<div class="container py-5">
    <h1 class="mb-4 text-center text-4xl font-bold animate__animated animate__fadeInDown">Project UMKM</h1>

    <div id="category-filters" class="mb-4 text-center flex flex-wrap justify-center"></div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4" id="category-container">
        @foreach($categories as $category)
            <div class="animate__animated animate__fadeInUp" data-category="{{ $category }}">
                <div class="card h-full shadow-lg hover:shadow-2xl transition-shadow duration-300 rounded-lg overflow-hidden mt-3">
                    <div class="card-header text-white p-4" style="background: linear-gradient(135deg, #0DBDE5, #2DB08B);">
                        <h5 class="mb-0 text-xl font-semibold">{{ $category }}</h5>
                    </div>
                    <div class="card-body p-0">
                        @if($projects->has($category))
                            <ul class="list-group list-group-flush">
                                @foreach($projects[$category]->where('status', 'active') as $project)
                                    <li class="list-group-item p-4 hover:bg-gray-100 transition-colors duration-200">
                                        <h6 class="font-bold mb-2">{{ $project->posisi }}</h6>
                                        <p class="mb-3 text-gray-600">{{ $project->tempat_bekerja }}</p>
                                        <a href="{{ route('mahasiswa.pekerjaan.show', $project->id) }}" class="btn btn-primary btn-sm rounded-full px-4 py-2 hover:bg-blue-600 transition-colors duration-200 inline-block">View Details</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="p-4 text-center text-gray-500">No projects in this category.</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // Add category filters
    var categories = {!! json_encode($categories) !!};
    categories.forEach(function(category) {
        $('#category-filters').append('<span class="category-filter" data-category="' + category + '">' + category + '</span>');
    });

    // Filter functionality
    $('.category-filter').click(function() {
        var category = $(this).data('category');
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $('[data-category]').show();
        } else {
            $('.category-filter').removeClass('active');
            $(this).addClass('active');
            $('[data-category]').hide();
            $('[data-category="' + category + '"]').show();
        }
    });

    // Animate elements on scroll
    function animateOnScroll() {
        $('.animate__animated').each(function() {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();

            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $(this).addClass('animate__fadeInUp');
            }
        });
    }

    $(window).on('scroll', animateOnScroll);
    animateOnScroll(); // Run once on page load
});
</script>

@include('layouts.footer')
@endsection
