<?php
    namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Http\Request;
    use App\Models\User;
    use Validator;
    class UsersController extends Controller
    {
    public function __construct()
    {
        //  $this->middleware('auth:api');
    }
    /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
    
        if($validator->fails()){
            Log::error('Validation Error.', $validator->errors());
            return $this->sendError('Validation Error.', $validator->errors());       
        }
    
        $apikey = base64_encode(str_random(40));
        $input = $request->all();
        $input['password'] = app('hash')->make($input['password']);
        $input['api_key'] = $apikey;
        $user = User::create($input);
        $apikey = base64_encode(str_random(40));
        return response()->json(['status' => 'success','api_key' => $apikey]);
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
        'email' => 'required',
        'password' => 'required'
            ]);
        $user = User::where('email', $request->input('email'))->first();
        if(Hash::check($request->input('password'), $user->password)){
            $apikey = base64_encode(str_random(40));
            User::where('email', $request->input('email'))->update(['api_key' => "$apikey"]);
            return response()->json(['status' => 'success','api_key' => $apikey]);
        }else{
            return response()->json(['status' => 'fail'],401);
        }
    }
    }    
?>
