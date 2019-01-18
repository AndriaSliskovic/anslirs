<?php

namespace Tests\Feature;

use App\Category;
use App\Oblast;
use Tests\TestCase;


class OblastTest extends TestCase
{


    protected $oblast;
    protected $category;
    protected $polje;
    protected $ruta;



    /**
     * @test
     */
    public function oblast_ima_name(){
        $oblast=new Oblast(['name'=>'oblast']);
        $this->assertEquals('oblast',$oblast->name);
    }

        /**
         * @test
         */
    public function oblast_sadrzi_kategoriju(){

        $oblast=factory(Oblast::class)->create();
        $category=factory(Category::class)->create();
        $category2=factory(Category::class)->create();
        $oblast->dodaj($category);
        $oblast->dodaj($category2);
        $this->assertEquals(2,$oblast->count());
    }
    public function napraviOblastSaKategorijama(){
        $brojKategorija=2;
        $this->oblast=createFactory(Oblast::class,['name'=>'oblast']);
        $this->category=factory(Category::class,$brojKategorija)->create();
        $this->oblast->dodajViseKategorijaOdjednom($this->category);
        $this->ruta='/admin/oblast';
        $this->polje=['name'=>null];
    }

    /**
     * @test
     */
    public function testiranje_relacije_Oblast_Category(){
        $brojKategorija=2;
        $this->napraviOblastSaKategorijama();
        $prvaKategorija=$this->category->find(1);
        //Koliko je upisanih kategorija
        $this->assertEquals($brojKategorija,$this->oblast->brojKategorijaZaOblast());
        //Baza - da li je oblast upisana u bazu
        $this->assertDatabaseHas('oblasts', ['name'=>$this->oblast->name]);
        //Baza - da li je upisan odgovarajuci id za kategoriju
        $this->assertDatabaseHas('categories', ['oblast_id'=>$this->oblast->id]);
        //Da li je kategoriji dodeljena odgovarajuca oblast
        $this->assertEquals($this->oblast->name,$prvaKategorija->oblast->name);
    }

    /**
     * @test
     */
    public function moze_kreirati_oblast_preko_kontrolera_i_videti_njegov_name_u_indexu(){
        $this->napraviOblastSaKategorijama();
        //putanja za store rutu
        $this->post($this->ruta,$this->oblast->toArray())
            //Treba da vrati na pocetnu rutu (da relouduje stranicu)
            ->assertRedirect($this->ruta);
        //Treba da vidi name za upisanu transakciju
        $this->get($this->ruta)
            ->assertSee($this->oblast->name);
    }

    /**
     * @test
     */
    public function ne_moze_kreirati_oblast_bez_name_propertija_zbog_validacije(){
        //Pravi transakciju koja je null
        $oblast=makeFactory(Oblast::class,['name'=>null]);
        //Negativan test mora da ukljuci exeption
        $this->withExceptionHandling()->post('/oblast',$oblast->toArray())
            //Trazi gresku u sesiji za description polje
            ->assertSessionHasErrors('name');
    }




}
