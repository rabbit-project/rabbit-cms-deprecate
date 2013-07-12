<?php
namespace Security\Namespaces\Main\Entity;

/**
 * Class Grupo
 * @package Security\Namespaces\Main\Entity
 * @Entity @Table(name="grupo")
 */
class Grupo {

	/** @Id @Column(type="integer",name="id_grupo") @GeneratedValue **/
	private $id;

	/** @Column(type="string") **/
	private $nome;

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