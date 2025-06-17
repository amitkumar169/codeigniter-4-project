<?php

namespace App\Controllers;

class User extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function login()
    {
        return view('user/login');
    }
    public function check()
    {
        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Your email is required.',
                    'valid_email' => 'Please enter a valid email address.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Your password is required.'
                    
                ]
            ]
        ]);

        if (!$validation) {
            return view('user/login', ['validation' => $this->validator]);
        } else {
        $email = trim($this->request->getPost('email'));
        $password = $this->request->getPost('password');
 
        $loginModel = new \App\Models\LoginModel();
        $user_info = $loginModel->where('email', $email)->first();

        if (!$user_info) {
            session()->setFlashdata('fail', 'Email not found. Please check and try again.');
            return redirect()->to('/user')->withInput();
        }

        // Since your DB stores plain text passwords, use direct comparison:
        if ($password !== $user_info['password']) {
            session()->setFlashdata('fail', 'Incorrect password. Please try again.');
            return redirect()->to('/user')->withInput();
        }

        // Login success
        session()->set('loggedUser', $user_info['id']);
        return redirect()->to('/admin');


        }
    }
     public function contact()
    {
        return view('user/contact');
    }
    public function save(){
    $validation = $this->validate([
        'name' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Your fullname is required.'
            ]
        ],
        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Your email is required.',
                'valid_email' => 'Please enter a valid email address.'
            ]
        ],
        'message' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Your message is required.'
            ]
        ]
    ]);

    if (!$validation) {
        return view('user/contact', ['validation' => $this->validator]);
    } else {
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $message = $this->request->getPost('message');

        $values = [
            'name' => $name,         // Use your actual DB column names
            'email' => $email,
            'message' => $message
        ];

        $contactModel = new \App\Models\ContactModel();
        $query = $contactModel->insert($values);
        if (!$query) {
            return redirect()->back()->with('fail', 'There was an error saving your contact information. Please try again.');
        } else {
            return redirect()->to('user/contact')->with('success', 'Saving contact information.');
        }
    }
}
public function logout()
{
    if (session()->has('loggedUser')) {
        session()->destroy();
    }
    return redirect()->to('/user')->with('success', 'You have logged out successfully');
}

}
