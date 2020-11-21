<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regions;
use Illuminate\Support\Facades\Log;
use Auth;

class RegionsController extends Controller
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
        $regions = Regions::get();
        return response()->json(['success' => 'true','result' => $regions]);
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
            'description' => 'required'
        ]);
        if(Regions::create($request->all())){
            Log::info('Nueva Region Guardada. ', $request->all());
            return response()->json(['success' => 'true']);

        }else{
            Log::error('Error al intentar guardar la nueva Region. ', $request->all());
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
        $region = Regions::where('id_reg', $id)->get();
        return response()->json($region);
        
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
            'description' => 'filled',
            'status' => 'filled|in:A,I'
        ]);
        $region = Regions::where('id_reg', $id)->first();
        if($region->update($request->all())){
            Log::info('Region Actualizada. ', $request->all());
            return response()->json(['success' => 'true']);
        }
        Log::error('Error al intentar actualizar la Region. ', $request->all());
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
        $region = Regions::where('id_reg', $id)->whereIn('status', array('A', 'I'))->first();

        if(!is_null($region)) {
            if($region->update(['status' => 'trash'])){
                Log::info('Region Eliminada. ', $request->all());
                return response()->json(['success' => 'true']);
            } else {
                Log::error('Error al intentar eliminar la Region. ', $request->all());
                return response()->json(['success' => 'false']);
            }
        } else {
            Log::error('Registro no existe');
            return response()->json(['success' => 'failed', 'message' => 'Registro no existe']);
        }
    }
}