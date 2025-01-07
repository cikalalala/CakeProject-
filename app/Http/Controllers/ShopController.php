<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(12);
        return view('shop', compact("products"));
    }
    public function product_details($product_slug)
    {
        $product = Product::where("slug", $product_slug)->first();
        $rproducts = Product::where("slug", "<>", $product_slug)->get()->take(8);


        return view('details', compact("product", "rproducts"));
    }
    public function confirm($order_id)
    {
        $order = Order::with(['orderItems.product'])->find($order_id);
        $orderItems = $order->orderItems; // Memuat data orderItems
    
        return view('confirm', compact("order", "orderItems"));
    }
    public function checkout($product_slug, $qty)
    {
        $product = Product::where("slug", $product_slug)->first();
        $rproducts = Product::where("slug", "<>", $product_slug)->get()->take(8);
        $qty = $qty;


        return view('checkout', compact("product", "rproducts", "qty"));
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|string|max:10',
            'product_id' => 'required|array', // Pastikan produk dalam bentuk array
            'quantity' => 'required|array', // Pastikan jumlah dalam bentuk array
            'price' => 'required|array', // Pastikan harga dalam bentuk array
        ]);

        // Hitung subtotal, VAT, dan total
        $subtotal = $request->subtotal;
        $vat = $subtotal * 0.1; // 10% pajak
        $total = $subtotal + $vat;

        // Buat order baru
        $order = Order::create([
            'user_id' => Auth::id(),
            'subtotal' => $subtotal,
            'total' => $total,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => 'Indonesia', // Default ke Indonesia
            'type' => $request->checkout_payment_method, // Default tipe
            'status' => 'ordered', // Default status
        ]);

        // Loop data produk dan simpan ke order_items
        foreach ($request->product_id as $index => $productId) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $request->quantity[$index],
                'price' => $request->price[$index],
            ]);
        }

        return redirect()->route('shop.confirm', ['orderId' => $order->id]);

    }
}
