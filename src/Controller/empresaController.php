<?php


namespace App\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;

class empresaController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/home", methods={"GET"})
     */
    public function home()
    {
        return $this->render('pag-inicial.html.twig');

    }

    /**
     * @Route("/exibePesquisa", methods={"POST"})
     */
    public function exibePesquisa()
    {
        if(empty($_POST['send'])) {
            echo "Campo de pesquisa não pode estar vazio!";
            exit;
        }

        $results = Conexao::buscaPesquisa($this->entityManager, $_POST['send']);

        if($results > 0){
            return $this->render('telaListaEmpresas.html.twig',[
                'empresas'=>$results,
                'search'=> $_POST['send']
            ]);

        }else {
            echo "Nenhuma empresa cadastrada! ";
            exit();
        }


    }

    /**
     * @Route("/resultado/{id}/", methods={"GET"})
     */
    public function exibeInfosEmpresa($id)
    {

        $results = Conexao::busca_id($this->entityManager,$id);

        $categorias = explode('&',$results[0]->getCategoria());

        return $this->render('telaInfosEmpresa.html.twig',[
            'empresa'=>$results[0],
            'categorias'=>$categorias
        ]);

    }

    /**
     * @Route("/user", methods={"GET"})
     */
    public function Logar()
    {
        if(isset($_SESSION['logado']))
            return $this->redirect('/admin/empresas');

        return $this->render('telaLogin.html.twig');

    }

    /**
     * @Route("/user", methods={"POST"})
     */
    public function validaLogin()
    {

        $results = Conexao::buscaAdmin($this->entityManager, $_POST['login'], $_POST['senha']);

        if($results > 0){


        $_SESSION['logado'] = true;

        return $this->redirect("/admin/empresas");

    }else {
            echo "Login e/ou Senha inválidos";
            exit();
        }
    }

    /**
     * @Route("/logout", methods={"GET"})
     */
    public function Deslogar()
    {
        if(!isset($_SESSION['logado']))
            return $this->redirect('/login');

        $_SESSION = NULL;

        return $this->redirect('/login');

    }

    /**
     * @Route("/administrador/infoEmpresa", methods={"GET"})
     */
    public function Exibir_tudo()
    {
        if(!isset($_SESSION['logado']))
            return $this->redirect('/login');

        $results = Conexao::selectAll($this->entityManager);

        return $this->render('telaListaTodasEmpresas.html.twig',[
            'empresas'=>$results
        ]);
    }

    /**
     * @Route("/administrador/cadastro", methods={"GET"})
     */
    public function cadastrarGet()
    {
        if(!isset($_SESSION['logado']))
            return $this->redirect('/login');

        return $this->render('telaCadastroEmpresa.html.twig');

    }

    /**
     * @Route("/administrador/cadastro", methods={"POST"})
     */
    public function cadastrarPost()
    {

        //Valida se os campos de texto foram preenchidos
        foreach ($_POST as $key => $value)
        {
            if (empty($value)) {
                echo "Campo '" . ucfirst($key) . "' não pode estar vazio!";
                exit();
            }
        }

        //valida se uma ou mais categorias foram selecionada
        if(!empty($_POST['categoria'])){


        $categoria = implode('&',$_POST['categoria']);

        $empresa =  new Empresa();
        $empresa->setTitulo($_POST['titulo']);
        $empresa->setTelefone($_POST['telefone']);
        $empresa->setEndereco($_POST['endereco']);
        $empresa->setCep($_POST['cep']);
        $empresa->setCidade($_POST['cidade']);
        $empresa->setEstado($_POST['estado']);
        $empresa->setDescricao($_POST['descricao']);
        $empresa->setCategoria($categoria);

        $this->entityManager->persist($empresa);
        $this->entityManager->flush();

        echo "Empresa cadastrada com sucesso!";

        exit();

    }else {
            echo "Selecione alguma categoria";
            exit();
        }
    }
}