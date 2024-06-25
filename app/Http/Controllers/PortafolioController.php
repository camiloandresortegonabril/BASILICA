<?php

namespace App\Http\Controllers;

use App\Models\Portafolio;
use Illuminate\Http\Request;

class PortafolioController extends Controller
{

    public function __construct()
    {
        //Sólo los usuarios autenticados y rol admin pueden acceder a todas las rutas de este controlador
        //los usuarios autenticados y rol diferente de admin pueden acceder únicamente al método index de este controlador
        $this->middleware('auth')->except('index', 'show');
        $this->middleware('admin')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portafolios = Portafolio::all();
        return view('portafolios.index', ['portafolios' => $portafolios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('portafolios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {       
        Portafolio::create($request->all());
        //Guardar imagen
        $portafolio = Portafolio::latest('id')->first();
        $imageName= 'portafolio_'.$portafolio->id.'.'.$request->imagen->extension();
        $request->imagen->move(public_path('images/portafolios'), $imageName);
        return redirect()->route('portafolios.index')->with('info', 'portafolio creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portafolio $portafolio)
    {
        return view('portafolios.show', ['portafolio' => $portafolio]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portafolio $portafolio)
    {
        return view('portafolios.edit', ['portafolio' => $portafolio]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portafolio $portafolio)
    {
        $portafolio->update($request->all());
        //Actualizar imagen si existe
        if ($request->imagen) {
            $request->validate([
                'imagen' => 'image|max:4096',
            ],
            [
                'imagen.max' => 'La imagen del portafolio no debe pesar más de 4MB'
            ]);
            $imageName= 'portafolio_'.$portafolio->id.'.'.$request->imagen->extension();
            $request->imagen->move(public_path('images/portafolios'), $imageName);
        }
        return redirect()->route('portafolios.index')->with('info', 'portafolio actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portafolio $portafolio)
    {
        $portafolio->delete();
        //eliminar imagen si existe
        if (file_exists(public_path('images/portafolios/portafolio_'.$portafolio->id.'.jpg'))) {
            unlink(public_path('images/portafolios/portafolio_'.$portafolio->id.'.jpg'));
        }
        return redirect()->route('portafolios.index')->with('info', 'portafolio eliminado con éxito');
    }
}
