<?php

declare(strict_types=1);

namespace App\Actions;


use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserResourceAction

{
    /** @var Array */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function store(): User
    {

        $user = new User();
        $user->fill($this->data);
        $user->password = Hash::make($this->data['password']);
        $user->save();
        
        $user->assignRole($this->data['roles']);

        return $user;
    }
}
