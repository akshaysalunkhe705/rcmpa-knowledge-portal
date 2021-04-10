<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'department',
        'role',
        'navigation_type',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function add($request)
    {
        $model = $this->create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'department' => $request->department,
            'role' => $request->role,
            'navigation_type' => $request->navigation_type,
            'password' => Hash::make($request->password)
        ]);
        return $model;
    }

    public function edit($request, $id)
    {
        $model = $this->find($id);
        $model->name = $request->name;
        $model->username = $request->username;
        $model->email = $request->email;
        $model->department = $request->department;
        $model->role = $request->role;
        $model->navigation_type = $request->navigation_type;
        return $model->save();
    }

    public function remove_single($id)
    {
        $model = $this->find($id);
        $model->destroy();
    }

    public function remove_multiple($ids)
    {
        $model = $this->find($ids);
        $model->destroy();
    }
}
