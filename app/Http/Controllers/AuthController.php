<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Perfil;
use Hash;
use Session;

class AuthController extends Controller
{
    // Retornar página de login
    public function index()
    {
        return view('login.login');
    }  
    
    // Controller do formulário de login
    public function customLogin(Request $request)
    {
        $request->validate([
            'siape' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('siape', 'password');
        if (Auth::attempt($credentials)) {
            if(Auth::user()->first_login == 1){
                return redirect('/firstlogin');
            }
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
  
        return dd("NÃO LOGOU");
    }

    // Retornar página de registro
     public function registration()
    {
        return view('login.registration');
    }

    // Formulário de registro

     public function customRegistration(Request $request)
    {  
        $data = $request->all();
        $check = $this->create($data);
        return redirect("dashboard")->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
      return User::create([
        'nome' => $data['nome'],
        'siape' => $data['siape'],
        'password' => Hash::make($data['password']),
        'first_login' => true,
        'email' => "aleatorio@email.com",
        'telefoneinstitucional' => "4002-8922",
        'cargo' => "Professor",
        'setor' => "Sofredor",
        'perfil_id' => 1
      ]);
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
           if(Auth::user()->perfil->tipo == "admin"){
                return view('admin.dashboardadmin',['user' =>Auth::user()]);
           }
           if(Auth::user()->perfil->tipo == "user"){
                return view('usuario.indexusuario',['user' =>Auth::user()]);
           }
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }

    public function firstloginIndex(){
        // Lembra de configurar um middleware pra não deixar o usuário acessar esta página sem ter logado e estar com firstlogin ativado
        return view('login.firstlogin');
    }

    public function customFirstLogin(Request $request){
        Auth::user()->password = Hash::make($request->senhanova);
        Auth::user()->first_login = false;
        Auth::user()->save();
        return redirect('login');
    }


}
