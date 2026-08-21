<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Coupon extends Model {
    protected $fillable=['code','type','value','minimum_order','usage_limit','uses','starts_at','expires_at','is_active'];
    protected $casts=['starts_at'=>'datetime','expires_at'=>'datetime','is_active'=>'boolean'];
    public function setCodeAttribute($value): void { $this->attributes['code'] = strtoupper(trim((string) $value)); }
    public function validFor(float $subtotal): bool { return $this->is_active && $subtotal >= $this->minimum_order && (!$this->starts_at || $this->starts_at->isPast()) && (!$this->expires_at || $this->expires_at->isFuture()) && (!$this->usage_limit || $this->uses < $this->usage_limit); }
    public function discountFor(float $subtotal): float { return min($subtotal, $this->type === 'percent' ? $subtotal * ($this->value / 100) : $this->value); }
}
