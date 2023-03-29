<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
		<title>Test-Crud</title>
	</head>
	<body>
		<div class="container py-1 px-4 h-screen mx-auto bg-blue-200">
			<div class="my-4 rounded-xl glass shadow-lg py-1 px-4">
				{{-- Notification Toast --}}
				@if ($msg = Session::get('success'))
					<div class="alert-toast mt-3 mr-4 absolute right-0 md:w-full max-w-xs">
						<input type="checkbox" class="hidden" id="footertoast">
						<label class="close cursor-pointer flex justify-between p-3 bg-green-500 h-20 rounded-xl shadow-xl text-white font-bold" for="footertoast">
							{{ $msg }}
						<svg class="mt-1 fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 18 18">
							<path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
						</svg>
						</label>
					</div>
				@endif
				{{-- End of Notification Toast --}}
				<p class="font-bold text-blue-500 py-4 text-xl">
					List Data buku
				</p>
				<a href="{{ route('buku.create') }}">
					<button class="btn btn-sm mb-2 border-0 bg-green-500 bg-transparent hover:bg-green-600 rounded-lg text-white">
						Tambah
					</button>
				</a>
				<div class="mb-4 mt-2 rounded-xl bg-white shadow-md">
					<div class="overflow-hidden align-middle shadow-lg rounded-xl">
						<table class="table-auto w-full text-left">
							<thead class="text-blue-500 uppercase">
								<tr>
									<th class="w-28 py-4 pl-4 animate-pulse">Kode Buku</th>
									<th class="w-72 animate-pulse">Nama Buku</th>
									<th class="w-60 animate-pulse ">Kategory</th>
									<th class="w-60 animate-pulse">Detail</th>
									<th class="w-40 animate-pulse">Aksi</th>
								</tr>
							</thead>
							<tbody class="text-gray-600 bg-white">
								{{-- Data Table --}}
								@forelse ($bukus as $buku)
								<tr class="hover:bg-gray-200 hover:bg-opacity-50">
									<td class="px-4">{{ $buku->Kode_Buku }}</td>
									<td>{{ $buku->Nama_Buku }}</td>
									<td>{{ $buku->Kategori }}</td>
									<td>
										<div class="collapse"> 
											<input type="checkbox">
											<div class="collapse-title">
												<svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z" />
												</svg>
											</div> 
											<div class="collapse-content"> 
												<table class="table-auto text-sm">
													<tr>
														<th class="h-8 align-bottom text-blue-500">Penerbit dan Waktu Terbit</th>
													</tr>
													<tr>
														<td>{{ $buku->Penerbit }}, {{ $buku->Tanggal_Terbit }}</td>
													</tr>
													<tr>
														<th class="h-8 align-bottom text-blue-500">Deskripsi</th>
													</tr>
													<tr>
														<td>{{ $buku->Deskripsi }}</td>
												</table>
											</div>
										</div>
									</td>
									<td>
										<div class="flex">
											<a href="{{ route('buku.edit', $buku->id) }}">
												<button type="button" class="btn btn-sm border-0 bg-yellow-500 hover:bg-yellow-600 rounded-lg text-white mr-2"> Ubah </button>
											</a>
											<div x-data="{ show: false }">
												<button @click={show=true} type="button" class="btn btn-sm rounded-lg hover:bg-red-600 bg-red-500 border-0">Hapus</Button>
												<div x-show="show" tabindex="0" class="absolute inset-0 text-gray-700" id="overlay">
													<div  @click.away="show = false" class="z-50 relative mt-20 mx-auto max-w-md">
														<div class="bg-gray-100 max-w-sm px-3 py-3 rounded-xl ">
															<button @click={show=false} class="fill-current h-6 w-6 absolute right-0 top-0 m-6 font-3xl font-bold"></button>
															<h4 class="text-lg font-bold mb-2">Konfirmasi Hapus</h4>
															<div>
																<p>Data yang telah dihapus tidak bisa dikembalikan, yakin hapus data?</p>
															</div>
															<div class="mt-3 flex justify-end space-x-2">
																<button @click={show=false} type="button" class="btn btn-sm bg-gray-500 hover:bg-gray-600  border-0 rounded-lg ">Batal</button>
																<form action="{{ route('buku.destroy', $buku->id) }}" method="post">
																	@csrf
																	@method('DELETE')
																	<button class="btn btn-sm border-0 bg-red-500 hover:bg-red-600 rounded-lg text-white">Hapus</button>
																</form>
															</div>
														</div>
													</div>
													<div class="z-40 overflow-auto inset-0  fixed bg-black opacity-50"></div>
												</div>
											</div>
										</div>
									</td>
								</tr>
								@empty
								<tr>
									<td class="mb-5 align-middle text-center">Data Kosong</td>
								</tr>
								@endforelse
								{{-- End of Data Table --}}
							</tbody>
						</table>
						{{ $bukus->links('layouts/pagination') }}
					</div>
				</div>
			</div>
		</div>
		{{-- Notification Toast Style --}}
		<style>
			/*Toast open/load animation*/
			.alert-toast {
				-webkit-animation: slide-in-right 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
						animation: slide-in-right 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
			}
			/*Toast close animation*/
			.alert-toast input:checked ~ * {
				-webkit-animation: fade-out-right 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
						animation: fade-out-right 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
			}
			/* -------------------------------------------------------------
			* Animations generated using Animista * w: http://animista.net, 
			* ---------------------------------------------------------- */
			@-webkit-keyframes slide-in-top{0%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@keyframes slide-in-top{0%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}100%
			{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@-webkit-keyframes slide-out-top{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}}@keyframes slide-out-top{0%
				{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(-1000px);transform:translateY(-1000px);opacity:0}}@-webkit-keyframes slide-in-bottom{0%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}100%
				{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@keyframes slide-in-bottom{0%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@-webkit-keyframes slide-out-bottom{0%
					{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}}@keyframes slide-out-bottom{0%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}100%{-webkit-transform:translateY(1000px);
						transform:translateY(1000px);opacity:0}}@-webkit-keyframes slide-in-right{0%{-webkit-transform:translateX(1000px);transform:translateX(1000px);opacity:0}100%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}}@keyframes slide-in-right{0%{-webkit-transform:translateX(1000px);
							transform:translateX(1000px);opacity:0}100%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}}@-webkit-keyframes fade-out-right{0%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}100%{-webkit-transform:translateX(50px);transform:translateX(50px);opacity:0}}
							@keyframes fade-out-right{0%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}100%{-webkit-transform:translateX(50px);transform:translateX(50px);opacity:0}}
		</style>
	</body>
</html>