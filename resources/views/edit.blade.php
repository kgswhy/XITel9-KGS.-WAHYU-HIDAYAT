<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<title>Test-Crud</title>
	</head>
	<body>
		<div class="container h-screen py-1 px-4 mx-auto bg-yellow-200">
			<div class="my-4 rounded-xl glass shadow-lg py-1 px-4">
				<p class="font-bold text-yellow-500 py-4 text-xl">
					Ubah Data Anggota
				</p>
				{{-- Error Alert  --}}
				@if (count($errors))
				<div class="alert bg-red-500 text-white block mb-4">
					@foreach ($errors->all() as $error)
					<div class="py-1">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 mx-2 stroke-current"> 
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>                         
						</svg> 
						<label>{{ $error }}</label>
					</div>
					@endforeach
				</div>
				@endif
				{{-- End Error Alert --}}
				<div class="mb-4 rounded-xl bg-white px-4 py-1">
					<div class="pb-2 pt-1 text-gray-600">
						<form action="{{ route('anggota.update', $anggotas->id) }}" method="post" class="grid grid-cols-3 gap-3">
							@method('PUT')
							@csrf
							<div class="form-control">
								<label class="label">
									<span class="label-text text-black animate-bounce">Nis</span>
								</label>
								<input type="text" name="Nis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 animate-pulse" value="{{$anggotas->Nis}}" >
							</div>
							<div class="form-control">
								<label class="label">
									<span class="label-text text-black animate-bounce">Nama</span>
								</label> 
								<input type="text" name="nama" placeholder="Masukkan Nama Anda" class="bg-gray-50 border animate-pulse border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $anggotas->nama }}">
							</div>
							<div class="form-control">
								<label class="label">
									<span class="label-text text-black animate-bounce">Kelas</span>
								</label> 
								<select class="bg-gray-50 border animate-pulse border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="Kelas">
									<option disabled="disabled" selected="selected">Pilih Kelas</option> 
									<option value="X" {{ $anggotas->Kelas == "X" ? 'selected' : '' }}> X</option>
									<option value="XI" {{ $anggotas->Kelas == "XI" ? 'selected' : '' }}> XI</option>
									<option value="XII" {{ $anggotas->Kelas == "XII" ? 'selected' : '' }}> XII</option>
								</select>
							</div>
							<div class="form-control">
								<label class="label">
									<span class="label-text text-black animate-bounce">Tempat Lahir</span>
								</label> 
								<input type="text" name="tempat_lahir" placeholder="Masukkan Tempat Lahir anda" class="bg-gray-50 border animate-pulse border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$anggotas->tempat_lahir}}">
							</div>
							<div class="form-control">
								<label class="label">
									<span class="label-text text-black animate-bounce">Tanggal Lahir</span>
								</label> 
								<div class="relative max-w-sm">
								  <input type="date" class="bg-gray-50 border border-gray-300 animate-pulse text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Tanggal Lahir anda" name="tanggal_lahir" value="{{$anggotas->tanggal_lahir}}">
								</div>
								
							</div>
							<div class="form-control">
								<label class="label">
									<span class="label-text text-black animate-bounce">Alamat</span>
								</label> 
								<input type="text" name="alamat" placeholder="Masukkan Alamat anda" class="bg-gray-50 border animate-pulse border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$anggotas->alamat}}">
							</div>
					
							<div class="flex justify-end col-span-3 space-x-1">
								<a href="{{ route('anggota.index') }}" class="mt-3">
									<button type="button" class="btn btn-sm border-0 bg-red-500 hover:bg-red-600 rounded-lg text-white mr-1"> Batal </button>
								</a>
								<button class="btn btn-sm mt-3 mb-1 right-0  border-0 bg-yellow-500 hover:bg-yellow-600 rounded-lg text-white">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/.min.js"></script>

	</body>
</html>
