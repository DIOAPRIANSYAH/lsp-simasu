<x-app-layout>
    <x-slot name="header">
        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    {{ __('About') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="flex justify-center items-center">
                <div class="rounded overflow-hidden w-80 h-80">
                    <img src="{{ asset('DIO.jpg') }}" alt="Profile Image" class="w-full h-full object-cover">
                </div>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Dio Apriansyah</h1>
                <p class="text-gray-500 dark:text-gray-400 mb-4">Web Developer</p>
                <p class="text-gray-700 dark:text-gray-300">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed varius urna vel mi rutrum, id fringilla ante tincidunt. Integer vitae vestibulum nunc. Mauris eu odio ultrices, fermentum dolor sed, cursus velit. Integer interdum ligula ut augue maximus fermentum.</p>

                <div class="mt-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Nomor Induk Mahasiswa</h2>
                    <p class="text-gray-700 dark:text-gray-300">2131750005</p>
                </div>
                <div class="mt-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Program Studi</h2>
                    <p class="text-gray-700 dark:text-gray-300">D-III Manajemen Informatika PSDKU Pamekasan</p>
                </div>
                <div class="mt-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Jurusan</h2>
                    <p class="text-gray-700 dark:text-gray-300">Teknologi Informasi</p>
                </div>
                <div class="mt-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Perguruan Tinggi</h2>
                    <p class="text-gray-700 dark:text-gray-300">Politeknik Negeri Malang</p>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
