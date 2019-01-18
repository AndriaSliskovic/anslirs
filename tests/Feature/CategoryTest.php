<?php

namespace Tests\Feature;

use App\Category;
use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class CategoryTest extends TestCase
{
//use DatabaseMigrations;

    protected $category;
    protected $posts;
    protected $polje;
    protected $ruta;

    /**
     * @test
     */
    public function kategorija_ima_ime(){
//        $category=new Category(['name'=>'kategorija']);
        $category=createFactory(Category::class,['name'=>'kategorija']);
//        Da li je upisano u bazu
        $this->assertDatabaseHas('categories', ['name'=>$category->name])
//         Da li je vraceno u model
            ->assertEquals('kategorija',$category->name);

    }

    /**
     * @test
     */
    public function kategorija_moze_sadrzati_post(){
        $category=createFactory(Category::class);
        $post=createFactory(Post::class);
        $post2=createFactory(Post::class);
        $category->dodajPost($post);
        $category->dodajPost($post2);
        $this->assertEquals(2,$category->brojPostovaZaKategoriju());

    }

    /**
     * @test
     */
    public function kategoriji_se_moze_dodati_vise_postova_odjednom(){
        $brojPostova=3;
        $this->napraviKategorijuSaPostovima($brojPostova);
        //Koliko je upisanih postova
        $this->assertEquals($brojPostova,$this->category->brojPostovaZaKategoriju());
    }

    /**
     * @test
     */
    public function testiranje_relacije_Category_Post(){
        $brojPostova=3;
        $this->napraviKategorijuSaPostovima($brojPostova);
        $prviPost=$this->posts->find(1);
        //Koliko je upisanih postova
        $this->assertEquals($brojPostova,$this->category->brojPostovaZaKategoriju());
        //Baza - da li je kategorija upisana u bazu
        $this->assertDatabaseHas('categories', ['name'=>$this->category->name]);
        //Baza - da li je upisan odgovarajuci id za post
        $this->assertDatabaseHas('posts', ['category_id'=>$this->category->id]);
        //Da li je postu dodeljena odgovarajuca kategorija
        $this->assertEquals($this->category->name,$prviPost->category->name);
    }
    /**
     * @test
     */
    public function ne_moze_napraviti_kategoriju_bez_oblast_id(){
        $this->polje=['oblast_id'=>null];
        $this->ruta='/kategorije';
        $this->postCategory($this->polje,$this->ruta);

    }
    /**
     * @test
     */
    public function ne_moze_napraviti_kategoriju_bez_oblast_id_sa_type_string_validacija(){
        $this->polje=['oblast_id'=>'abc'];
        $this->ruta='/kategorije';
        $this->postCategory($this->polje,$this->ruta);

    }

    /**
     * @test
     */
    public function moze_se_ukloniti_post_za_odredjenu_kategoriju(){
        $brojPostova=2;
        $this->napraviKategorijuSaPostovima($brojPostova);
        $brojPostovaKategorije=$this->category->posts()->where('category_id',$this->category->id)->count();
        //Broj upisanih postova sa kategorijom
        $this->assertEquals($brojPostova,$brojPostovaKategorije);
        //Uklanjanje kategorije iz posta
        $this->category->ukloniKategorijuIzPosta($this->posts->first());
        //Broj postova sa kategorijom posle brisanja category_id
        $brojPostovaKategorije=$this->category->posts()->where('category_id',$this->category->id)->count();
        $this->assertEquals($brojPostova-1,$brojPostovaKategorije);

    }

    public function napraviKategorijuSaPostovima($brojPostova){
        $this->category=createFactory(Category::class,['name'=>'kategorija']);
        $this->posts=factory(Post::class,$brojPostova)->create();
        $this->category->dodajVisePostovaOdjednom($this->posts);
    }



//DRY metod za prethodne metode
    public function postCategory($polje,$ruta){
        //Pravi kategoriju sa prosledjenim parametrom
        $category=$this->makeTestFactory(Category::class,$polje);
        //Negativan test mora da ukljuci exeption
        $this->withExceptionHandling()->post($ruta,$category->toArray())
            //Trazi gresku u sesiji za index polja
            ->assertSessionHasErrors(key($polje));
    }

}
