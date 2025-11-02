<?php

namespace Modules\CMS\Controllers;

use CodeIgniter\Controller;
use Modules\CMS\Models\BackUsersModel;

class Auth extends Controller
{
    public function login()
    {
        helper(['form']);
        $session = session();
        log_message('debug', 'Accediendo a Admin Auth::login');

        if ($session->get('isAdminLoggedIn')) {
            log_message('debug', 'Usuario ya logueado, redirigiendo a dashboard');
            return redirect()->to('/admin/pages/dashboard');
        }

        if ($this->request->getMethod() === 'POST') {
            $username = trim($this->request->getPost('username'));
            $password = $this->request->getPost('password');

            $userModel = new BackUsersModel();
            // buscar por username o email
            $user = $userModel->where('username', $username)->first();

            log_message('debug', 'Intentando login con usuario: '.$username);
            log_message('debug', 'Usuario encontrado: '.print_r($user, true));

            if ($user && password_verify($password, $user['password_hash'])) {
                $session->set([
                    'isAdminLoggedIn' => true,
                    'adminUser' => [
                        'id' => $user['id'],
                        'username' => $user['username'],
                    ]
                ]);

                
                $redirect = $session->get('redirect_after_login') ?? '/admin/dashboard';
                $session->remove('redirect_after_login');
                
                log_message('debug', 'Login correcto para usuario '.$username);
                return redirect()->to($redirect);
            }

            log_message('error', 'Contraseña incorrecta para usuario '.$username);
            return redirect()->back()->withInput()->with('error', 'Usuario o contraseña incorrectos');
        }
        else {
            log_message('debug', 'Request method should be POST instead of '.$this->request->getMethod());
        }
        
        echo view('admin/pages/login');
    }

    public function logout()
    {
        $session = session();
        $session->remove(['isAdminLoggedIn', 'adminUser']);
        $session->destroy();
        return redirect()->to('/admin/pages/login');
    }
}
