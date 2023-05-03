<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Livewire\WithPagination;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{


    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    

    public function index()
    {
        $produts = Product::orderBy('id','DESC')->paginate(10);
        return view('admin.products.index',[
            'products' => $produts
        ]);
    }

    public function create()
    {

        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create', [
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData['category_id']);

           $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $request->trending == true ? '1':'0',
            'status' => $request->status == true ? '1':'0',
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description']
        ]);

        if($request->hasFile('image')){
            $uploadPath = 'uploads/products/';
            
            $i = 1 ;

            foreach($request->file('image') as $imageFile)
            {
                $extension = $imageFile->getClientOriginalExtension();
                $fileName = time().$i++.'.'.$extension;
                $imageFile->move($uploadPath,$fileName);
                $finalImagePathName = $uploadPath.$fileName;
                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName
                ]);  
            }
        }

        return redirect('admin/products')->with('message','Produit ajouté avec succèss !');
    }

    public function edit(int $product_id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::find($product_id);
        return view('admin.products.edit',compact('categories','brands','product')
        );
    }
    

    public function update(ProductFormRequest $request, $product_id)
    {
        $validatedData = $request->validated();

        $product = Category::findOrFail($validatedData['category_id'])
                            ->products()->where('id',$product_id)->first();

        if($product)
        {
            $product->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'brand' => $validatedData['brand'],
                'small_description' => $validatedData['small_description'],
                'description' => $validatedData['description'],
                'original_price' => $validatedData['original_price'],
                'selling_price' => $validatedData['selling_price'],
                'quantity' => $validatedData['quantity'],
                'trending' => $request->trending == true ? '1':'0',
                'status' => $request->status == true ? '1':'0',
                'meta_title' => $validatedData['meta_title'],
                'meta_keyword' => $validatedData['meta_keyword'],
                'meta_description' => $validatedData['meta_description']
            ]);

            if($request->hasFile('image')){
                $uploadPath = 'uploads/products/';
                
                $i = 1 ;
    
                foreach($request->file('image') as $imageFile)
                {
                    $extension = $imageFile->getClientOriginalExtension();
                    $fileName = time().$i++.'.'.$extension;
                    $imageFile->move($uploadPath,$fileName);
                    $finalImagePathName = $uploadPath.$fileName;
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName
                    ]);  
                }
            }

            return redirect('admin/products')->with('message','Produit Modifier avec succèss ! ');
        }
        else{
            return redirect('admin/products')->with('message','Aucun produit trouvé !');
        }
        
    }

    public function destroyImage(int $product_image_id)
    {
        $productImage = ProductImage::findOrFail($product_image_id);

        if(File::exists($productImage->image)){
            File::delete($productImage->image);
        }   

        $productImage->delete();


        return redirect()->back()->with('message','L\'image du produit supprimée avec success ! ');
    }


    public function destroy(int $product_id)
    {
        $product = Product::findOrFail($product_id);
        if($product->productImages){
            foreach($product->productImages as $image){
                if(File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }

        $product->delete();
        return redirect()->back()->with('message','Le produit supprimée avec success ! ');
    }
}
