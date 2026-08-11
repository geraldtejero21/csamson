<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\MiscController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CssController;
use App\Http\Controllers\BasicUiController;
use App\Http\Controllers\AdvanceUiController;
use App\Http\Controllers\ExtraComponentsController;
use App\Http\Controllers\BasicTableController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\SignaturePadController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SalesReportController;
use App\Http\Controllers\CropImageController;
use App\Http\Controllers\MonthlySubscriptionController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdminAppointmentController;


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

Auth::routes(['verify' => true]);

// Public appointment scheduling
Route::get('/book-appointment', [AppointmentController::class, 'index'])->name('appointments.index');
Route::get('/book-appointment/availability', [AppointmentController::class, 'availability'])
    ->middleware('throttle:60,1')
    ->name('appointments.availability');
Route::post('/book-appointment', [AppointmentController::class, 'store'])
    ->middleware('throttle:20,1')
    ->name('appointments.store');

Route::middleware('auth')->prefix('dashboard/appointments')->name('dashboard.appointments.')->group(function () {
    Route::get('/{appointment}/edit', [AdminAppointmentController::class, 'edit'])->name('edit');
    Route::get('/{appointment}/availability', [AdminAppointmentController::class, 'availability'])->name('availability');
    Route::put('/{appointment}', [AdminAppointmentController::class, 'update'])->name('update');
    Route::post('/{appointment}/create-patient', [AdminAppointmentController::class, 'createPatient'])->name('create-patient');
});

// Dashboard Route
// Route::get('/', [DashboardController::class, 'dashboardModern'])->middleware('verified');
Route::get('/', [DashboardController::class, 'dashboardModern']);

Route::get('/modern', [DashboardController::class, 'dashboardModern']);
Route::get('/ecommerce', [DashboardController::class, 'dashboardEcommerce']);
Route::get('/analytics', [DashboardController::class, 'dashboardAnalytics']);

// Signature  Route
Route::get('signaturepad', [SignaturePadController::class, 'index']);
Route::post('signaturepad', [SignaturePadController::class, 'upload'])->name('signaturepad.upload');

// Main Search
Route::get('/search/{key}', [SearchController::class, 'showSearch']);
Route::get('/suggest-search', [SearchController::class, 'showSearchSuggest']);
//File Upload
Route::get('/upload-file', [FileUploadController::class, 'createForm']);
Route::post('/upload-file', [FileUploadController::class, 'fileUpload'])->name('fileUpload');
Route::get('/view-file/{file_id}', [FileUploadController::class, 'viewFile']);
//Picture upload
Route::get('/upload-picture', [FileUploadController::class, 'createPictureForm']);
Route::post('/upload-picture', [FileUploadController::class, 'pictureUpload'])->name('pictureUpload');
Route::get('/view-picture/{picture_id}', [FileUploadController::class, 'viewPicture']);

// Application Route
Route::get('/app-email', [ApplicationController::class, 'emailApp']);
// Route::get('/patient-records', function () {
//     $patientData = DB::table('patients')->orderBy('id', 'DESC')->get();
//     $patientFiles = DB::table('files')->where('patient_id', '=', $patientData[0]->id)->get();
//     return view('pages.patient-data-table', ['patientData' => $patientData, 'patientFiles' => $patientFiles]);
// });
Route::get('/patient-records', [ApplicationController::class, 'listPatient']);

 Route::get('/view-installment/{patient_id}', [ApplicationController::class, 'showInstallment']);
 Route::get('/save-installment/{patient_id}', [ApplicationController::class, 'saveInstallment']);
 Route::get('/remove-installment/{installment_id}', [ApplicationController::class, 'removeInstallment']);
 Route::get('/populate-installment/{installment_id}', [ApplicationController::class, 'populateInstallment']);
 Route::get('/save-edit-installment', [ApplicationController::class, 'saveEditInstallment']);
 Route::get('/populate-installment-record/{installment_id}', [ApplicationController::class, 'populateInstallmentRecord']);
 Route::get('/save-installment-record', [ApplicationController::class, 'saveNewInstallmentRecord']);
 Route::get('/populate-installment-record-item/{installment_id}', [ApplicationController::class, 'populateInstallmentRecordItem']);
 Route::get('/update-installment-record', [ApplicationController::class, 'saveModifyInstallmentRecord']);
 



 Route::get('/view-patient/{patient_id}', [ApplicationController::class, 'showPatient']);
 Route::get('/edit-patient/{patient_id}', [ApplicationController::class, 'editPatient']);
 Route::get('/remove-treatment-procedure/{treatment_procedure_id}', [ApplicationController::class, 'removeTreatmentProcedure']);
 Route::get('/get-procedure-input/{treatment_procedure_id}', [ApplicationController::class, 'getProcedure']);
 Route::get('/get-file-input/{file_id}', [ApplicationController::class, 'getFile']);
 Route::get('save-edit-procedure', [ApplicationController::class, 'saveEditProcedure']);
 Route::get('save-edit-file', [ApplicationController::class, 'saveEditFile']);
 
 Route::get('/remove-consent/{consent_id}', [ApplicationController::class, 'removeConsent']);
 Route::get('/remove-patient-record/{patient_id}', [ApplicationController::class, 'removePatientRecord']);
 Route::get('/remove-file/{file_id}', [ApplicationController::class, 'removeFile']);
 Route::get('/add-patient', [ApplicationController::class, 'addPatient']);
 Route::get('/patient/{patient_id}', [ApplicationController::class, 'viewPatient']);
 Route::post('/patient/{patient_id}/dental-chart', [ApplicationController::class, 'saveDentalChart']);

// Route::post('/add-patient-records', [ApplicationController::class, 'addPatientRecords']);
Route::post('save-patient/{birthDate}',  [ApplicationController::class, 'storePatientRecords'] );
Route::post('add-treatment-record-process',  [ApplicationController::class, 'storePatientRecordTreatment'] );
Route::post('edit-patient-process/{birthDate}',  [ApplicationController::class, 'updatePatientRecords'] );
Route::get('/calculate-age',  [ApplicationController::class, 'calculateAge'] );


Route::get('/app-email/content', [ApplicationController::class, 'emailContentApp']);
Route::get('/app-chat', [ApplicationController::class, 'chatApp']);
Route::get('/app-todo', [ApplicationController::class, 'todoApp']);
Route::get('/app-kanban', [ApplicationController::class, 'kanbanApp']);
Route::get('/app-file-manager', [ApplicationController::class, 'fileManagerApp']);
Route::get('/app-contacts', [ApplicationController::class, 'contactApp']);
Route::get('/app-calendar', [ApplicationController::class, 'calendarApp']);
Route::get('/app-invoice-list', [ApplicationController::class, 'invoiceList']);
Route::get('/app-invoice-view', [ApplicationController::class, 'invoiceView']);
Route::get('/app-invoice-edit', [ApplicationController::class, 'invoiceEdit']);
Route::get('/app-invoice-add', [ApplicationController::class, 'invoiceAdd']);
Route::get('/eCommerce-products-page', [ApplicationController::class, 'ecommerceProduct']);
Route::get('/eCommerce-pricing', [ApplicationController::class, 'eCommercePricing']);
Route::get('/view-drawing/{drawing_id}', [ApplicationController::class, 'viewDrawing']);
Route::post('/save-patient-signature/{treatment_id}', [ApplicationController::class, 'savePatientSignRecord']);
Route::post('/view-patient-signature/{treatment_id}', [ApplicationController::class, 'viewPatientSignRecord']);
Route::get('get-consent-data', [ApplicationController::class, 'getConsentData']);

// User profile Route
Route::get('/user-profile-page', [UserProfileController::class, 'userProfile']);

// Page Route
Route::get('/page-contact', [PageController::class, 'contactPage']);
Route::get('/page-blog-list', [PageController::class, 'pageBlogList']);
Route::get('/page-search', [PageController::class, 'searchPage']);
Route::get('/page-knowledge', [PageController::class, 'knowledgePage']);
Route::get('/page-knowledge/licensing', [PageController::class, 'knowledgeLicensingPage']);
Route::get('/page-knowledge/licensing/detail', [PageController::class, 'knowledgeLicensingPageDetails']);
Route::get('/page-timeline', [PageController::class, 'timelinePage']);
Route::get('/page-faq', [PageController::class, 'faqPage']);
Route::get('/page-faq-detail', [PageController::class, 'faqDetailsPage']);
Route::get('/page-account-settings', [PageController::class, 'accountSetting']);
Route::get('/page-blank', [PageController::class, 'blankPage']);
Route::get('/page-collapse', [PageController::class, 'collapsePage']);

// Media Route
Route::get('/media-gallery-page', [MediaController::class, 'mediaGallery']);
Route::get('/media-hover-effects', [MediaController::class, 'hoverEffect']);

// User Route
Route::get('/page-users-list', [UserController::class, 'usersList']);
Route::get('/page-users-view', [UserController::class, 'usersView']);
Route::get('/page-users-edit/{user_id}', [UserController::class, 'usersEdit']);
Route::get('/get-user/{user_id}', [UserController::class, 'usersGet']);
Route::post('/change-user-password/{user_id}', [UserController::class, 'usersChangePassword']);
Route::post('/update-user/{user_id}', [UserController::class, 'usersUpdate']);


// Authentication Route
Route::get('/user-login', [AuthenticationController::class, 'userLogin']);
Route::get('/user-forgot-password', [AuthenticationController::class, 'forgotPassword']);
Route::get('/user-lock-screen', [AuthenticationController::class, 'lockScreen']);
Route::get('/logout', [AuthenticationController::class, 'userLogout']);


// Misc Route
Route::get('/page-404', [MiscController::class, 'page404']);
Route::get('/page-maintenance', [MiscController::class, 'maintenancePage']);
Route::get('/page-500', [MiscController::class, 'page500']);

// Card Route
Route::get('/cards-basic', [CardController::class, 'cardBasic']);
Route::get('/cards-advance', [CardController::class, 'cardAdvance']);
Route::get('/cards-extended', [CardController::class, 'cardsExtended']);

// Css Route
Route::get('/css-typography', [CssController::class, 'typographyCss']);
Route::get('/css-color', [CssController::class, 'colorCss']);
Route::get('/css-grid', [CssController::class, 'gridCss']);
Route::get('/css-helpers', [CssController::class, 'helpersCss']);
Route::get('/css-media', [CssController::class, 'mediaCss']);
Route::get('/css-pulse', [CssController::class, 'pulseCss']);
Route::get('/css-sass', [CssController::class, 'sassCss']);
Route::get('/css-shadow', [CssController::class, 'shadowCss']);
Route::get('/css-animations', [CssController::class, 'animationCss']);
Route::get('/css-transitions', [CssController::class, 'transitionCss']);

// Basic Ui Route
Route::get('/ui-basic-buttons', [BasicUiController::class, 'basicButtons']);
Route::get('/ui-extended-buttons', [BasicUiController::class, 'extendedButtons']);
Route::get('/ui-icons', [BasicUiController::class, 'iconsUI']);
Route::get('/ui-alerts', [BasicUiController::class, 'alertsUI']);
Route::get('/ui-badges', [BasicUiController::class, 'badgesUI']);
Route::get('/ui-breadcrumbs', [BasicUiController::class, 'breadcrumbsUI']);
Route::get('/ui-chips', [BasicUiController::class, 'chipsUI']);
Route::get('/ui-chips', [BasicUiController::class, 'chipsUI']);
Route::get('/ui-collections', [BasicUiController::class, 'collectionsUI']);
Route::get('/ui-navbar', [BasicUiController::class, 'navbarUI']);
Route::get('/ui-pagination', [BasicUiController::class, 'paginationUI']);
Route::get('/ui-preloader', [BasicUiController::class, 'preloaderUI']);

// Advance UI Route
Route::get('/advance-ui-carousel', [AdvanceUiController::class, 'carouselUI']);
Route::get('/advance-ui-collapsibles', [AdvanceUiController::class, 'collapsibleUI']);
Route::get('/advance-ui-toasts', [AdvanceUiController::class, 'toastUI']);
Route::get('/advance-ui-tooltip', [AdvanceUiController::class, 'tooltipUI']);
Route::get('/advance-ui-dropdown', [AdvanceUiController::class, 'dropdownUI']);
Route::get('/advance-ui-feature-discovery', [AdvanceUiController::class, 'discoveryFeature']);
Route::get('/advance-ui-media', [AdvanceUiController::class, 'mediaUI']);
Route::get('/advance-ui-modals', [AdvanceUiController::class, 'modalUI']);
Route::get('/advance-ui-scrollspy', [AdvanceUiController::class, 'scrollspyUI']);
Route::get('/advance-ui-tabs', [AdvanceUiController::class, 'tabsUI']);
Route::get('/advance-ui-waves', [AdvanceUiController::class, 'wavesUI']);
Route::get('/fullscreen-slider-demo', [AdvanceUiController::class, 'fullscreenSlider']);

// Extra components Route
Route::get('/extra-components-range-slider', [ExtraComponentsController::class, 'rangeSlider']);
Route::get('/extra-components-sweetalert', [ExtraComponentsController::class, 'sweetAlert']);
Route::get('/extra-components-nestable', [ExtraComponentsController::class, 'nestAble']);
Route::get('/extra-components-treeview', [ExtraComponentsController::class, 'treeView']);
Route::get('/extra-components-ratings', [ExtraComponentsController::class, 'ratings']);
Route::get('/extra-components-tour', [ExtraComponentsController::class, 'tour']);
Route::get('/extra-components-i18n', [ExtraComponentsController::class, 'i18n']);
Route::get('/extra-components-highlight', [ExtraComponentsController::class, 'highlight']);

// Basic Tables Route
Route::get('/table-basic', [BasicTableController::class, 'tableBasic']);

// Data Table Route
Route::get('/table-data-table', [DataTableController::class, 'dataTable']);

// Form Route
Route::get('/form-elements', [FormController::class, 'formElement']);
Route::get('/form-select2', [FormController::class, 'formSelect2']);
Route::get('/form-validation', [FormController::class, 'formValidation']);
Route::get('/form-masks', [FormController::class, 'masksForm']);
Route::get('/form-editor', [FormController::class, 'formEditor']);
Route::get('/form-file-uploads', [FormController::class, 'fileUploads']);
Route::get('/form-layouts', [FormController::class, 'formLayouts']);
Route::get('/form-wizard', [FormController::class, 'formWizard']);

// Charts Route
Route::get('/charts-chartjs', [ChartController::class, 'chartJs']);
Route::get('/charts-chartist', [ChartController::class, 'chartist']);
Route::get('/charts-sparklines', [ChartController::class, 'sparklines']);


// locale route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

//PDF
Route::post('/create-pdf/{patient_id}', [PdfController::class, 'createPdf']);

//Sales report

Route::get('/sales-report', [SalesReportController::class, 'showSalesReport']);
Route::get('/sales-report-list/{date}', [SalesReportController::class, 'listSalesReport']);
Route::get('/save-expense/{date}', [SalesReportController::class, 'saveExpense']);
Route::get('/get-expense/{id}', [SalesReportController::class, 'getExpense']);
Route::get('/update-expense/{id}', [SalesReportController::class, 'updateExpense']);
Route::get('/remove-expense/{id}', [SalesReportController::class, 'removeExpense']);


Route::get('/monthly-subscription', [MonthlySubscriptionController::class, 'showsubscription']);
Route::get('/monthly-subscription-list/{date}', [MonthlySubscriptionController::class, 'listSubscription']);
Route::get('/save-subscription', [MonthlySubscriptionController::class, 'saveSubscription']);
Route::get('/complete-subscription/{id}', [MonthlySubscriptionController::class, 'completeSubscription']);



//Upload with Crop
Route::get('/patient/upload-image/{patient_id}',  [CropImageController::class, 'index']) ;
Route::post('upload-cropped', [CropImageController::class, 'uploadCropImage'])->name('upload-image');
