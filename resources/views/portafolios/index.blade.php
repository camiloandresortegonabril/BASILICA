<x-app-layout>
    @auth
        @if (auth()->user()->rol == 'admin')
            <div class="flex justify-end m-4">
                <a href="{{ route('portafolios.create') }}" class="btn btn-outline btn-sm">Crear portafolio</a>
            </div>
        @endif

        @if (session('info'))
            <div class="flex justify-end mb-4">
                <div class="alert alert-info w-96">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>{{session('info')}}</span>
                </div>
            </div>  
        @endif

        <div class="flex justify-center mx-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10">
                @foreach ($portafolios as $portafolio)
                    <div class="card w-64 bg-base-100 shadow-xl">
                        <figure>
                            @if(file_exists('images/portafolios/portafolio_' . $portafolio->id . '.jpg'))
                                <img src="{{ asset('images/portafolios/portafolio_' . $portafolio->id . '.jpg') }}" alt="{{$portafolio->nombre}}" class="rounded-t-lg h-40 w-full object-cover">
                            @else
                                <img src="{{ asset('images/portafolios/default.jpg') }}" alt="{{$portafolio->nombre}}" class="rounded-t-lg">
                            @endif
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">{{$portafolio->nombre}}</h2>
                            
                            <p>{{$portafolio->descripcion_corta}}</p>
    
                            {{-- precio y stock--}}
                            <div class="flex space-x-4">
                                <div class="badge badge-neutral">precio</div>
                                <div class="badge badge-ghost">stock</div>
                            </div>
                        
                            <div class="card-actions justify-end mt-5">
                                @if (auth()->user()->rol == 'admin')
                                    {{-- Editar --}}
                                    <a href="{{ route('portafolios.edit', $portafolio->id) }}" class="btn btn-warning btn-xs">Editar</a>
                                    
                                        <form action="{{ route('portafolios.destroy', $portafolio->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('¿Desea eliminar el portafolio {{ $portafolio->nombre }}?')" class="btn btn-error btn-xs">Eliminar</button>
                                        </form>
                                @else
                                <a href="{{ route('portafolios.show', $portafolio->id) }}" class="btn btn-primary btn-xs">Ver más</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    @else

    <div class="flex justify-center mx-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10 mt-5">
            @foreach ($portafolios as $portafolio)
                <div class="card w-64 bg-base-100 shadow-xl">
                    <figure>
                        @if(file_exists('images/portafolios/portafolio_' . $portafolio->id . '.jpg'))
                            <img src="{{ asset('images/portafolios/portafolio_' . $portafolio->id . '.jpg') }}" alt="{{$portafolio->nombre}}" class="rounded-t-lg h-40 w-full object-cover">
                        @else
                            <img src="{{ asset('images/portafolios/default.jpg') }}" alt="{{$portafolio->nombre}}" class="rounded-t-lg">
                        @endif
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">{{$portafolio->nombre}}</h2>
                        
                        <p>{{$portafolio->descripcion_corta}}</p>

                        {{-- precio y stock--}}
                        <div class="flex space-x-4">
                            <div class="badge badge-neutral">precio</div>
                            <div class="badge badge-ghost">stock</div>
                        </div>
                    
                        <div class="card-actions justify-end mt-5">
                           
                            <a href="{{ route('portafolios.show', $portafolio->id) }}" class="btn btn-primary btn-xs">Ver más</a>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @endauth

 
 </x-app-layout>