<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\AboutSection;
use App\Models\Package;
use App\Services\Frontend\FrontendService;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function __construct(
        protected FrontendService $frontendService,
    ) {}

    public function home()
    {
        $heroSections = HeroSection::where('is_active', true)->orderBy('sort_order')->get();
        $aboutSection = AboutSection::where('is_active', true)->first();
        $projects = $this->frontendService->getProjects();
        $categories = $this->frontendService->getProjectCategories();
        $services = $this->frontendService->getServices();
        $faqs = $this->frontendService->getFaqs();
        $testimonials = $this->frontendService->getTestimonials();
        $packages = Package::where('status', true)->orderBy('sort_order')->get();
        $heroProjects = \App\Models\Project::with('images')->where('status', true)
            ->orderBy('created_at', 'desc')
            ->get()
            ->filter(fn($p) => $p->coverImage())
            ->map(fn($p) => [
                'image' => asset($p->coverImage()->image),
                'title' => $p->name,
                'slug' => $p->slug,
            ])->values()->all();
        return view('frontend.home', compact('heroSections', 'aboutSection', 'projects', 'categories', 'services', 'faqs', 'testimonials', 'heroProjects', 'packages'));
    }

    public function portfolio()
    {
        $projects = $this->frontendService->getProjectsPaginated(12);
        $categories = $this->frontendService->getProjectCategories();
        return view('frontend.portfolio', compact('projects', 'categories'));
    }

    public function portfolioDetail($slug)
    {
        $project = $this->frontendService->getProjectBySlug($slug);
        if (!$project) {
            abort(404);
        }
        $prevProject = $this->frontendService->getPrevProject($project->id);
        $nextProject = $this->frontendService->getNextProject($project->id);
        $pagination = $this->frontendService->getProjectPagination($project->id);
        return view('frontend.detail-project', compact('project', 'prevProject', 'nextProject', 'pagination'));
    }

    public function services()
    {
        $services = $this->frontendService->getServices();
        return view('frontend.services', compact('services'));
    }

    public function paket()
    {
        $packages = Package::where('status', true)->orderBy('sort_order')->get();
        return view('frontend.paket', compact('packages'));
    }

    public function about()
    {
        $aboutSection = AboutSection::where('is_active', true)->first() ?? new AboutSection();
        return view('frontend.about', compact('aboutSection'));
    }

    public function faq()
    {
        $faqs = $this->frontendService->getFaqs();
        return view('frontend.faq', compact('faqs'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function privacyPolicy()
    {
        return view('frontend.privacy-policy');
    }

    public function terms()
    {
        return view('frontend.terms');
    }

    public function favicon()
    {
        $size = 64;
        $logo = setting('favicon') ?: setting('logo_image');

        $img = imagecreatetruecolor($size, $size);
        imagesavealpha($img, true);
        imagealphablending($img, false);
        $transparent = imagecolorallocatealpha($img, 0, 0, 0, 127);
        imagefilledrectangle($img, 0, 0, $size, $size, $transparent);

        $source = null;
        if ($logo) {
            $fullPath = public_path(ltrim($logo, '/'));
            if (is_file($fullPath)) {
                $source = @imagecreatefromstring((string) file_get_contents($fullPath));
            }
        }

        imagealphablending($img, true);

        if ($source) {
            $sw = imagesx($source);
            $sh = imagesy($source);
            $scale = max($size / $sw, $size / $sh);
            $nw = (int) round($sw * $scale);
            $nh = (int) round($sh * $scale);
            $tmp = imagecreatetruecolor($nw, $nh);
            imagesavealpha($tmp, true);
            imagealphablending($tmp, true);
            imagecopyresampled($tmp, $source, 0, 0, 0, 0, $nw, $nh, $sw, $sh);
            $sx = (int) (($nw - $size) / 2);
            $sy = (int) (($nh - $size) / 2);
            imagecopy($img, $tmp, 0, 0, $sx, $sy, $size, $size);
            imagedestroy($tmp);
            imagedestroy($source);
        } else {
            $blue = imagecolorallocate($img, 37, 99, 235);
            $white = imagecolorallocate($img, 255, 255, 255);
            imagefilledellipse($img, $size / 2, $size / 2, $size, $size, $blue);
            imagefilledrectangle($img, 11, 13, 53, 38, $white);
            imagefilledrectangle($img, 22, 41, 42, 45, $white);
            imagefilledrectangle($img, 28, 45, 36, 49, $white);
        }

        imagealphablending($img, false);
        $cx = $cy = ($size - 1) / 2;
        $r = $size / 2;
        for ($y = 0; $y < $size; $y++) {
            for ($x = 0; $x < $size; $x++) {
                if ((($x - $cx) * ($x - $cx)) + (($y - $cy) * ($y - $cy)) > ($r * $r)) {
                    imagesetpixel($img, $x, $y, $transparent);
                }
            }
        }

        ob_start();
        imagepng($img);
        $png = ob_get_clean();
        imagedestroy($img);

        return response($png, 200, [
            'Content-Type' => 'image/png',
            'Cache-Control' => 'public, max-age=31536000, immutable',
        ]);
    }

    public function ogImage()
    {
        // Gambar share dinamis: logo (dari Pengaturan SEO / Logo Website)
        // dibentuk BULAT di tengah kanvas 1200x630 putih. Kanvas putih
        // (bukan transparan) agar tampil benar di dark-mode WhatsApp.
        // Sumber selalu dibaca live dari settings + ?v= hash di URL,
        // sehingga ganti logo di admin langsung mengubah hasil share.
        $width = 1200;
        $height = 630;
        $diameter = 480;

        $logo = setting('seo_og_image') ?: setting('logo_image');

        $img = imagecreatetruecolor($width, $height);
        $white = imagecolorallocate($img, 255, 255, 255);
        imagefill($img, 0, 0, $white);

        $source = null;
        if ($logo) {
            $fullPath = public_path(ltrim($logo, '/'));
            if (is_file($fullPath)) {
                $source = @imagecreatefromstring((string) file_get_contents($fullPath));
            }
        }

        if ($source) {
            // Center-crop persegi -> resize ke diameter lingkaran.
            $sw = imagesx($source);
            $sh = imagesy($source);
            $side = min($sw, $sh);
            $sx = (int) (($sw - $side) / 2);
            $sy = (int) (($sh - $side) / 2);
            $square = imagecreatetruecolor($diameter, $diameter);
            imagesavealpha($square, true);
            imagealphablending($square, true);
            imagecopyresampled($square, $source, 0, 0, $sx, $sy, $diameter, $diameter, $side, $side);
            imagedestroy($source);

            // Mask lingkaran: piksel di luar radius dibuat putih.
            $c = ($diameter - 1) / 2;
            $r = $diameter / 2;
            for ($y = 0; $y < $diameter; $y++) {
                for ($x = 0; $x < $diameter; $x++) {
                    if ((($x - $c) * ($x - $c)) + (($y - $c) * ($y - $c)) > ($r * $r)) {
                        imagesetpixel($square, $x, $y, $white);
                    }
                }
            }

            imagecopy($img, $square, (int) (($width - $diameter) / 2), (int) (($height - $diameter) / 2), 0, 0, $diameter, $diameter);
            imagedestroy($square);
        } else {
            // Fallback: lingkaran biru + bilah putih (selaras favicon).
            $blue = imagecolorallocate($img, 37, 99, 235);
            $cx = $width / 2;
            $cy = $height / 2;
            imagefilledellipse($img, $cx, $cy, $diameter, $diameter, $blue);
            imagefilledrectangle($img, (int) ($cx - 150), (int) ($cy - 110), (int) ($cx + 150), (int) ($cy - 20), $white);
            imagefilledrectangle($img, (int) ($cx - 90), (int) ($cy + 10), (int) ($cx + 90), (int) ($cy + 40), $white);
            imagefilledrectangle($img, (int) ($cx - 45), (int) ($cy + 55), (int) ($cx + 45), (int) ($cy + 85), $white);
        }

        ob_start();
        imagepng($img);
        $png = ob_get_clean();
        imagedestroy($img);

        return response($png, 200, [
            'Content-Type' => 'image/png',
            'Cache-Control' => 'public, max-age=31536000, immutable',
        ]);
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'service' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);
        $this->frontendService->submitContact($validated);
        return back()->with('success', 'Pesan berhasil dikirim. Kami akan menghubungi Anda segera.');
    }
}
