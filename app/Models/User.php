<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

#[Fillable(['name', 'sobrenome', 'email', 'password','user_group_id'])]
#[Hidden(['password', 'remember_token'])]

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [ 

        'name',
        'sobrenome',
        'email',
        'password',
        'user_group_id'

    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */


    //relacionamentos

    public function endereco() {

        return $this->hasOne(Endereco::class);
    }

    public function colaborador() {

        return $this->hasOne(Colaborador::class);
    }

    public function contratante() {

        return $this->hasOne(Contratante::class);
    }

    public function profissao()
    {
        return $this->hasOne(Profissao::class);
    }

    public function qualificacoes()
    {
        return $this->hasMany(Qualidade::class);
    }


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function userType() {
        $userId = Auth::id();
        $user = User::find($userId);
        return $user->user_group_id;
    }

    public static function colaboradorUserId(){
        $userId = Auth::id();
        return Colaborador::where('user_id',$userId)->first();        
    }

    public static function returnUserType() {
        $userId = Auth::id();

        $colaborador = Colaborador::where('user_id',$userId)->first();

        if($userId == 1) {
            return 1;
        } else if (!empty($colaborador)) {
            return 2;
        } else {
            return 3;
        }   
    }

    public function rules() {
        return [
            'name' => ['required', 'string', 'min:3','max:255','regex:/^[\pL\s\-]+$/u'],
            'sobrenome' => ['required', 'string', 'max:400','regex:/^[\pL\s\-]+$/u'],
            'email' => ['required', 'regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/','string', 'lowercase', 'email', 'max:255', 'unique:'. User::class],
            'email_validador' => ['required','max:255'],
            'password' => ['required']
        ];
    }

    public function feedback () {
        return [
            'name.required' => 'O nome é obrigatório.',
            'name.string' => 'O nome deve ser um texto válido.',
            'name.min' => 'O nome não pode ter menos que 3 caracteres.',
            'name.max' => 'O nome não pode ter mais que 255 caracteres.',

            'sobrenome.required' => 'O sobrenome é obrigatório.',
            'sobrenome.string' => 'O sobrenome deve ser um texto válido.',
            'sobrenome.max' => 'O sobrenome não pode ter mais que 400 caracteres.',

            'email.required' => 'O e-mail é obrigatório.',
            'email.string' => 'O e-mail deve ser um texto válido.',
            'email.email' => 'Informe um endereço de e-mail válido.',
            'email.max' => 'O e-mail não pode ter mais que 255 caracteres.',
            'email.unique' => 'Este e-mail já está cadastrado.',

            'email_validador.required' => 'O e-mail validador é obrigatório.',
            'email_validador.max' => 'O e-mail validador não pode ter mais que 255 caracteres.',

            'password.required' => 'A senha é obrigatória.',
            'name.regex' => 'O sobrenome deve conter apenas letras, espaços e hífen.',
            'sobrenome.regex' => 'O sobrenome deve conter apenas letras, espaços e hífen.',
        ];
    }
}
