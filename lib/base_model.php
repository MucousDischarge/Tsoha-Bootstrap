<?php

class BaseModel {

    protected $validators;

    public function __construct($attributes = null) {
        foreach ($attributes as $attribute => $value) {
            if (property_exists($this, $attribute)) {
                $this->{$attribute} = $value;
            }
        }
        $this->validators = array('validate_nimi', 'validate_published', 'validate_publisher', 'validate_description');
    }

    public function validoi_nimi() {
        $errors = array();
        if ($this->nimi == '' || $this->nimi == null) {
            $errors[] = 'Nimi ei saa olla tyhjä!';
        }
        if (strlen($this->nimi) < 3) {
            $errors[] = 'Nimen pituuden tulee olla vähintään kolme merkkiä!';
        }
        if (strlen($this->nimi) > 50) {
            $errors[] = 'Nimen pituus saa olla enintään 50 merkkiä!';
        }

        return $errors;
    }

}
