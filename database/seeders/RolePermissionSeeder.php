<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();


        /*
        |--------------------------------------------------------------------------
        | Permissions
        |--------------------------------------------------------------------------
        */

        $permissions = [

            // Company
            'company.view',
            'company.create',
            'company.edit',
            'company.delete',

            // Branch
            'branch.view',
            'branch.create',
            'branch.edit',
            'branch.delete',

            // User
            'user.view',
            'user.create',
            'user.edit',
            'user.delete',

            // Product
            'product.view',
            'product.create',
            'product.edit',
            'product.delete',

            // Category
            'category.view',
            'category.create',
            'category.edit',
            'category.delete',

            // Customer
            'customer.view',
            'customer.create',
            'customer.edit',
            'customer.delete',

            // Supplier
            'supplier.view',
            'supplier.create',
            'supplier.edit',
            'supplier.delete',

            // Purchase
            'purchase.view',
            'purchase.create',
            'purchase.edit',
            'purchase.delete',
            'purchase.approve',

            // Sale
            'sale.view',
            'sale.create',
            'sale.edit',
            'sale.delete',
            'sale.return',

            // Stock
            'stock.view',
            'stock.adjust',
            'stock.transfer',

            // Expense
            'expense.view',
            'expense.create',
            'expense.edit',
            'expense.delete',

            // Reports
            'report.sales',
            'report.purchase',
            'report.stock',
            'report.expense',
            'report.profit',
        ];


        foreach ($permissions as $permission) {

            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);

        }


        /*
        |--------------------------------------------------------------------------
        | Roles
        |--------------------------------------------------------------------------
        */

        $superAdmin = Role::firstOrCreate([
            'name' => 'Super Admin',
            'guard_name' => 'web',
        ]);

        $companyAdmin = Role::firstOrCreate([
            'name' => 'Company Admin',
            'guard_name' => 'web',
        ]);

        $branchManager = Role::firstOrCreate([
            'name' => 'Branch Manager',
            'guard_name' => 'web',
        ]);

        $cashier = Role::firstOrCreate([
            'name' => 'Cashier',
            'guard_name' => 'web',
        ]);

        $salesman = Role::firstOrCreate([
            'name' => 'Salesman',
            'guard_name' => 'web',
        ]);

        $stockManager = Role::firstOrCreate([
            'name' => 'Stock Manager',
            'guard_name' => 'web',
        ]);

        $accountant = Role::firstOrCreate([
            'name' => 'Accountant',
            'guard_name' => 'web',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Super Admin
        |--------------------------------------------------------------------------
        */

        $superAdmin->syncPermissions(
            Permission::all()
        );


        /*
        |--------------------------------------------------------------------------
        | Company Admin
        |--------------------------------------------------------------------------
        */

        $companyAdmin->syncPermissions([

            'company.view',

            'branch.view',
            'branch.create',
            'branch.edit',
            'branch.delete',

            'user.view',
            'user.create',
            'user.edit',

            'product.view',
            'product.create',
            'product.edit',
            'product.delete',

            'category.view',
            'category.create',
            'category.edit',
            'category.delete',

            'customer.view',
            'customer.create',
            'customer.edit',
            'customer.delete',

            'supplier.view',
            'supplier.create',
            'supplier.edit',
            'supplier.delete',

            'purchase.view',
            'purchase.create',
            'purchase.edit',
            'purchase.delete',
            'purchase.approve',

            'sale.view',
            'sale.create',
            'sale.edit',
            'sale.delete',
            'sale.return',

            'stock.view',
            'stock.adjust',
            'stock.transfer',

            'expense.view',
            'expense.create',
            'expense.edit',
            'expense.delete',

            'report.sales',
            'report.purchase',
            'report.stock',
            'report.expense',
            'report.profit',

        ]);


        /*
        |--------------------------------------------------------------------------
        | Branch Manager
        |--------------------------------------------------------------------------
        */

        $branchManager->syncPermissions([

            'user.view',

            'product.view',

            'category.view',

            'customer.view',
            'customer.create',
            'customer.edit',

            'supplier.view',

            'purchase.view',
            'purchase.create',
            'purchase.edit',

            'sale.view',
            'sale.create',
            'sale.edit',
            'sale.return',

            'stock.view',
            'stock.adjust',
            'stock.transfer',

            'expense.view',
            'expense.create',

            'report.sales',
            'report.purchase',
            'report.stock',
            'report.expense',

        ]);


        /*
        |--------------------------------------------------------------------------
        | Cashier
        |--------------------------------------------------------------------------
        */

        $cashier->syncPermissions([

            'product.view',

            'category.view',

            'customer.view',
            'customer.create',
            'customer.edit',

            'sale.view',
            'sale.create',
            'sale.return',

        ]);


        /*
        |--------------------------------------------------------------------------
        | Salesman
        |--------------------------------------------------------------------------
        */

        $salesman->syncPermissions([

            'product.view',

            'category.view',

            'customer.view',
            'customer.create',
            'customer.edit',

            'sale.view',
            'sale.create',

        ]);


        /*
        |--------------------------------------------------------------------------
        | Stock Manager
        |--------------------------------------------------------------------------
        */

        $stockManager->syncPermissions([

            'product.view',
            'product.create',
            'product.edit',

            'category.view',
            'category.create',
            'category.edit',

            'supplier.view',
            'supplier.create',
            'supplier.edit',

            'purchase.view',
            'purchase.create',
            'purchase.edit',

            'stock.view',
            'stock.adjust',
            'stock.transfer',

            'report.purchase',
            'report.stock',

        ]);


        /*
        |--------------------------------------------------------------------------
        | Accountant
        |--------------------------------------------------------------------------
        */

        $accountant->syncPermissions([

            'customer.view',

            'supplier.view',

            'purchase.view',

            'sale.view',

            'expense.view',
            'expense.create',
            'expense.edit',

            'report.sales',
            'report.purchase',
            'report.expense',
            'report.profit',

        ]);


        app()[PermissionRegistrar::class]->forgetCachedPermissions();
    }
}