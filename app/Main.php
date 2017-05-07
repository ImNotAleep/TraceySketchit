<?php

class Main extends TelegramApp\Module {
	protected function hooks(){
		if($this->telegram->text_has(["patata", "patatas"])){
			$tipo = $this->telegram->last_word();
				return $this->patata( $tipo);
		}
	}

	public function patata( $tipo = NULL){
		$patatas = array(
			"http://www.bonetnatur.com/files/Formats/monalisa/grans/monalisa_3.jpg",
			"http://imeoobesidad.com/blog/wp-content/uploads/2014/03/patatas-fritas.jpg",
			"http://biotrendies.com/wp-content/uploads/2015/06/patata.jpg"
		);
		$x = mt_rand(0, 2); // /* */ PARA COMENTAR TEXTO Y DEJARLO INUTILIZADO
		if( $tipo != NULL){ // != diferente
			if( $tipo == "frita" or $tipo == "fritas"){
				$x = 2;
			}
		}
		$this->telegram->send
			->file("photo", $patatas[$x]);

		/* $this->telegram->send
			->text("<b>Patata</b>", "HTML")
		->send(); */

		$this->end();
	 }

	 public function unown( $tipo = NULL){
		 $unown = "http://www.fontriver.com/i/fonts/unown/unown_specimen.jpg";
			$this->telegram->send
				->file("photo", $unown);

	 }
	public function patatas( $tipo = NULL){
		return $this->patata( $tipo);
	}

	public function start(){
		$this->_hello_world();
	}

	private function _hello_world(){
		$this->telegram->send
			->text("Hello World from <b>Telegram-PHP!</b>", "HTML")
		->send();

		$this->end();
	}

	protected function new_member($user){
		$this->telegram->send
			->text("Hello " .$user->first_name ."!")
		->send();
	}
}

?>
