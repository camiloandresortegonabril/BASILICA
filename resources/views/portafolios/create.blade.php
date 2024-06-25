<x-app-layout>

    <div class="flex justify-center">
        <div class="card w-96 shadow-2xl bg-base-100">
            <div class="card-body">
                
                <form action="{{route('portafolios.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- Nombre --}}
                    <div class="form-control">
                        <label class="label" for="nombre">
                            <span class="label-text">Nombre del portafolio</span>
                        </label>
                        <input type="text" name="nombre" placeholder="Nombre del portafolio" maxlength="50" class="input input-bordered" value="{{old('nombre')}}" required />
                    </div>
                     {{-- Imagen --}}
                     <div class="form-control">
                        <label class="label" for="imagen">
                            <span class="label-text">Imagen</span>
                        </label>
                        <input type="file" name="imagen" class="file-input file-input-bordered file-input-success file-input-sm w-full max-w-xs"  accept=".jpg" required />
                    </div>
                    {{-- Descripcion corta --}}
                    <div class="form-control">
                        <label class="label" for="descripcion_corta">
                            <span class="label-text">Descripción corta</span>
                        </label>
                        <input type="text" name="descripcion_corta" placeholder="Escriba la descripción corta" maxlength="150" class="input input-bordered" value="{{old('descripcion')}}" />
                    </div>
                    {{-- Descripcion larga--}}
                    <div class="form-control">
                        <label class="label" for="descripcion_larga">
                            <span class="label-text">Descripción larga</span>
                        </label>
                        <input type="text" name="descripcion_larga" placeholder="Escriba la descripción larga" maxlength="500" class="input input-bordered" value="{{old('descripcion')}}" />
                    </div>
                    
                    <div class="form-control mt-6">
                        <button class="btn btn-primary">Crear portafolio</button>
                        <a href="{{ route('portafolios.index') }}" class="btn btn-outline btn-primary mt-4">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

 
 </x-app-layout>