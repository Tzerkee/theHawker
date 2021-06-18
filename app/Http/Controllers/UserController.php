<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function getProfile()
    {
        if(Auth::user()) {
            $user = User::find(Auth::user()->id);

            if($user) {
                return view('account.profile')->withUser($user);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function updateProfileGeneral(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        // dd($user);

        $user->username = $request->input('username');
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');

        if($request->hasFile('avatar')) {
            $destination = 'storage/users/'.$user->avatar;

            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('storage/users/'), $filename);
            $user->avatar = $filename;
        }

        $user->update();

        Alert::success('Profile updated!', 'Your profile has successfully updated!');

        return redirect()->back();

    }

    public function updateProfileInfo(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        $user->bio = $request->input('bio');
        $user->birthday = $request->input('birthday');
        $user->address = $request->input('address');
        $user->country = $request->input('country');

        $user->update();

        Alert::success('Profile updated!', 'Your profile has successfully updated!');

        return redirect()->back();
    }

    public function updateProfileSocial(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        $user->facebook = $request->input('facebook');
        $user->instagram = $request->input('instagram');
        $user->twitter = $request->input('twitter');

        $user->update();

        Alert::success('Profile updated!', 'Your profile has successfully updated!');

        return redirect()->back();
    }

    public function update_avatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back();
    }

    public function getOrderList()
    {
        $user_id = Auth::user()->id;
        $orders = Order::with('items')->where('user_id', $user_id)->orderBy('id', 'DESC')->get()->toArray();

        return view('account.profile', compact('orders') );
    }

    public function orderDetails($id)
    {
        $data = Order::with('items', 'subOrders')->where('id', $id)->first()->toArray();
        // dd($data);
        return view('account.order-details', compact('data'));
    }

    public function userPassword()
    {
        $user = Auth::user();

        return view('account.password', compact('user') );
    }

    public function resetPassword(Request $request)
    {
        $user = Auth::user();

        $currentPassword = $request->current_password;
        $newPassword = $request->new_password;
        $confirmPassword = $request->confirm_password;

        if (Hash::check($currentPassword, $user->password))
        {
            if($newPassword !== $confirmPassword) {
                Alert::toast('The new password and confirm new password must match.', 'error');
                return back();
            }
            elseif($currentPassword == $newPassword) {
                Alert::toast('New password cannot be same with current password', 'error');
                return back();
            }
            else {
                $user->update(['password' => Hash::make($newPassword)]);
                Alert::toast('Password successfully updated!', 'success');
                return back();
            }
        }
        else {
            Alert::toast('Invalid current password', 'error');
            return back();
        }
        return back();
    }

    /**
     * Handle the user upload of avatar
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        if($request->hasFile('avatar')) {
            $destination = 'storage/users/'.$user->avatar;

            if(File::exists($destination))
            {
                File::delete($destination);
            }

            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/users/'. $filename);
            $user->avatar = $filename;
        }

        return view('account.profile', array('user'=> Auth::user()) );
    }

}
