<?php

// Contoh Konsep Inheritance
class Kendaraan
{
    protected $nama;

    public function __construct($nama)
    {
        $this->nama = $nama;
    }

    public function getName()
    {
        return $this->nama;
    }

    public function jenis()
    {
        echo "Kendaraan ini termasuk..";
    }
}

class Mobil extends Kendaraan
{
    public function jenis()
    {
        echo "Roda 4";
    }
}

class Motor extends Kendaraan
{
    public function jenis()
    {
        echo "Roda 2";
    }
}

$mobil = new Mobil("Mobil");
echo $mobil->getName(); // Output: Mobil
$mobil->jenis(); // Output: Roda 4

$motor = new Motor("Motor");
echo $motor->getName(); // Output: Motor
$motor->jenis(); // Output: Roda 2

// Contoh Konsep Polymorphism
class Binatang
{
    protected $nama;

    public function __construct($nama)
    {
        $this->nama = $nama;
    }

    public function suara()
    {
        echo "Binatang ini bersuara...";
    }
}

class Gajah extends Binatang
{
    public function suara()
    {
        echo "Tuuut!";
    }
}

class Bebek extends Binatang
{
    public function suara()
    {
        echo "Kwek-kwek!";
    }
}

$gajah = new Gajah("Gajah");
echo $gajah->suara(); // Output: Tuuut!

$bebek = new Bebek("Bebek");
echo $bebek->suara(); // Output: Kwek-kwek!

// Contoh Konsep Enkapsulasi
class Manusia
{
    private $nama;
    private $umur;

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function setUmur($umur)
    {
        $this->umur = $umur;
    }

    public function getUmur()
    {
        return $this->umur;
    }
}

$manusia = new Manusia();
$manusia->setNama("Hanif Aji");
$manusia->setUmur(21);

echo $manusia->getNama(); // Output: Hanif Aji
echo $manusia->getUmur(); // Output: 21
