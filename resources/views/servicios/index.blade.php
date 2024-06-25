<x-app-layout>
    <div class=""">
        @if (session('info'))
            <div class="flex justify-end">
                <div class="alert alert-info w-96 mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>{{session('info')}}</span>
                </div>
            </div>  
        @endif
        <h2 class="pt-10 text-5xl text-black text-center uppercase">servicios </h2>
        <div class="grid grid-cols md:grid-cols-2 xl:grid-cols-3 gap-5 mt-10 pb-10 justify-items-center">
            @foreach ($servicios as $servicio)
                <div class="card w-96 bg-base-100 shadow-xl">
                    <figure class="px-10 pt-10">
                    <img src="https://images.unsplash.com/photo-1632188006065-9db14ac39120?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&{{ $servicio->nombre }}" alt="servicios" class="rounded-xl" />
                    </figure>
                    <div class="card-body items-center text-center">
                    <h2 class="card-title">{{ $servicio->nombre }}</h2>
                    <p>{{ $servicio->descripcion }}</p>
                    <div class="card-actions">
                        <button class="btn btn-primary">Stock:{{ $servicio->stock }}</button>
                        <button class="btn btn-primary">${{ $servicio->precio }}</button>
                        <a href="{{ route('servicios.edit', $servicio) }}" class="btn btn-warning btn-xs">Editar</a>
                        <form action="{{ route('servicios.destroy', $servicio) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Desea eliminar el portafolio {{ $servicio->nombre }}?')" class="btn btn-error btn-xs">Eliminar</button>
                        </form>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div
 
 </x-app-layout>