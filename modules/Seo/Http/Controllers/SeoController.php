<?php

namespace Modules\Seo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Setting;
use Illuminate\Support\Facades\Storage;
use Modules\Localize\Entities\Language;
use Illuminate\Contracts\Support\Renderable;

class SeoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_seo')->only('index');
        $this->middleware('permission:update_seo')->only('store');
        $this->middleware('permission:create_seo')->only('store');

        $this->middleware('permission:read_social_site')->only('socialSites');
        $this->middleware('permission:update_social_site')->only('socialSiteStore');
        $this->middleware('permission:create_social_site')->only('socialSiteStore');

        $this->middleware('permission:read_social_link')->only('socialLink');
        $this->middleware('permission:update_social_link')->only('socialLinkStore');
        $this->middleware('permission:create_social_link')->only('socialLinkStore');

        $this->middleware(['demo'])->only(['store','socialSiteStore','socialLinkStore']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $meta_data = Setting::where('id',5)->first();
        $existing_meta = json_decode($meta_data->details);

        return view('seo::index', compact('existing_meta'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('seo::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
public function store(Request $request)
{
    $path = '';
    $request->validate([
        'default_image' => 'file|mimes:gif,jpg,jpeg,png|max:1024', // 1024 KB
    ]);

    $meta_data = Setting::where('id', 5)->first();
    $existing_meta = json_decode($meta_data->details);

    $path = $existing_meta->default_image;

    if ($request->hasFile('default_image')) {
        // Delete previous file if exists
        if (!empty($existing_meta->default_image) && file_exists(public_path($existing_meta->default_image))) {
            unlink(public_path($existing_meta->default_image));
        }

        $request_file = $request->file('default_image');
        $filename = time() . rand(10, 1000) . '.' . $request_file->extension();

        // Folder path in public
        $folderPath = public_path('meta_setting');
        if (!is_dir($folderPath)) {
            mkdir($folderPath, 0755, true);
        }

        // Move uploaded file to public/meta_setting
        $request_file->move($folderPath, $filename);

        // Save relative path
        $path = 'meta_setting/' . $filename;
    }

    try {
        $details_data['title'] = $request->input("title");
        $details_data['meta_tag'] = $request->input("meta_keyword");
        $details_data['meta_description'] = $request->input("meta_description");
        $details_data['google_analytics'] = $request->input("google_analytics_id");
        $details_data['default_image'] = $path;

        $meta_data->update([
            'id' => 5,
            'event' => 'meta',
            'details' => json_encode($details_data)
        ]);

        return response()->json([
            'error' => false,
            'msg' => localize('data_updated_successfully')
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => true,
            'msg' => 'Failed to update data: ' . $e->getMessage()
        ]);
    }
}


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('seo::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('seo::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function socialSites()
    {
        $social_page = Setting::where('id',6)->first();
        $existing_social_page = json_decode($social_page->details);

        return view('seo::social_site', compact('existing_social_page'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function socialSiteStore(Request $request)
    {

        $social_page = Setting::where('id',6)->first();
        $existing_social_page = json_decode($social_page->details);

        try {

            $details_data['fb']             = $request->input("fb");
            $details_data['tw']             = $request->input("tw");
            $details_data['status']         = $request->input("status");
            $details_data['mobile_status']  = Null;

            $social_page_up = $social_page->update([
                'id'       => 6,
                'event'    => 'social_page',
                'details'  => json_encode($details_data)
            ]);

            // If the creation was successful, redirect with success message
            return response()->json(['error' => false, 'msg' => localize('data_updated_successfully')]);
        } catch (\Exception $e) {
            // If an exception occurs (e.g., validation error, database error), handle it here
            // You can customize the error message based on the type of exception
            return response()->json(['error' => true, 'msg' => 'Failed to update data: ' . $e->getMessage()]);
        }
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function socialLink()
    {
        $social_link = Setting::where('id',111)->first();
        $existing_social_link = json_decode($social_link->details);

        return view('seo::social_link', compact('existing_social_link'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function socialLinkStore(Request $request)
    {
        $social_link = Setting::where('id', 111)->first();

        try {
            $details_data = [
                'fb' => [
                    'link' => $request->input('fb'),
                    'followers' => $request->input('fb_followers'),
                ],
                'tw' => [
                    'link' => $request->input('tw'),
                    'followers' => $request->input('tw_followers'),
                ],
                'linkd' => [
                    'link' => $request->input('linkd'),
                    'followers' => $request->input('linkd_followers'),
                ],
                'instagram' => [
                    'link' => $request->input('instagram'),
                    'followers' => $request->input('instagram_followers'),
                ],
                'pin' => [
                    'link' => $request->input('pin'),
                    'followers' => $request->input('pin_followers'),
                ],
                'vimo' => [
                    'link' => $request->input('vimo'),
                    'followers' => $request->input('vimo_followers'),
                ],
                'youtube' => [
                    'link' => $request->input('youtube'),
                    'followers' => $request->input('youtube_followers'),
                ],
                'flickr' => [
                    'link' => $request->input('flickr'),
                    'followers' => $request->input('flickr_followers'),
                ],
                'vk' => [
                    'link' => $request->input('vk'),
                    'followers' => $request->input('vk_followers'),
                ],
                'whats_app' => [
                    'link' => $request->input('whats_app'),
                    'followers' => $request->input('whats_app_followers'),
                ],
                'google' => null
            ];

            $social_link->update([
                'event' => 'social_link',
                'details' => json_encode($details_data)
            ]);

            // If the creation was successful, redirect with success message
            return response()->json(['error' => false, 'msg' => localize('data_updated_successfully')]);
        } catch (\Exception $e) {
            // If an exception occurs (e.g., validation error, database error), handle it here
            // You can customize the error message based on the type of exception
            return response()->json(['error' => true, 'msg' => 'Failed to update data: ' . $e->getMessage()]);
        }
    }

    /**
     * Summary of sitemapLinks
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function sitemapLinks()
    {
        $languages = Language::all();

        return view('seo::sitemap_links', compact('languages'));
    }

}
