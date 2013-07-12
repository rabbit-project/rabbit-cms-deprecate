<?php
namespace Application\Namespaces\Main\Entity;
use Security\Namespaces\Main\Entity\Grupo;

/**
 * Class Usuario
 * @package Application\Namespaces\Main\Entity
 * @Entity @Table(name="usuario")
 */
class Usuario {

	/** @Id @Column(type="integer",name="id_usuario") @GeneratedValue **/
	private $id;

	/** @Column(type="string") **/
	private $nome;

	/**
	 * @OneToOne(targetEntity="Security\Namespaces\Main\Entity\Grupo")
	 * @JoinColumn(name="fk_grupo", referencedColumnName="id_grupo")
	 * @var Grupo
	 */
	private $grupo;

	/**
	 * @param Grupo $grupo
	 */
	public function setGrupo(Grupo $grupo) {
		$this->grupo = $grupo;
	}

	/**
	 * @return Grupo
	 */
	public function getGrupo() {
		return $this->grupo;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $nome
	 */
	public function setNome($nome) {
		$this->nome = $nome;
	}

	/**
	 * @return mixed
	 */
	public function getNome() {
		return $this->nome;
	}



}