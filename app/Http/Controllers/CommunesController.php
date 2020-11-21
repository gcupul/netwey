<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Communes;
use Auth;

class CommunesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $communes = Communes::get();
        return response()->json(['success' => 'true','result' => $communes]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_reg' => 'required|exists:regions,id_reg',
            'description' => 'required'
        ]);
        if(Communes::create($request->all())){
            Log::info('Nueva Communa Guardada. ', $request->all());
            return response()->json(['success' => 'true']);
        }else{
            Log::error('Error al intentar guardar la nueva Communa. ', $request->all());
            return response()->json(['success' => 'false']);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commun = Communes::where('id_com', $id)->get();
        return response()->json($commun);
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_reg' => 'filled|exists:regions,id_reg',
            'description' => 'filled',
            'status' => 'filled|in:A,I'
        ]);
        $commun = Communes::where('id_com', $id)->first();
        if($commun->update($request->all())){
            Log::info('Communa Actualizada. ', $request->all());
            return response()->json(['success' => 'true']);
        }
        Log::error('Error al intentar actualizar la Communa. ', $request->all());
        return response()->json(['success' => 'false']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commun = Communes::where('id_com', $id)->whereIn('status', array('A', 'I'))->first();

        if(!is_null($commun)) {
            if($commun->update(['status' => 'trash'])){
                Log::info('Communa Eliminada. ', $request->all());
                return response()->json(['success' => 'true']);
            } else {
                Log::error('Error al intentar eliminar la Communa. ', $request->all());
                return response()->json(['success' => 'false']);
            }
        } else {
            Log::error('Registro no existe');
            return response()->json(['success' => 'false', 'message' => 'Registro no existe']);
        }
    }
}