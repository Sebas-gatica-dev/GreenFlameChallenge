<?php
  
namespace App\Http\Controllers;
  
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\AccessType;
use App\Models\Region;
use App\Models\Discount;
use App\Models\DiscountRange;
use Illuminate\Support\Facades\Validator;


class DiscountController extends Controller
{


    private function getBrandId($brandName)
    {
      $brands= Brand::all();

      foreach($brands as $brand){

        if($brandName === $brand->name){
            return $brand->id;
        }

      }




       return $brand->id;
    }
    
    private function getRegionId($regionName)
    {

        $regions= Region::all();

        foreach($regions as $region){

            if($regionName === $region->name){
                return $region->id;

            }
    
          }
    }
    
    
    

    private function saveDiscountRange($discountId, $fielda, $fieldb, $awd, $percentage) {
        // Validaciones personalizadas
        $validator = Validator::make([
            "fielda" => $fielda,
            "fieldb" => $fieldb,
            "awd" => $awd,
            "percentage" => $percentage,
        ], [
            "fielda" => "required|numeric",
            "fieldb" => "required|numeric|gte:fielda",
            "awd" => "nullable|max:10|alpha_num",
            "percentage" => "nullable|numeric|max:80",
        ]);
        
        // Personalizar el mensaje de error para el caso en que awd o percentage sea requerido
        $validator->sometimes(['awd', 'percentage'], 'required', function ($input) {
            return empty($input->awd) && empty($input->percentage);
        });
        
        // Verifica si la validación falla
        if ($validator->fails()) {
            // Maneja el caso de validación fallida aquí, por ejemplo, puedes redirigir al usuario o mostrar errores.
        } else {
            // La validación pasó, puedes crear y guardar el DiscountRange.
            // $discountRange = new DiscountRange;
            // $discountRange->discount_id = $discountId;
            // $discountRange->from_days = $fielda;
            // $discountRange->to_days = $fieldb;
            // $discountRange->code = $awd;
            // $discountRange->discount = $percentage;
            // $discountRange->save();
           
            $discountRange = DiscountRange::create([
            'discount_id'=> $discountId,
            'from_days' => $fielda,
            'to_days'  => $fieldb,
            'code' => $awd,
            'discount' => $percentage
            ]);
      };
        
    }

    
    
    


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::all();
        $brands = Brand::all();
        $access_types = AccessType::all();
        $discount_ranges = DiscountRange::orderby('discount_id', 'ASC')->get();
        $discounts = Discount::orderBy('created_at', 'DESC')->get();

  
        return view('discounts.index', [
            'discounts' => $discounts,
            'regions' => $regions,
            'brands'=> $brands,
            'access_types'=> $access_types,
            'discount_ranges' => $discount_ranges
        ]);

    }   

    //     return  [
    //         'discounts' => $discounts,
    //         'regions' => $regions,
    //         'brands'=> $brands,
    //         'access_types'=> $access_types,
    //         'discount_ranges' => $discount_ranges
    //     ];
    // }
  
    // public function index()
    // {
    //     $discounts = Discount::orderBy('created_at', 'DESC')
    //         ->join('regions', 'discounts.region_id', '=', 'regions.id')
    //         ->join('brands', 'discounts.brand_id', '=', 'brands.id')
    //         ->join('access_types', 'discounts.access_type_id', '=', 'access_types.id')
    //         ->join('discount_ranges', 'discounts.discount_range_id', '=', 'discount_ranges.id')
    //         ->select('discounts.*', 'regions.nombre as region_nombre', 'brands.nombre as brand_nombre', 'access_types.nombre as access_type_nombre', 'discount_ranges.nombre as discount_range_nombre')
    //         ->paginate(10);
    
    //     return view('discounts.index', [
    //         'discounts' => $discounts,
    //     ]);
    // }
    




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $regions = Region::all();
        $brands = Brand::all();
        $access_types = AccessType::all();
       
        

        return view('discounts.create', [
            'regions' => $regions,
            'brands'=> $brands,
            'access_types'=> $access_types

        ]);
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request);

     $start_date = Carbon::createFromFormat('d/m/Y', $request->input('start_date'))->format('Y-m-d');
     $end_date = Carbon::createFromFormat('d/m/Y', $request->input('end_date'))->format('Y-m-d');


  // Guardar datos en la tabla "discounts"
  //$discount = new Discount;
  $name = $request->input('name');
  $brand_id = $this->getBrandId($request->input('brand'));
  $region_id = $this->getRegionId($request->input('region'));
  $access_type_code = $request->input('access_type');
  $active = $request->input('active');
  $priority = $request->input('priority');
//   $discount->save();


  $discount = Discount::create([
    'name' => $name,
    'start_date' => $start_date,
    'end_date' => $end_date, 
    'priority' => $priority,
    'active' => $active,
    'region_id' => $region_id,
    'brand_id' => $brand_id,
    'access_type_code' => $access_type_code

  ]);

//Iteracion de ls tres posibles camposs que afectan a la tabla discount_ranges

  for ($i = 1; $i <= 3; $i++) {           
    $fielda = $request->input("field{$i}a");
    $fieldb = $request->input("field{$i}b");
    $awd = $request->input("awd{$i}");
    $percentage = $request->input("percentage{$i}");

    if ($fielda !== null || $fieldb !== null || $awd !== null || $percentage !== null) {
        $this->saveDiscountRange($discount->id, $fielda, $fieldb, $awd, $percentage);
    }
}

            // Otras operaciones o redirección después de guardar
            return redirect()->route('discounts');


    }




  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $discount_ranges = DiscountRange::where('discount_id', $id)->get();
        $discount = Discount::findOrFail($id);
        $regions = Region::where('id', $discount->region_id)->first();
        $brands = Brand::where('id', $discount->brand_id)->first();
        $access_types = AccessType::where('code', $discount->access_type_code)->first();
    
       // dd($access_types);
  
        return view('discounts.show', [
             'discount' => $discount,
             'discount_ranges' => $discount_ranges,
             'regions' => $regions,
             'brands' => $brands,
             'access_types' => $access_types
        ]);
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {     
        
        $discount_ranges = DiscountRange::where('discount_id', $id)->get();
        $discount = Discount::findOrFail($id);
        $regions = Region::all();
        $brands = Brand::all();
        $brand_before = Brand::findOrFail($discount->brand_id);
        $region_before = Brand::findOrFail($discount->brand_id);
        $access_type_code_before = AccessType::where('code', $discount->access_type_code)->first();
        $access_types = AccessType::all();
    
        //dd($discount_ranges);
  
        return view('discounts.edit', [
             'discount' => $discount,
             'discount_ranges' => $discount_ranges,
             'regions' => $regions,
             'region_before'=> $region_before,
             'brands' => $brands,
             'brand_before' => $brand_before,
             'access_types' => $access_types,
             'access_type_code_before' => $access_type_code_before,
        ]);

  
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id,)
    {

       

         $discount = Discount::findOrFail($id);

         $discount_ranges = DiscountRange::where('discount_id', $id)->get();

       



        // $discount->update($request->all());
  
        // return redirect()->route('discounts')->with('success', 'Discount updated successfully');

        return $request;
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $discount = Discount::findOrFail($id);
  
        $discount->delete();
  
        return redirect()->route('discounts')->with('success', 'Discount deleted successfully');
    }
}