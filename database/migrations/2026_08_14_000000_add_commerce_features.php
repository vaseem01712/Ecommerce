<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->enum('discount_type', ['percent', 'fixed'])->nullable()->after('sale_price');
            $table->decimal('discount_value', 10, 2)->nullable()->after('discount_type');
            $table->string('badge_text')->nullable()->after('discount_value');
            $table->timestamp('discount_starts_at')->nullable()->after('badge_text');
            $table->timestamp('discount_ends_at')->nullable()->after('discount_starts_at');
        });
        Schema::create('coupons', function (Blueprint $table) {
            $table->id(); $table->string('code')->unique();
            $table->enum('type', ['percent', 'fixed']); $table->decimal('value', 10, 2);
            $table->decimal('minimum_order', 10, 2)->default(0); $table->unsignedInteger('usage_limit')->nullable();
            $table->unsignedInteger('uses')->default(0); $table->timestamp('starts_at')->nullable(); $table->timestamp('expires_at')->nullable();
            $table->boolean('is_active')->default(true); $table->timestamps();
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->string('number')->nullable()->unique()->after('id'); $table->string('coupon_code')->nullable()->after('subtotal');
            $table->decimal('discount', 10, 2)->default(0)->after('coupon_code'); $table->string('tracking_number')->nullable()->after('status');
            $table->string('tracking_url')->nullable()->after('tracking_number'); $table->timestamp('shipped_at')->nullable(); $table->timestamp('delivered_at')->nullable();
        });
        Schema::table('order_items', function (Blueprint $table) { $table->decimal('original_price', 10, 2)->nullable()->after('price'); });
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); $table->foreignId('product_id')->constrained()->cascadeOnDelete(); $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('rating'); $table->string('title')->nullable(); $table->text('body')->nullable(); $table->boolean('is_approved')->default(false); $table->timestamps();
            $table->unique(['product_id', 'user_id']);
        });
    }
    public function down(): void { Schema::dropIfExists('reviews'); Schema::dropIfExists('coupons'); Schema::table('order_items', fn(Blueprint $t) => $t->dropColumn('original_price')); Schema::table('orders', fn(Blueprint $t) => $t->dropColumn(['number','coupon_code','discount','tracking_number','tracking_url','shipped_at','delivered_at'])); Schema::table('products', fn(Blueprint $t) => $t->dropColumn(['discount_type','discount_value','badge_text','discount_starts_at','discount_ends_at'])); }
};
