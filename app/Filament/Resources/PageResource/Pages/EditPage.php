<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
             Actions\DeleteAction::make()
                ->color('danger')
                ->icon('heroicon-o-trash'),

            Actions\CreateAction::make()
                ->color('success')
                ->url('/admin/pages/create')
                ->icon('heroicon-o-plus-circle'),
            Actions\Action::make('view')
                ->label(__("View"))
                ->color('info')
                ->url(route('page.show', $this->record->slug))
                ->openUrlInNewTab()
                ->icon('heroicon-o-rocket-launch'),
        ];
    }
}
