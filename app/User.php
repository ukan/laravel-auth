<?php

    namespace App;

    use Illuminate\Auth\UserTrait;
    use Illuminate\Auth\UserInterface;
    use Illuminate\Auth\Reminders\RemindableTrait;
    use Illuminate\Auth\Reminders\RemindableInterface;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Cartalyst\Sentinel\Users\EloquentUser as CartalystUser;
    
    class User extends CartalystUser {
        protected $table = 'users';
        protected $hidden = array('password', 'remember_token');
        protected $guarded = array('id');
        protected $fillable = ['email', 'username', 'password'];
        public static function valid($id='', $pass_up='') {
          return array(
            'email' => 'required|email|unique:users,email'.($id ? ",$id" : ''),
            'username' => 'required|min: 6|unique:users,username'.($id ? ",$id" : ''),
            'password' => ($pass_up ? '' : "required|min: 8|confirmed")
          );
        }
    }
