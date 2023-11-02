<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardSettingController extends Controller
{
    public function store()
    {   
        $user = Auth::user();
        $categories = Category::all();

        return view('pages.dashboard-settings',[
            'user' => $user,
            'categories' => $categories
        ]);
    }
    
    public function account()
    {   
        $user = Auth::user();
        return view('pages.dashboard-account',[
            'user' => $user
        ]);
    }

    public function update(Request $request, $redirect)
    {   
        /* $data = $request->all();
        $item = Auth::user();

        $item->update($data);

        return redirect()->route($redirect); */

        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone_number' => 'nullable|max:255',
            'img_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
            'oldImage' => 'nullable'
        ];

        $data = $request->validate($rules);

        $item = Auth::user();

        if($request['img_profile']){
            
            if($data['oldImage']) {
                Storage::disk('public')->delete($data['oldImage']);
            }
           $data['img_profile'] = $request->file('img_profile')->store('assets/user-photo-profile', 'public');
        }

        $item->update($data);
        /* dd($item); */

        return redirect()->route($redirect);
    }
}
