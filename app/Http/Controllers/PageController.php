<?php
namespace App\Http\Controllers;

use App\Models\Category;

class PageController extends Controller
{
    public function show(string $page)
    {
        $pages = [
            'about'=>['eyebrow'=>'The story','title'=>'Made for modern living.','intro'=>'MyStore is a curated commerce studio built around useful objects, considered design and a calmer way to shop.'],
            'collections'=>['eyebrow'=>'Curated edits','title'=>'Collections with a point of view.','intro'=>'Explore focused edits built around form, function and timeless materials.'],
            'contact'=>['eyebrow'=>'We are here','title'=>'Let’s talk.','intro'=>'Questions about an order, a product or the store? Our team is ready to help.'],
            'faq'=>['eyebrow'=>'Helpful answers','title'=>'Frequently asked questions.','intro'=>'Find quick answers about orders, payments, delivery and returns.'],
            'shipping'=>['eyebrow'=>'Delivery','title'=>'Shipping, simply.','intro'=>'We pack carefully and dispatch orders as quickly as possible.'],
            'returns'=>['eyebrow'=>'Easy returns','title'=>'A simple return process.','intro'=>'If something is not right, contact us and we will help you through the next step.'],
            'privacy'=>['eyebrow'=>'Your privacy','title'=>'Privacy, clearly explained.','intro'=>'We respect your information and use it only to provide and improve the MyStore experience.'],
            'terms'=>['eyebrow'=>'Store terms','title'=>'Terms of service.','intro'=>'The basic terms that govern purchases and use of the MyStore website.'],
            'careers'=>['eyebrow'=>'Join us','title'=>'Build the next version of commerce.','intro'=>'We value thoughtful people, sharp craft and a bias toward making things better.'],
            'blog'=>['eyebrow'=>'The journal','title'=>'Ideas worth keeping.','intro'=>'Product notes, buying guides and stories from the world of considered design.'],
            'gallery'=>['eyebrow'=>'Visual edit','title'=>'A closer look.','intro'=>'A visual collection of spaces, materials and details that inspire our catalogue.'],
            'team'=>['eyebrow'=>'The people','title'=>'A small team with high standards.','intro'=>'Designers, operators and makers working together to make the experience feel effortless.'],
            'portfolio'=>['eyebrow'=>'Selected work','title'=>'Designed with intention.','intro'=>'A selection of the visual systems and commerce experiences behind MyStore.'],
        ];
        abort_unless(isset($pages[$page]),404);
        $data = $pages[$page];

        if ($page === 'collections') {
            $data['categories'] = Category::query()
                ->where('is_active', true)
                ->withCount(['products' => fn ($query) => $query->where('is_active', true)])
                ->orderBy('name')
                ->get();
        }

        return view('pages.show', compact('page'))->with($data);
    }
}
