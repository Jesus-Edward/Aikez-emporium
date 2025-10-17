<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Ability;
use App\Models\AbilityStat;
use App\Models\AboutArea;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\FAQAnswer;
use App\Models\Product;
use App\Models\Service;
use App\Models\Size;
use App\Models\Team;
use App\Models\TermsAndCondition;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index() {
        $banners = Banner::where('status', 1)->get();
        $about = AboutArea::where('status', 1)->first();
        $services = Service::where('status', 1)->limit(4)->latest()->get();
        $ability = Ability::where('status', 1)->first();
        $stat = AbilityStat::first();
        $teams = Team::where('status', 1)->limit(4)->latest()->get();
        $testimonials = Testimonial::where('status', 1)->limit(4)->limit(4)->latest()->get();
        $answers = FAQAnswer::with('faq')->where('status', 1)->get();
        $brand_products = Product::with('brand')->where('status', 1)->limit(10)->latest()->get();
        $categories = Category::with(['products' => function($query) {
            $query->limit(8);
        }])->where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        return view('frontend.home.home', compact('banners', 'about', 'services', 'ability', 'stat', 'teams', 'testimonials', 'answers', 'categories', 'brands', 'brand_products'));
    }

    public function contact() {
        $contact = Contact::first();
        return view('frontend.pages.contact', compact('contact'));
    }

    public function termsConditions() {
        $t_and_c = TermsAndCondition::first();
        return view('frontend.pages.terms_andd_condition', compact('t_and_c'));
    }

    public function about() {
        $about = AboutArea::where('status', 1)->first();
        $services = Service::where('status', 1)->limit(4)->latest()->get();
        $ability = Ability::where('status', 1)->first();
        $stat = AbilityStat::first();
        $teams = Team::where('status', 1)->get();
        $testimonials = Testimonial::where('status', 1)->get();
        return view('frontend.pages.about', compact('about', 'services', 'ability', 'stat', 'teams', 'testimonials'));
    }

    public function faq() {
        $answers = FAQAnswer::with('faq')->where('status', 1)->get();
        return view('frontend.pages.faq', compact('answers'));
    }

    public function team() {
        $teams = Team::where('status', 1)->get();
        return view('frontend.pages.team', compact('teams'));
    }

    public function testimonial() {
        $testimonials = Testimonial::where('status', 1)->get();
        return view('frontend.pages.testi.testimonial', compact('testimonials'));
    }

    public function contactMessage(Request $request) {
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

    public function productBySize() {
        $sizes = Size::whereHas('products')->where('status', 1)->orderBy('name')->get();
        $productBySize = [];

        foreach ($sizes as $size) {
            $perPage = 8;

            $pageName = 'page_'.$size->id;

            $productBySize[$size->id] = Product::with(['brand'])->where(['size_id' => $size->id, 'status' => 1])->latest()->paginate($perPage, ['*'], $pageName);
        }

        return view('frontend.pages.product-size', compact('sizes', 'productBySize'));
    }

    public function productByCategory() {
        $categories = Category::where('status', 1)->get();
        return view('frontend.pages.product_category', compact('categories'));
    }

    public function brandProductsPerBrand($categoryId) {
        $brands = Brand::where('category_id', $categoryId)->where('status', 1)->get();
        return response()->json( $brands);
    }

    public function brandProducts($brandId) {
        $products = Product::with('brand')->where(['brand_id' => $brandId, 'status' => 1])->latest()->paginate(12);

        if (request()->ajax()) {
            return response()->json([
                'html' => view('frontend.pages.partials.products', compact('products'))->render()
            ]);
        }

        return view('frontend.pages.partials.products', compact('products'));
    }
}
