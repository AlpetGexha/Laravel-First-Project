<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use App\Traits\WithSorting;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;


class UserTable extends Component
{
    use WithPagination, WithSorting, AuthorizesRequests;

    public $search;

    public $ids, $name, $mbiemri, $email, $username, $create_at, $last_seen, $online, $bio, $url, $facebook, $twitter, $instagram, $youtube, $linkedin, $github;
    public $selectRoles = [];
    public $user_roles = [];
    public $rules = [
        'categoria' => 'min:3|max:255'
    ];

    public $queryString = [
        'page' => ['except' => 1],
        'search' => ['except' => '', 'as' => 'q'],
    ];


    // Show user info 
    public function  showUser($id)
    {
        $this->authorize('user_show');
        $user = User::find($id);
        // $this->ids = $user->id;
        $this->name = $user->name;
        $this->mbiemri = $user->mbiemri;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->create_at = $user->create_at;
        $this->selectRoles = $user->getRoleNames();
        $this->last_seen = Carbon::parse($user->last_login_at)->diffForHumans();
        // profile
        // $this->bio = $user->bio;
        /*
        if ($user->hasProfile()) {
            $this->url = $user->profile->url;
            $this->facebook = $user->profile->facebook;
            $this->twitter = $user->profile->twitter;
            $this->instagram = $user->profile->instagram;
            $this->youtube = $user->profile->youtube;
            $this->linkedin = $user->profile->linkedin;
            $this->github = $user->profile->github;
           
        }
        */
        $this->emit('showUser', $user);
    }

    //edit role
    public function editRole($id)
    {
        $this->authorize('user_give_role');
        $user = User::findOrFail($id);
        $this->ids = $user->id;
        $this->selectRoles = $user->roles->pluck('id');
    }

    public function updateRole()
    {
        $this->authorize('user_give_role');
        $user = User::findOrFail($this->ids);
        // $this->selectRoles = $user->roles->pluck('id');
        $user->syncRoles($this->selectRoles);
        $this->emit('updateRole');
    }

    public function verified(int $id)
    {
        $this->authorize('user_give_verify');
        $user = User::findOrFail($id);
        $user->verified = 1;
        $user->save();
        $this->emit('verified');
        session()->flash('success', 'User verified');
    }

    public function unverified($id)
    {
        $this->authorize('user_give_verify');
        $user = User::findOrFail($id);
        $user->verified = 0;
        $user->save();
        $this->emit('unverified');
        session()->flash('success', 'User unverified');
    }

    public function render()
    {
        return view('livewire.admin.user.user-table', [
            'users' => User::where('username', 'like', '%' . $this->search . '%')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate_page),
            'roles' => Role::orderBy($this->sortBy, $this->sortDirection)->get(),
            // 'permissions' => Permission::all(),
        ]);
    }
}
