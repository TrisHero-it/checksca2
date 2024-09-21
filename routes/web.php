<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\Client\ChatController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\Client\DetailContractController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\MidmanController;
use App\Http\Controllers\Client\NewsController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\GetApiController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\SignUpController;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\LoginController;
use App\Http\Controllers\Client\PostController;
use App\Http\Controllers\Client\TraderController;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\DomCrawler\Crawler;

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

Route::get('/send', function () {
    $category = new \App\Models\Category();
    $name ='Có 1 bài viết mới';
    $category->id = '100';
    $category->name = 'Test';
    $category->image= 'Ảnh';
    $category->notify(new \App\Notifications\SendNotificationToAdminn($name));
});

Route::get('/test', function () {
    $client = new Client();
    $response = $client->request('GET', "https://www.thegioididong.com/game-app/top-doi-hinh-manh-dtcl-mua-5-co-ti-le-thang-cao-nhat-1346805");
    $htmlContent = $response->getBody()->getContents();

    $crawler = new Crawler($htmlContent);

    // Lấy tất cả các thẻ h3 và các phần nội dung tương ứng
    $sections = [];
    $title = $crawler->filter('h1.title-news')->each(function ($node) {
        return $node->text();
    });
    $crawler->filter('div.detail-content')->each(function ($node) use (&$sections) {
        $currentSection = '';

        $node->children()->each(function ($child) use (&$sections, &$currentSection) {
            if ($child->nodeName() == 'h3') {
                // Khi gặp thẻ h3 mới, lưu phần nội dung hiện tại và bắt đầu phần mới
                if (!empty($currentSection)) {
                    $sections[] = trim($currentSection);
                }
                $currentSection = $child->text();  // Gán tiêu đề của thẻ h3 cho phần mới
            } else {
                // Thêm nội dung vào phần hiện tại
                $currentSection .= "\n" . $child->text();
            }
        });

        // Đừng quên thêm phần cuối cùng
        if (!empty($currentSection)) {
            $sections[] = trim($currentSection);
        }
    });

    $arr = ['content'=>$sections , 'title'=>$title];
    $response = $client->post("https://minhtri204.app.n8n.cloud/webhook-test/add-news2", [
        'form_params' => $arr,
    ]);
    echo 'Đã gửi';
});


Route::get('/listen', function () {
    return view('listen');
});

Route::get('/test-mid-room', function () {
    $midRoom = \App\Models\DetailContract::query()->first();
    return view('midrooms.layouts.app', compact('midRoom'));
});

Route::get('/', [HomeController::class, 'home']);
Route::get('/api', [GetApiController::class, 'index']);
Route::get('/call-check-scam', [GetApiController::class, 'callApiCheckScam']);

//    send Email Verify Loign
Route::post('/send-email', [LoginController::class, 'sendEmail']);

Route::middleware('check.login')->group(function () {

//    Change Password
    Route::get('password/edit', [LoginController::class, 'editPassword'])->name('password.edit');
    Route::put('password/update', [LoginController::class, 'updatePassword'])->name('password.update');

    //Login
    Route::get('logout', [LoginController::class, 'logOut']);

    //Dashboard
    Route::get('/dashboard', [\App\Http\Controllers\DashController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/edit', [\App\Http\Controllers\DashController::class, 'edit'])->name('dashboard.edit');
    Route::get('/dashboard/edit-profile', [\App\Http\Controllers\DashController::class, 'editProfile'])->name('dashboard.edit-profile');
    Route::put('/dashboard/update-avatar', [\App\Http\Controllers\DashController::class, 'updateAvatar'])->name('dashboard.update-avatar');

    Route::get('/dashboard/histories/{id}/edit', [\App\Http\Controllers\DashController::class, 'editReport'])->name('dashboard.histories.edit');
    Route::put('/dashboard/histories/{id}', [PostController::class, 'update'])->name('dashboard.histories.update');

    //Dashboard.history
    Route::get('/dashboard/histories', [\App\Http\Controllers\Client\HistoryDashboardController::class, 'index'])->name('dashboard.histories');

    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts', [PostController::class, 'store']);
    Route::get('posts/{id}/delete', [PostController::class, 'destroy'])->name('posts.destroy');

    //Job.Remove.Posts
    Route::post('job-remove-posts', [\App\Http\Controllers\Client\JobsRemovePostController::class, 'store'])->name('job-remove-posts.store');

    Route::get('like/{id}', [CommentController::class, 'like']);
    Route::get('unlike/{id}', [CommentController::class, 'unlike']);
    Route::post('/comments', [CommentController::class, 'store']);

//    Route::get('my-contracts', [DetailContractController::class, 'myContract']);
//    Route::get('my-contracts/{id}', [DetailContractController::class, 'show']);
//    Route::delete('my-contracts/{id}', [DetailContractController::class, 'destroy']);

//    Route::post('messengers', [MessengerController::class, 'store']);

//    Route::post('detail-contracts', [DetailContractController::class, 'store']);

//    Route::get('midman/{id}', [MidmanController::class, 'show']);

});

Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/load-more', [PostController::class, 'loadMore']);
Route::get('search', [PostController::class, 'search']);
Route::get('/sign-up/{code}', [SignUpController::class, 'create']);
Route::post('/sign-up/{code}', [SignUpController::class, 'store']);

//midman
Route::get('/search-midrooms', [MidmanController::class, 'search']);
//Route::get('midman', [MidmanController::class, 'index']);
//Route::get('midman/{id}', [MidmanController::class, 'show'])->name('midman.show');

// detail-contracts
Route::get('contracts', [DetailContractController::class, 'index']);

// traders
Route::get('traders', [TraderController::class, 'index']);
Route::get('traders/{id}', [TraderController::class, 'show'])->name('traders.show');
Route::put('traders/{id}', [TraderController::class, 'update']);
Route::get('/load-more-traders', [TraderController::class, 'loadMore']);

// contracts
Route::get('/contracts/{id}', [ContractController::class, 'show']);

// news
Route::get('/news-more', [NewsController::class, 'loadMore']);
Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/admin', [AdminLoginController::class, 'showLogin']);
Route::post('/admin-login', [AdminLoginController::class, 'login']);

// login
Route::post('login-client' ,[LoginController::class, 'store']);
Route::get('login-with-google', [LoginController::class, 'loginWithGoogle']);
Route::get('login', [LoginController::class, 'loginWithFacebook']);
Route::get('login-success', [LoginController::class, 'loginCallBack']);
Route::get('login-success-google', [LoginController::class, 'callBackGoogle']);
Route::get('sign-up', [SignUpController::class, 'create'] );
Route::post('sign-up', [SignUpController::class, 'store'] );
Route::post('verify-email', [SignUpController::class, 'verifyEmail'] );
