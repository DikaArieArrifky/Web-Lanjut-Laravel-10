<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\StokController;
use Monolog\Level;

Route::pattern('id', '[0-9]+'); //ketika ada parameter id , maka harus berupa angka


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

//membagi role


Route::get('/', [WelcomeController::class, 'index']);
Route::middleware(['auth'])->group(function () {




    //CRUD user hanya admin yang bisa
    Route::middleware(['authorize:ADM'])->group(function () {
        // User
        Route::get('/user', [UserController::class, 'index']);           // menampilkan halaman awal user
        Route::post('/user/list', [UserController::class, 'list']);       // menampilkan data user dalam bentuk json untuk datatables
        Route::get('/create', [UserController::class, 'create']);    // menampilkan halaman form tambah user
        Route::post('/user', [UserController::class, 'store']);          // menyimpan data user baru
        Route::get('/user/{id}', [UserController::class, 'show']);        // menampilkan detail user
        Route::get('/user/{id}/edit', [UserController::class, 'edit']);   // menampilkan halaman form edit user
        Route::put('/user/{id}', [UserController::class, 'update']);      // menyimpan perubahan data user
        Route::delete('/user/{id}', [UserController::class, 'destroy']);  // menghapus data user
        Route::get('/user/create_ajax', [UserController::class, 'create_ajax']);
        Route::post('/user/ajax', [UserController::class, 'store_ajax']);
        Route::get('/user/{id}/show_ajax', [UserController::class, 'show_ajax']);
        Route::get('/user/{id}/edit_ajax', [UserController::class, 'edit_ajax']);
        Route::put('/user/{id}/update_ajax', [UserController::class, 'update_ajax']);
        Route::get('/user/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);
        Route::delete('/user/{id}/delete_ajax', [UserController::class, 'delete_ajax']);


        // Level
        Route::get('/level', [LevelController::class, 'index']);
        Route::post('/level/list', [LevelController::class, 'list']);
        Route::get('/level/create_ajax', [LevelController::class, 'create_ajax']);
        Route::post('/level/ajax', [LevelController::class, 'store_ajax']);
        Route::get('/level/{id}/show_ajax', [LevelController::class, 'show_ajax']);
        Route::get('/level/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);
        Route::put('/level/{id}/update_ajax', [LevelController::class, 'update_ajax']);
        Route::get('/level/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);
        Route::delete('/level/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);
    });

    // yang bisa diakses oleh administrator dan manager
    Route::middleware('authorize:ADM,MNG')->group(function () {

        // Kategori
        Route::get('/kategori', [KategoriController::class, 'index']);
        Route::post('/kategori/list', [KategoriController::class, 'list']);
        Route::get('/kategori/create_ajax', [KategoriController::class, 'create_ajax']);
        Route::post('/kategori/ajax', [KategoriController::class, 'store_ajax']);
        Route::get('/kategori/{id}/show_ajax', [KategoriController::class, 'show_ajax']);
        Route::get('/kategori/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);
        Route::put('/kategori/{id}/update_ajax', [KategoriController::class, 'update_ajax']);
        Route::get('/kategori/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
        Route::delete('/kategori/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);

        //Supplier
        Route::get('/supplier', [SupplierController::class, 'index']);
        Route::post('/supplier/list', [SupplierController::class, 'list']);
        Route::get('/supplier/create_ajax', [SupplierController::class, 'create_ajax']);
        Route::post('/supplier/ajax', [SupplierController::class, 'store_ajax']);
        Route::get('/supplier/{id}/show_ajax', [SupplierController::class, 'show_ajax']);
        Route::get('/supplier/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);
        Route::put('/supplier/{id}/update_ajax', [SupplierController::class, 'update_ajax']);
        Route::get('/supplier/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);
        Route::delete('/supplier/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);

        //Barang        
        Route::get('/barang', [BarangController::class, 'index']);
        Route::post('/barang/list', [BarangController::class, 'list']);
        Route::get('/barang/create_ajax', [BarangController::class, 'create_ajax']);
        Route::post('/barang/ajax', [BarangController::class, 'store_ajax']);
        Route::get('/barang/{id}/show_ajax', [BarangController::class, 'show_ajax']);
        Route::get('/barang/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);
        Route::put('/barang/{id}/update_ajax', [BarangController::class, 'update_ajax']);
        Route::get('/barang/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);
        Route::delete('/barang/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);
        Route::get('/barang/import', [BarangController::class, 'import']); // ajax form upload excel
        Route::post('/barang/import_ajax', [BarangController::class, 'import_ajax']); // ajax import excel
        Route::get('/barang/export_excel', [BarangController::class, 'export_excel']); // export excel
        Route::get('/barang/export_pdf', [BarangController::class, 'export_pdf']); // export pdf
    });

    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
        //Stok
        Route::get('/stok', [StokController::class, 'index']);
        Route::post('/stok/list', [StokController::class, 'list']);
        Route::get('/stok/create_ajax', [StokController::class, 'create_ajax']);
        Route::post('/stok/ajax', [StokController::class, 'store_ajax']);
        Route::get('/stok/{id}/show_ajax', [StokController::class, 'show_ajax']);
        Route::get('/stok/{id}/edit_ajax', [StokController::class, 'edit_ajax']);
        Route::put('/stok/{id}/update_ajax', [StokController::class, 'update_ajax']);
        Route::get('/stok/{id}/delete_ajax', [StokController::class, 'confirm_ajax']);
        Route::delete('/stok/{id}/delete_ajax', [StokController::class, 'delete_ajax']);

        //Penjualan
        Route::get('/penjualan', [PenjualanController::class, 'index']);
        Route::post('/penjualan/list', [PenjualanController::class, 'list']);
        Route::get('/penjualan/create_ajax', [PenjualanController::class, 'create_ajax']);
        Route::post('/penjualan/ajax', [PenjualanController::class, 'store_ajax']);
        Route::get('/penjualan/{id}/show_ajax', [PenjualanController::class, 'show_ajax']);
        Route::get('/penjualan/{id}/edit_ajax', [PenjualanController::class, 'edit_ajax']);
        Route::put('/penjualan/{id}/update_ajax', [PenjualanController::class, 'update_ajax']);
        Route::get('/penjualan/{id}/delete_ajax', [PenjualanController::class, 'confirm_ajax']);
        Route::delete('/penjualan/{id}/delete_ajax', [PenjualanController::class, 'delete_ajax']);
    });
});




    //--------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------------------------------------------------------











    //     // Role: Manager (MNG) saja
    //     Route::middleware(['authorize:MNG'])->group(function () {
    //         Route::get('/', [WelcomeController::class, 'index']);
    //          // Kategori
    //          Route::group(['prefix' => 'kategori'], function () {
    //             Route::get('/', [KategoriController::class, 'index']);
    //             Route::post('/list', [KategoriController::class, 'list']);
    //             Route::get('/create', [KategoriController::class, 'create']);
    //             Route::post('/', [KategoriController::class, 'store']);
    //             Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);
    //             Route::post('/ajax', [KategoriController::class, 'store_ajax']);
    //             Route::get('/{id}', [KategoriController::class, 'show']);
    //             Route::get('/{id}/show_ajax', [KategoriController::class, 'show_ajax']);
    //             Route::get('/{id}/edit', [KategoriController::class, 'edit']);
    //             Route::put('/{id}', [KategoriController::class, 'update']);
    //             Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);
    //             Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);
    //             Route::delete('/{id}', [KategoriController::class, 'destroy']);
    //             Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
    //             Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
    //         });

    //         // Supplier
    //         Route::group(['prefix' => 'supplier'], function () {
    //             Route::get('/', [SupplierController::class, 'index']);
    //             Route::post('/list', [SupplierController::class, 'list']);
    //             Route::get('/create', [SupplierController::class, 'create']);
    //             Route::post('/', [SupplierController::class, 'store']);
    //             Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);
    //             Route::post('/ajax', [SupplierController::class, 'store_ajax']);
    //             Route::get('/{id}', [SupplierController::class, 'show']);
    //             Route::get('/{id}/show_ajax', [SupplierController::class, 'show_ajax']);
    //             Route::get('/{id}/edit', [SupplierController::class, 'edit']);
    //             Route::put('/{id}', [SupplierController::class, 'update']);
    //             Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);
    //             Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);
    //             Route::delete('/{id}', [SupplierController::class, 'destroy']);
    //             Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);
    //             Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);
    //         });





// //MANAGER
// Route::middleware((['auth']))->group(function () {
//     // Role: Manager (MNG) saja
//     Route::middleware(['authorize:MNG'])->group(function () {
//         Route::get('/', [WelcomeController::class, 'index']);
//          // Kategori
//          Route::group(['prefix' => 'kategori'], function () {
//             Route::get('/', [KategoriController::class, 'index']);
//             Route::post('/list', [KategoriController::class, 'list']);
//             Route::get('/create', [KategoriController::class, 'create']);
//             Route::post('/', [KategoriController::class, 'store']);
//             Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);
//             Route::post('/ajax', [KategoriController::class, 'store_ajax']);
//             Route::get('/{id}', [KategoriController::class, 'show']);
//             Route::get('/{id}/show_ajax', [KategoriController::class, 'show_ajax']);
//             Route::get('/{id}/edit', [KategoriController::class, 'edit']);
//             Route::put('/{id}', [KategoriController::class, 'update']);
//             Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);
//             Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);
//             Route::delete('/{id}', [KategoriController::class, 'destroy']);
//             Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
//             Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
//         });

//         // Supplier
//         Route::group(['prefix' => 'supplier'], function () {
//             Route::get('/', [SupplierController::class, 'index']);
//             Route::post('/list', [SupplierController::class, 'list']);
//             Route::get('/create', [SupplierController::class, 'create']);
//             Route::post('/', [SupplierController::class, 'store']);
//             Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);
//             Route::post('/ajax', [SupplierController::class, 'store_ajax']);
//             Route::get('/{id}', [SupplierController::class, 'show']);
//             Route::get('/{id}/show_ajax', [SupplierController::class, 'show_ajax']);
//             Route::get('/{id}/edit', [SupplierController::class, 'edit']);
//             Route::put('/{id}', [SupplierController::class, 'update']);
//             Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);
//             Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);
//             Route::delete('/{id}', [SupplierController::class, 'destroy']);
//             Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);
//             Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);
//         });

//         //Barang
//         Route::group(['prefix' => 'barang'], function () {
//             Route::get('/', [BarangController::class, 'index']);
//             Route::post('/list', [BarangController::class, 'list']);
//             Route::get('/create_ajax', [BarangController::class, 'create_ajax']);
//             Route::post('/ajax', [BarangController::class, 'store_ajax']);
//             Route::get('/{id}/show_ajax', [BarangController::class, 'show_ajax']);
//             Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);
//             Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);
//             Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);
//             Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);
//             Route::get('/barang/import', [BarangController::class, 'import']); // ajax form upload excel
//             Route::post('/barang/import_ajax', [BarangController::class, 'import_ajax']); // ajax import excel
//             Route::get('/barang/export_excel', [BarangController::class, 'export_excel']); // export excel
//             Route::get('/barang/export_pdf', [BarangController::class, 'export_pdf']); // export pdf
//             Route::get('/create', [BarangController::class, 'create']);
//             Route::post('/', [BarangController::class, 'store']);
//             Route::get('/{id}', [BarangController::class, 'show']);
//             Route::get('/{id}/edit', [BarangController::class, 'edit']);
//             Route::put('/{id}', [BarangController::class, 'update']);
//             Route::delete('/{id}', [BarangController::class, 'destroy']);
//         });

//         // Stok
//         Route::group(['prefix' => 'stok'], function () {
//             Route::get('/', [StokController::class, 'index']);
//             Route::post('/list', [StokController::class, 'list']);
//             Route::get('/create_ajax', [StokController::class, 'create_ajax']);
//             Route::post('/ajax', [StokController::class, 'store_ajax']);
//             Route::get('/{id}/show_ajax', [StokController::class, 'show_ajax']);
//             Route::get('/{id}/edit_ajax', [StokController::class, 'edit_ajax']);
//             Route::put('/{id}/update_ajax', [StokController::class, 'update_ajax']);
//             Route::get('/{id}/delete_ajax', [StokController::class, 'confirm_ajax']);
//             Route::delete('/{id}/delete_ajax', [StokController::class, 'delete_ajax']);
//         });

//         // Penjualan
//         Route::group(['prefix' => 'penjualan'], function () {
//             Route::get('/', [PenjualanController::class, 'index']);
//             Route::post('/list', [PenjualanController::class, 'list']);
//             Route::get('/create', [PenjualanController::class, 'create']);
//             Route::post('/', [PenjualanController::class, 'store']);
//             Route::get('/{id}/show', [PenjualanController::class, 'show']);
//             Route::get('/{id}/edit', [PenjualanController::class, 'edit']);
//             Route::put('/{id}/update', [PenjualanController::class, 'update']);
//             Route::delete('/{id}', [PenjualanController::class, 'destroy']);
//         });
//     });
// });


// //STAFF/KASIR
// Route::middleware('auth')->group(function () {
//     // Role: Staff/Kasir (STF) saja
//     Route::middleware(['authorize:STF'])->group(function () {
//         Route::get('/', [WelcomeController::class, 'index']);
//          // Stok
//          Route::group(['prefix' => 'stok'], function () {
//             Route::get('/', [StokController::class, 'index']);
//             Route::post('/list', [StokController::class, 'list']);
//             Route::get('/create_ajax', [StokController::class, 'create_ajax']);
//             Route::post('/ajax', [StokController::class, 'store_ajax']);
//             Route::get('/{id}/show_ajax', [StokController::class, 'show_ajax']);
//             Route::get('/{id}/edit_ajax', [StokController::class, 'edit_ajax']);
//             Route::put('/{id}/update_ajax', [StokController::class, 'update_ajax']);
//             Route::get('/{id}/delete_ajax', [StokController::class, 'confirm_ajax']);
//             Route::delete('/{id}/delete_ajax', [StokController::class, 'delete_ajax']);
//         });

//         // Penjualan
//         Route::group(['prefix' => 'penjualan'], function () {
//             Route::get('/', [PenjualanController::class, 'index']);
//             Route::post('/list', [PenjualanController::class, 'list']);
//             Route::get('/create', [PenjualanController::class, 'create']);
//             Route::post('/', [PenjualanController::class, 'store']);
//             Route::get('/{id}/show', [PenjualanController::class, 'show']);
//             Route::get('/{id}/edit', [PenjualanController::class, 'edit']);
//             Route::put('/{id}/update', [PenjualanController::class, 'update']);
//             Route::delete('/{id}', [PenjualanController::class, 'destroy']);
//         });
//     });
// });

// //CUSTOMER
// Route::middleware('auth')->group(function () {
//       // Role: Customer (CST) saja
//       Route::middleware(['authorize:CST'])->group(function () {
//         Route::get('/', [WelcomeController::class, 'index']);
//         Route::group(['prefix' => 'penjualan'], function () {
//             Route::get('/', [PenjualanController::class, 'index']);
//             Route::post('/list', [PenjualanController::class, 'list']);
//             Route::get('/{id}/show', [PenjualanController::class, 'show']);
//         });
//     });
// });





// Role: Administrator (ADM) saja





// Route::middleware(['auth'])->group(function () { // artinya semua route di dalam group ini harus login dulu
//     //masukkan semua route yang membutuhkan auth di sini
//     //route level
    
//     //artinya semua route di dalam group ini harus punya role ADM (Administrator)
//     Route::middleware(['authorize:ADM,MNG'])->group(function () {
//         Route::get('/', [WelcomeController::class, 'index']);
        
//         //praktikum 2

//         // Route::get('/level', [LevelController::class, 'index']);
//         // Route::post('/level/list', [LevelController::class, 'list']); //untuk list json datatables

//         // Route::get('/level/create', [LevelController::class, 'create']);
//         // Route::post('/level', [LevelController::class, 'store']);
//         // Route::get('/level/{id}/edit', [LevelController::class, 'edit']); //untuk form tampilan edit
//         // Route::put('/level/{id}', [LevelController::class, 'update']); //untuk proses update data
//         // Route::delete('/level/{id}', [LevelController::class, 'destroy']); //untuk proses delete data

//         //praktkum 3
//         // Barang
//         Route::get('/', [BarangController::class, 'index']);
//         Route::post('/list', [BarangController::class, 'list']);
//         Route::get('/create_ajax', [BarangController::class, 'create_ajax']); //ajax form create
//         Route::post('/ajax', [BarangController::class, 'store_ajax']); // ajax store
//         Route::get('/{id}/show_ajax', [BarangController::class, 'show_ajax']); // ajax show
//         Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); //ajax form edit
//         Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']); // ajax update
//         Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); // ajax form confirm
//         Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);// ajax delete

        
        // Route::get('/barang/import', [BarangController::class,'import']); // ajax form upload excel
        // Route::post('/barang/import_ajax', [BarangController::class,'import_ajax']); // ajax import excel
        // Route::get('/barang/export_excel', [BarangController::class,'export_excel']); // export excel
        // Route::get('/barang/export_pdf', [BarangController::class,'export_pdf']); // export pdf
//     });
// });

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Route::get('/level', [LevelController::class, 'index']);
// Route::get('/kategori', [KategoriController::class, 'index']);
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/tambah', [UserController::class, 'tambah']);
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
// Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

// Route::get('/', function () {
//     return view('welcome');
// });

// User
// Route::group(['prefix' => 'user'], function () {
//     Route::get('/', [UserController::class, 'index']);           // menampilkan halaman awal user
//     Route::post('/list', [UserController::class, 'list']);       // menampilkan data user dalam bentuk json untuk datatables
//     Route::get('/create', [UserController::class, 'create']);    // menampilkan halaman form tambah user
//     Route::post('/', [UserController::class, 'store']);          // menyimpan data user baru
//     Route::get('/{id}', [UserController::class, 'show']);        // menampilkan detail user
//     Route::get('/{id}/edit', [UserController::class, 'edit']);   // menampilkan halaman form edit user
//     Route::put('/{id}', [UserController::class, 'update']);      // menyimpan perubahan data user
//     Route::delete('/{id}', [UserController::class, 'destroy']);  // menghapus data user
//     Route::get('/create_ajax', [UserController::class, 'create_ajax']);
//     Route::post('/ajax', [UserController::class, 'store_ajax']);
//     Route::get('/{id}/show_ajax', [UserController::class, 'show_ajax']);
//     Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);
//     Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);
//     Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);
//     Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);
// });

// // Level
// Route::group(['prefix' => 'level'], function () {
//     Route::get('/', [LevelController::class, 'index']);
//     Route::post('/list', [LevelController::class, 'list']);
//     Route::get('/create', [LevelController::class, 'create']);
//     Route::post('/', [LevelController::class, 'store']);
//     Route::get('/create_ajax', [LevelController::class, 'create_ajax']);
//     Route::post('/ajax', [LevelController::class, 'store_ajax']);
//     Route::get('/{id}', [LevelController::class, 'show']);
//     Route::get('/{id}/show_ajax', [LevelController::class, 'show_ajax']);
//     Route::get('/{id}/edit', [LevelController::class, 'edit']);
//     Route::put('/{id}', [LevelController::class, 'update']);
//     Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);
//     Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);
//     Route::delete('/{id}', [LevelController::class, 'destroy']);
//     Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);
//     Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);
// });

// // Kategori
// Route::group(['prefix' => 'kategori'], function () {
//     Route::get('/', [KategoriController::class, 'index']);
//     Route::post('/list', [KategoriController::class, 'list']);
//     Route::get('/create', [KategoriController::class, 'create']);
//     Route::post('/', [KategoriController::class, 'store']);
//     Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);
//     Route::post('/ajax', [KategoriController::class, 'store_ajax']);
//     Route::get('/{id}', [KategoriController::class, 'show']);
//     Route::get('/{id}/show_ajax', [KategoriController::class, 'show_ajax']);
//     Route::get('/{id}/edit', [KategoriController::class, 'edit']);
//     Route::put('/{id}', [KategoriController::class, 'update']);
//     Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);
//     Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);
//     Route::delete('/{id}', [KategoriController::class, 'destroy']);
//     Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
//     Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
// });

// // Supplier
// Route::group(['prefix' => 'supplier'], function () {
//     Route::get('/', [SupplierController::class, 'index']);
//     Route::post('/list', [SupplierController::class, 'list']);
//     Route::get('/create', [SupplierController::class, 'create']);
//     Route::post('/', [SupplierController::class, 'store']);
//     Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);
//     Route::post('/ajax', [SupplierController::class, 'store_ajax']);
//     Route::get('/{id}', [SupplierController::class, 'show']);
//     Route::get('/{id}/show_ajax', [SupplierController::class, 'show_ajax']);
//     Route::get('/{id}/edit', [SupplierController::class, 'edit']);
//     Route::put('/{id}', [SupplierController::class, 'update']);
//     Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);
//     Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);
//     Route::delete('/{id}', [SupplierController::class, 'destroy']);
//     Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);
//     Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);
// });

// //Barang
// Route::group(['prefix' => 'barang'], function () {
//     Route::get('/', [BarangController::class, 'index']);
//     Route::post('/list', [BarangController::class, 'list']);
//     Route::get('/create_ajax', [BarangController::class, 'create_ajax']);
//     Route::post('/ajax', [BarangController::class, 'store_ajax']);
//     Route::get('/{id}/show_ajax', [BarangController::class, 'show_ajax']);
//     Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);
//     Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);
//     Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);
//     Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);
//     Route::get('/barang/import', [BarangController::class,'import']); // ajax form upload excel
//     Route::post('/barang/import_ajax', [BarangController::class,'import_ajax']); // ajax import excel
//     Route::get('/barang/export_excel', [BarangController::class,'export_excel']); // export excel
//     Route::get('/barang/export_pdf', [BarangController::class,'export_pdf']); // export pdf
//     Route::get('/create', [BarangController::class, 'create']);
//     Route::post('/', [BarangController::class, 'store']);
//     Route::get('/{id}', [BarangController::class, 'show']);
//     Route::get('/{id}/edit', [BarangController::class, 'edit']);
//     Route::put('/{id}', [BarangController::class, 'update']);
//     Route::delete('/{id}', [BarangController::class, 'destroy']);
// });

// // Stok
// Route::group(['prefix' => 'stok'], function () {
//     Route::get('/', [StokController::class, 'index']);
//     Route::post('/list', [StokController::class, 'list']);
//     Route::get('/create_ajax', [StokController::class, 'create_ajax']);
//     Route::post('/ajax', [StokController::class, 'store_ajax']);
//     Route::get('/{id}/show_ajax', [StokController::class, 'show_ajax']);
//     Route::get('/{id}/edit_ajax', [StokController::class, 'edit_ajax']);
//     Route::put('/{id}/update_ajax', [StokController::class, 'update_ajax']);
//     Route::get('/{id}/delete_ajax', [StokController::class, 'confirm_ajax']);
//     Route::delete('/{id}/delete_ajax', [StokController::class, 'delete_ajax']);
// });

// // Penjualan
// Route::group(['prefix' => 'penjualan'], function () {
//     Route::get('/', [PenjualanController::class, 'index']);
//     Route::post('/list', [PenjualanController::class, 'list']);
//     Route::get('/create', [PenjualanController::class, 'create']);
//     Route::post('/', [PenjualanController::class, 'store']);
//     Route::get('/{id}/show', [PenjualanController::class, 'show']);
//     Route::get('/{id}/edit', [PenjualanController::class, 'edit']);
//     Route::put('/{id}/update', [PenjualanController::class, 'update']);
//     Route::delete('/{id}', [PenjualanController::class, 'destroy']);
// });