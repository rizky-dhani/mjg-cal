<?php

namespace App\Filament\Dashboard\Resources\Users\Pages;

use App\Imports\UserImport;
use Filament\Notifications\Notification;
use Filament\Support\Enums\Width;
use Filament\Actions\{
    Action,
    CreateAction
};
use Filament\Resources\Pages\ListRecords;
use App\Filament\Dashboard\Resources\Users\UserResource;
use Filament\Forms\Components\FileUpload;
use Maatwebsite\Excel\Facades\Excel;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('import_users')
                ->label(__('users.import_users'))
                ->button()
                ->modalWidth(Width::Medium)
                ->form([
                    FileUpload::make('import_file')
                        ->label('Excel File')
                        ->required()
                        ->acceptedFileTypes(['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'text/csv', 'application/vnd.ms-excel'])
                        ->maxSize(10240) // 10MB
                        ->disk('local')
                        ->directory('imports')
                        ->visibility('private')
                        ->helperText('Upload an Excel file (.xlsx, .csv) containing users to import. The file should have columns: name, email (password will be automatically generated)')
                        ->columnSpanFull(),
                ])
                ->action(function (array $data): void {
                    try {
                        $import = new UserImport();
                        $filePath = $data['import_file'];

                        // Check if the file exists in storage
                        if (!\Storage::exists($filePath)) {
                            throw new \Exception("File does not exist: {$filePath}");
                        }

                        Excel::import($import, $filePath);

                        Notification::make()
                            ->title(__('users.actions.import_success'))
                            ->success()
                            ->send();
                    } catch (\Exception $e) {
                        Notification::make()
                            ->title('Import failed')
                            ->body($e->getMessage())
                            ->danger()
                            ->send();
                    }
                })
                ->modalHeading('Import Users')
                ->modalDescription('Upload an Excel file to import users.')
                ->modalSubmitActionLabel('Import'),
            CreateAction::make()
                ->color('success')
                ->modalWidth(Width::SevenExtraLarge)
                ->successNotificationTitle(__('users.actions.create_success', ['label' => __('users.label')])),
        ];
    }
}
