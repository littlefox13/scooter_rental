<?php
namespace App\Http\Controllers\API;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Str;
class AuthController extends Controller
{

    private $apiToken;
    public function __construct()
    {
        $this->apiToken = uniqid(base64_encode(Str::random(40)));
    }

    public function logout() {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out success'
        ]);
    }

    public function login(Request $request){
        //User check
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            //Setting login response
            $success['token'] = $this->apiToken;
            $success['name'] =  $user->name;
            return response()->json([
                'status' => 'success',
                'data' => $success,
                'user' => Auth::user()
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'data' => 'Unauthorized Access'
            ]);
        }
    }

    public function register(Request $request) {

        if ($request->password != $request->password_confirmation) {
            return response()->json([
                'error' => 'registration_validation_error',
                'errors' => 'password_confirmation error'
            ], 422);
        }

        $user_by_email = DB::table('users')->where('email','=',$request->email)->get();

        if (isset($user_by_email[0])) {
            return response()->json([
                'error' => 'registration_validation_error',
                'errors' => 'email already used'
            ], 422);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = 3;
        $user->save();

        return response()->json(['status' => 'success'], 200);
    }

    public function init() {
        $user = Auth::user();
        $role = DB::table('roles')->whereId($user->role_id)->first();
        $user->role = trim($role->description);
        return response()->json(["user" => $user]);
    }
}
