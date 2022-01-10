<?php

namespace App\Traits;

trait WithSorting
{
    /** listo nga by defaul id */
    public $sortBy = 'id';

    /** vjetersia e postimit */
    public $sortDirection = 'asc';

    /** Lista Numrave te faqeve (Per page) @var array */
    public $page_numer = [10, 20, 50, 70, 100];

    /** numri i faqeve (paginate)  */
    public $paginate_page;

    /** Thema per paginate */
    protected $paginationTheme = 'bootstrap';

    /**
     * Rendit nga  "username"
     * @param String $field 
     */
    public function sortBy(String $field)
    {
        $this->sortDirection = $this->sortBy === $field
            ? $this->reverseSort()
            : 'asc';

        $this->sortBy = $field;
    }

    public function reverseSort()
    {
        return $this->sortDirection === 'asc'
            ? 'desc'
            : 'asc';
    }
}
