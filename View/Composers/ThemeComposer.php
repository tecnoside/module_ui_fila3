<?php

declare(strict_types=1);

namespace Modules\UI\View\Composers;

class ThemeComposer
{
    public function metatags(): string
    {
        return '';
    }

    public function metatag(): string
    {
        return '';
    }

    public function showScripts(): string
    {
        return '';
    }

    public function flag(string $lang): \Illuminate\View\View
    {
        return view("ui::svg.flags.{$lang}");
    }
}
