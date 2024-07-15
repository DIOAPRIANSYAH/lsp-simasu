<x-app-layout>
    <x-slot name="header">
        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    {{ __('Arsip / Tampilkan Data') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="container mx-auto py-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Detail Arsip</h1>
            </div>
            <div class="mb-4">
                <p class="text-gray-400">Informasi detail mengenai arsip.</p>
            </div>

            <div class="p-6 overflow-hidden dark:bg-dark-eval-1">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor Surat</label>
                    <p class="mt-1 text-gray-900 dark:text-gray-100 ring-1 ring-gray-300 dark:ring-gray-700 rounded-md p-2">{{ $arsip->no_surat }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kategori</label>
                    <p class="mt-1 text-gray-900 dark:text-gray-100 ring-1 ring-gray-300 dark:ring-gray-700 rounded-md p-2">{{ $arsip->kategori->nama }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul</label>
                    <p class="mt-1 text-gray-900 dark:text-gray-100 ring-1 ring-gray-300 dark:ring-gray-700 rounded-md p-2">{{ $arsip->judul }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Waktu Pengarsipan</label>
                    <p class="mt-1 text-gray-900 dark:text-gray-100 ring-1 ring-gray-300 dark:ring-gray-700 rounded-md p-2">
                        {{ $arsip->waktu_pengarsipan instanceof \Carbon\Carbon ? $arsip->waktu_pengarsipan->format('d M Y H:i') : $arsip->waktu_pengarsipan }}
                    </p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">File Surat</label>
                    @if ($arsip->file_surat)
                        @if (Str::endsWith($arsip->file_surat, ['.jpg', '.jpeg', '.png', '.gif', '.bmp', '.svg']))
                            <img src="{{ $arsip->file_surat }}" alt="Preview File" class="max-w-full h-auto">
                        @elseif (Str::endsWith($arsip->file_surat, ['.pdf']))
                            <embed src="{{ $arsip->file_surat }}" type="application/pdf" width="100%" height="600px">
                        @else
                            <a href="{{ $arsip->file_surat }}" target="_blank">Download File</a>
                        @endif
                    @else
                        <p class="text-gray-900 dark:text-gray-100 ring-1 ring-gray-300 dark:ring-gray-700 rounded-md p-2">File tidak tersedia.</p>
                    @endif
                </div>
                <div class="flex justify-start gap-4 mt-8">
                    <a href="{{ route('arsip.index') }}" class="bg-red-600 hover:bg-red-800 text-white text-sm font-semibold py-2 px-4 rounded transition duration-300">Kembali</a>
                    @if ($arsip->file_surat)
                        <a href="{{ $arsip->file_surat }}" class="bg-yellow-600 hover:bg-yellow-800 text-white text-sm font-semibold py-2 px-4 rounded transition duration-300" download>Unduh</a>
                    @endif
                    <a href="{{ route('arsip.edit', $arsip->getEncryptedId()) }}" class="bg-green-600 hover:bg-green-800 text-white text-sm font-semibold py-2 px-4 rounded transition duration-300">Edit/Ganti File</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
