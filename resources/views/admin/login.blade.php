<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin Login | StudentAffairs</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('TemplateAdminLTE') }}/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('TemplateAdminLTE') }}/dist/css/adminlte.min.css">
        <link href="{{ asset('TemplateAdminLTE') }}/dist/select2/css/select2.min.css" rel="stylesheet" />
        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Custom Styles -->
        <style>
            .login-bg {
                background: white);
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }
            .login-card {
                background: rgba(255, 255, 255, 0.95);
                border-radius: 1rem;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
                transition: all 0.3s ease;
            }
            .login-card:hover {
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            }
            .form-control {
                transition: all 0.3s ease;
                border-radius: 0.5rem;
                padding: 0.75rem 1rem;
                border: 1px solid #e2e8f0;
            }
            .form-control:focus {
                border-color: #2d356b;
                box-shadow: 0 0 0 0.2rem rgba(45, 53, 107, 0.25);
            }
            .btn-login {
                background-color: #2d356b;
                border: none;
                transition: all 0.3s ease;
                padding: 0.75rem;
                font-weight: 600;
                letter-spacing: 0.5px;
            }
            .btn-login:hover {
                background-color: #3d488f;
            }
            .input-group-text {
                background-color: #f8f9fa;
                border: 1px solid #e2e8f0;
            }
            .select2-container--default .select2-selection--single {
                height: auto;
                padding: 0.75rem 1rem;
                border: 1px solid #e2e8f0;
                border-radius: 0.5rem;
            }
            .select2-container--default .select2-selection--single .select2-selection__arrow {
                height: 100%;
            }
        </style>
    </head>

    <body class="login-bg">

        <!-- Navigation Bar -->
        <header id="navbar" class="fixed top-0 w-full z-50 transition duration-300 bg-[#2d356b] py-6 px-5">
            <div class="mx-12 flex justify-between items-center">
                <!-- Logo and Name (Left) -->
                <a href="{{ route('landingpage') }}" class="flex items-center justify-center gap-2 group">
                    <img src="{{ asset('PhotoLanding/caplogohd.png') }}" alt="" class="w-7 h-7 mx-auto drop-shadow-xl">
                    <h1 class="text-[1.25rem] font-semibold text-slate-100 drop-shadow-xl hover:text-white transition duration-300" style="font-size: 1.25rem !important;">
                        StudentAffairs
                    </h1>
                </a>

                <!-- Centered Navigation with Animated Underlines -->
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

                <!-- Login Button (Right) -->
                <div class="ml-auto">
                    <a href="{{ route('login') }}" class="relative px-6 py-2 rounded-md shadow-lg transition-all duration-500 ease-[cubic-bezier(0.68,-0.55,0.265,1.55)] group overflow-hidden">
                        <span class="relative z-10 text-white group-hover:text-[#353d7b] transition-colors duration-300">Login</span>
                        <span class="absolute inset-0 bg-[#353d7b] rounded-md"></span>
                        <span class="absolute inset-0 bg-white rounded-md transform origin-bottom scale-y-0 group-hover:scale-y-100 transition-transform duration-500"></span>
                    </a>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow flex items-center justify-center px-4 pt-24 pb-10">
            <div class="w-full max-w-md">
                <div class="login-card p-8">
                    <div class="text-center mb-8">
                        <!-- Logo with blue circle background -->
                        <div class="w-24 h-24 bg-[#2d356b] rounded-full flex items-center justify-center mx-auto mb-4 shadow-md">
                            <img src="{{ asset('PhotoLanding/caplogohd.png') }}" alt="Logo" class="w-16 h-16">
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Admin Portal</h2>
                        <p class="text-gray-600">Sign in to manage student affairs</p>
                    </div>

                    @if (session('error'))
                        <div class="alert alert-danger mb-4">
                            <b>Opps!</b> {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('loginaksi') }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2 font-medium">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="admin@example.com" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2 font-medium">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 mb-2 font-medium">Academic Year</label>
                            <select class="form-control select2" id="thnajaran" name="thnajaran" required>
                                <option></option>
                                @foreach ($thnajaran as $t)
                                    <option value="{{ $t->idthnajaran }}">{{ $t->thnajaran }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-login btn-block text-white">
                            <i class="fas fa-sign-in-alt mr-2"></i> Log In
                        </button>
                    </form>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-[#2d356b] text-white text-center py-6">
            <p>&copy; 2025 Student Affairs. Developed by Software Engineers of SMKN 1 Cimahi.</p>
        </footer>

        <!-- Scripts -->
        <script src="{{ asset('TemplateAdminLTE') }}/plugins/jquery/jquery.min.js"></script>
        <script src="{{ asset('TemplateAdminLTE') }}/dist/select2/js/select2.full.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.select2').select2({
                    placeholder: "Select academic year",
                    allowClear: true
                });

                // Add animation to form elements
                $('.form-control').each(function(i) {
                    $(this).delay(100 * i).animate({
                        opacity: 1,
                        marginTop: 0
                    }, 300);
                });
            });
        </script>
    </body>
</html>