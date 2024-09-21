<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\UploadWallpaperRequest;
use App\Http\Resources\UploadWallpaperResource;
use App\Http\Resources\WallpapersWithPagingCollection;
use App\Jobs\GenerateThumbnailVideo;
use App\Models\Wallpaper;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UserApiController extends Controller
{

    private const TYPE_VIDEO = 'video/mp4';
    private function user(Request $request)
    {
        $user = $request->attributes->get('user');
        if (!$user) {
            return response()->json(['error' => 'User Not Found'], 401);
        } else {
            return $user;
        }
    }
    public function dataNotFound($data){
        if ($data->isEmpty()) {
            throw new HttpResponseException(
                response()
                    ->json([
                        'errors' => [
                            'message' => ['wallpaper not found'],
                        ],
                    ])
                    ->setStatusCode(404),
            );
        }
    }

    private function createThumbnailImage($imagePath, $thumbnailPath)
    {
        $image = Image::make($imagePath);
        $image->resize(300, 533);
        $image->save($thumbnailPath);
        return $thumbnailPath;
    }

    private function formateSize($file)
    {
        $sizeInBytes = filesize($file);
        $sizeInMb = $sizeInBytes / (1024 * 1024);
        return number_format($sizeInMb, 2);
    }

    private function getResolution($type, $pathFile)
    {
        if ($type->getClientOriginalExtension() == 'mp4') {
            return '1080 x 1920';
        } else {
            $fileInfo = getimagesize($pathFile);
            $width = $fileInfo[0];
            $height = $fileInfo[1];
            return $width . ' x ' . $height;
        }
    }
    public function profile(Request $request)
    {
        $user = $this->user($request);

        return response()->json([
            'user' => $user
        ]);
    }
    public function uploadWallpaper(UploadWallpaperRequest $request): JsonResponse
    {
        $user = $this->user($request);
        $data = $request->validated();
        $type = $request->file('type');
        $size = $this->formateSize($type);
        $resolution = $this->getResolution($type, $type->path());

        $isVideo = $type->getClientMimeType() === self::TYPE_VIDEO;
        $path = $isVideo ? $type->store('videos') : $type->store('images');
        $thumbnailFilename = pathinfo($path, PATHINFO_FILENAME) . '.jpg';
        $thumbnailPath = $isVideo ? $thumbnailFilename : 'thumbs/' . $thumbnailFilename;

        if (!$isVideo) {
            $this->createThumbnailImage($type->path(), storage_path('app/public/' . $thumbnailPath));
        }

        $wallpaper = new Wallpaper($data);
        $wallpaper->type = $path;
        $wallpaper->resolution = $resolution;
        $wallpaper->size = $size;
        $wallpaper->thumbnail = $thumbnailPath;
        $wallpaper->user_id = $user->id;
        $wallpaper->review = 1;
        $wallpaper->save();

        if ($isVideo) {
            GenerateThumbnailVideo::dispatch($wallpaper);
        }

        return (new UploadWallpaperResource($wallpaper))->response()->setStatusCode(201);
    }

    public function wallpapersByuser(Request $request){
        $user = $this->user($request);
        $page = intval($request->query('page', 1));
        $perPage = intval($request->query('perPage', 5));
        $wallpapers = Wallpaper::where('user_id' ,$user->id)
        ->latest()->paginate($perPage, ['*'], 'page', $page);
        $this->dataNotFound($wallpapers);
        return new WallpapersWithPagingCollection($wallpapers);
    }


}
