<?php

use App\Models\Sale;
use App\Models\User;
use App\Models\Expense;
use App\Models\Draft;
use App\Models\Product;
use App\Models\Category;
use Mike42\Escpos\Printer;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\ReturnListController;
use App\Http\Controllers\ExpenseListController;
use App\Http\Controllers\Kitchen\KichenController;
use App\Http\Controllers\product\ProductController;
use App\Http\Controllers\Admin\Report\SaleController;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use App\Http\Controllers\Admin\Report\StockController;
use App\Http\Controllers\Kitchen\KichenTypeController;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use App\Http\Controllers\inventory\RawInventoryController;
use App\Http\Controllers\Admin\category\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 Route::get('/clear-cache', function () {
      Artisan::call('cache:clear');
      Artisan::call('route:clear');
      Artisan::call('view:clear');
      Artisan::call('config:clear');
      return "Cache is cleared";
   });

 Route::get('/', function () {

     return redirect('/login');
});

Route::group(['middleware' => ['role:SuperAdmin|Inventory|Cashier|auth']], function () {
    Route::get('/index', function () {
        $productCount = Product::all()->count();
        $saleCount = Sale::all()->count();
        $expenseCount = Expense::all()->count();
        $draftcount = Draft::all()->count();
        $cartCollection = \Cart::getContent();
        $items = Product::with('category')->where('active', 1)->get();
        $categories = Category::all();
        $userCount = User::all()->count();


        return view('welcome', compact('productCount', 'saleCount','items', 'draftcount', 'categories', 'cartCollection','expenseCount','userCount'));
    });
});
  Route::group(['middleware' => ['role:SuperAdmin|Cashier']], function () {
    //cashier
    // Route::get('pos', [PosController::class, 'index']);
    Route::post('pos/add-cart', [PosController::class, 'add'])->name('pos.add-cart');
    Route::post('/remove', [PosController::class, 'remove'])->name('cart.remove');
    Route::post('/update', [PosController::class, 'update'])->name('cart.update');
    Route::post('/clear', [PosController::class, 'clear'])->name('cart.clear');
    Route::post('/draft', [PosController::class, 'draft'])->name('cart.draft');
    Route::post('/draft/show', [PosController::class, 'draftshow'])->name('draft.show');
    Route::post('/draft/delete', [PosController::class, 'draftdelete'])->name('draft.dlt');
    Route::post('/draft/edit', [PosController::class, 'draftEdit'])->name('draft.edit');
    Route::post('/checkout', [PosController::class, 'checkout'])->name('checkout');

    //Generate receipt
    Route::get('receipt', [PosController::class, 'generateReceipt'])->name('generateReceipt');
    //Print receipt
     Route::get('print-receipt', [PosController::class, 'printReceipt'])->name('printReceipt');

     Route::post('pos/add-returncart', [PosController::class, 'returncart'])->name('pos.add-returncart');

     Route::post('product/category', [ProductController::class, 'subcategory'])->name('category.sub');


});


Route::group(['middleware' => 'role:SuperAdmin'], function () {
    //Sale Return
    Route::get('sale/return', [ReturnListController::class, 'saleReturn'])->name('sale.return');
    Route::post('return/detail', [ReturnListController::class, 'returnDetail'])->name('return.detail');
    Route::get('day-sale-return', [ReturnListController::class, 'daySalesReturn'])->name('day.sale-return');
    Route::get('week-sale-return', [ReturnListController::class, 'weekSalesReturn'])->name('week.sale-return');
    Route::get('month-sale-return', [ReturnListController::class, 'monthSalesReturn'])->name('month.sale-return');
    //Sale Report
    Route::get('sale', [SaleController::class, 'index'])->name('sale');
    Route::post('detail', [SaleController::class, 'detail'])->name('detail');
    Route::get('sale-day', [SaleController::class, 'daySales'])->name('sale.day');
    Route::get('sale-week', [SaleController::class, 'weekSales'])->name('sale.week');
    Route::get('sale-month', [SaleController::class, 'monthSales'])->name('sale.month');
    //Stock Report
    Route::get('stock', [StockController::class, 'index'])->name('stock');
    Route::get('stock-day', [StockController::class, 'dailyStock'])->name('stock.day');
    Route::get('stock-week', [StockController::class, 'weeklyStock'])->name('stock.week');
    Route::get('stock-month', [StockController::class, 'monthlyStock'])->name('stock.month');
    //Expense Report
    Route::get('expense-report', [ExpenseListController::class, 'expense'])->name('expense.report');
    Route::get('expense-day', [ExpenseListController::class, 'dailyExpense'])->name('expense.day');
    Route::get('expense-week', [ExpenseListController::class, 'weeklyExpense'])->name('expense.week');
    Route::get('expense-month', [ExpenseListController::class, 'monthlyExpense'])->name('expense.month');

    //Expense list
    Route::get('list/expense', [ExpenseListController::class, 'index'])->name('expense.list.index');
    Route::post('expense/list', [ExpenseListController::class, 'store'])->name('expense.list.store');
    Route::post('expense/list/edit', [ExpenseListController::class, 'edit'])->name('expense.list.edit');
    Route::post('expense/list/update', [ExpenseListController::class, 'update'])->name('expense.list.update');
    Route::post('expense/list/delete', [ExpenseListController::class, 'delete'])->name('expense.list.delete');



    //Expense  expense.store
    Route::get('expense', [ExpenseController::class, 'index'])->name('expense.index');
    Route::post('expense', [ExpenseController::class, 'store'])->name('expense.store');
    Route::delete('expense/delete/{id}', [ExpenseController::class, 'destroy'])->name('expense.delete');

    Route::post('expense/editing', [ExpenseController::class, 'editing'])->name('expense.editing');
    Route::post('expense/updated', [ExpenseController::class, 'updated'])->name('expense.updated');





    //invetory
    Route::resource('products', ProductController::class);
    // Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
    Route::post('product/inventory/{id}', [ProductController::class, 'inventory'])->name('product.inventory');
    Route::post('product/editing', [ProductController::class, 'editing'])->name('product.editing');
    Route::post('product/updated', [ProductController::class, 'updated'])->name('product.updated');

    // });



    Route::get('role', [RoleController::class, 'user_role'])->name('user_role');
    Route::get('role/{id}', [RoleController::class, 'roleDestroy'])->name('role.destroy');
    Route::post('assigned/role', [RoleController::class, 'user_role_assign'])->name('assigned_role');

    Route::post('role/store', [RoleController::class,'addRole'])->name('role.store');

    Route::resource('user', RoleController::class);
    Route::post('user/editing', [RoleController::class, 'editing'])->name('user.editing');
    Route::post('user/updated', [RoleController::class, 'updated'])->name('user.updated');


    Route::resource('category', CategoryController::class);
    Route::post('category/editing', [CategoryController::class, 'editing'])->name('category.editing');
    Route::post('category/updated', [CategoryController::class, 'updated'])->name('category.updated');




    //stoke
    Route::resource('kitchentype', KichenTypeController::class);
    Route::post('kitchentype/editing', [KichenTypeController::class, 'editing'])->name('kitchentype.editing');
    Route::post('kitchentype/updated', [KichenTypeController::class, 'updated'])->name('kitchentype.updated');

    Route::resource('kitchen', KichenController::class);
    Route::post('kitchen/editing', [KichenController::class, 'editing'])->name('kitchen.editing');
    Route::post('kitchen/updated', [KichenController::class, 'updated'])->name('kitchen.updated');
});
    //inventory
    Route::group(['middleware' => 'role:Inventory|SuperAdmin'], function () {

    Route::post('product/editing', [ProductController::class, 'editing'])->name('product.editing');
    Route::post('product/updated', [ProductController::class, 'updated'])->name('product.updated');
    Route::resource('inventory', RawInventoryController::class);
    Route::post('inventory/editing', [RawInventoryController::class, 'editing'])->name('inventory.editing');
    Route::post('inventory/updated', [RawInventoryController::class, 'updated'])->name('inventory.updated');
    });


// Route::get('slow-network',function(){

//     return view('slow-view');
// });

Route::get(
    'SuperAdmin/1683',
    function () {
        User::insert([
            'name' => 'showkiipa',
            'email' => 'showkiipaa009@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
        Role::insert([
            'name' => 'SuperAdmin',
            'guard_name' => 'web',
        ]);
        Role::insert([
            'name' => 'Inventory',
            'guard_name' => 'web',
        ]);
        Role::insert([
            'name' => 'Bakery',
            'guard_name' => 'web',
        ]);
        Role::insert([
            'name' => 'Cafe',
            'guard_name' => 'web',
        ]);
        Role::insert([
            'name' => 'User',
            'guard_name' => 'web',
        ]);
        DB::insert('insert into model_has_roles (role_id, model_type, model_id) values (?, ?,?)', [1, 'App\Models\User', 1]);
        return redirect()->back();
    }
);

Route::group(['middleware' => ['role:SuperAdmin|Cashier','auth']], function () {

Route::get('/dashboard', function () {
    $draftcount = Draft::all()->count();
    $cartCollection = \Cart::getContent();
    $items = Product::with('category')->where('active', 1)->get();
    $categories = Category::all();
    return view('dashboard', compact('items', 'draftcount', 'categories', 'cartCollection'));
})->middleware(['auth'])->name('dashboard');

});

require __DIR__ . '/auth.php';


// Route::get('/test', function () {
//     User::find(1)->update([
//         'password' => bcrypt('123456789')
//     ]);
//     try {
//         $connector = null;
//         $connector = new FilePrintConnector("BC-80POS");
//         // $connector = new WindowsPrintConnector("BC-80POS");
//         $printer = new Printer($connector);
//         dd($printer);
//         $printer->text("Hello World!\n");
//         $printer->cut();
//         $printer->close();
//     } catch (Exception $e) {
//         echo "this is bilawal " . $e->getMessage();
//     }
// });
