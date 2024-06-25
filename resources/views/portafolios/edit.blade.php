<x-app-layout>

    <div class="flex justify-center">
        <div class="card w-96 shadow-2xl bg-base-100">
            <div class="card-body">
                {{-- Imagen --}}
                <div>
                    @if(file_exists('images/portafolios/portafolio_' . $portafolio->id . '.jpg'))
                        <img src="{{ asset('images/portafolios/portafolio_' . $portafolio->id . '.jpg') }}" alt="{{$portafolio->nombre}}" class="rounded-t-lg h-40 w-full object-cover">
                    @else
                        <img src="{{ asset('images/portafolios/default.jpg') }}" alt="{{$portafolio->nombre}}" class="rounded-t-lg">
                    @endif
                </div>
                <form action="{{route('portafolios.update', $portafolio)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- Nombre --}}
                    <div class="form-control">
                    <label class="label" for="nombre">
                        <span class="label-text">Nombre portafolio</span>
                    </label>
                    <input type="text" name="nombre" placeholder="Nombre del portafolio" class="input input-bordered" maxlength="50" value="{{$portafolio->nombre}}" required />
                    </div>
                    {{-- Imagen --}}
                    <div class="form-control">
                        <label class="label" for="imagen">
                            <span class="label-text">Cambiar imagen</span>
                        </label>
                        <input type="file" name="imagen" class="file-input file-input-bordered file-input-success file-input-sm w-full max-w-xs"  accept=".jpg" />
                    </div>
                    {{-- Descripcion corta --}}
                    <div class="form-control">
                        <label class="label" for="descripcion_corta">
                            <span class="label-text">Descripción corta</span>
                        </label>
                        <input type="text" name="descripcion_corta" placeholder="Escriba la descripción corta" maxlength="150" class="input input-bordered" value="{{$portafolio->descripcion_corta}}" />
                    </div>
                    {{-- Descripcion larga--}}
                    <div class="form-control">
                        <label class="label" for="descripcion_larga">
                            <span class="label-text">Descripción larga</span>
                        </label>
                        <input type="text" name="descripcion_larga" placeholder="Escriba la descripción larga" maxlength="500" class="input input-bordered" value="{{$portafolio->descripcion_larga}}" />
                    </div>

                    <div class="form-control mt-6">
                        <button class="btn btn-primary">Actualizar portafolio</button>
                        <a href="{{ route('portafolios.index') }}" class="btn btn-outline btn-primary mt-4">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>



</x-app-layout>