<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Arsip') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    {{-- Pencarian Arsip --}}
                    <form action="{{ route('arsip.index') }}" method="GET">
                        <div class="mb-4 flex">
                            <label for="cari" class="sr-only">Cari</label>
                            <input type="text" name="cari" id="cari" placeholder="Cari Judul" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('cari') }}">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium ">Cari</button>
                        </div>

                    </form>
                    <a href="{{ route('arsip.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Arsip</a>
                    <table class="table-auto w-full mt-20">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">No</th>
                                <th class="px-4 py-2">Judul</th>
                                <th class="px-4 py-2">Keterangan</th>
                                <th class="px-4 py-2">Dokumen</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($arsips as $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $item->id }}</td>
                                <td class="border px-4 py-2">{{ $item->judul }}</td>
                                <td class="border px-4 py-2">{{ $item->keterangan }}</td>
                                <td class="border px-4 py-2">
                                    @if ($item->nama_file)

                                    <a clas="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ asset('storage/arsip_digital/' . $item->nama_file) }}" target="_blank">
                                   Download
                                    </a>
                                    @endif
                                </td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('arsip.edit', $item->id) }}"
                                         class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                    <form action="{{ route('arsip.destroy', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $arsips->links() }}
                </div>
            </div>
        </div>

</x-app-layout>
