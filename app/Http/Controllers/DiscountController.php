<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\AccessType;
use App\Models\Region;
use App\Models\Discount;
use App\Models\DiscountRange;
 
class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::all();
        $brands = Brand::all();
        $access_types = AccessType::all();
        $discount_ranges = DiscountRange::all();
        $discounts = Discount::orderBy('created_at', 'DESC')->get();
  
        return view('discounts.index', [
            'discounts' => $discounts,
            'regions' => $regions,
            'brands'=> $brands,
            'acess_types'=> $access_types,
            'discount_ranges' => $discount_ranges
        ]);
    }
  
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

       
        // Obtener los IDs correspondientes de region, brand y accessType
            // $regionId = Region::where('code', $request->input('region'))->first()->id;
            // $brandId = Brand::where('name', $request->input('brand'))->first()->id;
            // $accessTypeCode = $request->input('access_type');

            // Guardar la regla de descuento con los IDs correspondientes
            $discount = Discount::create([
                'name' => $request->input('name'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'priority' => $request->input('priority'),
                'active' => $request->has('active'),
                'region_id' => $request->input('region'),
                'brand_id' => $request->input('brand'),
                'access_type_code' => $request->input('access_type'),
            ]);


            dd($discount);
   // ... Lógica para guardar campos de reglas de descuento en discount_ranges ...

                $discountRanges = [];

                for ($i = 1; $i <= 3; $i++) {
                    $fieldA = $request->input("field{$i}a");
                    $fieldB = $request->input("field{$i}b");
                    $awd = $request->input("awd{$i}");
                    $percentage = $request->input("percentage{$i}");

                    // Verificar si al menos uno de los campos en el grupo no está vacío o es numérico
                    if (
                        is_numeric($fieldA) && is_numeric($fieldB) &&
                        ($awd || $percentage)
                    ) {
                        $discountRanges[] = new DiscountRange([
                            'from_days' => $fieldA,
                            'to_days' => $fieldB,
                            'discount' => $percentage,
                            'code' => $awd,
                            'discount_id' => $discount->id
                        ]);
                    }
                    
                }

// Asociar las reglas de descuento con el descuento principal
        $discount->ranges()->saveMany($discountRanges);





   // Redireccionar a la vista deseada después de guardar



        
        return redirect()->route('discounts.index')->with('success', 'discount added successfully');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $discount = Discount::findOrFail($id);
  
        return view('discounts.show', compact('discount'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $discount = Discount::findOrFail($id);
  
        return view('discounts.edit', compact('discount'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $discount = Discount::findOrFail($id);
  
        $discount->update($request->all());
  
        return redirect()->route('discounts')->with('success', 'Discount updated successfully');
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