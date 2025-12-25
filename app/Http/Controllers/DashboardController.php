<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $query = User::query();

        if (request('q')) {
            $q = request('q');
            $query->where(function ($builder) use ($q) {
                $builder->where('name', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%");
            });
        }

        $users = $query->latest()->paginate(10);

        return view('dashboard', compact('user', 'users'));
    }

    public function destroyUser(User $user)
    {
        // Prevent admin from deleting themselves
        if ($user->email === 'skgdhawaliya@gmail.com') {
            return redirect()->route('dashboard')->with('error', 'Cannot delete admin user.');
        }

        $user->delete();
        return redirect()->route('dashboard')->with('success', 'User deleted successfully.');
    }
}
