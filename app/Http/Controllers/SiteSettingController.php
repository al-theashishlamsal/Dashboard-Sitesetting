<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    // ... (Your existing methods)
    public function create()
    {
        // You can customize this method to display your create form
        return view('admin.sitesetting.create');
    }
    public function index()
    {
        // Fetch and display records, for example:
        $siteSettings = SiteSetting::all();

        // Pass the data to the view
        return view('admin.sitesetting.index', compact('siteSettings'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'govn_name' => 'string',
            'ministry_name' => 'string',
            'department_name' => 'required|string',
            'office_name' => 'required|string',
            'office_address' => 'required|string',
            'office_contact' => 'required|string',
            'office_mail' => 'required|string',
            'slogan' => 'string',
            'main_logo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'side_logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
        ]);

        $newMainLogo = null;
        $newSideLogo = null;

        if ($request->hasFile('main_logo')) {
            $newMainLogo = time() . '-' . '.' . $request->main_logo->extension();
            $request->main_logo->move(public_path('uploads/sitesetting/'), $newMainLogo);
        }

        if ($request->hasFile('side_logo')) {
            $newSideLogo = time() . '-' . '.' . $request->side_logo->extension();
            $request->side_logo->move(public_path('uploads/sitesetting/'), $newSideLogo);
        }

        $siteSetting = new SiteSetting([
            'govn_name' => $request->govn_name,
            'ministry_name' => $request->ministry_name,
            'department_name' => $request->department_name,
            'office_name' => $request->office_name,
            'office_address' => $request->office_address,
            'office_contact' => $request->office_contact,
            'office_mail' => $request->office_mail,
            'slogan' => $request->slogan,
            'main_logo' => $newMainLogo,
            'side_logo' => $newSideLogo,
        ]);

        $siteSetting->save();

        // Create the associated SocialLink
        $socialLink = new SocialLink([
            'facebook_link' => $request->facebook_link,
            'twitter_link' => $request->twitter_link,
        ]);

        $siteSetting->socialLinks()->save($socialLink);

        return redirect()->route('admin.sitesetting.index')->with(['successMessage' => 'Success !! Site Setting Created']);
    }
    public function edit($id)
    {
        // Assuming you have a SiteSetting model
        $sitesetting = SiteSetting::find($id);

        // Check if the $sitesetting is not found
        if (!$sitesetting) {
            abort(404); // Or handle it as you wish
        }

        return view('admin.sitesetting.update', compact('sitesetting'));
    }

    // ... (Your existing methods)

    public function update(Request $request, SiteSetting $siteSetting)
    {
        $this->validate($request, [
            'govn_name' => 'string',
            'ministry_name' => 'string',
            'department_name' => 'required|string',
            'office_name' => 'required|string',
            'office_address' => 'required|string',
            'office_contact' => 'required|string',
            'office_mail' => 'required|string',
            'slogan' => 'string',
            'main_logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'side_logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
        ]);

        $sitesetting = SiteSetting::find($request->id);

        if ($request->hasFile('main_logo')) {
            $newMainLogo = time() . '-' . '.' . $request->main_logo->extension();
            $request->main_logo->move(public_path('uploads/sitesetting/'), $newMainLogo);

            Storage::delete('public/uploads/sitesetting/' . $sitesetting->main_logo);
            $sitesetting->main_logo =  $newMainLogo;
        }

        if ($request->hasFile('side_logo')) {
            $newSideLogo = time() . '-' . '.' . $request->side_logo->extension();
            $request->side_logo->move(public_path('uploads/sitesetting/'), $newSideLogo);

            Storage::delete('public/uploads/sitesetting/' . $newSideLogo);
            $sitesetting->side_logo =  $newSideLogo;
        }

        $sitesetting->govn_name = $request->govn_name;
        $sitesetting->ministry_name = $request->ministry_name;
        $sitesetting->department_name = $request->department_name;
        $sitesetting->office_name = $request->office_name;
        $sitesetting->office_address = $request->office_address;
        $sitesetting->office_contact = $request->office_contact;
        $sitesetting->office_mail = $request->office_mail;
        $sitesetting->slogan = $request->slogan;
        $sitesetting->main_logo = isset($newMainLogo) ? $newMainLogo : $sitesetting->main_logo;
        $sitesetting->side_logo = isset($newSideLogo) ? $newSideLogo : $sitesetting->side_logo;

        // Update or create the associated SocialLink
        $socialLink = $sitesetting->socialLinks()->firstOrNew();

        $socialLink->facebook_link = $request->facebook_link;
        $socialLink->twitter_link = $request->twitter_link;
        $socialLink->save();

        $sitesetting->save();

        return redirect()->route('admin.sitesetting.index')->with(['successMessage' => 'Success !! Site Settings Updated']);
    }

    // ... (Your existing methods)
}
