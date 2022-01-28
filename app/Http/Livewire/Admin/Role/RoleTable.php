<?php

namespace App\Http\Livewire\Admin\Role;

use Spatie\Permission\Models\{Role, Permission};
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Traits\{WithCheckbox, WithSorting};
use Livewire\WithPagination;
use Livewire\Component;

class RoleTable extends Component
{
    use WithPagination, WithSorting, WithCheckbox, AuthorizesRequests;

    public $search;

    public $ids, $name, $role; //role info
    public $user_premissions = [];
    public $premissions_per_role = [];

    public $rules = [
        'name' => 'min:3|max:40|unique:roles',
        'premissions_per_role' => 'required',
    ];


    /**
     * Krijimi i Roleve
     */

    public function store()
    {
        $this->authorize('role_create');
        $this->validate();
        $role = Role::create(['name' => $this->name, 'guard_name' => 'web']);
        $this->emit('createRole');
        foreach ($this->premissions_per_role as $premissions) {
            $role->givePermissionTo($premissions);
        }
        $this->blankField();
    }

    /**
     * Pastro te thenat
     */
    public function blankField()
    {
        $this->ids = '';
        $this->name = '';
        $this->user_premissions = [];
        $this->premissions_per_role = [];
    }

    /**
     * Jep vlerat aktuale
     */
    public function edit(int $id)
    {
        $this->authorize('role_edit');
        $role = Role::where('id', $id)->first();
        $this->ids = $role->id;
        $this->name = $role->name;
        $this->premissions_per_role = $role->permissions->pluck('id');
    }

    /**
     * Ndrysho vleren aktuale
     */
    public function update()
    {
        $this->authorize('role_edit');
        $this->validate();
        if ($this->ids) {
            $role = Role::find($this->ids);
            $role->update([
                'name' => $this->name,
            ]);
            foreach ($this->premissions_per_role as $premissions) {
                $role->givePermissionTo($premissions);
            }
            session()->flash('success', 'Roli u editua me Sukses');
            $this->emit('updatRole');
        }
    }

    public function delete(int $id)
    {
        $this->authorize('role_delete');
        Role::where('id', $id)->first()->delete();
        session()->flash('success', 'Roli u fshie me sukses');
    }


    public function updated($value)
    {
        $this->validateOnly($value);
        $this->setModel(Role::class, 'name');
    }


    public function render()
    {
        return view('livewire.admin.role.role-table', [
            'roles' => Role::where('name', 'like', '%' . $this->search . '%')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate_page),
            'permissions' => Permission::all(),
        ]);
    }
}
