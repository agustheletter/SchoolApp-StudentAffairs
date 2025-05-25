<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home | StudentAffairs</title>
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <link rel="stylesheet" href="{{ asset('usercss/customs.css') }}">
        <link rel="icon" href="{{ asset('PhotoLanding/caplogo.png') }}" type="image/x-icon">
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

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
                        <a href="#home" class="relative text-slate-200 hover:text-white transition duration-300">
                            Home
                            <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-slate-100 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                    </div>
                    <div class="group">
                        <a href="#features" class="relative text-slate-200 hover:text-white transition duration-300">
                            Features
                            <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-slate-100 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                    </div>
                    <div class="group">
                        <a href="#about" class="relative text-slate-200 hover:text-white transition duration-300">
                            About
                            <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-slate-100 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                    </div>
                    <div class="group">
                        <a href="#contact" class="relative text-slate-200 hover:text-white transition duration-300">
                            Contact
                            <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-slate-100 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                    </div>
                </nav>

                {{-- Login Button (Right) --}}
                <div class="ml-auto">
                    <a href="{{ route('login') }}" class="relative px-6 py-2 rounded-md shadow-lg transition-all duration-500 ease-[cubic-bezier(0.68,-0.55,0.265,1.55)] group overflow-hidden">
                        {{-- Text that changes color on hover --}}
                        <span class="relative z-10 text-white group-hover:text-[#353d7b] transition-colors duration-300">Login</span>
                        
                        {{-- Brighter navy background (unhovered) --}}
                        <span class="absolute inset-0 bg-[#353d7b] rounded-md"></span>
                        
                        {{-- White background fill on hover --}}
                        <span class="absolute inset-0 bg-white rounded-md transform origin-bottom scale-y-0 group-hover:scale-y-100 transition-transform duration-500"></span>
    
                    </a>
                </div>

            </div>
        </header>

        {{-- Home Section --}}
        <section id="home" class="relative min-h-screen pt-[88px] flex items-center justify-center text-center overflow-hidden bg-white">
            {{-- Navy Blue Circle Background --}}
            <div class="absolute top-[-3000px] left-1/2 -translate-x-1/2 w-[3600px] h-[3600px] bg-[#2d356b] rounded-full z-0"></div>
            <div class="absolute inset-0 -z-10 h-full w-full bg-white bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px]"></div>

            {{-- Content --}}
            <div class="relative z-10 container mx-auto px-6">
                {{-- Logo with tighter spacing --}}
                <div class="mb-8"data-aos="fade-down" data-aos-duration="800"> <!-- Reduced mb-12 to mb-8 -->
                    <img src="{{ asset('PhotoLanding/caplogohd.png') }}" alt="StudentAffairs Logo" class="w-32 h-32 mx-auto">
                </div>

                {{-- Text content with tighter spacing --}}
                <div class="mb-10"> <!-- Wrapper div for better spacing control -->
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4" data-aos="fade-up" data-aos-delay="200"> <!-- Reduced mb-6 to mb-4 -->
                        <span class="typewriter">Welcome to <span class="text-[#5461c2]">StudentAffairs</span></span>
                    </h1>
                    
                    <p class="text-xl text-white max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="400"> <!-- Removed mb-12 here -->
                        Ajukan Surat Dispensasi Sekolah dengan Cepat dan Mudah
                    </p>
                </div>

                {{-- Enhanced CTA Button --}}
                <div data-aos="fade-up" data-aos-delay="600">
                    <a href="{{ route('Request') }}" class="cta-button relative inline-block px-8 py-3 bg-[#3d488f] text-white rounded-lg font-medium overflow-hidden group">
                        <span class="relative z-10">Ajukan Dispensasi</span>
                        <span class="absolute inset-0 bg-[#3a478a] rounded-lg transform origin-bottom scale-y-0 group-hover:scale-y-100 transition-transform duration-300 ease-[cubic-bezier(0.68,-0.55,0.265,1.55)]"></span>
                        <span class="absolute inset-0 border-2 border-white rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    </a>
                </div>

                <style>
                    .cta-button {
                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                        transition: all 0.3s ease;
                    }
                    .cta-button:hover {
                        scale: 1.05;
                        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
                    }
                    .cta-button:active {
                        transform: translateY(1px);
                    }
                </style>
            </div>
        </section> 

        {{-- Features Section --}}
        <section id="features" class="py-36 min-h-screen relative bg-white overflow-hidden">
            <!-- Blueprint Background with White Fade -->
            <div class="absolute inset-0 pointer-events-none">
                <!-- Blueprint pattern -->
                <div class="absolute inset-0 bg-[linear-gradient(to_right,#2d356b1a_1px,transparent_1px),linear-gradient(to_bottom,#2d356b1a_1px,transparent_1px)] bg-[size:40px_40px]"></div>
                <!-- Top fade -->
                <div class="absolute top-0 left-0 right-0 h-32 bg-gradient-to-b from-white to-transparent"></div>
                <!-- Bottom fade -->
                <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-white to-transparent"></div>
            </div>

            <div class="container mx-auto px-6 text-center relative z-10">
                <!-- Header with faster animations -->
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold text-[#2d356b]" 
                        data-aos="fade-down" 
                        data-aos-duration="400" 
                        data-aos-easing="ease-out-cubic"
                        data-aos-once="false">
                        Features
                    </h2>
                    <p class="text-lg text-gray-600 mt-2" 
                    data-aos="fade-down" 
                    data-aos-delay="100"
                    data-aos-duration="400"
                    data-aos-easing="ease-out-cubic"
                    data-aos-once="false">
                        Simple, yet effective. Our website focuses on making the process of requesting dispensation easy and hassle-free.
                    </p>
                </div>

                <!-- Feature Cards with interactive hover -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Left Card -->
                    <div class="px-8 py-12 bg-white rounded-xl shadow-lg border border-[#2d356b]/10"
                        data-aos="fade-right" 
                        data-aos-delay="300"
                        data-aos-duration="1000"
                        data-aos-easing="ease-out-back"
                        data-aos-once="false">
                        <div class="text-[#2d356b] mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#2d356b] mb-3">Student Records</h3>
                        <p class="text-gray-600">Comprehensive digital records for all students with automated data synchronization.</p>
                    </div>
                    
                    <!-- Middle Card -->
                    <div class="px-8 py-12 bg-white rounded-xl shadow-lg border border-[#2d356b]/10"
                        data-aos="fade-up" 
                        data-aos-delay="400"
                        data-aos-duration="1000"
                        data-aos-easing="ease-out-back"
                        data-aos-once="false">
                        <div class="text-[#2d356b] mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#2d356b] mb-3">Streamlined Attendance & Violation Monitoring</h3>
                        <p class="text-gray-600">Efficiently track and manage student attendance records and disciplinary violations with precision.</p>
                    </div>
                    
                    <!-- Right Card -->
                    <div class="px-8 py-12 bg-white rounded-xl shadow-lg border border-[#2d356b]/10"
                        data-aos="fade-left" 
                        data-aos-delay="250"
                        data-aos-duration="1000"
                        data-aos-easing="ease-out-back"
                        data-aos-once="false">
                        <div class="text-[#2d356b] mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#2d356b] mb-3">Automated Dispensation Processing</h3>
                        <p class="text-gray-600">Seamlessly submit, review, and oversee student dispensations through an intuitive system.</p>
                    </div>
                </div>
            </div>
        </section>
            

        {{-- About Section --}}
        <section id="about" class="relative min-h-screen flex items-center overflow-hidden bg-white py-20">
            <div class="container mx-auto px-6 md:px-12 relative z-10">
                <div class="flex flex-col lg:flex-row items-center">
                    {{-- Text Content --}}
                    <div class="lg:w-1/2 mb-16 lg:mb-0" data-aos="fade-right" data-aos-duration="800">
                        <h2 class="text-4xl md:text-5xl font-bold text-[#2d356b] mb-6">
                            <span class="inline-block">About Our Platform</span>
                        </h2>
                        
                        <p class="text-gray-600 mb-6 text-lg leading-relaxed"> Aplikasi StudentAffairs merupakan proyek tugas akhir mata pelajaran Pengembangan Website yang dibangun dengan Laravel dan MySQL. Platform ini dirancang untuk membantu divisi Kesiswaan dalam mengelola administrasi akademik dan perilaku peserta didik secara terpusat. Fitur utama mencakup penyimpanan data siswa digital, pemantauan kehadiran dan pelanggaran, serta pengelolaan dispensasi yang terintegrasi dalam satu sistem untuk memudahkan pelacakan dan pelaporan data. </p>
                        
                        <div class="space-y-4">
                            <div class="flex items-start" data-aos="fade-up" data-aos-delay="100">
                                <div class="flex-shrink-0 mt-1 mr-4">
                                    <div class="w-8 h-8 rounded-full bg-[#2d356b] flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <p class="text-gray-700">Sistem terintegrasi untuk manajemen data siswa yang akurat</p>
                            </div>
                            
                            <div class="flex items-start" data-aos="fade-up" data-aos-delay="200">
                                <div class="flex-shrink-0 mt-1 mr-4">
                                    <div class="w-8 h-8 rounded-full bg-[#2d356b] flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <p class="text-gray-700">Monitoring kehadiran dan pelanggaran secara cepat dan terorganisir</p>
                            </div>
                            
                            <div class="flex items-start" data-aos="fade-up" data-aos-delay="300">
                                <div class="flex-shrink-0 mt-1 mr-4">
                                    <div class="w-8 h-8 rounded-full bg-[#2d356b] flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <p class="text-gray-700">Proses dispensasi yang mudah dan terdigitalisasi</p>
                            </div>
                        </div>
                    
                    </div>
                    
                    {{-- Visual Element --}}
                    <div class="lg:w-1/2 lg:pl-16 relative" data-aos="fade-left" data-aos-duration="800">
                        <div class="relative">
                            <div class="absolute -top-10 -left-10 w-64 h-64 bg-[#2d356b] bg-opacity-10 rounded-lg" data-aos="fade" data-aos-delay="500"></div>
                            <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-[#2d356b] bg-opacity-5 rounded-lg" data-aos="fade" data-aos-delay="700"></div>
                            <div class="relative bg-white p-8 rounded-xl shadow-2xl border border-gray-100" data-aos="zoom-in" data-aos-delay="300">
                                <div class="flex justify-center mb-6">
                                    <div class="w-20 h-20 rounded-full bg-[#2d356b] flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold text-[#2d356b] text-center mb-4">Our Vision</h3>
                                <p class="text-gray-600 text-center">
                                    Menyederhanakan administrasi kesiswaan sekolah melalui solusi digital yang efisien dan terintegrasi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Decorative Elements --}}
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
                <div class="absolute top-20 right-20 w-40 h-40 rounded-full bg-[#2d356b] bg-opacity-5" data-aos="fade-left" data-aos-delay="900"></div>
                <div class="absolute bottom-1/4 left-10 w-32 h-32 rounded-full bg-[#2d356b] bg-opacity-5" data-aos="fade-right" data-aos-delay="900"></div>
            </div>
        </section>

        {{-- Contact Section --}}
        <section id="contact" class="relative min-h-screen flex items-center justify-center overflow-hidden bg-white">
            <!-- Blueprint Background with White Fade -->
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute inset-0 bg-[linear-gradient(to_right,#2d356b1a_1px,transparent_1px),linear-gradient(to_bottom,#2d356b1a_1px,transparent_1px)] bg-[size:40px_40px]"></div>
                <div class="absolute top-0 left-0 right-0 h-32 bg-gradient-to-b from-white to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-white to-transparent"></div>
            </div>

            <div class="container mx-auto px-6 py-24 relative z-10">
                <!-- Header -->
                <div class="text-center mb-16" data-aos="fade-down">
                    <h2 class="text-4xl font-bold text-[#2d356b] mb-4">Contact Us</h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto" data-aos="fade-down" data-aos-delay="100">
                        Get in touch with our development team for any inquiries or collaborations.
                    </p>
                </div>

                <!-- Profile Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                    <!-- Your Profile Card -->
                        <div class="bg-white rounded-xl shadow-lg p-8 transition-all duration-300" data-aos="fade-right">
                            <!-- Profile Picture -->
                            <div class="relative w-24 h-24 mx-auto mb-6 group" data-aos="zoom-in" data-aos-delay="200">
                            <div class="absolute inset-0 rounded-full border-2 border-transparent group-hover:border-[#2d356b] transition-all duration-300"></div>
                            <div class="w-full h-full rounded-full bg-gray-200 overflow-hidden mx-auto border-2 border-white transform transition duration-300 group-hover:scale-110 hover:border-[#2d356b]">
                                <img src="PhotoLanding/andhika.png" alt="Andhika Farizky Mansyur" class="w-full h-full object-cover">
                            </div>
                        </div>
                        
                        <!-- Name -->
                        <h3 class="text-2xl font-bold text-[#2d356b] text-center mb-2 hover:scale-105 transform transition duration-300" data-aos="fade-up" data-aos-delay="300">Andhika Farizky Mansyur</h3>
                        
                        <!-- Role -->
                        <p class="text-gray-600 text-center mb-6 hover:scale-105 transform transition duration-300" data-aos="fade-up" data-aos-delay="350">StudentAffair's Web Designer</p>
                        
                        <!-- Website Link -->
                        <div class="mt-[-18px] mb-4 text-center" data-aos="fade-up" data-aos-delay="400">
                            <a href="https://andhikafm.my.id" class="text-[#2d356b] font-medium hover:underline hover:scale-105 transform transition duration-300 inline-block">🔗 andhikafm.my.id</a>
                        </div>
                        
                        <!-- Social Icons -->
                        <div class="flex justify-center space-x-4" data-aos="fade-up" data-aos-delay="450">

                            {{-- Instagram --}}
                            <a href="https://instagram.com/andhikaa.fm" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-[#2d356b] hover:bg-[#2d356b] hover:text-white transition-colors duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            </a>

                            {{-- Email --}}
                            <a href="mailto:andhika.class@gmail.com" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-[#2d356b] hover:bg-[#2d356b] hover:text-white transition-colors duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12.713l-11.985-9.713h23.97l-11.985 9.713zm0 2.574l-12-9.725v15.438h24v-15.438l-12 9.725z"/></svg>
                            </a>

                            {{-- Github --}}
                            <a href="https://github.com/CorvoGithub" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-[#2d356b] hover:bg-[#2d356b] hover:text-white transition-colors duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
                            </a>

                            {{-- Whatsapp --}}
                            <a href="https://wa.me/6282268924743" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-[#2d356b] hover:bg-[#2d356b] hover:text-white transition-colors duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Friend's Profile Card -->
                    <div class="bg-white rounded-xl shadow-lg p-8 transition-all duration-300" data-aos="fade-left">
                        <!-- Profile Picture -->
                        <div class="relative w-24 h-24 mx-auto mb-6 group" data-aos="zoom-in" data-aos-delay="200">
                            <!-- Border that appears on hover -->
                            <div class="absolute inset-0 rounded-full border-2 border-transparent group-hover:border-[#2d356b] transition-all duration-300"></div>
                            
                            <!-- Profile picture container with scaling -->
                            <div class="w-full h-full rounded-full bg-gray-200 overflow-hidden mx-auto border-2 border-white transform transition-all duration-300 group-hover:scale-110 group-hover:border-[#2d356b]">
                                <img src="PhotoLanding/reyva.png" alt="Reyva Azka Ali Farysta" class="w-full h-full object-cover">
                            </div>
                        </div>
                        
                        <!-- Name -->
                        <h3 class="text-2xl font-bold text-[#2d356b] text-center mb-2 hover:scale-105 transform transition duration-300" data-aos="fade-up" data-aos-delay="300">Reyva Azka Ali Farysta</h3>
                        
                        <!-- Role -->
                        <p class="text-gray-600 text-center mb-6 hover:scale-105 transform transition duration-300" data-aos="fade-up" data-aos-delay="350">StudentAffair's Backend Developer</p>
                        
                        <!-- Website Link -->
                        <div class="mt-[-18px] mb-4 text-center" data-aos="fade-up" data-aos-delay="400">
                            <a href="https://reyvaaaf.my.id" class="text-[#2d356b] font-medium hover:underline hover:scale-105 transform transition duration-300 inline-block">🔗 reyvaaaf.my.id</a>
                        </div>
                        
                        <!-- Social Icons -->
                        <div class="flex justify-center space-x-4" data-aos="fade-up" data-aos-delay="450">
                            <a href="https://instagram.com/reyvaazka" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-[#2d356b] hover:bg-[#2d356b] hover:text-white transition-colors duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            </a>
                            <a href="mailto:reyvaazkaali@gmail.com" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-[#2d356b] hover:bg-[#2d356b] hover:text-white transition-colors duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12.713l-11.985-9.713h23.97l-11.985 9.713zm0 2.574l-12-9.725v15.438h24v-15.438l-12 9.725z"/></svg>
                            </a>
                            <a href="https://github.com/Reynant28" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-[#2d356b] hover:bg-[#2d356b] hover:text-white transition-colors duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
                            </a>
                            <a href="https://wa.me/6285795621328" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-[#2d356b] hover:bg-[#2d356b] hover:text-white transition-colors duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Footer --}}
        <footer class="bg-[#2d356b] text-white text-center py-6">
            <p>&copy; 2025 Student Affairs. Developed by Software Engineers of SMKN 1 Cimahi.</p>
        </footer>

        {{-- Scripts --}}
        <script>
            
            // Initialize AOS with custom settings
            AOS.init({
                duration: 1000,
                easing: 'ease-out-back',
                once: false,
                offset: 120,
                mirror: true
            });

            // Smooth scrolling for navigation links
            document.querySelectorAll('nav a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    
                    if (targetElement) {
                        // Calculate the target position (accounting for fixed navbar)
                        const navbarHeight = document.getElementById('navbar').offsetHeight;
                        const targetPosition = targetElement.offsetTop - navbarHeight;
                        
                        // Smooth scroll to the target
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                        
                        // Update URL without jumping
                        history.pushState(null, null, targetId);
                    }
                });
            });

            // Active section indicator and navbar scroll effect
            document.addEventListener("DOMContentLoaded", () => {
                const sections = document.querySelectorAll("section[id]");
                const navLinks = document.querySelectorAll("nav a[href^='#']");
                const navbar = document.getElementById('navbar');
                
                function updateActiveNav() {
                    let current = "";
                    
                    sections.forEach(section => {
                        const sectionTop = section.offsetTop - 100;
                        const sectionHeight = section.offsetHeight;
                        if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                            current = section.getAttribute("id");
                        }
                    });
                    
                    navLinks.forEach(link => {
                        const span = link.querySelector('span');
                        if (link.getAttribute("href") === `#${current}`) {
                            span.classList.add('w-full');
                            link.classList.add('text-white');
                        } else {
                            span.classList.remove('w-full');
                            link.classList.remove('text-white');
                        }
                    });
                }
                
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 10) {
                        navbar.classList.add('scrolled');
                    } else {
                        navbar.classList.remove('scrolled');
                    }
                    updateActiveNav();
                });
                
                updateActiveNav(); // Run once on page load
            });
        </script>

    </body>
</html>