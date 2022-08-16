<?php

use App\Http\Controllers\Admin\CatController as AdminCatController;
use App\Http\Controllers\Admin\ExamController as AdminExamController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\SkillController as AdminSkillController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\CatController;
use App\Http\Controllers\Web\ExamController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\web\LangController;
use App\Http\Controllers\Web\SkillController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\ProfileController;



Route::middleware('lang')->group(function (){

    Route::get('/', [HomeController::class, 'index'] );
    Route::get('/home', [HomeController::class, 'index'] );
    Route::get('/categories/show/{id}', [CatController::class, 'show'] );
    Route::get('/skills/show/{id}', [SkillController::class, 'show'] );
    Route::get('/exams/show/{id}', [ExamController::class, 'show'] );
    Route::get('/exams/questions/{id}', [ExamController::class, 'questions'] )->middleware(['auth','verified','student']);
    Route::get('/contact', [ContactController::class, 'index'] );
    Route::get('/profile', [ProfileController::class, 'index'] )->middleware(['auth','verified','student']);
});

Route::post('/exams/start/{id}', [ExamController::class, 'start'] )->middleware(['auth','verified','student','can-enter-exam']);
Route::post('/exams/submit/{id}', [ExamController::class, 'submit'] )->middleware(['auth','verified','student']);

Route::post('/contact/message/create', [ContactController::class, 'send'] ); 
Route::get('/lang/set/{lang}', [LangController::class, 'set'] );

Route::prefix('dashboard')->middleware(['auth','verified','can-enter-dashboard'])->group(function(){
    Route::get('/' , [AdminHomeController::class , 'index']);
    Route::get('/categories' , [AdminCatController::class , 'index']);
    Route::post('/categories/store' , [AdminCatController::class , 'store']);
    Route::put('/categories/update' , [AdminCatController::class , 'update']);
    Route::get('/categories/toggle/{cat}' , [AdminCatController::class , 'toggle']);
    Route::get('/categories/delete/{cat}' , [AdminCatController::class , 'delete']);


    Route::get('/skills' , [AdminSkillController::class , 'index']);
    Route::post('/skills/store' , [AdminSkillController::class , 'store']);
    Route::put('/skills/update' , [AdminSkillController::class , 'update']);
    Route::get('/skills/toggle/{skill}' , [AdminSkillController::class , 'toggle']);
    Route::get('/skills/delete/{skill}' , [AdminSkillController::class , 'delete']);

    Route::get('/exams' , [AdminExamController::class , 'index']);
    Route::get('/exams/show/{exam}' , [AdminExamController::class , 'show']);
    Route::get('/exams/show-questions/{exam}' , [AdminExamController::class , 'showQuestions']);
    Route::get('/exams/create' , [AdminExamController::class , 'create']);
    Route::get('/exams/create-questions/{exam}' , [AdminExamController::class , 'createQuestions']);
    Route::get('/exams/create-question/{exam}' , [AdminExamController::class , 'createOneQuestion']);
    Route::post('/exams/store' , [AdminExamController::class , 'store']);
    Route::post('/exams/store-questions/{exam}' , [AdminExamController::class , 'storeQuestions']);
    Route::post('/exams/store-question/{exam}' , [AdminExamController::class , 'storeOneQuestion']);
    Route::get('/exams/edit/{exam}' , [AdminExamController::class , 'edit']);
    Route::put('/exams/update/{exam}' , [AdminExamController::class , 'update']);
    Route::get('/exams/edit-questions/{exam}/{question}' , [AdminExamController::class , 'editQuestions']);
    Route::put('/exams/update-questions/{exam}/{question}' , [AdminExamController::class , 'updateQuestions']);
    Route::get('/exams/toggle/{exam}' , [AdminExamController::class , 'toggle']);
    Route::get('/exams/delete/{exam}' , [AdminExamController::class , 'delete']);
    Route::get('/exams/delete-question/{question}' , [AdminExamController::class , 'deleteOneQuestion']);
});

