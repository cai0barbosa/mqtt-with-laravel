<?php

namespace App\Livewire;

use App\Models\AgencyDoorOpening;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AgencyDoorOpeningTable extends DataTableComponent
{
    protected $model = AgencyDoorOpening::class;

    public function configure() : void
    {
        $this->setPrimaryKey('id');
    }
    public function columns() : array
    {
        return [
            Column::make('Id')
                  ->sortable()
                  ->searchable(),
            Column::make('Agency', 'agency.name')
                  ->sortable()
                  ->searchable(),
            Column::make('Date', 'date')
                  ->sortable()
                  ->searchable(),
            Column::make('Status', 'status')
                  ->sortable()
                  ->searchable(),
        ];
    }
}
