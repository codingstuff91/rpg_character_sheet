<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Caracteristique;
use Illuminate\Database\Seeder;

class CaracteristiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * INFOS GENERALES
         */
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Infos_générales')->get()->first()->id,
            'nom' => 'Nom',
            'description' => 'Le prenom et nom de votre personnage',
        ]);

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Infos_générales')->get()->first()->id,
            'nom' => 'Chronique',
            'description' => 'Le nom de la chronique ou votre personnage évolue',
        ]);

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Infos_générales')->get()->first()->id,
            'nom' => 'Sire',
            'description' => 'Le nom de votre créateur, celui qui vous a transformé en vampire',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Infos_générales')->get()->first()->id,
            'nom' => 'Concept',
            'description' => 'Le métier que faisait votre personnage durant sa vie de mortel',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Infos_générales')->get()->first()->id,
            'nom' => 'Ambition',
            'description' => 'Description détaillée à fournir',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Infos_générales')->get()->first()->id,
            'nom' => 'Désir',
            'description' => 'Description détaillée à fournir',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Infos_générales')->get()->first()->id,
            'nom' => 'Prédateur',
            'description' => 'Description détaillée à fournir',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Infos_générales')->get()->first()->id,
            'nom' => 'Clan',
            'description' => 'Description détaillée à fournir',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Infos_générales')->get()->first()->id,
            'nom' => 'Génération',
            'description' => 'Description détaillée à fournir',
        ]);
        
        /**
         * ATTRIBUTS - PHYSIQUES
         */
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Attributs_physiques')->get()->first()->id,
            'nom' => 'Force',
            'description' => 'La force physique du personnage',
        ]);

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Attributs_physiques')->get()->first()->id,
            'nom' => 'Dexterité',
            'description' => 'L\'agilité physique du personnage',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Attributs_physiques')->get()->first()->id,
            'nom' => 'Vigueur',
            'description' => 'La capacité du personnage a encaisser des coups',
        ]);

        /**
         * ATTRIBUTS - SOCIAUX
         */
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Attributs_sociaux')->get()->first()->id,
            'nom' => 'Charisme',
            'description' => 'Texte à saisir',
        ]);
    
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Attributs_sociaux')->get()->first()->id,
            'nom' => 'Manipulation',
            'description' => 'Texte à saisir',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Attributs_sociaux')->get()->first()->id,
            'nom' => 'Sang-froid',
            'description' => 'Texte à saisir',
        ]);
        
        /**
         * ATTRIBUTS - MENTAUX
         */
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Attributs_mentaux')->get()->first()->id,
            'nom' => 'Intelligence',
            'description' => 'Texte à saisir',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Attributs_mentaux')->get()->first()->id,
            'nom' => 'Astuce',
            'description' => 'Texte à saisir',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Attributs_mentaux')->get()->first()->id,
            'nom' => 'Résolution',
            'description' => 'Texte à saisir',
        ]);
        
        /**
         * CAPACITES - TALENTS
         */
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_talents')->get()->first()->id,
            'nom' => 'Athlétisme',
            'description' => 'Texte à saisir',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_talents')->get()->first()->id,
            'nom' => 'Bagarre',
            'description' => 'Texte à saisir',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_talents')->get()->first()->id,
            'nom' => 'Commandement',
            'description' => 'Texte à saisir',
        ]);
        
        /**
         * CAPACITES - COMPETENCES
         */
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_compétences')->get()->first()->id,
            'nom' => 'Animaux',
            'description' => 'Texte à saisir',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_compétences')->get()->first()->id,
            'nom' => 'Armes à feu',
            'description' => 'Texte à saisir',
        ]);

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_compétences')->get()->first()->id,
            'nom' => 'Artisanats',
            'description' => 'Texte à saisir',
        ]);

        /**
         * CAPACITES - CONNAISSANCES
         */
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_connaissances')->get()->first()->id,
            'nom' => 'Droit',
            'description' => 'Texte à saisir',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_connaissances')->get()->first()->id,
            'nom' => 'Erudition',
            'description' => 'Texte à saisir',
        ]);
        
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Capacités_connaissances')->get()->first()->id,
            'nom' => 'Finances',
            'description' => 'Texte à saisir',
        ]);

        /**
         * JAUGES (Santé, Volonté, Soif et Humanité)
         */
        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Jauges')->get()->first()->id,
            'nom' => 'Dégats Contondants',
            'description' => 'Le nombre de dégats contondants que peut subir le personnage',
        ]);  

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Jauges')->get()->first()->id,
            'nom' => 'Dégats Aggravés',
            'description' => 'Le nombre de dégats aggravés que peut subir le personnage',
        ]);        

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Jauges')->get()->first()->id,
            'nom' => 'Volonté',
            'description' => 'Le nombre de points de volonté du personnage',
        ]);        

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Jauges')->get()->first()->id,
            'nom' => 'Soif',
            'description' => 'La représentation de la soif du personnage',
        ]);        

        Caracteristique::create([
            'categorie_id' => Categorie::where('nom', 'Humanité')->get()->first()->id,
            'nom' => 'Humanité',
            'description' => 'Description à saisir',
        ]);        
    }   
}
