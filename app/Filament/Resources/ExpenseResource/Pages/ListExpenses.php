<?php

namespace App\Filament\Resources\ExpenseResource\Pages;

use App\Filament\Resources\ExpenseResource;
use App\Filament\Resources\ExpenseResource\Forms\ExportExpenseForm;
use App\Pipes\{GetExpensesPipe, NotifyPipe, SendExportMailPipe};
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Pipeline\Pipeline;

class ListExpenses extends ListRecords
{
    protected static string $resource = ExpenseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('export')
                ->label(trans('general.actions.export'))
                ->form(ExportExpenseForm::make())
                ->modal('expense-export')
                ->action(function (array $data) {
                    app(Pipeline::class)
                        ->send($data)
                        ->through([
                            GetExpensesPipe::class,
                            SendExportMailPipe::class,
                            NotifyPipe::class,
                        ])
                        ->then(function ($data) {
                            return null;
                        });
                }),
        ];
    }
}
