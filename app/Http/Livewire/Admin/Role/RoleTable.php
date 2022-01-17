<?php

namespace App\Http\Livewire\Admin\Role;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Traits\WithSorting;
use Livewire\WithPagination;
use Livewire\Component;

class RoleTable extends Component
{
    use WithPagination, WithSorting, AuthorizesRequests;

    public $search;

    public $ids, $name, $role; //role info
    public $premissions = [];
    public $premissions_per_role = [];

    public $rules = [
        'name' => 'min:3|max:40|unique:roles',
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
        $this->blankField();
        foreach ($this->premissions_per_role as $premissions) {
            $role->givePermissionTo($premissions);
        }
    }

    /**
     * Pastro te thenat
     */
    public function blankField()
    {
        $this->ids = '';
        $this->name = '';
    }

    /**
     * Jep vlerat aktuale
     */
    public function edit($id,)
    {
        $this->authorize('role_edit');
        $role = Role::where('id', $id)->first();
        $this->ids = $role->id;
        $this->role = $role->name;
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
            session()->flash('success', 'Roli u editua me Sukses');
            $this->emit('updatRole');
        }
    }

    public function delete($id)
    {
        $this->authorize('role_delete');
        Role::where('id', $id)->first()->delete();
        session()->flash('success', 'Roli u fshie me sukses');
    }


    public function updated($value)
    {
        $this->validateOnly($value);
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
