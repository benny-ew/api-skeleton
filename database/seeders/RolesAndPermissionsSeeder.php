<?php 

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Constants\Guard;


class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'retrieve.user','guard_name'=>'api']);
        Permission::create(['name' => 'retrieve.all.users','guard_name'=>'api']);
        Permission::create(['name' => 'create.user','guard_name'=>'api']);
        Permission::create(['name' => 'update.user','guard_name'=>'api']);
        Permission::create(['name' => 'delete.user','guard_name'=>'api']);

        Permission::create(['name' => 'retrieve.account','guard_name'=>'api']);
        Permission::create(['name' => 'retrieve.all.accounts','guard_name'=>'api']);
        Permission::create(['name' => 'create.account','guard_name'=>'api']);
        Permission::create(['name' => 'update.account','guard_name'=>'api']);
        Permission::create(['name' => 'delete.account','guard_name'=>'api']);

        Permission::create(['name' => 'retrieve.bankAccount','guard_name'=>'api']);
        Permission::create(['name' => 'retrieve.all.bankaccounts','guard_name'=>'api']);
        Permission::create(['name' => 'create.bankAccount','guard_name'=>'api']);
        Permission::create(['name' => 'update.bankAccount','guard_name'=>'api']);
        Permission::create(['name' => 'delete.bankAccount','guard_name'=>'api']);

        Permission::create(['name' => 'retrieve.company','guard_name'=>'api']);
        Permission::create(['name' => 'retrieve.all.companies','guard_name'=>'api']);
        Permission::create(['name' => 'create.company','guard_name'=>'api']);
        Permission::create(['name' => 'update.company','guard_name'=>'api']);
        Permission::create(['name' => 'delete.company','guard_name'=>'api']);

        Permission::create(['name' => 'retrieve.employee','guard_name'=>'api']);
        Permission::create(['name' => 'retrieve.all.employees','guard_name'=>'api']);
        Permission::create(['name' => 'create.employee','guard_name'=>'api']);
        Permission::create(['name' => 'update.employee','guard_name'=>'api']);
        Permission::create(['name' => 'delete.employee','guard_name'=>'api']);

        Permission::create(['name' => 'retrieve.bank','guard_name'=>'api']);
        Permission::create(['name' => 'retrieve.all.banks','guard_name'=>'api']);
        Permission::create(['name' => 'create.bank','guard_name'=>'api']);
        Permission::create(['name' => 'update.bank','guard_name'=>'api']);
        Permission::create(['name' => 'delete.bank','guard_name'=>'api']);

        Permission::create(['name' => 'retrieve.tax.type','guard_name'=>'api']);
        Permission::create(['name' => 'retrieve.all.tax.types','guard_name'=>'api']);
        Permission::create(['name' => 'create.tax.type','guard_name'=>'api']);
        Permission::create(['name' => 'update.tax.type','guard_name'=>'api']);
        Permission::create(['name' => 'delete.tax.type','guard_name'=>'api']);

        Permission::create(['name' => 'retrieve.invoice','guard_name'=>'api']);
        Permission::create(['name' => 'retrieve.all.invoices','guard_name'=>'api']);
        Permission::create(['name' => 'create.invoice','guard_name'=>'api']);
        Permission::create(['name' => 'update.invoice','guard_name'=>'api']);
        Permission::create(['name' => 'delete.invoice','guard_name'=>'api']);
        
        Permission::create(['name' => 'retrieve.taxItem','guard_name'=>'api']);
        Permission::create(['name' => 'retrieve.all.taxItems','guard_name'=>'api']);
        Permission::create(['name' => 'create.taxItem','guard_name'=>'api']);
        Permission::create(['name' => 'update.taxItem','guard_name'=>'api']);
        Permission::create(['name' => 'delete.taxItem','guard_name'=>'api']);
        
        Permission::create(['name' => 'retrieve.transaction','guard_name'=>'api']);
        Permission::create(['name' => 'retrieve.all.transactions','guard_name'=>'api']);
        Permission::create(['name' => 'create.transaction','guard_name'=>'api']);
        Permission::create(['name' => 'update.transaction','guard_name'=>'api']);
        Permission::create(['name' => 'delete.transaction','guard_name'=>'api']);

        Permission::create(['name' => 'dashboard','guard_name'=>'api']);
        

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'admin','guard_name'=>'api']);

        $role->givePermissionTo('retrieve.all.users');
        $role->givePermissionTo('retrieve.user');
        $role->givePermissionTo('create.user');
        $role->givePermissionTo('update.user');
        $role->givePermissionTo('delete.user');
        
        $role->givePermissionTo('retrieve.all.accounts');
        $role->givePermissionTo('retrieve.account');
        //$role->givePermissionTo('create.account');
        $role->givePermissionTo('update.account');
        $role->givePermissionTo('delete.account');
        
        $role->givePermissionTo('retrieve.all.bankaccounts');
        $role->givePermissionTo('retrieve.bankAccount');
        $role->givePermissionTo('update.bankAccount');
        $role->givePermissionTo('delete.bankAccount');
        
        $role->givePermissionTo('retrieve.all.companies');
        $role->givePermissionTo('retrieve.company');
        $role->givePermissionTo('create.company');
        $role->givePermissionTo('update.company');
        $role->givePermissionTo('delete.company');
        
        $role->givePermissionTo('retrieve.all.employees');
        $role->givePermissionTo('retrieve.employee');
        $role->givePermissionTo('create.employee');
        $role->givePermissionTo('update.employee');
        $role->givePermissionTo('delete.employee');
        
        $role->givePermissionTo('retrieve.all.banks');
        $role->givePermissionTo('retrieve.bank');
        $role->givePermissionTo('create.bank');
        $role->givePermissionTo('update.bank');
        $role->givePermissionTo('delete.bank');
        
        $role->givePermissionTo('retrieve.all.tax.types');
        $role->givePermissionTo('retrieve.tax.type');
        $role->givePermissionTo('create.tax.type');
        $role->givePermissionTo('update.tax.type');
        $role->givePermissionTo('delete.tax.type');
        
        $role->givePermissionTo('retrieve.all.invoices');
        $role->givePermissionTo('retrieve.invoice');
        $role->givePermissionTo('update.invoice');
        $role->givePermissionTo('delete.invoice');
        
        $role->givePermissionTo('retrieve.all.taxItems');
        $role->givePermissionTo('retrieve.taxItem');
        $role->givePermissionTo('update.taxItem');
        $role->givePermissionTo('delete.taxItem');
        
        $role->givePermissionTo('retrieve.all.transactions');
        $role->givePermissionTo('retrieve.transaction');
        $role->givePermissionTo('delete.transaction');

        

        $role = Role::create(['name' => 'operator','guard_name'=>'api']);

        $role->givePermissionTo('dashboard');

        $role->givePermissionTo('retrieve.all.invoices');
        $role->givePermissionTo('retrieve.invoice');
        $role->givePermissionTo('create.invoice');
        $role->givePermissionTo('update.invoice');
        $role->givePermissionTo('delete.invoice');

        $role->givePermissionTo('retrieve.all.transactions');
        $role->givePermissionTo('retrieve.transaction');
        $role->givePermissionTo('update.transaction');
        $role->givePermissionTo('delete.transaction');

        $role->givePermissionTo('retrieve.all.accounts');
        $role->givePermissionTo('retrieve.account');
        //$role->givePermissionTo('create.account');
        $role->givePermissionTo('update.account');
        $role->givePermissionTo('delete.account');
        
        $role->givePermissionTo('retrieve.all.bankaccounts');
        $role->givePermissionTo('retrieve.bankAccount');
        $role->givePermissionTo('create.bankAccount');
        $role->givePermissionTo('update.bankAccount');
        $role->givePermissionTo('delete.bankAccount');
        
        $role->givePermissionTo('retrieve.all.companies');
        $role->givePermissionTo('retrieve.company');
        $role->givePermissionTo('create.company');
        $role->givePermissionTo('update.company');
        $role->givePermissionTo('delete.company');

        $role->givePermissionTo('retrieve.all.taxItems');
        $role->givePermissionTo('retrieve.taxItem');
        $role->givePermissionTo('create.taxItem');
        $role->givePermissionTo('update.taxItem');
        $role->givePermissionTo('delete.taxItem');

        $role->givePermissionTo('retrieve.all.employees');
        $role->givePermissionTo('retrieve.employee');

        $role->givePermissionTo('retrieve.all.tax.types');
        $role->givePermissionTo('retrieve.tax.type');
        // $role->syncPermissions();
        

        $role = Role::create(['name' => 'client_operator','guard_name'=>'api']);
        $role->givePermissionTo('dashboard');
        $role->givePermissionTo('create.transaction');

        $role->givePermissionTo('retrieve.all.transactions');
        $role->givePermissionTo('retrieve.transaction');
        $role->givePermissionTo('create.transaction');
        $role->givePermissionTo('update.transaction');
        $role->givePermissionTo('delete.transaction');

        $role->givePermissionTo('retrieve.all.invoices');
        $role->givePermissionTo('retrieve.invoice');

        $role->givePermissionTo('retrieve.all.accounts');
        $role->givePermissionTo('retrieve.account');
        $role->givePermissionTo('create.account');
        $role->givePermissionTo('update.account');
        $role->givePermissionTo('delete.account');

        $role->givePermissionTo('retrieve.all.employees');
        $role->givePermissionTo('retrieve.employee');

        $role->givePermissionTo('retrieve.all.taxItems');
        $role->givePermissionTo('retrieve.taxItem');

        $role->givePermissionTo('retrieve.company');


        // $role->syncPermissions();
        

        $role = Role::create(['name' => 'client_executive','guard_name'=>'api']);
        $role->givePermissionTo('dashboard');

        $role->givePermissionTo('retrieve.all.employees');
        $role->givePermissionTo('retrieve.employee');

        $role->givePermissionTo('retrieve.all.invoices');
        $role->givePermissionTo('retrieve.invoice');

        $role->givePermissionTo('retrieve.all.accounts');
        $role->givePermissionTo('retrieve.account');

        $role->givePermissionTo('retrieve.all.transactions');
        $role->givePermissionTo('retrieve.transaction');

        $role->givePermissionTo('retrieve.company');

        // $role->syncPermissions();
        

    }
}