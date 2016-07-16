<?php namespace App\Repository;
use App\Models\User;

    /**
 * Created by PhpStorm.
 * User: alex
 * Date: 20.03.16
 * Time: 18:21
 */

// use the namespace if it has any, i.e.
// namespace Repositories\User;
// Same for IUserRepository interface

class UserRepository implements IUserRepository {

    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function createOrUpdate($id = null)
    {
        if(is_null($id)) {
            // create after validation
            $user = new User;
            $user->name = 'Sheikh Heera';
            $user->email = 'me@yahoo.com';
            $user->password = '123456';
            return $user->save();
        }
        else {
            // update after validation
            $user = User::find($id);
            $user->name = 'Sheikh Heera';
            $user->email = 'me@yahoo.com';
            $user->password = '123456';
            return $user->save();
        }
    }

}