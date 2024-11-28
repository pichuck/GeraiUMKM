@extends('layouts.header')

@section('content')
<div class="container mx-auto py-10 mt-10">
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" viewBox="0 0 20 20"><path d="M14.348 5.652a1 1 0 10-1.414 1.414L10.414 10l-2.95-2.95a1 1 0 00-1.415 1.415L8.586 10l-2.95 2.95a1 1 0 101.415 1.415L10.414 10l2.95 2.95a1 1 0 101.415-1.415L12.242 10l2.95-2.95a1 1 0 000-1.414z"/></svg>
            </button>
        </div>
    @endif

    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-teal-400 to-blue-500 text-white py-4 px-6 rounded-t-lg">
            <h3 class="text-2xl font-semibold">{{ $project->posisi }}</h3>
        </div>
        <div class="p-6 space-y-4">
            <p><strong>Tempat Bekerja:</strong> {{ $project->tempat_bekerja }}</p>
            <p><strong>Deskripsi:</strong> {{ $project->deskripsi }}</p>
            <p><strong>Kategori:</strong> {{ $project->kategori }}</p>
            <p><strong>Posted by:</strong> {{ $project->user->name }}</p>

            <div class="flex space-x-4">
                <a href="{{ route('mahasiswa.pekerjaan') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-full hover:bg-gray-400">Back to Projects</a>
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600" onclick="showModal()">Apply</button>
            </div>
        </div>
    </div>
</div>

<!-- Apply Modal -->
<div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="applyModal" style="background-color: rgba(0, 0, 0, 0.3);">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md mx-auto p-6">
        <div class="flex justify-between items-center border-b pb-4 mb-4">
            <h5 class="text-lg font-semibold">Apply for {{ $project->posisi }}</h5>
            <button type="button" class="text-gray-500 hover:text-gray-700" onclick="closeModal()">✕</button>
        </div>
        <form action="{{ route('apply.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="nama" name="nama" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500 focus:ring-opacity-50" required>
                </div>

                <div>
                    <label for="deskripsi_diri" class="block text-sm font-medium text-gray-700">Deskripsi Diri</label>
                    <textarea id="deskripsi_diri" name="deskripsi_diri" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500 focus:ring-opacity-50" required></textarea>
                </div>

                <div>
                    <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                    <input type="text" id="jurusan" name="jurusan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500 focus:ring-opacity-50" required>
                </div>

                <div>
                    <label for="pengalaman_organisasi" class="block text-sm font-medium text-gray-700">Pengalaman Organisasi</label>
                    <div id="organisasi-list">
                        <input type="text" name="pengalaman_organisasi[]" placeholder="Pengalaman Organisasi 1" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500 focus:ring-opacity-50 mb-2">
                    </div>
                    <button type="button" class="text-blue-500 hover:text-blue-700" onclick="addOrganisasiField()">Tambah Pengalaman Organisasi</button>
                </div>

                <div>
                    <label for="pengalaman_kerja" class="block text-sm font-medium text-gray-700">Pengalaman Kerja</label>
                    <div id="kerja-list">
                        <input type="text" name="pengalaman_kerja[]" placeholder="Pengalaman Kerja 1" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500 focus:ring-opacity-50 mb-2">
                    </div>
                    <button type="button" class="text-blue-500 hover:text-blue-700" onclick="addKerjaField()">Tambah Pengalaman Kerja</button>
                </div>

                <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                <input type="hidden" name="id_project" value="{{ $project->id }}">
            </div>
            <div class="mt-6 flex justify-end space-x-4">
                <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-full hover:bg-gray-400" onclick="closeModal()">Close</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">Submit Application</button>
            </div>
        </form>
    </div>
</div>

<script>
    function showModal() {
        document.getElementById('applyModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('applyModal').classList.add('hidden');
    }

    function addOrganisasiField() {
        const container = document.getElementById('organisasi-list');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'pengalaman_organisasi[]';
        input.placeholder = 'Pengalaman Organisasi lainnya';
        input.classList.add('mt-1', 'block', 'w-full', 'border-gray-300', 'rounded-md', 'shadow-sm', 'focus:border-teal-500', 'focus:ring', 'focus:ring-teal-500', 'focus:ring-opacity-50', 'mb-2');
        container.appendChild(input);
    }

    function addKerjaField() {
        const container = document.getElementById('kerja-list');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'pengalaman_kerja[]';
        input.placeholder = 'Pengalaman Kerja lainnya';
        input.classList.add('mt-1', 'block', 'w-full', 'border-gray-300', 'rounded-md', 'shadow-sm', 'focus:border-teal-500', 'focus:ring', 'focus:ring-teal-500', 'focus:ring-opacity-50', 'mb-2');
        container.appendChild(input);
    }
</script>
@endsection
