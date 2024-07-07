<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    public function index()
    {
        $setting = Settings::first();
        return view('admin.settings.index', compact('setting'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|min:1',
            'logo' => 'nullable|image',
            'logo32' => 'nullable|image',
            'cover' => 'nullable|image',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'youtube' => 'nullable|url',
        ]);
        $settings = Settings::first();

        if ($settings) {
            $settings->update([
                'title' => $request->title,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
            ]);

            if ($request->hasFile('cover')) {
                $coverName = str_replace('/storage', '', $settings->cover);
                if (Storage::disk('public')->exists($coverName)) {
                    Storage::disk('public')->delete($coverName);
                }
                Storage::delete('/public' . $coverName);

                $image = $request->file('cover');
                $fileName = time() . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->resize(1000, 1000, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $settings->update(['cover' => 'settings/cover/' . $fileName]);
                $img->stream();
                Storage::disk('public')->put('settings/cover/' . $fileName, $img, 'public');
            }

            if ($request->hasFile('logo')) {
                $logoName = str_replace('/storage', '', $settings->logo);
                if (Storage::disk('public')->exists($logoName)) {
                    Storage::disk('public')->delete($logoName);
                }
                Storage::delete('/public' . $logoName);

                $image = $request->file('logo');
                $fileName = time() . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $settings->update(['logo' => 'settings/logo/' . $fileName]);
                $img->stream();
                Storage::disk('public')->put('settings/logo/' . $fileName, $img, 'public');
            }

            if ($request->hasFile('logo32')) {
                $logo32Name = str_replace('/storage', '', $settings->logo32);
                if (Storage::disk('public')->exists($logo32Name)) {
                    Storage::disk('public')->delete($logo32Name);
                }
                Storage::delete('/public' . $logo32Name);

                $image = $request->file('logo32');
                $fileName = time() . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->resize(32, 32);
                $settings->update(['logo32' => 'settings/logo32/' . $fileName]);
                $img->stream();
                Storage::disk('public')->put('settings/logo32/' . $fileName, $img, 'public');
            }
        } else {
            $settings = Settings::create([
                'title' => $request->title,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
            ]);

            if ($request->hasFile('cover')) {
                $image = $request->file('cover');
                $fileName = time() . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->resize(1000, 1000, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $settings->update(['cover' => 'settings/cover/' . $fileName]);
                $img->stream();
                Storage::disk('public')->put('settings/cover/' . $fileName, $img, 'public');
            }

            if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                $fileName = time() . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $settings->update(['logo' => 'settings/logo/' . $fileName]);
                $img->stream();
                Storage::disk('public')->put('settings/logo/' . $fileName, $img, 'public');
            }

            if ($request->hasFile('logo32')) {
                $image = $request->file('logo32');
                $fileName = time() . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->resize(32, 32);
                $settings->update(['logo32' => 'settings/logo32/' . $fileName]);
                $img->stream();
                Storage::disk('public')->put('settings/logo32/' . $fileName, $img, 'public');
            }
        }
        return back()->with('success', 'تم التعديل بنجاح.');
    }
}
