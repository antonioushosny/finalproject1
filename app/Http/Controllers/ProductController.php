<?php

namespace App\Http\Controllers;
use App\Category;
use App\Group;
use App\Brand;
use App\Style;
use App\Product_colors;
use App\Product_color_sizes;
use App\Size;
use App\Material;
use App\Color;
use App\Product;
use App\Company;
use DB;
use Illuminate\Http\Request;
use redirect;

class ProductController extends Controller
{
    //
    public function index($categ_name,$group_name)
    {
        $groups =Group::with('categories')->get();
        
        $products =Product::with('style')->with('images')
        ->get();
    ;
        // dd($products);
  
       //retrun categries of group
        $categories=DB::table('categories')
        ->join('categ_groups','categories.id','=','categ_groups.categ_id')
        ->join('groups','categ_groups.group_id','=','groups.id')
        ->select('categories.categ_name AS categ_name')
        ->when($categ_name, function ($query) use ($group_name) {
            return $query->where('groups.group_name', $group_name);
        })
        ->get();
        
        //return styles of category
        $styles=DB::table('styles')
        ->join('categories','styles.categ_id','=','categories.id')
        ->select('styles.style_name AS style_name')
        ->where('categories.categ_name',$categ_name)
        ->get();

        //return brands of category
        $brands=DB::table('brands')
        ->join('group_brands','brands.id','=','group_brands.brand_id')
        ->join('groups','groups.id','=','group_brands.group_id')
        ->join('categ_groups','groups.id','=','categ_groups.group_id')
        ->join('categories','categories.id','=','categ_groups.categ_id')
        ->select('brands.brand_name AS brand_name')
        ->where('groups.group_name',$group_name)
        ->get();

        //return materials of category
        $materials=DB::table('groups')
        ->join('categ_groups','categ_groups.group_id','=','groups.id')
        ->join('categories','categ_groups.categ_id','=','categories.id')
        ->join('styles','styles.categ_id','=','categories.id')
        ->join('products','styles.id','=','products.style_id')
        ->join('materials','materials.id','=','products.mater_id')
        ->select('materials.mater_name AS mater_name')
        ->when($categ_name, function ($query) use ($group_name) {
            return $query->where('groups.group_name', $group_name);
        })
        ->distinct()
        ->get();

        //return sizes of category
        $sizes=DB::table('sizes')
        ->join('product_color_sizes','sizes.id','=','product_color_sizes.size_id')
        ->join('product_colors','product_color_sizes.product_colors_id','=','product_colors.id')
        ->join('products','product_colors.product_id','=','products.id')
        ->join('styles','styles.id','=','products.style_id')
        ->join('categories','styles.categ_id','=','categories.id')
        ->join('categ_groups','categories.id','=','categ_groups.categ_id')
        ->join('groups','categ_groups.group_id','=','groups.id')
        ->select('sizes.size_name AS size_name')
        ->when($categ_name, function ($query) use ($group_name) {
            return $query->where('groups.group_name', $group_name);
        })
        ->distinct()
        ->get();

        //return colors of category
        $colors=DB::table('groups')
        ->join('categ_groups','groups.id','=','categ_groups.group_id')
        ->join('categories','categ_groups.categ_id','=','categories.id')
        ->join('styles','categories.id','=','styles.categ_id')
        ->join('products','products.style_id','=','styles.id')
        ->join('product_colors','product_colors.product_id','=','products.id')
        ->join('colors','product_colors.color_id','=','colors.id')
        ->select('colors.color_name AS color_name')
        ->when($categ_name, function ($query) use ($group_name) {
            return $query->where('groups.group_name', $group_name);
        })
        ->distinct()
        ->get();

        //return all data adout each products
       /* SELECT colors.color_name, styles.style_name,sizes.size_name,materials.mater_name,products.id
        from sizes 
        join product_color_sizes on sizes.id=product_color_sizes.size_id
        JOIN product_colors ON product_color_sizes.product_colors_id=product_colors.id
        JOIN colors ON product_colors.color_id=colors.id
        JOIN products ON product_colors.product_id=products.id
        join styles ON products.style_id=styles.id
        join materials ON products.mater_id=materials.id
        JOIN categories ON categories.id=styles.categ_id
        JOIN categ_groups ON categ_groups.categ_id=categories.id
        JOIN groups ON groups.id=categ_groups.group_id
        WHERE groups.group_name='gro1'
        AND categories.categ_name='Dresses'

        SELECT products.product_serial_num,products.product_price,products.product_desc,products.id,products.mater_id
        from products 
       join materials ON materials.id=products.mater_id
       
        join styles on products.style_id=styles.id
        join categories on categories.id=styles.categ_id
        JOIN categ_groups ON categories.id=categ_groups.categ_id
        JOIN groups ON categ_groups.group_id=groups.id
        WHERE groups.group_name='woman'
        AND categories.categ_name='Dresses'*/

        // $products=DB::table('products')
        // ->join('styles','products.style_id','=','styles.id')
        // ->join('categories','categories.id','=','styles.categ_id')
        // ->join('categ_groups','categ_groups.categ_id','=','categories.id')
        // ->join('groups','groups.id','=','categ_groups.group_id')
        // ->select('products.product_desc AS desc','products.product_price AS price','products.product_price_sale AS sale','products.id AS id')
        // ->when($categ_name, function ($query) use ($group_name) {
        //     return $query->where('groups.group_name', $group_name);
        // })
        // ->get();
        //return max pric and min price
        

        $max_prices=DB::table('groups')
        ->join('categ_groups','categ_groups.group_id','=','groups.id')
        ->join('categories','categories.id','=','categ_groups.categ_id')
        ->join('styles','categories.id','=','styles.categ_id')
        ->join('products','products.style_id','=','styles.id')
        ->select('products.product_price')
        ->where('categories.categ_name',$categ_name)
        ->max('products.product_price');
        
        
        return view('user.product.show', compact('groups','categories','group_name','styles','brands','max_prices','colors',
    'materials','sizes','products','categ_name'));
       /* return view('user.product.show',['categories'=>$categories,'group_name'=>$group_name,'styles'=>$styles,
        'brands'=>$brands,'materials'=>$materials,'sizes'=>$sizes]);*/
    }
}
