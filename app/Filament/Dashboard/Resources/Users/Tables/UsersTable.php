<?php

namespace App\Filament\Dashboard\Resources\Users\Tables;

use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Hash;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function($query){
                $query->where('id', '!=', auth()->user()->id)->orderByDesc('created_at');
            })
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('initial')
                    ->searchable(),
                TextColumn::make('roles.name')
            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('reset_password')
                    ->icon(Heroicon::ArrowPathRoundedSquare)
                    ->color('warning')
                    ->requiresConfirmation()
                    ->visible(fn() => auth()->user()->can('reset-password-users'))
                    ->action(function($record){
                        $record->update([
                            'password' => Hash::make('Calibration2025!')
                        ]);
                    })
                    ->successNotificationTitle('User Password reseted successfully'),
                EditAction::make()
                    ->successNotificationTitle('User updated successfully'),
                DeleteAction::make()
                    ->successNotificationTitle('User deleted successfully'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                    ->successNotificationTitle('Selected User(s) deleted successfully'),
                ]),
            ]);
    }
}
