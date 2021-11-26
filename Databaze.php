<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Databaze
 *
 * @author Petty
 */
class Databaze {

	/**
	 * @var PDO Připojená instance PDO
	 */
	private static $spojeni;
	/**
	 * @var array Nastavení PDO
	 */
	private static $nastaveni = Array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		PDO::ATTR_EMULATE_PREPARES => false,
	);

	/**
	 * Připojí se k databázi a spojení uloží do statické proměnné
	 * @param string $host Hostitel
	 * @param string $uzivatel Uživatelské jméno
	 * @param string $heslo Heslo
	 * @param string $databaze Název databáze
	 * @return PDO Databázové spojení
	 */
	public static function pripoj($host, $uzivatel, $heslo, $databaze) {
		if (!isset(self::$spojeni)) {
			self::$spojeni = @new PDO(
				"mysql:host=$host;dbname=$databaze",
				$uzivatel,
				$heslo,
				self::$nastaveni
			);
		}
		return self::$spojeni;
	}

	/**
	 * Spustí na databázi SQL dotaz s danými parametry a vrátí ho pro pozdější získání výsledků
	 * @param string $sql SQL dotaz
	 * @param array $parametry Parametry SQL dotazu
	 * @return PDOStatement Dotaz s výsledky
	 */
	public static function dotaz($sql, $parametry = array()) {
		$dotaz = self::$spojeni->prepare($sql);
		$dotaz->execute($parametry);
		return $dotaz;
	}

}

