<?php

use App\Livewire\Admin\Ai\AiAssistantComponent;
use App\Livewire\Admin\Ai\AssistantPromptDetailComponent;
use App\Livewire\Admin\Ai\CreateAiAssistantComponent;
use App\Livewire\Admin\Ai\EditAiAssistantComponent;
use App\Livewire\Admin\Ai\GenerateReviewsComponent;
use App\Livewire\Admin\Category\CategoriesComponent;
use App\Livewire\Admin\Category\CreateCategoryComponent;
use App\Livewire\Admin\Category\EditCategoryComponent;
use App\Livewire\Admin\Chaining\ChainingComponent;
use App\Livewire\Admin\Chaining\CreateChainComponent;
use App\Livewire\Admin\Packages\CreatePackageComponent;
use App\Livewire\Admin\Packages\EditPackageComponent;
use App\Livewire\Admin\Packages\PackagesComponent;
use App\Livewire\Admin\Packages\PreviewPackageComponent;
use App\Livewire\Admin\Setting\Ai\Setting\AiSettingComponent;
use App\Livewire\Admin\Setting\Ai\Setting\CreateAiSettingComponent;
use App\Livewire\Admin\Setting\Ai\Setting\EditAiSettingComponent;
use App\Livewire\Admin\Setting\SettingComponent;
use App\Livewire\User\Packages\ActivePackagesComponent;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');
    Route::get('/active/packages',ActivePackagesComponent::class)->name('user.active_packages');
});
Route::middleware('admin')->prefix('admin')->group(function (){
   Route::get('/dashboard',function(){ return view('admindashboard');})->name('admin.dashboard');
   Route::get('web/settings',SettingComponent::class)->name('admin.settings');
   Route::prefix('category')->group(function(){
     Route::get('/all',CategoriesComponent::class)->name('admin.categories');
     Route::get('/edit/{id}',EditCategoryComponent::class)->name('admin.edit_category');
     Route::get('/create',CreateCategoryComponent::class)->name('admin.create_category');
   });
   Route::prefix('prompt')->group(function(){
    Route::get('/assistants',AiAssistantComponent::class)->name('admin.ai_assistant');
    Route::get('/create/assistant',CreateAiAssistantComponent::class)->name('admin.create_ai');
    Route::get('/{id}/edit',EditAiAssistantComponent::class)->name('admin.edit_ai');
    Route::get('/reviews/analysis/{id}',GenerateReviewsComponent::class)->name('admin.reviews_analysis');
    Route::get('/{prompt}/Detail',AssistantPromptDetailComponent::class)->name('admin.prompt_detail');
   });
   Route::prefix('chaining')->group(function(){
      Route::get('/new/ai-chats',CreateChainComponent::class)->name('admin.create_chain');
      Route::get('/available',ChainingComponent::class)->name('admin.chains');
   });
 
   Route::prefix('ai')->group(function(){
   Route::get('/settings',AiSettingComponent::class)->name('admin.ai_settings');
   Route::get('/create/setting',CreateAiSettingComponent::class)->name('admin.create_ai_setting');
   Route::get('edit/{id}/setting',EditAiSettingComponent::class)->name('admin.edit_ai_setting');
   });
   Route::prefix('packages')->group(function(){
    Route::get('/all',PackagesComponent::class)->name('admin.packages');
    Route::get('/create',CreatePackageComponent::class)->name('admin.create_package');
    Route::get('/edit/{id}/package',EditPackageComponent::class)->name('admin.edit_package');
    Route::get('/preview/{id}/package',PreviewPackageComponent::class)->name('admin.preview_package');
   });
});