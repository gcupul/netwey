<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Customers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Auth;

class CustomersController extends Controller
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
        $customers = Customers::where('status', 'A')->get();
        return response()->json(['success' => 'true','result' => $customers]);
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
            'dni' => [
                'required',
                Rule::unique('customers')
                ->where('id_reg', $request->id_reg)
                ->where('id_com', $request->id_com)
            ],
            'id_reg' => 'required|exists:regions,id_reg',
            'id_com' => [
                'required',
                'exists:communes,id_com',
                Rule::exists('communes')->where('id_reg', $request->id_reg)
            ],
            'email' => 'required|email|unique:customers',
            'name'  => 'required',
            'last_name' => 'required'
        ]);

        if(Customers::create($request->all())){
            Log::info('Nuevo Customer registrado. ', $request->all());
            return response()->json(['success' => 'true']);
        }else{
            Log::error('Error al intentar guarar el nuevo customer. ', $request->all());
            return response()->json(['success' => 'false']);
        }      
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);
        $customer = Customers::where('email', $request->email)->get();
        return response()->json(['success' => 'true','result' => $customer]);
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customers::where('dni', $id)->get();
        return response()->json(['success' => 'true','result' => $customer]);        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $dni, $id_reg, $id_com)
    {
        $this->validate($request, [
            'dni' => [
                'filled',
                Rule::unique('customers')
                ->where('id_reg', $request->id_reg)
                ->where('id_com', $request->id_com)
            ],
            'id_reg' => 'filled|exists:regions,id_reg',
            'id_com' => [
                'filled',
                'exists:communes,id_com',
                Rule::exists('communes')->where('id_reg', $request->id_reg)
            ],
            'email' => 'filled|email|unique:customers',
            'name'  => 'filled',
            'last_name' => 'filled',
            'status' => 'filled|in:A,I'
        ]);
        if(Customers::where(['dni' => $dni, 'id_reg' => $id_reg, 'id_com' => $id_com])->update($request->all())){
            Log::info('Customer Actualizado. ', $request->all());
            return response()->json(['success' => 'true']);
        }
        Log::error('Error al intentar actualizar el Customer. ', $request->all());
        return response()->json(['success' => 'false']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function destroy($id, $id_reg, $id_com)
    {
        $customer = Customers::where(['dni' => $id, 'id_reg' => $id_reg, 'id_com' => $id_com])->whereIn('status', array('A', 'I'))->first();

        if(!is_null($customer)) {
            if(Customers::where(['dni' => $id, 'id_reg' => $id_reg, 'id_com' => $id_com])->whereIn('status', array('A', 'I'))->update(['status' => 'trash'])){
                Log::info('Customer Eliminado. ');
                return response()->json(['success' => 'true']);
            } else {
                Log::error('Error al intentar eliminar el Customer. ');
                return response()->json(['success' => 'false']);
            }
        } else {
            Log::error('Registro no existe');
            return response()->json(['success' => 'failed', 'message' => 'Registro no existe']);
        }
    }
}
