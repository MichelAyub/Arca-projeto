<?php


namespace App\Controller;


class Conexao
{

    public static function buscaPesquisa($entityManager, $val)
    {
        $query = $entityManager->createQuery('SELECT e FROM App\Entity\InfoEmpresa e WHERE
           ie.titulo =:titulo OR
           ie.endereco =:endereco OR
           ie.cep =:cep OR
           ie.cidade =:cidade OR
           ie.categoria LIKE :categoria');

        $query->setParameters(array(
            ':titulo'=>$val,
            ':endereco'=>$val,
            ':cep'=>$val,
            ':cidade'=>$val,
            ':categoria'=>'%'.$val.'%'
        ));

        return $query->getResult();
    }

    public static function busca_id($entityManager, $id)
    {
        $query = $entityManager->createQuery('SELECT ie FROM App\Entity\infoEmpresa ie WHERE ie.id = :id');

        $query->setParameters(array(
            ':id'=>$id
        ));

        return $query->getResult();
    }

    public static function buscaAdmin($entityManager, $user, $password)
    {
        $query = $entityManager->createQuery('SELECT a FROM App\Entity\Administrador adm WHERE
        adm.login = :user AND
        adm.senha = :password');

        $query->setParameters(array(
            ':user'=>$user,
            ':password'=>$password
        ));

        return $query->getResult();
    }

    public static function Exibir_tudo($entityManager)
    {
        $query = $entityManager->createQuery('SELECT ie FROM App\Entity\infoEmpresa ie');

        return $query->getResult();
    }

}