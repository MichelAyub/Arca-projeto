<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use function Sodium\add;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200823165242 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(255) NOT NULL, senha VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE empresa (id INT AUTO_INCREMENT NOT NULL, titulo VARCHAR(255) NOT NULL, telefone VARCHAR(255) NOT NULL, endereco VARCHAR(255) NOT NULL, cep VARCHAR(255) NOT NULL, cidade VARCHAR(255) NOT NULL, estado VARCHAR(255) NOT NULL, descricao VARCHAR(255) NOT NULL, categoria VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql("INSERT INTO `empresa` VALUES (1,'Arca Solutions','(14) 3226-1898','R. Antônio Alves, 25-28','17012-060','Bauru','SP','Gostamos de encontrar soluções inovadoras no desenvolvimento e no design de projetos web e mobile, fazendo com que suas idéias se tornem realidade.','Auto&Entertainment'),(2,'Glautec Computadores','(14) 3226-3723',' Av. Nossa Sra. de Fátima, 19-84','17017-337','Bauru','SP','A Glautec Computadores é uma empresa consolidada que atua no ramo da Tecnologia da Informação e Informática desde 2008. Ao longo de 12 anos de experiência, oferecemos suporte a empresas de todos os tamanhos com técnicos altamente especializados atuando em três principais frentes: Infraestrutura e Rede, Segurança da Informação e Gestão de Tecnologias.','Entertainment&Food and Dining'),(3,'Makro','(14) 31038700',' Rod. Mal. Rondon, Km 338 - Jardim Contorno','17047-852','Bauru','SP','No Brasil desde 1972, o Makro é uma empresa do grupo holandês SHV (Steenkolen Handels Vereeniging) e opera em 5 países da América do Sul: Argentina, Brasil, Colômbia, Peru e Venezuela, atualmente com mais de 130 lojas. .','Makro-Atacadista'),(4,'Smart Fit Bauru','(14) 1234-4567','Av. Getúlio Vargas, 25-16','17018-540','Bauru','SP','Academia Completa com Área de Musculação, Equipamentos de Ponta e Aulas de Ginástica. Para o Seu Bem-Estar.','Beauty and Fitness&Health&Sports'),(5,'Jack Music Pub','(14) 3214-4013','Av. Duque de Caxias, 8-56','17012-000','Bauru','SP','Em ambiente confortável e acolhedor, público festeiro se reúne para beber e curtir atrações musicais variadas.','Auto&Entertainment&Food and Dining'),(6,'','(14) 3262-2901','R. Srg. Andiras, 112','17120-000','Agudos','SP','Dezenas de sabores de pastéis e esfihas, mais sucos e refrigerantes, em espaço simples com serviço de entrega.','Food and Dining'),(7,'Aeroporto de Guarulhos','(11) 2445-2945','Rod. Hélio Smidt, s/nº','07190-100','São Paulo','SP','O Aeroporto Internacional de São Paulo/Guarulhos – Governador André Franco Montoro fica localizado no município de Guarulhos, em São Paulo. É o maior aeroporto do Brasil e da América do Sul.','Auto&Travel'),(8,'Beach Park','(85) 4012-3000','Rua Porto das Dunas, 2734','61700-000','Fortaleza','CE','Beach Park é um complexo turístico do litoral do Nordeste do Brasil, na praia de Porto das Dunas, município de Aquiraz, a 27 quilômetros de Fortaleza.','Entertainment&Travel'),(9,'Burguer King','(14) 1234-4567','Jardim America, Bauru - SP','17017-130','Bauru','SP','Rede de restaurantes fast-food famosa por seus hambúrgueres, batatas fritas, milk shakes e café da manhã.','Food and Dining&Health'),(10,'Ginásio Panela de Pressão','(14) 3108-1050','Vila Industrial','17017-130','Bauru','SP','O Ginásio de Esportes do Esporte Clube Noroeste, mais conhecido como Panela de Pressão, é um ginásio poliesportivo localizado na cidade de Bauru, no estado de São Paulo.','Entertainment&Sports'),(11,'Ginásio Panela de Pressão','(14) 3108-1050','Vila Industrial','17017-130','Bauru','SP','O Ginásio de Esportes do Esporte Clube Noroeste, mais conhecido como Panela de Pressão, é um ginásio poliesportivo localizado na cidade de Bauru, no estado de São Paulo.','Entertainment&Sports'),(12,'Brooks Hamburgueria','R. Neder Issa, 1-11','(14) 3232-3232','17017-130','Bauru','SP','Com cervejas especiais e terraço convidativo, lanchonete serve hambúrgueres apurados com guarnições da casa.','Food and Dining')");
        $this->addSql("INSERT INTO `admin` VALUES (1,'admin','admin')");
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE empresa');
    }
}
