<x-app-layout>
    <x-slot name="header">
        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    {{ __('Kategori') }}
                </h2>
            </div>
        </div>
    </x-slot>


    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="container mx-auto py-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold leading-tight">
                    Daftar Kategori
                </h2>
            </div>

            <div class="mb-4">
                <p class="text-gray-400">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea recusandae praesentium totam, repellat molestias laboriosam magnam a, autem doloremque, blanditiis laudantium officiis minima. Provident ipsa porro veniam sint impedit placeat! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam distinctio dicta nulla quae consequatur inventore beatae nisi deleniti commodi repellat, impedit eaque. Blanditiis, ad harum laudantium dolorem repellat ipsam aspernatur!</p>
            </div>
            <form action="{{ route('kategori.index') }}" method="GET" class="mb-4">
                <div class="flex items-center max-w-lg mx-auto">
                    <span class="px-3 inline-block w-auto whitespace-nowrap">Cari Kategori</span>
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="text" id="search" name="search" value="{{ request()->input('search') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari..." required />
                    </div>
                    <button type="submit" class="inline-flex items-center py-2.5 px-3 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>Cari
                    </button>
                </div>
            </form>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6 dark:bg-green-900 dark:border-green-700 dark:text-green-300" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="p-6 overflow-hidden dark:bg-dark-eval-1">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md">
                        <thead>
                            <tr>
                                <th class="w-1/12 py-3 px-4 border border-b border-gray-300 dark:border-gray-600 uppercase font-semibold text-sm text-left text-gray-900 dark:text-gray-100">ID</th>
                                <th class="w-2/12 py-3 px-4 border border-b border-gray-300 dark:border-gray-600 uppercase font-semibold text-sm text-left text-gray-900 dark:text-gray-100">Nama</th>
                                <th class="w-6/12 py-3 px-4 border border-b border-gray-300 dark:border-gray-600 uppercase font-semibold text-sm text-left text-gray-900 dark:text-gray-100">Keterangan</th>
                                <th class="w-3/12 py-3 px-4 border border-b border-gray-300 dark:border-gray-600 uppercase font-semibold text-sm text-center text-gray-900 dark:text-gray-100">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 dark:text-gray-300">
                            @foreach($kategoris as $index => $kategori)
                            <tr>
                                <td class="w-1/12 py-3 px-4 border border-gray-300 dark:border-gray-600">{{ $index + 1 }}</td>
                                <td class="w-2/12 py-3 px-4 border border-gray-300 dark:border-gray-600">{{ $kategori->nama }}</td>
                                <td class="w-6/12 py-3 px-4 border border-gray-300 dark:border-gray-600">{{ $kategori->keterangan }}</td>
                                <td class="w-3/12 py-3 px-4 border border-gray-300 dark:border-gray-400 text-center">
                                    <a href="{{ route('kategori.show', $kategori->getEncryptedId()) }}" class="inline-block text-white mx-1  bg-blue-600 hover:bg-blue-800 rounded font-semibold text-sm px-2 py-1 transition duration-300">Lihat</a>
                                    <a href="{{ route('kategori.edit', $kategori->getEncryptedId()) }}" class="inline-block text-white mx-1 bg-green-600 hover:bg-green-800 rounded font-semibold text-sm px-2 py-1 mt-2 transition duration-300">Edit</a>
                                    <button class="inline-block text-white bg-red-600 hover:bg-red-800 rounded px-2 py-1 mt-2 mx-1 transition duration-300 delete-btn text-sm font-semibold"
                                            data-url="{{ route('kategori.destroy', $kategori->getEncryptedId()) }}">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="{{ route('kategori.create') }}" class="bg-green-600 hover:bg-green-800 mx-6 my-8 text-white text-sm font-semibold leading-tight py-2 px-4 transition duration-300 rounded">Tambah Kategori Baru</a>

        </div>
    </div>
    <script>
        // SweetAlert untuk konfirmasi penghapusan
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const url = this.getAttribute('data-url');

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Anda tidak akan dapat mengembalikan ini!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Mengirimkan request untuk menghapus data
                            fetch(url, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Terjadi kesalahan saat menghapus data.');
                                }
                                return response.json(); // Mengembalikan respons JSON jika ada
                            })
                            .then(data => {
                                // Menampilkan alert bahwa data berhasil dihapus
                                Swal.fire({
                                    title: 'Sukses!',
                                    text: 'Data berhasil dihapus.',
                                    icon: 'success'
                                }).then(() => {
                                    // Redirect ke halaman index
                                    window.location.href = '{{ route('kategori.index') }}';
                                });
                            })
                            .catch(error => {
                                Swal.fire({
                                    title: 'Sukses!',
                                    text: 'Data berhasil dihapus.',
                                    icon: 'success'
                                }).then(() => {
                                    // Redirect ke halaman index
                                    window.location.href = '{{ route('kategori.index') }}';
                                });
                            });
                        }
                    });
                });
            });
        });
    </script>

</x-app-layout>
