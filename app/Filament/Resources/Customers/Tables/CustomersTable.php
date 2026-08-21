<?php
namespace App\Filament\Resources\Customers\Tables;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
class CustomersTable { public static function configure(Table $table): Table { return $table->columns([
 TextColumn::make('name')->searchable()->sortable(),TextColumn::make('email')->searchable(),TextColumn::make('orders_count')->counts('orders')->label('Orders'),TextColumn::make('created_at')->date()->sortable(),
 ])->recordActions([ViewAction::make()]); } }

