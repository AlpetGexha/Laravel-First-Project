<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use App\Traits\WithCheckbox;
use App\Traits\WithSorting;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;


class UserTable extends Component
{
    use WithPagination, WithSorting, WithCheckbox, AuthorizesRequests;

    public $search;

    public $user, $ids, $name, $mbiemri, $email, $username, $photo, $created_at, $last_seen, $online, $bannedStatus;
    public $bio, $url, $facebook, $twitter, $instagram, $youtube, $linkedin, $github;
    public $postsCount, $commentsCount, $likesCount, $dislikesCount, $followersCount, $followingCount;
    public $selectRoles = [];
    public $user_roles = [];
    public $userBanData = ['0', '1', '5', '7', '30', '90', '150', '365']; //ditë
    public $userBanTime;
    public $rules = [
        'categoria' => 'min:3|max:255'
    ];

    public $queryString = [
        'page' => ['except' => 1],
        'search' => ['except' => '', 'as' => 'q'],
    ];


    /**
     * Informacionet për userat
     * 
     * @param int $id id e userit
     */
    public function  showUser(int $id)
    {
        $this->authorize('user_show');
        $user = User::findOrFail($id);
        // $this->ids = $user->id;
        $this->photo = $user->photo;
        $this->name = $user->name;
        $this->mbiemri = $user->mbiemri;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->created_at = $user->created_at;
        $this->selectRoles = $user->getRoleNames();
        $this->last_seen = Carbon::parse($user->last_login_at)->diffForHumans();
        $this->postsCount = $user->post()->count();
        $this->likesCount = $user->likes()->count();
        $this->followersCount = $user->followers()->count();
        $this->bannedStatus = "Përdoruesi nuk është i suspenduar";
        if ($user->banned_till != null) {
            if ($user->banned_till == 0) {
                $this->bannedStatus = "Suspedim i Përjetshëm";
            }
            if (now()->lessThan($user->banned_till)) {
                $banned_days = now()->diffInDays($user->banned_till) + 1;
                $this->bannedStatus = "Suspedim për " . $banned_days . ' ' . Str::plural('ditë', $banned_days);
            }
        }
        // $this->followingCount = $user->following();
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

    /**
     * Shfaq rolet e userit
     * 
     * @param int $id id e userit
     */
    public function editRole($id)
    {
        $this->authorize('user_give_role');
        $user = User::findOrFail($id);
        $this->ids = $user->id;
        $this->selectRoles = $user->roles->pluck('id');
    }

    /**
     * Ndryshoni rolet e userit
     */

    public function updateRole()
    {
        $this->authorize('user_give_role');
        $user = User::findOrFail($this->ids);
        //check if slectRole has SuperAdmin role

        // dd($this->selectRoles);
        if (!$user->hasRole('Super Admin') && in_array(1, $this->selectRoles)) {
            $user->syncRoles($this->selectRoles);
            $this->emit('updateRole');
            session()->flash('message', 'Roli u ndryshua me sukses');
        } else {
            $this->addError('SPError', 'Nuk mund ta hiqni rolin e Super Adminit');
        }
        // $this->selectRoles = $user->roles->pluck('id');
    }
    /**
     * Verikiko Userin
     * 
     * @param int $id id e userit
     */

    public function verified(int $id)
    {
        $this->authorize('user_give_verify');
        $user = User::findOrFail($id);
        $user->verified = 1;
        $user->save();
        $this->emit('verified');
        session()->flash('success', 'Përdoruesi u verifikua me sukses');
    }

    /**
     * Hiq Verifikimin e Userit
     * 
     * @param int $id id e userit
     */
    public function unverified(int $id)
    {
        $this->authorize('user_give_verify');
        $user = User::findOrFail($id);
        $user->verified = 0;
        $user->save();
        $this->emit('unverified');
        session()->flash('success', 'Përdoruesit ju hoq verifikimi me sukses');
    }

    /**
     * Fshije Userin
     * 
     * @param int $id id e userit
     */
    public function delete(int $id)
    {
        $this->authorize('user_delete');
        $user = User::findOrFail($id);
        if (auth()->user()->id === $user->id) {
            session()->flash('error', ' Ju nuk mund ta fshini veten');
            return redirect()->back();
        } else {
            $user->delete();
            session()->flash('success', 'User u fshie me sukses');
            return redirect()->back();
        }

        $this->emit('delete');
        session()->flash('success', 'Përdoruesi u fshie me sukses');
    }

    public function ban()
    {
        $this->authorize('user_give_ban');

        if ($this->ids) {
            $user = User::findOrFail($this->ids);
            $userBanTime = Carbon::now()->addDays($this->userBanTime);

            if ($this->userBanTime == 0) {
                $user->banned_till = 0;
            } else {
                $user->banned_till = $userBanTime;
            }

            //flase if  user id is same with auth id
            if (auth()->user()->id === $user->id) {
                session()->flash('success', 'Ju nuk mund ta suspendoni veten');
                return false;
            }

            if ($user->hasRole('Super Admin')) {
                session()->flash('success', 'Ju nuk mund ta suspendoni Super Adminin');
                return false;
            }

            if ($user->save()) {
                $message = "Përdoruesi " . $user->username . " u Suspendua për " . $userBanTime->diffForHumans();
                session()->flash('success', $message);
                return true;
            }
        }
    }

    public function unban(int $id)
    {
        $this->authorize('user_give_unban');
        $user = User::findOrFail($id);
        $user->banned_till = null;
        $user->save();
        session()->flash('success', "Përdoruesit " . $user->username . " ju hoq suspendimi");
    }

    public function userBanEdit(int $id)
    {
        $this->ids = $id;

        $user = User::findOrFail($this->ids);
        $this->username = $user->username;
    }

    public function updated()
    {
        $this->setModel(user::class, 'username', 'verified');
    }

    public function render()
    {
        return view('livewire.admin.user.user-table', [
            'users' => User::where('username', 'like', '%' . $this->search . '%')
                // ->with('roles', 'profile', 'post', 'likes', 'followers')
                ->when($this->status, fn ($query, $status) => $query->where('verified', $this->status))
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate_page),
            'roles' => Role::orderBy($this->sortBy, $this->sortDirection)->get(),
            // 'permissions' => Permission::all(),  
        ]);
    }
}
