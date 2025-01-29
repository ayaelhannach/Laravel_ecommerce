<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    public function index()
    {
        Log::info('Displaying all customers');
        Log::channel('database')->info('Utilisateur créé avec succès', ['user_id' => 123]);
        Log::channel('database')->error('Erreur critique dans le système', ['error_code' => 500]);
        $customers = Customer::all();
        
        if ($customers->isEmpty()) {
            Log::warning('No customers found in the database');
        }

        return view('customers.index', ['customers' => $customers]);
    }

    public function create()
    {
        Log::info('Opening customer creation form');
        return view('customers.create');
    }

    public function store(Request $request)
    {
        try {
            Customer::create($request->all());
            Log::info('Customer created', ['customer_data' => $request->all()]);
        } catch (\Exception $e) {
            Log::error('Error creating customer', ['error_message' => $e->getMessage()]);
            return redirect()->route('customers.create')->with('error', 'Failed to create customer');
        }

        return redirect()->route('customers.index');
    }

    public function show(Customer $customer)
    {
        Log::info('Displaying customer details', ['customer_id' => $customer->id]);
        if (!$customer) {
            Log::warning('Customer not found', ['customer_id' => $customer->id]);
        }

        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        Log::info('Opening customer edit form', ['customer_id' => $customer->id]);
        if (!$customer) {
            Log::warning('Customer to edit not found', ['customer_id' => $customer->id]);
        }

        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        try {
            $customer->update($request->all());
            Log::info('Customer updated', ['customer_id' => $customer->id, 'updated_data' => $request->all()]);
        } catch (\Exception $e) {
            Log::error('Error updating customer', ['error_message' => $e->getMessage(), 'customer_id' => $customer->id]);
            return redirect()->route('customers.edit', $customer->id)->with('error', 'Failed to update customer');
        }

        return redirect()->route('customers.index');
    }

    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
            Log::info('Customer deleted', ['customer_id' => $customer->id]);
        } catch (\Exception $e) {
            Log::critical('Critical error deleting customer', ['error_message' => $e->getMessage(), 'customer_id' => $customer->id]);
            return redirect()->route('customers.index')->with('error', 'Failed to delete customer');
        }

        return redirect()->route('customers.index');
    }
}
