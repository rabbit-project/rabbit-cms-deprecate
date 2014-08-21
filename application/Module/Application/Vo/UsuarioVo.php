<?php
namespace Application\Vo;

class UsuarioVo {
	
	private $nome;
	private $grupo;
	
	public function getNome() {
		return $this->nome;
	}
	
	public function setNome($nome) {
		$this->nome = $nome;
	}
	
	/**
	 * @return GrupoVo
	 */
	public function getGrupo() {
		return $this->grupo;
	}
	
	public function setGrupo(GrupoVo $grupo) {
		$this->grupo = $grupo;
	}
	
}
