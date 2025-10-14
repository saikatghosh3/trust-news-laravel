<?php

namespace App\Http\Controllers;

use App\DataTables\PhotoLibraryDataTable;
use App\Http\Requests\PhotoLibraryRequest;
use App\Services\PhotoLibraryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoLibraryController extends Controller
{
    public function __construct(private PhotoLibraryService $photoLibraryService)
    {
        $this->middleware('permission:read_media_library')->only(['index']);
        $this->middleware('permission:create_media_library')->only(['create', 'store']);
        $this->middleware('permission:create_news|update_news|create_post|update_post')->only(['show', 'store']);
        $this->middleware('permission:delete_media_library')->only(['destroy']);

        $this->middleware('demo')->only(['store', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(PhotoLibraryDataTable $dataTable)
    {
        return $dataTable->render('backend.photo-library.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(Request $request)
    {
        $data = $this->photoLibraryService->formData($request->all());

        return view('backend.photo-library.create', $data);
    }

    /**
     * Store photo library
     */
    public function store(PhotoLibraryRequest $request)
    {
        $data = $request->validated();

        // Handle original image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $name = time() . '-photo.' . $file->getClientOriginalExtension();
            $folderPath = public_path('uploads/photo-library');
            if (!is_dir($folderPath)) mkdir($folderPath, 0755, true);

            $file->move($folderPath, $name);
            $data['image'] = 'uploads/photo-library/' . $name;
        }

        // Handle cropped thumb image (blob URL)
        if (!empty($data['cropped_thumb'])) {
            $thumbPath = $this->saveBlobImage($data['cropped_thumb'], 'thumb');
            $data['cropped_thumb_path'] = $thumbPath;
        }

        // Handle cropped large image (blob URL)
        if (!empty($data['cropped_large'])) {
            $largePath = $this->saveBlobImage($data['cropped_large'], 'large');
            $data['cropped_large_path'] = $largePath;
        }

        $photoLibrary = $this->photoLibraryService->create($data);

        return response()->json([
            'success' => true,
            'message' => localize("photo_library_data_saved_successfully"),
            'title'   => localize("photo_library"),
            'data'    => $photoLibrary,
        ]);
    }

    /**
     * Save blob image from frontend cropping
     */
    private function saveBlobImage($blobUrl, $type)
    {
        try {
            // Extract base64 data from blob URL
            $imageData = file_get_contents($blobUrl);
            
            if ($imageData === false) {
                throw new \Exception('Failed to get blob data');
            }

            // Generate filename
            $filename = $type . '_' . time() . '.jpg';
            $folderPath = public_path('uploads/photo-library');
            
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            $filePath = $folderPath . '/' . $filename;
            
            // Save the image
            file_put_contents($filePath, $imageData);
            
            return 'uploads/photo-library/' . $filename;
            
        } catch (\Exception $e) {
            \Log::error('Error saving blob image: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Request $request)
    {
        $data = $this->photoLibraryService->formData($request->all());

        return view('backend.photo-library.view', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, int $id)
    {
        $this->photoLibraryService->destroy(['id' => $id]);

        return response()->json([
            'success' => true,
            'message' => localize("photo_library_data_delete_successfully"),
            'title'   => localize("photo_library"),
        ]);
    }
}