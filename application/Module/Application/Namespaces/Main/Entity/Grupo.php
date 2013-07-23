<?php
namespace Application\Namespaces\Main\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grupo
 *
 * @ORM\Table(name="grupo", uniqueConstraints={@ORM\UniqueConstraint(name="unique_id_grupo", columns={"id_grupo"}), @ORM\UniqueConstraint(name="unique_nome", columns={"nome"})})
 * @ORM\Entity
 */
class Grupo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_grupo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=false)
     */
    private $nome;

	/**
	 * @param int $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param string $nome
	 */
	public function setNome($nome) {
		$this->nome = $nome;
	}

	/**
	 * @return string
	 */
	public function getNome() {
		return $this->nome;
	}

}
