<?php

namespace App;

class Propiedad {

    //Base de Datos
    protected static $db;
    //Forma que van a tener los datos (mapear y unir)
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    //Errores
    protected static $errores = [];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    //Definir la conexion a la BD
    public static function setDB($database) {
        self::$db = $database;
    }

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? 'imagen.jpg';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function guardar() {

        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();
        
        //Insertar en la base de datos
        $query = " INSERT INTO propiedades ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES ('";
        $query .= join("', '", array_values($atributos));
        $query .= "') ";

        // debugear($query);

        $resultado = self::$db->query($query);

        debugear($resultado);
    }

    //Identificar y unir los atributos de la BD
    public function atributos() {
        $atributos = [];
        foreach(self::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];
        

        foreach($atributos as $key => $value ) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    //Validacion
    public static function getErrores() {
        return self::$errores;
    }

    public function validar() {

        if(!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
        }

        if(!$this->precio) {
            self::$errores[] = "El Precio es Obligatorio";
        }

        if( strlen( $this->descripcion ) < 50) {
            self::$errores[] = "La descripcion es obligatoria y debe tener al menos 50 caracteres";
        }

        if(!$this->habitaciones) {
            self::$errores[] = "El numero de habitaciones es obligatorio";
        }

        if(!$this->wc) {
            self::$errores[] = "El numero de Baños es obligatorio";
        }

        if(!$this->estacionamiento) {
            self::$errores[] = "El numero de lugares de Estacionamieno es obligatorio";
        }

        if(!$this->vendedorId) {
            self::$errores[] = "Elige un vendedor";
        }

        // if(!$this->imagen['name'] || $this->imagen['error']) {
        //     $errores[] = "La imagen es Obligatoria";
        // }

        // // Validar por tamaño (100 Kb max.)
        // $medida = 1000 * 100;

        // if($this->imagen['size'] > $medida) {
        //     $errores[] = 'La Imagen es muy pesada';
        // }

        return self::$errores;
    }
}