<?php

namespace App\Filament\Resources\TargetPageResource\Pages;

use App\Filament\Resources\TargetPageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTargetPage extends EditRecord
{
    protected static string $resource = TargetPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
