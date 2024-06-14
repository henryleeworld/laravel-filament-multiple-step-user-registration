<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
 
class Registration extends Register
{
    protected ?string $maxWidth = '2xl';
 
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make(__('Contact'))
                        // ->description(__('Contact'))
                        ->schema([
                            $this->getNameFormComponent(),
                            $this->getEmailFormComponent(),
                        ]),
                    Wizard\Step::make(__('Social'))
                        // ->description(__('Social'))
                        ->schema([
                            $this->getGithubFormComponent(),
                            $this->getTwitterFormComponent(),
                        ]),
                    Wizard\Step::make(__('Password'))
                        // ->description(__('Password'))
                        ->schema([
                            $this->getPasswordFormComponent(),
                            $this->getPasswordConfirmationFormComponent(),
                        ]),
                ])->submitAction(new HtmlString(Blade::render(<<<BLADE
                    <x-filament::button
                        type="submit"
                        size="sm"
                        wire:submit="register"
                    >{{ __('Register') }}</x-filament::button>
                    BLADE))),
            ]);
    }
 
    protected function getFormActions(): array
    {
        return [];
    }
 
    protected function getGithubFormComponent(): Component
    {
        return TextInput::make('github')
            ->prefix('https://github.com/')
            ->label(__('GitHub'))
            ->maxLength(255);
    }
 
    protected function getTwitterFormComponent(): Component
    {
        return TextInput::make('twitter')
            ->prefix('https://x.com/')
            ->label(__('X (Twitter)'))
            ->maxLength(255);
    }
}
