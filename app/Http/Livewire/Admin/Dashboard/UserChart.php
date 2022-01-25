<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserChart extends Component
{
    public function render()
    {
        $users = User::select('id', 'created_at')
            ->whereBetween(
                'created_at',
                [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
            )->get();

        $datas = [0, 0, 0, 0, 0, 0, 0, 0];

        foreach ($users as $user) {
            $datas[$user->created_at->dayOfWeek] = $user->count();
        }

        array_shift($datas);

        return view('livewire.admin.dashboard.user-chart', [
            'datas' => $datas
        ]);
    }
}
