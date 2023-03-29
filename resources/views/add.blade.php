<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Test-crud</title>
</head>


<body>
    <div class="container h-screen py-1 px-4 mx-auto bg-green-200">
        <div class="my-4 rounded-xl glass shadow-lg py-1 px-4">
            <p class="font-bold text-green-500 py-4 text-xl">
                Tambah Data buku
            </p>
            {{-- Error Alert  --}}
            @if (count($errors))
                <div class="alert bg-red-500 text-white block mb-4">
                    @foreach ($errors->all() as $error)
                        <div class="py-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="w-6 h-6 mx-2 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                </path>
                            </svg>
                            <label>{{ $error }}</label>
                        </div>
                    @endforeach
                </div>
            @endif
            {{-- End Error Alert --}}
            <div class="mb-4 rounded-xl bg-white px-4 py-1">
                <div class="pb-2 pt-1 text-gray-600">
                    <form action="{{ route('buku.store') }}" method="post" class="grid grid-cols-3 gap-3">
                        @csrf
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-black animate-bounce">Kode Buku</span>
                            </label>
                            <input type="text" name="Kode_Buku"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 animate-pulse"
                                value="{{ old('Kode_Buku') }}" placeholder="Masukkan Nis anda">
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-black animate-bounce">Nama Buku</span>
                            </label>
                            <input type="text" name="Nama_Buku" placeholder="Masukkan Nama Anda"
                                class="bg-gray-50 border animate-pulse border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ old('Nama_Buku') }}">
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-black animate-bounce">Kategori</span>
                            </label>
                            <select
                                class="bg-gray-50 border animate-pulse border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="Kategori">
                                <option disabled="disabled" selected>Pilih Kategori Buku</option>
                                <option value="Pelajaran" {{ old('Kategori') == 'Pelajaran' ? 'selected' : '' }}> Pelajaran</option>
                                <option value="Pengayaan" {{ old('Kategori') == 'Pengayaan' ? 'selected' : '' }}> Pengayaan</option>
                                <option value="Referensi" {{ old('Kategori') == 'Referensi' ? 'selected="selected"' : '' }}> Referensi</option>
                            </select>
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-black animate-bounce">Penerbit</span>
                            </label>
                            <input type="text" name="Penerbit" placeholder="Masukkan Tempat Lahir anda"
                                class="bg-gray-50 border animate-pulse border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ old('Penerbit') }}">
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-black animate-bounce">Deskripsi</span>
                            </label>
                            <input type="text" name="Deskripsi" placeholder="Masukkan Deskripsi Buku anda"
                                class="bg-gray-50 border animate-pulse border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ old('Deskripsi') }}">
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-black animate-bounce">Tanggal Terbit</span>
                            </label>
                            <div class="relative max-w-sm">

                                <input  type="date"
                                    class="bg-gray-50 border border-gray-300 animate-pulse text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukkan Tanggal Lahir anda" value="{{ old('Tanggal_Terbit') }}" name="Tanggal_Terbit">
                            </div>
                        </div>





                        <div class="flex justify-end col-span-3 space-x-1">
                            <a href="{{ route('buku.index') }}" class="mt-3">
                                <button type="button"
                                    class="btn btn-sm border-0 bg-red-500 hover:bg-red-600 rounded-lg text-white mr-1">Batal</button>
                            </a>
                            <button
                                class="btn btn-sm mt-3 mb-1 right-0  border-0 bg-green-500 hover:bg-green-600 rounded-lg text-white animate-pulse">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/datepicker.min.js"></script>
</body>

</html>
