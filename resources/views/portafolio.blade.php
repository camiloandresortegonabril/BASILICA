<x-app-layout>
   
    <h1 class="text-black"> nuestro portafolio de servicio </h1>

    <div class="">
        <h2 class="pt-10 text-5xl text-black text-center uppercase">Nuestros proyectos realizados</h2>
        <div class="grid grid-cols 1 md:grid-cols-2 xl:grid-cols-3 gap-4 mt-10 pb-10 justify-items-center">
            @foreach ($portafolios as $portafolio)
                <div class="card w- 80 bg-base-100 shadow-xl">
                    {{-- Aquí, desde donde inicia figure hasta donde termina, solo tendría que cambiar el url --}}
                    <figure>
                        <img src="https://www.pragma.com.co/hs-fs/hubfs/academia/Lecciones/tutorial%20angular%20animation/h_software_domain.jpg?width=792&name=h_software_domain.jpg" alt="Shoes" />
                    </figure>

                    <div class="card-body items-center text-center">
                    <h2 class="card-title">{{ $portafolio['nombre'] }}</h2>
                    <p>{{ $portafolio['descripcion'] }}</p>
                    
                    </div>
                </div>
            @endforeach
        </div>
    </div>
 
 </x-app-layout>