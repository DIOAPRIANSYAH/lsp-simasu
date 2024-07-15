<x-app-layout>
    <x-slot name="header">
        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <h2 class="text-xl font-semibold leading-tight">
                        {{ __('Kategori / Edit Data') }}
                    </h2>
                </div>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="container mx-auto py-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Edit Kategori</h1>
            </div>

            <div class="mb-4">
                <p class="text-gray-400">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea recusandae praesentium totam, repellat molestias laboriosam magnam a, autem doloremque, blanditiis laudantium officiis minima. Provident ipsa porro veniam sint impedit placeat! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam distinctio dicta nulla quae consequatur inventore beatae nisi deleniti commodi repellat, impedit eaque. Blanditiis, ad harum laudantium dolorem repellat ipsam aspernatur!</p>
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

            <div class="p-6 overflow-hidden  dark:bg-dark-eval-1">
                <form action="{{ route('kategori.update', $kategori->getEncryptedId()) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                        <input type="text" name="nama" id="nama" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300" value="{{ old('nama', $kategori->nama) }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="keterangan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300" required>{{ old('keterangan', $kategori->keterangan) }}</textarea>
                    </div>
                    <div class="flex justify-end gap-4 mt-8">
                        <button type="submit" class="bg-green-600 hover:bg-green-800 text-white text-sm font-semibold py-2 px-4 rounded transition duration-300">Simpan</button>
                        <a href="{{ route('kategori.index') }}" class="bg-red-600 hover:bg-red-800 text-white text-sm font-semibold py-2 px-4 rounded transition duration-300">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
