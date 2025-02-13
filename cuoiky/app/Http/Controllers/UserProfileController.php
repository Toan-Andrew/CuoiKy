<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    // Hiển thị danh sách người dùng
    public function index()
    {
        $userProfiles = UserProfile::all();  // Lấy tất cả thông tin người dùng từ bảng user_profiles
        return view('user_profiles.index', compact('userProfiles'));
    }

    // Hiển thị form chỉnh sửa thông tin người dùng
    public function edit($id)
    {
        $userProfile = UserProfile::findOrFail($id);
        return view('user_profiles.edit', compact('userProfile'));
    }

    // Xử lý chỉnh sửa thông tin người dùng
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $userProfile = UserProfile::findOrFail($id);

        $userProfile->first_name = $request->first_name;
        $userProfile->last_name = $request->last_name;
        $userProfile->phone = $request->phone;
        $userProfile->address = $request->address;
        $userProfile->dob = $request->dob;

        // Xử lý upload ảnh avatar (nếu có)
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $userProfile->avatar = $avatarPath;
        }

        $userProfile->save();

        return redirect()->route('user_profiles.index')->with('success', 'Thông tin đã được cập nhật');
    }

    // Xử lý xóa người dùng
    public function destroy($id)
    {
        $userProfile = UserProfile::findOrFail($id);
        $userProfile->delete();

        return redirect()->route('user_profiles.index')->with('success', 'Thông tin đã được xóa');
    }
}
