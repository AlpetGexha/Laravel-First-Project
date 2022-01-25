<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Category;
use Carbon\Carbon;
use Livewire\Component;

class CategotyChart extends Component
{
    public function render()
    {
        $category = Category::select('id', 'created_at')
            ->whereBetween(
                'created_at',
                [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
            )->get();

        $datas = [0, 0, 0, 0, 0, 0, 0, 0];

        foreach ($category as $category) {
            $datas[$category->created_at->dayOfWeek] = $category->count();
        }
        
        array_shift($datas);

        return view('livewire.admin.dashboard.categoty-chart', [
            'datas' => $datas
        ]);
    }
}
