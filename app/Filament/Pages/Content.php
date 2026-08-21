<?php
namespace App\Filament\Pages;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
class Content extends Page {
 protected static string|BackedEnum|null $navigationIcon=Heroicon::OutlinedSquares2x2;
 protected static ?string $navigationLabel='Content';
 protected static ?string $title='Content';
 protected static ?int $navigationSort=50;
 protected static string|\UnitEnum|null $navigationGroup='Management';
 protected string $view='filament.pages.content';
}

