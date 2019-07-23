<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function updateProfile(Request $request)
    {
        $data = $request->all();
        $this->user->find(auth()->user()->id)->update($data);
        return redirect('/admin');
    }

    public function changePassword(Request $request)
    {
        $data = $request->all();
        if(Hash::check($data['oldPassword'], auth()->user()->password)) {
            if($data['newPassword'] == $data['rePassword']) {
                $this->user->find(auth()->id())->update([
                    'password' => Hash::make($data['newPassword'])
                ]);
                return redirect()->back()->withSuccess(['Password berhasil diganti!']);
            }
        }
        return redirect()->back()->withError(['Password gagal diganti!']);
    }
}
