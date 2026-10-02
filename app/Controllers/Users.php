<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index(): string
    {
        return view('users/index', ['title' => 'user accounts', 'users' => (new UserModel())->findAll()]);
    }

    public function create(): string
    {
        return view('users/form', ['title' => 'new user', 'user' => null, 'errors' => []]);
    }

    public function store()
    {
        $data = $this->request->getPost(['username', 'full_name', 'email']);
        if (! $this->validateData($data, [
            'username' => 'required|max_length[50]|is_unique[users.username]',
            'full_name' => 'required|max_length[100]',
            'email' => 'permit_empty|valid_email|max_length[100]',
        ])) {
            return view('users/form', ['title' => 'new user', 'user' => null, 'errors' => $this->validator->getErrors()]);
        }
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['email'] = $data['email'] ?? '';
        (new UserModel())->insert($data);
        return redirect()->to('/users');
    }

    public function edit(int $id)
    {
        $user = (new UserModel())->find($id);
        if (! $user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('users/form', ['title' => 'edit user', 'user' => $user, 'errors' => []]);
    }

    public function update(int $id)
    {
        $model = new UserModel();
        $user = $model->find($id);
        if (! $user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data = $this->request->getPost(['username', 'full_name', 'email']);
        $rules = [
            'username' => 'required|max_length[50]|is_unique[users.username,id,' . $id . ']',
            'full_name' => 'required|max_length[100]',
            'email' => 'permit_empty|valid_email|max_length[100]',
        ];
        $valid = $this->validateData($data, $rules);
        $errors = $valid ? [] : $this->validator->getErrors();
        $file = $this->request->getFile('avatar');
        if ($file && $file->getError() !== UPLOAD_ERR_NO_FILE) {
            if (! $this->validateData([], ['avatar' => 'uploaded[avatar]|max_size[avatar,2048]|mime_in[avatar,image/jpeg,image/png]|is_image[avatar]'])) {
                $errors['avatar'] = $this->validator->getError('avatar');
            }
        }
        if ($errors) {
            return view('users/form', ['title' => 'edit user', 'user' => $user, 'errors' => $errors]);
        }
        if ($file && $file->isValid()) {
            $name = bin2hex(random_bytes(16)) . ($file->getMimeType() === 'image/png' ? '.png' : '.jpg');
            $path = FCPATH . 'uploads/';
            if (! is_dir($path)) {
                mkdir($path, 0755, true);
            }
            service('image')->withFile($file->getTempName())->fit(150, 150)->save($path . $name);
            $data['avatar'] = $name;
        }
        $data['email'] = $data['email'] ?? '';
        $model->update($id, $data);
        return redirect()->to('/users');
    }
}
