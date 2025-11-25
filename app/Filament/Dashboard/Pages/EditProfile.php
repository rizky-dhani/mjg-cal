<?php

namespace App\Filament\Dashboard\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Pages\Dashboard;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Auth\Pages\EditProfile as BaseEditProfile;

class EditProfile extends BaseEditProfile
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                $this->getNameFormComponent(),
                TextInput::make('initial')
                    ->label('Initial'),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }

    public function getSavedNotificationTitle(): string|null
    {
        return 'Profile updated successfully';
    }

    protected function getRedirectUrl(): string|null
    {
        return Dashboard::getUrl();
    }
    
}
