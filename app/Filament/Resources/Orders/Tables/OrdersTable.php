<?php
namespace App\Filament\Resources\Orders\Tables;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
class OrdersTable {
 public static function configure(Table $table): Table { return $table->columns([
  TextColumn::make('id')->label('#')->sortable(),TextColumn::make('name')->searchable(),TextColumn::make('email')->searchable(),
  TextColumn::make('total')->money('INR')->sortable(),TextColumn::make('status')->badge()->sortable(),TextColumn::make('payment_status')->badge(),
  TextColumn::make('created_at')->dateTime()->sortable(),
  ])->filters([])->recordActions([ViewAction::make(),EditAction::make()])->toolbarActions([BulkActionGroup::make([DeleteBulkAction::make()])]);}
}

