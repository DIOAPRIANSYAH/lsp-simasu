<x-app-layout>
    <x-slot name="header">
        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    {{ __('Arsip / Edit Data') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden dark:bg-dark-eval-1">
        <div class="container mx-auto py-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Edit Arsip</h1>
            </div>

            <div class="mb-4">
                <p class="text-gray-400">Silakan perbarui informasi arsip berikut.</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6 dark:bg-red-900 dark:border-red-700 dark:text-red-300" role="alert">
                    <strong class="font-bold">Whoops!</strong>
                    <span class="block sm:inline">Ada masalah dengan inputan Anda.</span>
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="p-6 overflow-hidden dark:bg-dark-eval-1">
                <form action="{{ route('arsip.update', $arsip->getEncryptedId()) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="no_surat" class="block text-sm font-medium text-gray-700 dark:text-gray-300">No. Surat</label>
                        <input type="text" name="no_surat" id="no_surat" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300" value="{{ old('no_surat', $arsip->no_surat) }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="id_kategori" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kategori</label>
                        <select name="id_kategori" id="id_kategori" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300" required>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" {{ $kategori->id == $arsip->id_kategori ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="judul" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul</label>
                        <input type="text" name="judul" id="judul" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300" value="{{ old('judul', $arsip->judul) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="file_surat" class="block text-sm font-medium text-gray-700 dark:text-gray-300">File Surat (PDF)</label>
                        <input type="file" name="file_surat" id="file_surat" accept=".pdf" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                        @if ($arsip->file_surat)
                            <p class="text-gray-500 mt-2">File saat ini: <a href="{{ $arsip->file_surat }}" target="_blank">{{ basename($arsip->file_surat) }}</a></p>
                        @endif
                    </div>

                    <div class="flex justify-end gap-4 mt-8">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white text-sm font-semibold py-2 px-4 rounded transition duration-300">Simpan</button>
                        <a href="{{ route('arsip.index') }}" class="bg-red-600 hover:bg-red-800 text-white text-sm font-semibold py-2 px-4 rounded transition duration-300">Batal</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
