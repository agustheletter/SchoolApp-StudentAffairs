<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Dispensation | StudentAffairs</title>
    <link rel="stylesheet" href="{{ asset('usercss/customs.css') }}">
    <link rel="icon" href="{{ asset('PhotoLanding/caplogo.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--single {
            height: 42px;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            padding: 0.5rem;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
        }
        .form-input {
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            padding: 0.5rem 1rem;
        }
        .form-input:focus {
            border-color: #2d356b;
            box-shadow: 0 0 0 0.2rem rgba(45, 53, 107, 0.25);
        }
    </style>
</head>
<body class="overflow-x-hidden">

    {{-- Navigation Bar --}}
    <header id="navbar" class="fixed top-0 w-full z-50 transition duration-300 bg-[#2d356b] py-6 px-5">
        <div class="mx-12 flex justify-between items-center">
            {{-- Logo and Name (Left) --}}
            <a href="{{ route('landingpage') }}" class="flex items-center justify-center gap-2 group">
                <img src="{{ asset('PhotoLanding/caplogohd.png') }}" alt="" class="w-7 h-7 mx-auto drop-shadow-xl">
                <h1 class="text-xl font-semibold text-slate-100 drop-shadow-xl hover:text-white transition duration-300">StudentAffairs</h1>
            </a>

            {{-- Centered Navigation with Animated Underlines --}}
            <nav class="flex items-center justify-center gap-8 absolute left-1/2 transform -translate-x-1/2">
                <div class="group">
                    <a href="home" class="relative text-slate-200 hover:text-white transition duration-300">
                        Home
                        <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-slate-100 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </div>
                <div class="group">
                    <a href="home" class="relative text-slate-200 hover:text-white transition duration-300">
                        Features
                        <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-slate-100 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </div>
                <div class="group">
                    <a href="home" class="relative text-slate-200 hover:text-white transition duration-300">
                        About
                        <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-slate-100 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </div>
                <div class="group">
                    <a href="home" class="relative text-slate-200 hover:text-white transition duration-300">
                        Contact
                        <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-slate-100 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </div>
            </nav>

            {{-- Login Button (Right) --}}
            <div class="ml-auto">
                <a href="{{ route('login') }}" class="relative px-6 py-2 rounded-md shadow-lg transition-all duration-500 ease-[cubic-bezier(0.68,-0.55,0.265,1.55)] group overflow-hidden">
                    <span class="relative z-10 text-white group-hover:text-[#353d7b] transition-colors duration-300">Login</span>
                    <span class="absolute inset-0 bg-[#353d7b] rounded-md"></span>
                    <span class="absolute inset-0 bg-white rounded-md transform origin-bottom scale-y-0 group-hover:scale-y-100 transition-transform duration-500"></span>
                </a>
            </div>
        </div>
    </header>

    {{-- Form Section --}}
    <section id="form" class="relative min-h-screen pt-[88px] flex items-center justify-center overflow-hidden bg-white">
        <div class="w-full max-w-4xl mx-auto p-8">
            <div class="bg-white rounded-xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-[#2d356b] mb-6 text-center">Form Permohonan Dispensasi</h2>
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('dispen.store') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Alasan Dispensasi --}}
                        <div class="col-span-2">
                            <label for="namadispen" class="block text-gray-700 mb-2">Alasan Dispensasi</label>
                            <input type="text" id="namadispen" name="namadispen" 
                                   class="form-input w-full" required
                                   placeholder="Masukkan alasan dispensasi">
                        </div>
                        
                        {{-- Waktu Dimulai --}}
                        <div>
                            <label for="waktumulai" class="block text-gray-700 mb-2">Waktu Dimulai</label>
                            <input type="datetime-local" id="waktumulai" name="waktumulai" 
                                   class="form-input w-full" required>
                        </div>
                        
                        {{-- Waktu Selesai --}}
                        <div>
                            <label for="waktuselesai" class="block text-gray-700 mb-2">Waktu Selesai</label>
                            <input type="datetime-local" id="waktuselesai" name="waktuselesai" 
                                   class="form-input w-full" required>
                        </div>
                        
                        {{-- Guru yang mengizinkan --}}
                        <div>
                            <label for="idguru" class="block text-gray-700 mb-2">Guru yang Mengizinkan</label>
                            <select id="idguru" name="idguru" class="w-full select2-guru" required>
                                <option value="">Pilih Guru</option>
                                @foreach($gurus as $guru)
                                    <option value="{{ $guru->idguru }}">{{ $guru->namaguru }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        {{-- Siswa --}}
                        <div>
                            <label for="idsiswa" class="block text-gray-700 mb-2">Siswa</label>
                            <select id="idsiswa" name="idsiswa[]" class="w-full select2-siswa" multiple="multiple" required>
                                @foreach($siswas as $siswa)
                                    <option value="{{ $siswa->idsiswa }}">{{ $siswa->namasiswa }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="mt-8 text-center">
                        <button type="submit" 
                                class="px-6 py-3 bg-[#2d356b] text-white rounded-lg font-medium hover:bg-[#3d488f] transition duration-300">
                            Ajukan Dispensasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-[#2d356b] text-white text-center py-6">
        <p>&copy; 2025 Student Affairs. Developed by Software Engineers of SMKN 1 Cimahi.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Select2 for Guru
            $('.select2-guru').select2({
                placeholder: "Pilih Guru",
                allowClear: true
            });
            
            // Initialize Select2 for Siswa (multiple selection)
            $('.select2-siswa').select2({
                placeholder: "Pilih Siswa",
                allowClear: true,
                closeOnSelect: false
            });
            
            // Set minimum datetime for waktu selesai based on waktu mulai
            $('#waktumulai').change(function() {
                $('#waktuselesai').attr('min', $(this).val());
            });
        });
    </script>
</body>
</html>