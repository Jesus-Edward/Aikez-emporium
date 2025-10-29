<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Ability;
use App\Models\AbilityStat;
use App\Models\AboutArea;
use App\Models\Banner;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Coupon;
use App\Models\FAQAnswer;
use App\Models\Product;
use App\Models\Service;
use App\Models\Size;
use App\Models\Subscriber;
use App\Models\Team;
use App\Models\TermsAndCondition;
use App\Models\Testimonial;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function index()
    {
        $banners = Banner::where('status', 1)->get();
        $about = AboutArea::where('status', 1)->first();
        $services = Service::where('status', 1)->limit(4)->latest()->get();
        $ability = Ability::where('status', 1)->first();
        $stat = AbilityStat::first();
        $teams = Team::where('status', 1)->limit(4)->latest()->get();
        $testimonials = Testimonial::where('status', 1)->limit(4)->limit(4)->latest()->get();
        $answers = FAQAnswer::with('faq')->where('status', 1)->get();
        $brand_products = Product::with('brand')->where('status', 1)->limit(10)->latest()->get();
        $categories = Category::with(['products' => function ($query) {
            $query->limit(8);
        }])->where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $blogs = BlogPost::with('category')->latest()->take(4)->get();
        return view('frontend.home.home', compact('banners', 'about', 'services', 'ability', 'stat', 'teams', 'testimonials', 'answers', 'categories', 'brands', 'brand_products', 'blogs'));
    }

    public function contact()
    {
        $contact = Contact::first();
        return view('frontend.pages.contact', compact('contact'));
    }

    public function termsConditions()
    {
        $t_and_c = TermsAndCondition::first();
        return view('frontend.pages.terms_andd_condition', compact('t_and_c'));
    }

    public function about()
    {
        $about = AboutArea::where('status', 1)->first();
        $services = Service::where('status', 1)->limit(4)->latest()->get();
        $ability = Ability::where('status', 1)->first();
        $stat = AbilityStat::first();
        $teams = Team::where('status', 1)->get();
        $testimonials = Testimonial::where('status', 1)->get();
        return view('frontend.pages.about', compact('about', 'services', 'ability', 'stat', 'teams', 'testimonials'));
    }

    public function faq()
    {
        $answers = FAQAnswer::with('faq')->where('status', 1)->get();
        return view('frontend.pages.faq', compact('answers'));
    }

    public function team()
    {
        $teams = Team::where('status', 1)->get();
        return view('frontend.pages.team', compact('teams'));
    }

    public function testimonial()
    {
        $testimonials = Testimonial::where('status', 1)->get();
        return view('frontend.pages.testi.testimonial', compact('testimonials'));
    }

    public function contactMessage(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'msg_subject' => ['required', 'max:255'],
            'message' => ['required', 'max:1000'],
            'terms_and_conditions' => ['nullable', 'in:on,off']
        ]);

        // dd($request->all());
        Mail::send(new ContactMail($request->name, $request->phone_number, $request->email, $request->msg_subject, $request->message, $request->terms_and_conditions));
        return response()->json(['status' => 'success', 'message' => 'Message sent successfully']);
    }

    public function productBySize()
    {
        $sizes = Size::whereHas('products')->where('status', 1)->orderBy('name')->get();
        $productBySize = [];

        foreach ($sizes as $size) {
            $perPage = 8;

            $pageName = 'page_' . $size->id;

            $productBySize[$size->id] = Product::with(['brand'])->where(['size_id' => $size->id, 'status' => 1])->latest()->paginate($perPage, ['*'], $pageName);
        }

        return view('frontend.pages.product-size', compact('sizes', 'productBySize'));
    }

    public function productByCategory()
    {
        $categories = Category::where('status', 1)->get();
        return view('frontend.pages.product_category', compact('categories'));
    }

    public function brandProductsPerBrand($categoryId)
    {
        $brands = Brand::where('category_id', $categoryId)->where('status', 1)->get();
        return response()->json($brands);
    }

    public function brandProducts($brandId)
    {
        $products = Product::with('brand')->where(['brand_id' => $brandId, 'status' => 1])->latest()->paginate(12);

        if (request()->ajax()) {
            return response()->json([
                'html' => view('frontend.pages.partials.products', compact('products'))->render()
            ]);
        }

        return view('frontend.pages.partials.products', compact('products'));
    }

    public function singleProduct(string $slug) {
        $product = Product::where(['slug' => $slug, 'status' => 1])->firstOrFail();
        $related_products = Product::with('brand')->where(['brand_id' => $product->brand_id, 'status' => 1])->where('id', '!=', $product->id)->limit(8)->get();
        return view('frontend.pages.single_product', compact('product', 'related_products'));
    }

    public function applyCoupon(Request $request)
    {
        $subtotal = $request->subtotal;
        $code = $request->code;
        $coupon = Coupon::where('code', $code)->first();

        if (!$coupon) {
            return response(['message' => 'Invalid coupon code'], 422);
        }
        if ($coupon->quantity <= 0) {
            return response(['message' => 'Coupon already used'], 422);
        }
        if ($coupon->expired_date < now()) {
            return response(['message' => 'Coupon has expired'], 422);
        }

        if ($coupon->discount_type === 'percent') {
            $discount = $subtotal * ($coupon->discount / 100);
            $discount = round($discount, 2);

        } elseif ($coupon->discount_type === 'amount') {
            $discount = $coupon->discount;
            $discount = round($discount, 2);
        }

        $finalTotal = $subtotal - $discount;

        session()->put('coupon', ['code' => $code, 'discount' => $discount]);
        return response([
            'message' => 'Coupon code added successfully',
            'finalTotal' => $finalTotal,
            'discount' => $discount,
            'coupon_code' => $code
        ]);
    }

    public function destroyCoupon()
    {
        try {
            session()->forget('coupon');

            return response(['message' => 'Coupon successfully removed', 'grand_cart_total' => grandCartTotal()]);
        } catch (\Exception $e) {
            logger($e);
            return response(['message' => 'Something went wrong in the frontend']);
        }
    }

    public function addToWishlist(Request $request, $productId) {

        $guestToken = $request->cookie('guest_wishlist_token');
        $userId = Auth::user()->id ?? null;
        if (Auth::check()) {
            $productAlreadyExist = Wishlist::where(['user_id' => $userId, 'product_id' => $productId])
                ->exists();
            if ($productAlreadyExist) {
                return response()->json(['message' => 'Product already saved to wishlist']);
            }
        }

        if ($guestToken) {
            $productAlreadyExist = Wishlist::where(['product_id' => $productId, 'guest_token' => $guestToken])
                ->exists();
            if ($productAlreadyExist) {
                return response()->json(['message' => 'Product already saved to wishlist']);
            }
        }

        if ($userId) {
            $attributes = [
                'product_id' => $productId,
                'user_id' => $userId
            ];
            $values = ['guest_token' => null];
        }else {
            $attributes = [
                'product_id' => $productId,
                'guest_token' => $guestToken,
            ];
            $values = ['user_id' => null];
        }


        Wishlist::firstOrCreate($attributes, $values);
        return response()->json(['message' => 'Product saved to wishlist', 'status' => 'success']);

    }

    public function showGuestWishlist() {
        $guestToken = request()->cookie('guest_wishlist_token');
        $wishlists = Wishlist::where('guest_token', $guestToken)->latest()->take(12)->get();
        return view('frontend.pages.guest_wishlist', compact('wishlists'));
    }

    public function blogDetails($slug) {
        $blog = BlogPost::where('slug', $slug)->first();
        $categories = BlogCategory::latest()->where('status', 1)->get();
        $latest_blogs = BlogPost::latest()->limit(3)->where(['status' => 1])->get();
        return view('frontend.pages.blog_details', compact('blog', 'categories', 'latest_blogs'));
    }

    public function categoryBlogs($id)
    {
        $blogs = BlogPost::where(['category_id' => $id, 'status' => 1])->paginate(3);
        $cat_name = BlogCategory::where('id', $id)->first();
        $categories = BlogCategory::latest()->limit(5)->where('status', 1)->get();
        $latest_blogs = BlogPost::latest()->limit(3)->where(['status' => 1])->get();

        return view('frontend.pages.blog_category_list', compact('blogs', 'categories', 'latest_blogs', 'cat_name'));
    }

    function blogs(Request $request)
    {
        $blogs = BlogPost::withCount(['comments' => function ($query) {
            $query->where('status', 1);
        }])->with(['category', 'user'])->where(['status' => 1]);

        if ($request->has('search') && $request->filled('search')) {
            $blogs->where(function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('short_post', 'like', '%' . $request->search . '%')
                    ->orWhere('post', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->has('category') && $request->filled('category')) {
            $blogs->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->category);
            });
        }

        $blogs = $blogs->latest()->paginate(9);
        $categories = BlogCategory::where('status', 1)->get();
        return view('frontend.pages.blogs', compact('blogs', 'categories'));
    }

    public function AllBlogs()
    {
        $blogs = BlogPost::latest()->where('status', 1)->paginate(3);
        $categories = BlogCategory::latest()->where('status', 1)->get();
        $latest_blogs = BlogPost::latest()->limit(3)->where(['status' => 1])->get();
        return view('frontend.pages.all_blogs', compact('blogs', 'categories', 'latest_blogs'));
    }
}
