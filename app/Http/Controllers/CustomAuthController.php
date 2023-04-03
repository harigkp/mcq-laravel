<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Permissions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Response;



class CustomAuthController extends Controller
{

    public function index(Request $request)
    {        
        $input = $request->all(); 
        return view('login', ['input'=>$input]);
    } 
    public function logout(Request $request)
    {            
        Session::flush();
        return redirect('/');

    }  
 

    public function customLogin(Request $request)
    {
        $request->validate([
                'name' => 'required|string|max:10',
            ],
            [
                'name.required' => 'Name is required'
            ]
        );
        
        $input = $request->all(); 
		$input['name'] = trim($input['name']);
        $user = User::where('name', $input['name'])->where('status', 1)->first(); 
        
        if(isset($user->id)) 
        {
                $this->setUserSession($user);
                return redirect()->intended('/test')->withSuccess('Signed in');
        }else{
			$check = $this->create($input);
			$user = User::where('name', $input['name'])->where('status', 1)->first();  
			$this->setUserSession($user);
            return redirect()->intended('/test')->withSuccess('Signed in');
			
		}
        return redirect("login")->withErrors('These credentials do not match our records.');
    }
    

    protected function setUserSession($user)
    { 

        $full_name = $user->name;
        Session::put('user', [ 'id' => $user->id, 'name' => $user->name]);

        if (session()->has('user')) {
            $auth_data= session()->get('user');
           
        }
       $input['auth_user_id']= $user->id;
       $this->auth =  [ 'id' => $user->id, 'name' => $user->name];
       
    }

      

    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required|string|max:10',
        ],
        [
            'name.required' => 'User Name is required',

        ]

    );
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("login")->withSuccess('You have signed-in');
    }
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name']
      ]);
    } 
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }

}