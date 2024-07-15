<x-app-layout>
    <x-slot name="header">
        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <h2 class="text-xl font-semibold leading-tight">
                        {{ __('Kategori / Tampilkan Data') }}
                    </h2>
                </div>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="container mx-auto py-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Detail Kategori</h1>
            </div>
            <div class="mb-4">
                <p class="text-gray-400">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea recusandae praesentium totam, repellat molestias laboriosam magnam a, autem doloremque, blanditiis laudantium officiis minima. Provident ipsa porro veniam sint impedit placeat! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam distinctio dicta nulla quae consequatur inventore beatae nisi deleniti commodi repellat, impedit eaque. Blanditiis, ad harum laudantium dolorem repellat ipsam aspernatur!</p>
            </div>

            <div class="p-6 overflow-hidden  dark:bg-dark-eval-1">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">ID</label>
                    <p class="mt-1 text-gray-900 dark:text-gray-100 ring-1 ring-gray-300 dark:ring-gray-700 rounded-md p-2">{{ $kategori->id }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                    <p class="mt-1 text-gray-900 dark:text-gray-100 ring-1 ring-gray-300 dark:ring-gray-700 rounded-md p-2">{{ $kategori->nama }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Keterangan</label>
                    <p class="mt-1 text-gray-900 dark:text-gray-100 ring-1 ring-gray-300 dark:ring-gray-700 rounded-md p-2">{{ $kategori->keterangan }}</p>
                </div>
                <div class="flex justify-end gap-4 mt-8">
                    <a href="{{ route('kategori.index') }}" class="bg-red-600 hover:bg-red-800 text-white text-sm font-semibold py-2 px-4 rounded transition duration-300">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
