<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\Models\Contratante;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $log = '';
        if(!Auth::id()) {
            $log = false;
        }

        return view('auth.register',['log' => $log]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $contratante = new Contratante();
        $user = new User(); 

        
        $request->validate($user->rules(),$user->feedback());

        // revisar validate
        // $request->validate($contratante->rules($contratante),$contratante->feedback());

        $user->user_group_id = 3;

        $user->name = $request->name;
        $user->sobrenome = $request->sobrenome;
        $user->password = bcrypt($request->password);

        if($request->email_validador === $request->email)
        {
            $user->email = $request->email;            
        } else {
            echo 'verifique o email';
            exit;
        }

        $user->save();

        $contratante->cpf = $request->cpf;
        $contratante->telefone = $request->telefone;
        $contratante->user_id = $user->id;

        $contratante->save();


        // $user->create([
        //     'name' => $request->name,
        //     'sobrenome' => $request->sobrenome,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'user_group_id' => 2,
        // ]);

        // event(new Registered($user));

        // Auth::login($user);

        return redirect(route('login'));
    }
}
