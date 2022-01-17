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

    public $ids, $name;
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
