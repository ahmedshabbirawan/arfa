<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected array $tables = [
        'attribute_types',
        'attribute_values',
        'attributes',
        'audits',
        'brands',
        'customers',
        'designations',
        'employees',
        'issuance_item',
        'issuance_item_temp',
        'locations',
        'managers',
        'measure_units',
        'organizations',
        'parent_category',
        'product_attributes',
        'product_available',
        'product_category',
        'product_category_attributes',
        'products',
        'project_ledgers',
        'projects',
        'purchase_return',
        'purchase_return_items',
        'return_details',
        'sale_carts',
        'sale_order_items',
        'sale_orders',
        'sale_return',
        'sale_return_items',
        'shops',
        'shops_admin',
        'stock_adjustments',
        'stock_audits',
        'stock_deliveries',
        'stock_deliveries_products',
        'stock_exchanges',
        'stock_items',
        'sub_category',
        'suppliers',
        'warehouses',
    ];

    public function up(): void
    {
        foreach ($this->tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->foreign('tenant_id')
                    ->references('id')
                    ->on('tenants')
                    ->cascadeOnDelete();
            });
        }

        DB::table('tenants')->insert([
            'name' => 'Default Tenant',
            'slug' => 'default',
            'is_active' => true,
            'plan' => 'free',
        ]);
        foreach ($this->tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) use ($tableName) {
                if (Schema::hasColumn($table->getTable(), 'tenant_id')) {
                    DB::table($tableName)
                        // ->whereNull('tenant_id')
                        ->update(['tenant_id' => 1]);
                }
            });
        }

        foreach ($this->tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                if (Schema::hasColumn($table->getTable(), 'tenant_id')) {
                    $table->foreign('tenant_id')
                        ->references('id')
                        ->on('tenants')
                        ->cascadeOnDelete();
                }
            });
        }

    }

    public function down(): void
    {
        foreach ($this->tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                if (Schema::hasColumn($table->getTable(), 'tenant_id')) {
                    $table->dropForeign([$table->getTable() . '_tenant_id_foreign']);
                    $table->dropColumn('tenant_id')->default(1);
                }
            });
        }
    }
};
