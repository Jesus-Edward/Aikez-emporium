<?php

use App\Events\RealTimeOrderPlacedNotificationEvent;
use App\Http\Controllers\Backend\AbilityController;
use App\Http\Controllers\Backend\AboutAreaController;
use App\Http\Controllers\Backend\AdminAuthController;
use App\Http\Controllers\Backend\AdminDashboardController;
use App\Http\Controllers\Backend\AdminManagementController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\DeliveryAreaController;
use App\Http\Controllers\Backend\FAQAnswerController;
use App\Http\Controllers\Backend\FAQQuestionController;
use App\Http\Controllers\Backend\GeneralSettingsController;
use App\Http\Controllers\Backend\NewsletterController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PaymentSettingsController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\TermsAndConditionController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Frontend\AddressController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\PaymentGatewayController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialLinkController;
use App\Models\Address;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;

Broadcast::routes();

Route::middleware('guest')->group(function() {
    Route::get('/admin/login/page', [AdminDashboardController::class, 'login'])->name('admin.login.page');
    Route::get('/admin/forgot-password', [AdminDashboardController::class, 'forgotPassword'])->name('admin.forgot-password');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [AdminAuthController::class, 'profile'])->name('profile');
        Route::put('/profile/{id}/update', [AdminAuthController::class, 'updateProfile'])->name('profile.update');
        Route::put('/password/update', [AdminAuthController::class, 'updateAdminPassword'])->name('password.update');
        Route::get('/general-settings', [GeneralSettingsController::class, 'index'])->name('general-settings.index');
        Route::get('/payment-settings', [PaymentSettingsController::class, 'index'])->name('payment-settings.index');
        Route::put('/paystack-settings', [PaymentSettingsController::class, 'StorePayStackSettings'])->name('paystack-settings.index');
        Route::put('/basic-settings/update', [GeneralSettingsController::class, 'storeBasicSettings'])->name('basic-settings.update');
        Route::put('/mail-settings/update', [GeneralSettingsController::class, 'storeMailSettings'])->name('mail-settings.update');
        Route::put('/logo-settings/update', [GeneralSettingsController::class, 'storeLogoSettings'])->name('logo-settings.update');
        Route::put('/seo-settings/update', [GeneralSettingsController::class, 'storeSeoSettings'])->name('seo-settings.update');
        Route::put('pusher-settings', [GeneralSettingsController::class, 'updatePusherSettings'])->name('pusher-settings.update');

        Route::resource('banner', BannerController::class);
        Route::resource('about', AboutAreaController::class);
        Route::resource('service', ServiceController::class);
        Route::get('ability/index', [AbilityController::class, 'index'])->name('ability.index');
        Route::get('ability/create', [AbilityController::class, 'create'])->name('ability.create');
        Route::post('ability/store', [AbilityController::class, 'store'])->name('ability.store');
        Route::get('ability/{id}/edit', [AbilityController::class, 'edit'])->name('ability.edit');
        Route::put('ability/{id}/update', [AbilityController::class, 'update'])->name('ability.update');
        Route::delete('ability/{id}/destroy', [AbilityController::class, 'destroy'])->name('ability.destroy');
        Route::put('ability-stat/store', [AbilityController::class, 'storeUpdate'])->name('ability-stat.store');
        Route::resource('team', TeamController::class);
        Route::resource('testimonial', TestimonialController::class);
        Route::resource('faq', FAQQuestionController::class);
        Route::resource('faq-answer', FAQAnswerController::class);
        Route::get('contact/index', [ContactController::class, 'index'])->name('contact.index');
        Route::put('contact/update', [ContactController::class, 'update'])->name('contact.update');
        Route::get('t&c/index', [TermsAndConditionController::class, 'index'])->name('t&c.index');
        Route::put('t&c/update', [TermsAndConditionController::class, 'update'])->name('t&c.update');
        Route::resource('category', CategoryController::class);
        Route::resource('brand', BrandController::class);
        Route::resource('size', SizeController::class);
        Route::resource('product', ProductController::class);
        Route::resource('coupon', CouponController::class);
        Route::post('send/coupon', [CouponController::class, 'sendCoupon'])->name('send.coupon');
        Route::resource('delivery-area', DeliveryAreaController::class);
        /**Order Routes */
        Route::get('all-orders', [OrderController::class, 'index'])->name('all-orders');
        Route::get('view-order/{id}', [OrderController::class, 'viewOrder'])->name('order.view');
        Route::put('order/status/update/{id}', [OrderController::class, 'updateOrderStatus'])->name('orders.status.update');
        Route::get('order/status/{id}', [OrderController::class, 'getOrderStatus'])->name('orders.status.get');
        Route::delete('all-orders/delete/{id}', [OrderController::class, 'deleteOrder'])->name('all-orders.delete');
        Route::get('pending-orders', [OrderController::class, 'pendingOrders'])->name('pending-orders');
        Route::get('processing-orders', [OrderController::class, 'processingOrders'])->name('processing-orders');
        Route::get('delivered-orders', [OrderController::class, 'deliveredOrders'])->name('delivered-orders');
        Route::get('declined-orders', [OrderController::class, 'declinedOrders'])->name('declined-orders');
        Route::get('clear-notification', [AdminDashboardController::class, 'clearNotification'])->name('clear-notification');

        Route::controller(BlogController::class)->group(function () {
            // Blog Category Routes
            Route::get('blog_category/index', 'CategoryIndex')->name('blog_category.index');
            Route::post('blog_category/store', 'storeCategory')->name('blog_category.store');
            Route::get('/blog_category/edit/{id}', 'CategoryEdit');
            Route::put('blog_category/update', 'updateCategory')->name('blog_category.update');
            Route::delete('blog_category/delete/{id}', 'deleteCategory')->name('blog_category.delete');

            // Blog Post Routes
            Route::get('blog/post/index', 'index')->name('blog.post.index');
            Route::get('blog/post/create', 'create')->name('blog.post.create');
            Route::get('blog/post/edit/{id}', 'edit')->name('blog.post.edit');
            Route::post('blog/post/store/', 'store')->name('blog.post.store');
            Route::put('blog/post/update/{id}', 'update')->name('blog.post.update');
            Route::delete('blog/post/delete/{id}', 'delete')->name('blog.post.delete');
        });

        Route::controller(CommentController::class)->group(function () {
            Route::get('blog/comment/index', 'CommentIndex')->name('blog.comment.index');
            Route::post('comment/status/toggle/', 'ToggleStatus')->name('comment.status.toggle');
            Route::delete('blog.comment.delete/{id}', 'DeleteComment')->name('blog.comment.delete');
        });
        Route::get('newsletter/index', [NewsletterController::class, 'index'])->name('newsletter.index');
        Route::delete('newsletter/destroy/{id}', [NewsletterController::class, 'destroy'])->name('newsletter.destroy');
        Route::post('send/newsletter', [NewsletterController::class, 'sendNewsletter'])->name('send.newsletter');
        Route::resource('admin-mgt', AdminManagementController::class);
        Route::resource('social-links', SocialLinkController::class);
    });
});

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

Route::middleware('auth')->group(function () {
    Route::get('/user/profile/dashboard', [ProfileController::class, 'profileDashboard'])->name('user.profile.dashboard');
    Route::post('/update/avatar', [ProfileController::class, 'updateAvatar'])->name('user.update.avatar');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('profile/address', [AddressController::class, 'createAddress'])->name('profile.address.store');
    Route::put('profile/address/{id}/edit', [AddressController::class, 'updateAddress'])->name('profile.address.edit');
    Route::delete('profile/address/{id}/delete', [AddressController::class, 'deleteAddress'])->name('profile.address.delete');
    Route::post('/checkout/payment', [CheckoutController::class, 'checkoutRedirectPayment'])->name('checkout.payment');
    Route::get('/checkout/payment/index', [CheckoutController::class, 'index'])->name('checkout.payment.index');
    Route::post('/make-payment', [PaymentGatewayController::class, 'makePayment'])->name('make-payment');
    Route::post('blog/comment/store', [CommentController::class, 'StoreComment'])->name('blog.comment.store');

    // Route::get('/test', function () {
    //     RealTimeOrderPlacedNotificationEvent::dispatch();
    // });
});

Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::post('/contact/send/message', [FrontendController::class, 'contactMessage'])->name('frontend.contact.message');
Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/faq', [FrontendController::class, 'faq'])->name('frontend.faq');
Route::get('/team', [FrontendController::class, 'team'])->name('frontend.team');
Route::get('/testimonial', [FrontendController::class, 'testimonial'])->name('frontend.testimonial');
Route::get('/terms/conditions', [FrontendController::class, 'termsConditions'])->name('frontend.terms.conditions');
Route::get('tiles/size', [FrontendController::class, 'productBySize'])->name('tiles.size');
Route::get('tiles/category', [FrontendController::class, 'productByCategory'])->name('tiles.category');
Route::get('/categories/{categoryId}/brands', [FrontendController::class, 'brandProductsPerBrand']);
Route::get('/brands/{brandId}/products', [FrontendController::class, 'brandProducts']);
Route::get('/single/product/page/{slug}', [FrontendController::class, 'singleProduct'])->name('single.product.page');
Route::post('/product/add-to-cart', [CartController::class, 'addToCart'])->name('product.add-to-cart');
Route::post('/product/update-cart', [CartController::class, 'updateCart'])->name('product.update-cart');
Route::get('cart-product-remove/{rowId}', [CartController::class, 'cartProductRemove'])->name('cart-product-remove');
Route::get('/product/cart/destroy', [CartController::class, 'destroyCart'])->name('product.destroy.cart');
Route::get('/product/cart/page', [CartController::class, 'viewCart'])->name('product.cart.page');
/**Coupon route */
Route::post('/apply-coupon', [FrontendController::class, 'applyCoupon'])->name('apply-coupon');
/**destroy coupon route */
Route::get('/destroy-coupon', [FrontendController::class, 'destroyCoupon'])->name('destroy-coupon');
Route::get('/checkout/delivery-cal', [CartController::class, 'calculateDeliveryCharge'])->name('checkout.delivery-cal');
Route::post('/paystack/checkout', [PaymentGatewayController::class, 'payWithPaystack'])->name('paystack.make-payment');
Route::get('paystack/callback', [PaymentGatewayController::class, 'callback'])->name('paystack.callback');
Route::post('/product/add-to-wishlist/{productId}', [FrontendController::class, 'addToWishlist'])->name('product.add-to-wishlist');
Route::get('/guest/wishlist', [FrontendController::class, 'showGuestWishlist'])->name('guest.wishlist');
Route::get('/blog/details/{slug}', [FrontendController::class, 'blogDetails'])->name('blog.details');
Route::get('/blog/category/list/{id}', [FrontendController::class, 'categoryBlogs']);
Route::get('/blogs', [FrontendController::class, 'blogs'])->name('blogs');
Route::get('/all_blogs', [FrontendController::class, 'AllBlogs'])->name('all_blogs');
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribeToNewsletter'])->name('subscribe.newsletter');
Route::get('/newsletter/unsubscribe/{unsubscribe_token}', [NewsletterController::class, 'unsubscribeNewsletter'])->name('newsletter.unsubscribe');
Route::get('/products/store', [FrontendController::class, 'productsStore'])->name('products.store');
Route::get('/search/products', [FrontendController::class, 'searchProducts'])->name('search.products');
Route::get('/get-brands/{category_id?}', [FrontendController::class, 'getBrands'])->name('get.brands.by.category');

require __DIR__.'/auth.php';
