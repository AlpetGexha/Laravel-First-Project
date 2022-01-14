<?php

namespace App\Http\Livewire\User;

use App\Models\UserProfile;
use Livewire\Component;

class Profile extends Component
{
    public $bio, $url, $github, $twitter, $facebook, $instagram, $linkedin, $youtube;

    public $user;

    public function mount()
    {
        $this->user =  UserProfile::where('user_id', auth()->user()->id)->first();
        $this->bio = $this->user->bio;
        $this->url = $this->user->url;
        $this->github = $this->user->github;
        $this->twitter = $this->user->twitter;
        $this->facebook = $this->user->facebook;
        $this->instagram = $this->user->insstagram;
        $this->linkedin = $this->user->linkedin;
        $this->youtube = $this->user->youtube;
    }

    protected  $rules = [
        'bio' => 'max:500',
        'url' => 'url',
        'github' => '',
        'twitter' => '',
        'facebook' => '',
        'instagram' => '',
        'linkedin' => '',
        'youtube' => '',
    ];

    public function updateSocialProfileInformation()
    {
        $this->validate();
        $user =  $this->user;
        $user->update([
            'bio' => $this->bio,
            'url' => $this->url,
            'github' => $this->github,
            'instagram' => $this->instagram,
            'twitter' => $this->twitter,
            'youtube' => $this->youtube,
            'linkedin' => $this->linkedin,
            'facebook' => $this->facebook,
        ]);
        //Nese jane jane empty kthen nulls
        if (empty($this->github)) {
            $user->update([
                'github' => null,
            ]);
        }

        if (empty($this->instagram)) {
            $user->update([
                'instagram' => null,
            ]);
        }

        if (empty($this->twitter)) {
            $user->update([
                'twitter' => null,
            ]);
        }


        if (empty($this->facebook)) {
            $user->update([
                'facebook' => null,
            ]);
        }

        if (empty($this->youtube)) {
            $user->update([
                'youtube' => null,
            ]);
        }

        if (empty($this->linkedin)) {
            $user->update([
                'linkedin' => null,
            ]);
        }

        if ($user->save()) {
            session()->flash('success', 'Profile Updated');
        }
    }

    public function create()
    {
        //create only one user profile
        $user = UserProfile::find(auth()->user()->id);
        if (!$user) {
            $user = UserProfile::create([
                'user_id' => auth()->user()->id,
            ]);
        }
    }
    public  function updated($value)
    {
        $this->validateOnly($value);
    }

    public function render()
    {
        return view('livewire.user.profile', [
            'user' => $this->user
        ]);
    }
}
