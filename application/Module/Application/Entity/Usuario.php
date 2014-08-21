<?php

namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", uniqueConstraints={@ORM\UniqueConstraint(name="unique_id_usuario", columns={"id_usuario"}), @ORM\UniqueConstraint(name="unique_nome", columns={"nome"})}, indexes={@ORM\Index(name="fk_grupo", columns={"fk_grupo"})})
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_usuario", type="integer", nullable=false)
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
     * @var \Application\Entity\Grupo
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Grupo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_grupo", referencedColumnName="id_grupo")
     * })
     */
    private $grupo;

	/**
	 * @param \Application\Entity\Grupo $grupo
	 */
	public function setGrupo($grupo) {
		$this->grupo = $grupo;
	}

	/**
	 * @return \Application\Entity\Grupo
	 */
	public function getGrupo() {
		return $this->grupo;
	}

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
