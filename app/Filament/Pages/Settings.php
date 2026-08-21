<?php
namespace App\Filament\Pages;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
class Settings extends Page {
 protected static string|BackedEnum|null $navigationIcon=Heroicon::OutlinedCog6Tooth;
 protected static ?string $navigationLabel='Settings';
 protected static ?string $title='Settings';
 protected static ?int $navigationSort=60;
 protected static string|\UnitEnum|null $navigationGroup='Management';
 protected string $view='filament.pages.settings';
}

