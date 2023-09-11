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
        Discount::create($request->all());
 
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