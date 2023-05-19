<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\CategoryChild;
use App\Models\Shop;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class AdminProductController extends Controller
{
    public function index()
    {
        $Product = Product::paginate(6);
        $CategoryChilds = CategoryChild::get();
        return view('admin.product-table', compact('Product', 'CategoryChilds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $CategoryChilds = CategoryChild::get();
        $Shops = Shop::get();
        return view('admin.product-table-insert', compact('CategoryChilds', 'Shops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sold' => 'required|string',
        ]);

        $data = $request->all();
        // img
        $filesImage = [];
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $fileImage) {
                try {
                    $name = Str::random(10);
                    $fileName = time() . '_' . $name;
                    $extension = $fileImage->getClientOriginalExtension();
                    $fullpath = 'tin/tiki/admin/product/' . $fileName . '.' . $extension;
                    $upload = Storage::disk('s3')->put($fullpath, file_get_contents($fileImage), 'public');
                    if ($upload) {
                        $s3 = Storage::disk('s3')->getclient();
                        $nameImage = $s3->getObjectUrl(env('AWS_BUCKET'), $fullpath);
                    }
                    $filesImage[] = $nameImage;
                } catch (\Exception $e) {
                    logger($e->getMessage());
                }
            }
            $img = implode(', ', $filesImage);
        }
        $data['img'] = $img;

        // video
        $filesVideo = [];
        if ($request->hasfile('video')) {
            foreach ($request->file('video') as $fileVideo) {
                try {
                    $name = Str::random(10);
                    $fileName = time() . '_' . $name;
                    $extension = $fileVideo->getClientOriginalExtension();
                    $fullpath = 'tin/tiki/admin/product/' . $fileName . '.' . $extension;
                    $upload = Storage::disk('s3')->put($fullpath, file_get_contents($fileVideo), 'public');

                    if ($upload) {
                        $s3 = Storage::disk('s3')->getClient();
                        $video = $s3->getObjectUrl(env('AWS_BUCKET'), $fullpath);
                    }
                    $filesVideo[] = $video;
                } catch (\Exception $e) {
                    logger($e->getMessage());
                }
            }
            $video = implode(', ', $filesVideo);
            $data['video'] = $video;
        } else {
            $data['video'] = NULL;
        }

        Product::create($data);
        return redirect()->route('admin.product-table');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sold' => 'required|string',
        ]);

        // img
        $img = $request->imageOld;
        $filesImage = [];
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $fileImage) {
                try {
                    $name = Str::random(10);
                    $fileName = time() . '_' . $name;
                    $extension = $fileImage->getClientOriginalExtension();
                    $fullpath = 'tin/tiki/admin/product/' . $fileName . '.' . $extension;
                    $upload = Storage::disk('s3')->put($fullpath, file_get_contents($fileImage), 'public');

                    if ($upload) {
                        $s3 = Storage::disk('s3')->getAdapter()->getClient();
                        $nameImage = $s3->getObjectUrl(env('AWS_BUCKET'), $fullpath);
                    }
                    $filesImage[] = $nameImage;
                } catch (\Exception $e) {
                    logger($e->getMessage());
                }
            }
            $img = implode(', ', $filesImage);
        }

        // video
        $video = $request->videoOld;
        $filesVideo = [];
        if ($request->hasfile('video')) {
            foreach ($request->file('video') as $fileVideo) {
                try {
                    $name = Str::random(10);
                    $fileName = time() . '_' . $name;
                    $extension = $fileVideo->getClientOriginalExtension();
                    $fullpath = 'tin/tiki/admin/product/' . $fileName . '.' . $extension;
                    $upload = Storage::disk('s3')->put($fullpath, file_get_contents($fileVideo), 'public');

                    if ($upload) {
                        $s3 = Storage::disk('s3')->getAdapter()->getClient();
                        $video = $s3->getObjectUrl(env('AWS_BUCKET'), $fullpath);
                    }
                    $filesVideo[] = $video;
                } catch (\Exception $e) {
                    logger($e->getMessage());
                }
            }
            $video = implode(', ', $filesVideo);
        }

        // Update 
        $Product = new Product();
        $Product = Product::find($id);
        $Product->title = $request->title;
        $Product->img = $img;
        $Product->video = $video;
        $Product->sold = $request->sold;
        $Product->update();
        $Product = Product::with('categoryChild')->with('shop')->find($id);
        return response()->json(
            [
                'Product' => $Product,
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete
        $Product = Product::find($id);
        $Product->delete();
    }
}
