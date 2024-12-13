<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MaterialyWodociagoweCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MaterialyWodociagoweCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\MaterialyWodociagowe::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/materialy-wodociagowe');
        CRUD::setEntityNameStrings('materialy wodociagowe', 'Materiały wodociągowe');
        if (!backpack_user()->isAdmin()) {
            // Disable create, update, delete for non-admin users
            $this->crud->denyAccess(['create', 'update', 'delete']);
        } 
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->removeButton('create');
        if (backpack_user()->isAdmin()) {
            $this->crud->addButtonFromView('top', 'custom_create_material', 'custom_create_material', 'beginning');
        } 
        if (!backpack_user()->isAdmin()) {
            $this->crud->addClause('where', 'Widocznosc', true); // Only show visible items to non-admins
        }
        CRUD::column([
            'name' => 'image_url',
            'label' => 'Zdjęcie',
            'type' => 'image',
            'attributes'=> [
                'style' => 'width: 100%; height: 100%; object-fit: cover; max-height: 100%;', // Override default Backpack styles
            ],
            'wrapper' => [
                //'class' => 'd-flex justify-content-center',
                'style' => 'width: 150px; height: 100px; display: flex; align-items: center; justify-content: center; overflow: hidden; border-radius: 5%; border:.5px',
            ],
            'value' =>   function ($entry) {
                return $entry->image_url
                    ? asset('storage/' . $entry->image_url) 
                    : asset('img/no-image.png');
            } 
        ]);
        CRUD::column([
            'name' => 'Nazwa',
            'type' => 'text',
        ]);
        CRUD::column([
            'name' => 'Stan',
            'type' => 'number',
        ]);
        CRUD::column([
            'name' => 'Jednostka',
            'label' => 'Jedn. miary',
            'type' => 'text',
        ]);
        CRUD::column([
            'name' => 'Uwagi',
            'type' => 'text',
        ]);
        if (backpack_user()->isAdmin()) {
            CRUD::column([
                'name' => 'Widocznosc',
                'label' => 'Widoczność',
                'type' => 'boolean'
            ]);
        } 
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        $this->crud->setTitle('Dodaj materiał','create');
        $this->crud->setHeading('Tworzenie nowego Materiału wodociągowego','create');
        $this->crud->setSubHeading('Wprowadź informacje','create');

       CRUD::field([
            'name' => 'image_url',
            'type' => 'upload',
            'label' => 'Zdjęcie',
            'wrapper' => [
                'class' => 'col-md-4'
            ],  
        ])->withFiles([
            'disk' => 'public', // the disk where file will be stored
            'path' => 'photos'
        ]);

        CRUD::field([
            'name' =>'hidden',
            'type' => 'hidden',
            'wrapper' => [
                'class' => 'col-md-8'
            ],  
        ]);
        CRUD::field([
            'name' => 'Nazwa',
            'type' => 'text',
            'label' => 'Nazwa',
            'wrapper' => [
                'class' => 'col-md-4'
            ],  
        ]);
        CRUD::field([
            'name' => 'Stan',
            'type' => 'number',
            'label' => 'Stan',
            'wrapper' => [
                'class' => 'col-md-2'
            ],  
        ]);
        CRUD::field([
            'name' => 'Jednostka',
            'type' => 'text',
            'label' => 'Jedn. miary',
            'wrapper' => [
                'class' => 'col-md-2'
            ],  
        ]);

        CRUD::field([
            'name' => 'Uwagi',
            'type' => 'textarea',
            'label' => 'Uwagi',
            'wrapper' => [
                'class' => 'col-md-6'
            ],  
        ]);
        CRUD::field([
            'name' =>'hidden',
            'type' => 'hidden',
            'wrapper' => [
                'class' => 'col-md-6'
            ],  
        ]);        
         if (backpack_user()->isAdmin()) {
            CRUD::field([
                'name' => 'Widocznosc',
                'label' => 'Widoczność',
                'type' => 'boolean',
                'wrapper' => [
                    'class' => 'col-md-6 m-5'
                ],  
            ]);
        } 
        
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $entry = $this->crud->getCurrentEntry();
        $this->crud->setTitle('Edycja '. $entry->Nazwa,'edit');
        $this->crud->setHeading('Edycja '. $entry->Nazwa,'edit');
        $this->crud->setSubHeading('Edytuj informacje','edit');
        
        $this->setupCreateOperation();
    }
    protected function setupShowOperation(){
        $entry = $this->crud->getCurrentEntry();
        $this->crud->setTitle('Podgląd '. $entry->Nazwa,'show');
        $this->crud->setHeading('Podgląd '. $entry->Nazwa,'show');
        $this->crud->setSubHeading('Podgląd informacji','show');
        CRUD::column([
            'name' => 'image_url',
            'label' => 'Zdjęcie',
            'type' => 'image',
            'attributes'=> [
                'style' => 'width: 100%; height: 100%; object-fit: cover; max-height: 100%;', // Override default Backpack styles
            ],
            'wrapper' => [
                //'class' => 'd-flex justify-content-center',
                'style' => 'width: 150px; height: 100px; display: flex; align-items: center; justify-content: center; overflow: hidden; border-radius: 5%; border:.5px',
            ],
            'value' =>   function ($entry) {
                return $entry->image_url
                    ? asset('storage/' . $entry->image_url) 
                    : asset('img/no-image.png');
            } 
        ]);
        CRUD::column([
            'name' => 'Nazwa',
            'type' => 'text',
        ]);
        CRUD::column([
            'name' => 'Stan',
            'type' => 'number',
        ]);
        CRUD::column([
            'name' => 'Jednostka',
            'label' => 'Jedn. miary',
            'type' => 'text',
        ]);
        CRUD::column([
            'name' => 'Uwagi',
            'type' => 'text',
        ]);
        if (backpack_user()->isAdmin()) {
            CRUD::column([
                'name' => 'Widocznosc',
                'label' => 'Widoczność',
                'type' => 'boolean'
            ]);
        }      
        CRUD::column([
            'name' => 'updated_at',
            'type' => 'text',
            'label' => "Ostatnia modyfikacja"
        ]); 
        CRUD::column([
            'name' => 'created_at',
            'type' => 'text',
            'label' => "Utworzono"
        ]);
    }
    protected function setupDeleteOperation(){
        CRUD::field('image_url')->type('upload')->withFiles();
    }
}
