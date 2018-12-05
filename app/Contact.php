<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Notifications\Notifiable;
// use Illuminate\Foundation\Auth\Contact as Authenticatable;

// class Contact extends Model
// {
//     protected $fillable=[
//         'nome',
//         'email',
//         'telefone',
//         'data_nascimento',
//         'cidade',
//         'cep',
//         'mensagem',
//         'aceita_novidades',
//         'user_id'
//     ];
// }



class Contact extends Model
{
    //
    protected   $table = 'contacts';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    /** 
     * 
     * 
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'telefone', 'data_nascimento', 'cidade', 'cep', 'mensagem', 'aceita_novidades', 'user_id'];
    protected $guarded = ['created_at','updated_at'];

    public function user() {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function users() {
        return User::all();
    }

   

}

















