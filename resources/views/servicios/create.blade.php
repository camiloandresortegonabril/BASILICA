<x-app-layout>

    <div class="flex justify-center">
        <div class="card w-96 shadow-2xl bg-base-100 mt-3">
            <div class="card-body">
                <form action="{{ route('servicios.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- Nombre --}}
                    <div class="form-control">
                        <label class="label" for="nombre">
                            <span class="label-text">Nombre del servicio</span>
                        </label>
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre del servicio" maxlength="50" class="input input-bordered" value="{{ old('nombre') }}" required>
                    </div>
                    {{-- descripcion --}}
                    <div class="form-control">
                        <label class="label" for="imagen">
                            <span class="label-text">Imagen</span>
                        </label>
                        <input type="file" name="imagen" class="file-input file-input-bordered file-input-success file-input-sm w-full max-w-xs" accept=".jpg" required>
                    </div>
                    <div class="form-control">
                        <label class="label" for="descripcion">
                            <span class="label-text">descripcion</span>
                        </label>
                        <input type="text" name="descripcion" id="descripcion" placeholder="descripcion" maxlength="150" class="input input-bordered" value="{{ old('descripcion') }}">
                    </div>
                    
                    {{-- precio--}}
                    <div class="form-control">
                        <label class="label" for="precio">
                            <span class="label-text">precio</span>
                        </label>
                        <input type="text" name="precio" id="precio" placeholder="precio" maxlength="150" class="input input-bordered" value="{{ old('precio') }}">
                    </div>
                    {{-- stock --}}
                    <div class="form-control">
                        <label class="label" for="stock">
                            <span class="label-text">stock</span>
                        </label>
                        <input type="text" name="stock" id="stock" placeholder="stock" maxlength="500" class="input input-bordered" value="{{ old('stock') }}">
                    </div>
                        
                    
                    <div class="form-control mt-6">
                        <button type="submit" class="btn btn-primary">Crear servicio</button>
                        <a href="{{ route('servicios.index') }}" class="btn btn-outline btn-primary mt-4">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    
</x-app-layout>
