<?php
namespace App\Filament\Pages;
use BackedEnum;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
class Analytics extends Page {
 protected static string|BackedEnum|null $navigationIcon=Heroicon::OutlinedChartBarSquare;
 protected static ?string $navigationLabel='Analytics';
 protected static ?string $title='Analytics';
 protected static ?int $navigationSort=40;
 protected static string|\UnitEnum|null $navigationGroup='Management';
 protected string $view='filament.pages.analytics';
 public function getViewData(): array {
  $days=collect(range(6,0))->map(function($i){$d=now()->subDays($i);return ['label'=>$d->format('D'),'orders'=>Order::whereDate('created_at',$d)->count(),'revenue'=>(float)Order::whereDate('created_at',$d)->sum('total')];});
  return ['days'=>$days,'avg'=>Order::avg('total')?:0,'customers'=>User::where('role','customer')->count(),'products'=>Product::count()];
 }
}

