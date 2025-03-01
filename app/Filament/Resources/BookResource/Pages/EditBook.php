<?php

namespace App\Filament\Resources\BookResource\Pages;

use App\Filament\Resources\BookResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

class EditBook extends EditRecord
{
    protected static string $resource = BookResource::class;

    public function getTitle(): string|Htmlable
    {
        return new HtmlString("<span class='text-xl'>{$this->getRecordTitle()} </span>");
    }

    protected function getHeaderActions(): array
    {

        return [
            Actions\DeleteAction::make()
                ->color('danger')
                ->icon('heroicon-o-trash'),

            Actions\CreateAction::make()
                ->color('success')
                ->url('/admin/books/create')
                ->icon('heroicon-o-plus-circle'),
            Actions\Action::make('view')
                ->label(__("Voir"))
                ->color('info')
                ->url(route('books.show', $this->record->slug))
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-rocket-launch'),
        ];
    }
}
