<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use App\Traits\WithSorting;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;


class UserTable extends Component
{
    use WithPagination, WithSorting, AuthorizesRequests;

    public $search;

    public $ids, $name, $mbiemri, $email, $username, $create_at, $bio, $url, $facebook, $twitter, $instagram, $youtube, $linkedin, $github;
    public $selectRoles = [];
    public $rules = [
        'categoria' => 'min:3|max:255'
    ];

    public $queryString = [
        'page' => ['except' => 1],
        'search' => ['except' => '', 'as' => 'q'],
    ];

    public function updateRole()
    {
        $this->authorize('user_give_role');
        foreach ($this->selectRoles as $role) {
            $user = User::find($this->ids);
            $user->assignRole($role);
        }
    }

    // Show user info 
    public function  showUser($id)
    {
        $this->authorize('user_show');
        $user = User::find($id);
        $this->name = $user->name;
        $this->mbiemri = $user->mbiemri;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->create_at = $user->create_at;
        $this->selectRoles = $user->getRoleNames();
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
        $user = User::find($id);
        $this->ids = $user->id;
        $this->selectRoles = $user->getRoleNames();
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
