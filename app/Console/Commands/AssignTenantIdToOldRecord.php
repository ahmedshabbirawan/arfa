<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AssignTenantIdToOldRecord extends Command
{
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

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:assign-tenant-id-to-old-record';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach ($this->tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                if (!Schema::hasColumn($table->getTable(), 'tenant_id')) {
                    $table->whereNull('tenant_id')->update(['tenant_id' => 1]);
                }
            });
        }
    }
}
