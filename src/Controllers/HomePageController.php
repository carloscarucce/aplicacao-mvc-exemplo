<?php

namespace Curso\AplicacaoMvcExemplo\Controllers;

use Curso\AplicacaoMvcExemplo\Controller;
use Curso\AplicacaoMvcExemplo\Models\UsuarioModel;

class HomePageController extends Controller
{
    public function index()
    {
        $dados = [
            'usuarios' => UsuarioModel::all()
        ];

        $this->view('index', $dados);
    }
}
