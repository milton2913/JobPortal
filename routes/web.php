<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//using for user address
Route::get('get-state-list','Member\ProfileController@getStateList');
Route::get('get-city-list','Member\ProfileController@getCityList');
Route::get('get-thana-list','Member\ProfileController@getThanaList');


Route::get('employer/dashboard','Employer\DashboardController@index')->name('employer.dashboard');
Route::get('jobseeker/dashboard','Jobseeker\DashboardController@index')->name('jobseeker.dashboard');


//admin section
Route::resource('admin/organization-type','Admin\OrganizationTypeController');
Route::resource('admin/industry-type','Admin\IndustryTypeController');
Route::resource('admin/result-type','Admin\ResultTypeController');
Route::resource('admin/education-level','Admin\EducationLevelController');
Route::resource('admin/degree','Admin\DegreeController');
Route::resource('admin/company-size','Admin\CompanySizeController');
Route::resource('admin/contact-type','Admin\ContactTypeController');
Route::resource('admin/currency','Admin\CurrencyController');
Route::resource('admin/institute','Admin\InstituteController');
Route::resource('admin/skill','Admin\SkillController');
Route::resource('admin/job-level','Admin\JobLevelController');
Route::resource('admin/subject','Admin\SubjectController');
Route::resource('admin/expert-status','Admin\ExpertStatusController');
Route::resource('admin/reference-type','Admin\ReferenceTypeController');

//jobseeker section


Route::resource('jobseeker/education','Jobseeker\EducationController');//education
Route::post('select-ajax', ['as'=>'select-ajax','Member\\EducationsController@selectAjax']);
Route::get('get-degree-list','Jobseeker\EducationController@getDegreeList');

Route::resource('jobseeker/training','Jobseeker\TrainingController');//training
Route::resource('jobseeker/experience','Jobseeker\ExperienceController');//experience
Route::resource('jobseeker/certification','Jobseeker\CertificationController');//certifications
Route::resource('jobseeker/reference','Jobseeker\ReferenceController');//Reference
Route::resource('jobseeker/expertise','Jobseeker\ExpertiseController');//expertise
Route::resource('jobseeker/cv-objective','Jobseeker\CvObjectiveController');//cv objective
Route::get('cv-objective-status','Jobseeker\CvObjectiveController@cvObjectiveStatus');






































































































Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/{social}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{social}/callback', 'Auth\LoginController@handleProviderCallback');

Route::post('selectPresentCountry', 'Member\ProfileController@selectPresentCountry');

//Route::resource('profile','Member\ProfileController');
Route::group(
    [
        'prefix' => 'profile',
    ], function () {

    Route::get('/create','Member\ProfileController@create')
        ->name('profiles.profile.create');

    Route::get('/show/{profile}','Member\ProfileController@show')
        ->name('profiles.profile.show')
        ->where('id', '[0-9]+');

    Route::get('/{profile}/edit','Member\ProfileController@edit')
        ->name('profiles.profile.edit')
        ->where('id', '[0-9]+');

    Route::post('/', 'Member\ProfileController@store')
        ->name('profiles.profile.store');

    Route::put('profile/{profile}', 'Member\ProfileController@update')
        ->name('profiles.profile.update')
        ->where('id', '[0-9]+');

});