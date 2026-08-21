<?php
namespace App\Filament\Resources\Orders\Schemas;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
class OrderForm {
 public static function configure(Schema $schema): Schema { return $schema->components([
  Select::make('status')->options(['pending'=>'Pending','processing'=>'Processing','shipped'=>'Shipped','delivered'=>'Delivered','cancelled'=>'Cancelled'])->required(),
  Select::make('payment_status')->options(['unpaid'=>'Unpaid','paid'=>'Paid','failed'=>'Failed'])->required(),
  \Filament\Forms\Components\TextInput::make('tracking_number')->maxLength(100),
  \Filament\Forms\Components\TextInput::make('tracking_url')->url()->maxLength(255),
  \Filament\Forms\Components\DateTimePicker::make('shipped_at')->nullable(),
  \Filament\Forms\Components\DateTimePicker::make('delivered_at')->nullable(),
 ]); }
}

