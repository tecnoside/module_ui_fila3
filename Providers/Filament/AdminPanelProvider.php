<?php

declare(strict_types=1);

namespace Modules\UI\Providers\Filament;

use Filament\Facades\Filament;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    private string $module = 'UI';

    public function panel(Panel $panel): Panel
    {
        $moduleNamespace = $this->getModuleNamespace();
        $panel = $panel
            ->id('ui::admin')
            ->path('ui/admin')
            ->colors([
                'primary' => Color::Teal,
            ])
            ->discoverResources(in: base_path('Modules/'.$this->module.'/Filament/Resources'), for: "{$moduleNamespace}\\Filament\\Resources")
            ->discoverPages(in: base_path('Modules/'.$this->module.'/Filament/Admin/Pages'), for: "{$moduleNamespace}\\Filament\\Admin\\Pages")
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: base_path('Modules/'.$this->module.'/Filament/Admin/Widgets'), for: "{$moduleNamespace}\\Filament\\Admin\\Widgets")
            ->widgets([
                Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);

        /*
        $adminPanel = Filament::getPanel('admin');

        $adminPanel
         ->navigationItems([
             NavigationItem::make('Users')
                 ->url($panel->getUrl(), shouldOpenInNewTab: false)
                 ->icon('heroicon-o-users')
                 ->group('Modules')
                 ->sort(3),
         ]);

         */
        return $panel;
    }

    protected function getModuleNamespace(): string
    {
        return config('modules.namespace').'\\'.$this->module;
    }
}
