<?php

namespace App\Controllers;

use App\Models\ContactModel;

class Admin extends BaseController
{
    public function index()
    {
        $userModel = new \App\Models\LoginModel();
        $loggedUserId = session()->get('loggedUser');
        $user = $userModel->find($loggedUserId);
        $data = [
                'user' => $user,
                'pageTitle' => 'Home'
            ];
        return view('admin/index', $data);
    }
    public function contact()
    {
        // $data['pageTitle'] = 'Contact User';
        // return view('admin/contact', $data);

    $Contact = new ContactModel();
    $data['pageTitle'] = 'Contact User';
    $data['contact'] = $Contact->findAll();
    return view('admin/contact', $data);

    }
    public function edit($id)
    {
        $Contact = new ContactModel();
        $data['contact'] = $Contact->find($id);
        return view('admin/edit', $data);
    }
    
          public function update($id)
    {
        $contact = new ContactModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'message' => $this->request->getPost('message')
        ];
        $contact->update($id, $data);
        return redirect()->to(base_url('admin/contact'))->with('status','Contact Updated Successfuly');
    }
    
      public function delete($id)
    {
        $Contact = new ContactModel();
        $Contact->delete($id);
        return redirect()->to(base_url('admin/contact'))->with('status','Contact Deleted Successfuly');
    }
}
