<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Arsip') }}
        </h2>
    </x-slot>

    {{-- Edit Arsip --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('arsip.update', $arsip->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="judul" class="sr-only">Judul</label>
                            <input type="text" name="judul" id="judul" placeholder="Judul" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('judul') border-red-500 @enderror" value="{{ $arsip->judul }}">

                            @error('judul')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="keterangan" class="sr-only">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" cols="30" rows="4" placeholder="Keterangan" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('keterangan') border-red-500 @enderror">{{ $arsip->keterangan }}</textarea>

                            @error('keterangan')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="file" class="sr-only">File</label>
                            <input type="file" name="file" id="file" placeholder="File" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('file') border-red-500 @enderror" value="{{ $arsip->file }}">

                            @error('file')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Edit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

</x-app-layout>
