<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index(): string
    {
        return view('customers/index', ['title' => 'customers', 'customers' => (new CustomerModel())->findAll()]);
    }

    public function create(): string
    {
        return view('customers/form', ['title' => 'new customer', 'customer' => null, 'errors' => []]);
    }

    public function store()
    {
        $data = $this->request->getPost(['full_name', 'email']);
        if (! $this->validateData($data, [
            'full_name' => 'required|max_length[100]',
            'email' => 'required|valid_email|max_length[100]',
        ])) {
            return view('customers/form', ['title' => 'new customer', 'customer' => null, 'errors' => $this->validator->getErrors()]);
        }

        $data['created_at'] = date('Y-m-d H:i:s');
        (new CustomerModel())->insert($data);
        return redirect()->to('/customers');
    }

    public function edit(int $id)
    {
        $customer = (new CustomerModel())->find($id);
        if (! $customer) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('customers/form', ['title' => 'edit customer', 'customer' => $customer, 'errors' => []]);
    }

    public function update(int $id)
    {
        $model = new CustomerModel();
        $customer = $model->find($id);
        if (! $customer) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data = $this->request->getPost(['full_name', 'email']);
        if (! $this->validateData($data, [
            'full_name' => 'required|max_length[100]',
            'email' => 'required|valid_email|max_length[100]',
        ])) {
            return view('customers/form', ['title' => 'edit customer', 'customer' => $customer, 'errors' => $this->validator->getErrors()]);
        }
        $model->update($id, $data);
        return redirect()->to('/customers');
    }
}
