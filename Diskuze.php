<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vzkaznik
 *
 * @author Petty
 */
class Diskuze {
   //Slovník se smajlíky 
 /**
	 * @var array Slovník se smajlíky
	 */
	private $smajlici = array(
		':-)' => '<img src = "smajliky/smile.png">',
		':)' => '<img src = "smajliky/smile.png">',
		':-(' => '<img src = "smajliky/unhappy.png">',
		':(' => '<img src = "smajliky/unhappy.png">',
		':-D' => '<img src = "smajliky/grin.png">',
		':D' => '<img src = "smajliky/grin.png">',
		':-P' => '<img src = "smajliky/tongue.png">',
		':P' => '<img src = "smajliky/tongue.png">',
		':-O' => '<img src = "smajliky/suprised.png">',
		':O' => '<img src = "smajliky/suprised.png">',
		';-D' => '<img src = "smajliky/wink.png">',
		';D' => '<img src = "smajliky/wink.png">',
	);

	/**
	 * Přidá novou zprávu do databáze
	 * @param string $prezdivka Přezdívka autora zprávy
	 * @param string $zprava Zpráva
	 */
	public function pridejZpravu($prezdivka, $zprava)
	{
		Databaze::dotaz('INSERT INTO zprava (prezdivka, obsah, odeslano) VALUES (?, ?, NOW())', array($prezdivka, $zprava));
	}

	/**
	 * Zformátuje danou zprávu na HTML (smajlíci, br a podobně)
	 * @param string $zprava Zpráva k zformátování
	 * @return string Zformátovaná zpráva
	 */
	private function zformatujZpravu($zprava)
	{
		// Nahrazení rezervovaných HTML znaků na entity
		$zprava = htmlspecialchars($zprava);
		// Nahrazení smajlíků
		$zprava = strtr($zprava, $this->smajlici);
		// Nahrazení konců řádku z <br />
		$zprava = nl2br($zprava);
		return $zprava;
	}

	/**
	 * Vypíše diskuzi
	 */
	public function vypis()
	{
		$vysledek = Databaze::dotaz('SELECT * FROM `zprava` ORDER BY `odeslano` DESC LIMIT 10');
		$zpravy = $vysledek->fetchAll();
		foreach ($zpravy as $zprava)
		{
			echo('<p><img src="avatar.png" alt="avatar" style="float: left;"><strong>' . htmlspecialchars($zprava['prezdivka']) . '</strong><br />');
			echo($this->zformatujZpravu($zprava['obsah']) . '<br /><br />');
			echo('<p style="text-align: right;"><small>' . date("j.m.Y", strtotime($zprava['odeslano'])) . '</small></p>');
			echo('</p><div style="clear: both;"></div>');
		}
	}
    

    
}
