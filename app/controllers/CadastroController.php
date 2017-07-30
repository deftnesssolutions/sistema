<?php

class CadastroController extends \HXPHP\System\Controller
{
    public function cadastrarAction()
    {
       $this->view->setFile('index');

       $this->request->setCustomFilters(array(

       		'email'=> FILTER_VALIDATE_EMAIL
       	));

       $post=$this->request->post();

       //var_dump($this->request->post());
       if(!empty($post))
       {
       		$cadastrarUsuario = User::cadastrar($post);
       		//var_dump($cadastrarUsuario);
       		if($cadastrarUsuario->status===false)
       		{
       			$this->load('Helpers\Alert', array(
       				'danger',
       				'ops! Não foi possivel efetuar seu cadastro. <br> Verifique os erros abaixo:',
       				$cadastrarUsuario->errors
       			));
       		}
   	   }
       //gerar senha
       //obter role_id
    }
}