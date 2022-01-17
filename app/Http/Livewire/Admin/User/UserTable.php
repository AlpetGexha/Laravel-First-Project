<?php

namespace App\Http\Livewire\Admin\User;

use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class UserTable extends Component
{
    use WithPagination, WithSorting;

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
        foreach($this->selectRoles as $role) {
            $user = User::find($this->ids);
            $user->assignRole($role);
        }
    }

   //edit role
    public function edit($id)
    {
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
