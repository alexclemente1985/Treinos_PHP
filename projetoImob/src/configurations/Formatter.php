<?php
    class Formatter{
        /**
         * Construtor definidor de fuso horário
         */
        public function __construct()
        {
            date_default_timezone_set('America/Sao_Paulo');
        }

        /**
         * Conversão de valor numérico em formato de moeda
         * 
         * @param float $var
         * @return string
         */
        public function monetaryFormatter(float $var): string
        {
            return number_format($var, 2, ',', '.');
        }

        /**
         * Conversão do valor da moeda formatado para numérico
         * 
         * @param string $var
         * @return float
         */
        public function monetaryTextToFloat(string $var): float{
            $var = str_replace('.','', $var);
            $var = str_replace(',','.', $var);
            return (float) $var;
        }

        /**
      * Formata um texto para letras minúsculas
      *
      * @param string $var
      * @return string
      */
     public function lowerTextFormatter(string $var): string
     {
         return strtolower($var);
     }
 
     /**
      * Formata um texto para capitalizar a primeira letra de cada palavra
      *
      * @param string $var
      * @return string
      */
     public function capitalizeTextFormatter(string $var): string
     {
         return ucwords(strtolower($var));
     }
 
     /**
      * Formata um texto para todas as letras maiúsculas
      *
      * @param string $var
      * @return string
      */
     public function upperTextFormatter(string $var): string
     {
         return strtoupper(strtolower($var));
     }
 
     /**
      * Formata uma data e hora no formato 'd-m-Y H:i:s'
      *
      * @param int $data
      * @return string
      */
     public function dateTimeFormatter(string $data): string
     {
         return date('d-m-Y H:i:s', strtotime($data));
     }
 
     /**
      * Formata uma data no formato 'd/m/Y'
      *
      * @param string $data
      * @return string
      */
     public function dateFormatter(string $data): string
     {
         return date('d/m/Y', strtotime($data));
     }
 
     /**
      * Retorna a hora atual no formato 'H:i'
      *
      * @return string
      */
     public function getHour(): string
     {
         return date('H:i');
     }
 
     /**
      * Retorna a data atual no formato 'd/m/Y'
      *
      * @return string
      */
     public function getDate(): string
     {
         return date('d/m/Y');
     }
 
     /**
      * Retorna a data e hora atual no formato 'd-m-Y H:i:s'
      *
      * @return string
      */
     public function getDateAndHour(): string
     {
         return date('d-m-Y H:i:s');
     }
 
     /**
      * Substitui pontos por ponto e quebra de linha
      *
      * @param string $string
      * @return string
      */
     public function lineBreak(string $string): string
     {
         return str_replace('.', '.<br>', $string);
     }
 
     /**
      * Preenche com zeros à esquerda de um número
      *
      * @param int $num
      * @param int $qtde
      * @param string $char
      * @return string
      */
     public function zerosOnLeft(int $num, int $qtde, string $char = '0'): string
     {
         return str_pad($num, $qtde, $char, STR_PAD_LEFT);
     }
    }
?>