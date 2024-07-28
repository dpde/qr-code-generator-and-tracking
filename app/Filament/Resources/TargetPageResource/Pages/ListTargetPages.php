<?php

namespace App\Filament\Resources\TargetPageResource\Pages;

use App\Filament\Resources\TargetPageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTargetPages extends ListRecords
{
    protected static string $resource = TargetPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
