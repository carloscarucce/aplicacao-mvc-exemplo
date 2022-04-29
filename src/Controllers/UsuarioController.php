<?php

namespace Curso\AplicacaoMvcExemplo\Controllers;

use Curso\AplicacaoMvcExemplo\Controller;
use Curso\AplicacaoMvcExemplo\Models\UsuarioModel;

class UsuarioController extends Controller
{
    public function index()
    {
        $dados = [
            'usuarios' => UsuarioModel::all()
        ];

        $this->view('usuario/index', $dados);
    }

    public function form()
    {
        $dados = [
            'usuario' => isset($_GET['id']) ? UsuarioModel::load($_GET['id']) : new UsuarioModel(),
            'mensagem' => isset($_GET['salvo']) ? 'Salvo com sucesso' : ''
        ];

        $this->view('usuario/form', $dados);
    }

    public function salvar()
    {
        $dados = $_POST;

        $usuario = new UsuarioModel();

        if (!empty($dados['id'])) {
            $usuario->id = $dados['id'];
        }
        $usuario->nome = $dados['nome'];
        $usuario->email = $dados['email'];
        $usuario->password = $dados['password'];

        if ($usuario->id) {
            $usuario->update();
        } else {
            $usuario->insert();
        }

        header('Location: /?controller=UsuarioController&metodo=form&salvo=1&id='.$usuario->id);
    }
}