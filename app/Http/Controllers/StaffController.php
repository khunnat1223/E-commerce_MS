<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Staff;
use Inertia\Response;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Staffs/StaffIndex', [
            'staffs' => Staff::all()->map(function ($staff){
                return [
                    'id' => $staff->id,
                    'name' => $staff->name,
                    'sex' => $staff->sex,
                    'phone' => $staff->phone,
                    'dob' => $staff->dob,
                    'dop' => $staff->dop,
                    'position' => $staff->position,
                    'salary' => $staff->salary,
                    'position' => $staff->position,
                    'status' => $staff->status,
                    'profile' => asset('storage/'. $staff->profile)
                ];
            }),
        ]);
    }
    public function create()
    {
        return Inertia::render('Admin/Staffs/Create');
    }

    public function store(Request $request){

        $profile = $request->file('profile') ? $request->file('profile')->store('staffs', 'public') : null;
        Staff::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'sex' => $request->sex,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'dop' => $request->dop,
            'position' => $request->position,
            'salary' => $request->salary,
            'status' => 1,
            'profile' => $profile,

        ]);


        return redirect()->route('staffs.index')->with('success', 'Staffs created successfully!');
    }

    public function edit(Staff $staff):Response
    {
        return Inertia::render('Admin/Staffs/Edit', [
            'staff' => $staff,
            'profile' => asset('storage/'. $staff->profile)
            // 'profile_image' => asset('storage/' . $staff->profile)
        ]);

    }
    public function update(Request $request, $id)
    {

        $staff = Staff::findOrFail($id);

        if ($request->hasFile('profile')) {
            if ($staff->profile) {
                Storage::disk('public')->delete($staff->profile);
            }
            $profile = $request->file('profile')->store('staffs', 'public');
        } else {
            $profile = $staff->profile;
        }
        $staff->update([
            'sex' => $request->sex,
            'user_id' => $request->user_id,
            'name' => $request->name,
            'sex' => $request->sex,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'dop' => $request->dop,
            'position' => $request->position,
            'salary' => $request->salary,
            'position' => $request->position,
            'status' => 1,
            'profile' => $profile,
        ]);

         return redirect()->route('staffs.index')->with('success', 'staff updated successfully.');
    }


    public function destroy(staff $staff)
    {
        $staff->delete();

        return redirect()->route('staffs.index')->with('success', 'staff deleted successfully.');
    }
    public function deleteImage($id)
    {
        // Gate::authorize('deleteImage', $productImage);
        $profile = staff::where('id', $id)->delete();
        return back();
    }
}
