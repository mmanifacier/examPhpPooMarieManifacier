<?php

    class Moto
    {
        private $id;
        private $brand;
        private $model;
        private $type;
        private $image;

        public function __construct($brand, $model, $type, $image, $id = null)
        {
            $this->brand = $brand;
            $this->model = $model;
            $this->type = $type;
            $this->image = $image;
            $this->id = $id;
        }

        public function getBrand()
        {
            return $this->brand;
        }

        public function setBrand($brand)
        {
            $this->brand = $brand;
        }

        public function getModel()
        {
            return $this->model;
        }

        public function setModel($model)
        {
            $this->model = $model;
        }

        public function getType()
        {
            return $this->type;
        }

        public function setType($type)
        {
            $this->type = $type;
        }

        public function getImage()
        {
            return $this->image;
        }

        public function setImage($image)
        {
            $this->image = $image;
        }

        public function getId()
        {
            return $this->id;
        }
    }
 
?>