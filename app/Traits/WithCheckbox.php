<?php

namespace App\Traits;

trait WithCheckbox
{
    /**
     * Selektimi i rreshtave qe do te shfaqen ne tabele
     * @var array
     * @return array
     */
    public  $selectIteams = [];

    /**
     * Selektimi i faqes 
     */
    public  $selectPage = false;

    /**
     * Selektimi i të gjitha faqeves
     */
    public  $selectAll = false;

    /**
     * Kjo vlen për classe qe deshirojm te perdoret per checkbox
     * @var class
     */
    public $model;

    /**
     * Kjo vlen për një variabël që do të përdoret si search
     * @var string
     */
    public $model_search_name;

    /**
     * Definimi i modelit(Databases)   "user::class"
     * @param class $class
     * @param string $model_search_name Emri i variabël që do të përdoret si search
     * @return class
     */

    public function setModel($class, $model_search_name = 'name')
    {
        $this->model = $class;
        $this->model_search_name = $model_search_name;
    }

    /**
     * Selektimi i të gjitha rreshtave
     */
    public function selectAll()
    {
        $this->selectAll = true;
        $this->selectIteams = $this->model::pluck('id');
    }

    /**
     * Selektimi i të gjitha rreshtave
     */
    public function unSelectAll()
    {
        $this->selectIteams = [];
        $this->blankFild();
    }

    /**
     * Fshirja e të gjitha rreshtave që jane selektuar
     */
    public function deleteSelectIteams()
    {
        $this->model::whereIn('id', $this->selectIteams)->delete();
        // dd($this->selectIteams);
        session()->flash('success', ' ' . count($this->selectIteams) . ' kolona u fshien  me success');
        $this->selectIteams = [];
        $this->blankFild();
    }

    /**
     * Selektimi i rreshtave qe do te shfaqen vetem në atë faqe
     */

    public function selectAllHere()
    {
        $select = $this->model::where($this->model_search_name, 'like', '%' . $this->search . '%')
            ->paginate($this->paginate_page)
            ->pluck('id')->map(fn ($id) => (string) $id);
        array_push($this->selectIteams, $select);
        $this->blankFild();
    }

    /**
     * Selektoj te gjitha rreshtat qe jane ne faqen që janë bërë search
     */
    public function selectAllOnSearch()
    {
        $this->selectIteams = $this->model::where($this->model_search_name, 'like', '%' . $this->search . '%')
            ->pluck('id');

        $this->blankFild();
    }


    public function updatedSelectPage($value)
    {
        if ($value) {
            $this->selectIteams = $this->model::where($this->model_search_name, 'like', '%' . $this->search . '%')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate_page)
                ->pluck('id')->map(fn ($id) => (string) $id);
        } else {
            $this->selectIteams = [];
        }
    }

    /**
     * Restarto numrin e faqeve kur behet serach
     */
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function blankFild()
    {
        $this->selectAll = false;
        $this->selectPage = false;
    }
}
