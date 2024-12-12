<?php

namespace App\Http\Controllers;

use \Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.modules.user.index');
    }

    public function getData(Request $request)
    {
        $users = User::query();

        return DataTables::eloquent($users)
            ->addIndexColumn()
            ->addColumn('image', function ($user) {
                $photo = $user->photo ? asset($user->photo) : 'https://img.icons8.com/fluency/96/user-male-circle.png';
                return '<img src="' . $photo . '" class="img-fluid img-circle" width="50" height="50">';
            })
            ->addColumn('action', function ($user) {

                $editButton = '<a href="' . route('users.edit', $user->id) . '" class="btn btn-sm btn-warning">Edit</a>';


                $deleteButton = '<button type="button" class="btn btn-sm btn-danger delete-btn" data-id="' . $user->id . '">Delete</button>';


                return $editButton . ' ' . $deleteButton;
            })
            ->rawColumns(['image', 'action', 'id'])
            ->toJson();
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.modules.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $photo = null;
        if ($file = $request->file('photo')) {
            $photoName = time() . '.webp';
            $photoPath = public_path('upload/image/' . $photoName);

            Image::make($file)
                ->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode('webp', 50)
                ->save($photoPath);

            $photo = 'upload/image/' . $photoName;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $photo,
        ]);

        Alert::success('Success!', 'User created successfully.');
        session()->flash('cls', 'success');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('backend.modules.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('backend.modules.user.create', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $photo = $user->photo;
        if ($file = $request->file('photo')) {

            if ($user->photo && file_exists(public_path($user->photo)) && is_file(public_path($user->photo))) {
                unlink(public_path($user->photo));
            }

            $photoName = time() . '.webp';
            $photoPath = public_path('upload/image/' . $photoName);

            Image::make($file)
                ->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode('webp', 50)
                ->save($photoPath);

            $photo = 'upload/image/' . $photoName;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'photo' => $photo,
        ]);

        Alert::info('Updated!', 'User details have been updated.');

        return redirect()->route('users.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->photo && file_exists(public_path($user->photo)) && is_file(public_path($user->photo))) {
            unlink(public_path($user->photo));
        }

        $user->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'User has been deleted.',
        ]);
    }
    
}
