<?php

namespace App\Filament\Resources\DemoPageResource\Pages;

use App\Filament\Resources\DemoPageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDemoPage extends EditRecord
{
    protected static string $resource = DemoPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
