<x-main-layout>
    <main class="container relative h-screen">
        <!-- Imagen de fondo con superposición -->
        <div class="relative bg-[url('images/autos.jpg')] bg-no-repeat bg-cover bg-center h-screen backdrop-blur-lg">
            <!-- Degradado negro por encima de la imagen de fondo -->
            <div class="absolute inset-0 bg-gradient-to-b from-black via-transparent to-transparent"></div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center pt-60">
                <!-- Columna 1: Título grande centrado -->
                <div class="md:col-span-3 text-center">
                    <h1 class="mb-4 text-7xl font-extrabold text-white md:text-5xl lg:text-6xl">
                        <span class="bg-black bg-opacity-50 px-7 rounded-full"><span class="text-transparent text-7xl bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Auto Rental</span></span> <span class="text-black bg-white bg-opacity-50 px-2 rounded-full">Pro.</span>
                    </h1>
                </div>
        
                <!-- Columna 2: Pequeño texto centrado -->
                {{-- <div class="md:col-span-3 text-center md:flex md:flex-col">
                    <h3 class="text-lg text-white  text-4x1">Administrando un sueño.</h3>
                </div> --}}
        
                <!-- Columna 3: Botón "Login" grande centrado con efecto hover -->
                <div class="md:col-span-3 text-center">
                    
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                           
                            <a href="{{ route('login.view') }}" class="bg-green-400 text-dark px-6 py-3 rounded-full hover:bg-green-700 transition duration-300 ease-in-out">Log in</a>
                            
                        </div>
                
                </div>
            </div>
        </div>
    </main>
    <!-- Footer con el texto "Powered by GreenFlame" y el símbolo de marca registrada -->
    <footer class="bg-black text-green-500 text-xs py-2 rounded-b-lg text-center">
        Powered by GreenFlame&reg;
    </footer>
  </x-main-layout>
  