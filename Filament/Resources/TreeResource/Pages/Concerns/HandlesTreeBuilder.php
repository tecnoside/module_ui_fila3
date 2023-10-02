<?php


namespace Modules\UI\Filament\Resources\TreeResource\Pages\Concerns;

use Filament\Forms\Get;
use Filament\Forms\Form;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Filament\Actions\Action;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\ComponentContainer;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification; 
//use RyanChandler\FilamentNavigation\FilamentNavigation;

trait HandlesTreeBuilder
{
    public $mountedItem;

    public $mountedItemData = [];
    public $mountedActionData = []; //added by Xot

    public $mountedChildTarget;
    
    public function sortNavigation(string $targetStatePath, array $targetItemsStatePaths)
    {
        $items = [];

        foreach ($targetItemsStatePaths as $targetItemStatePath) {
            $item = data_get($this, $targetItemStatePath);
            $uuid = Str::afterLast($targetItemStatePath, '.');

            $items[$uuid] = $item;
        }

        data_set($this, $targetStatePath, $items);
        Notification::make() 
            ->title('Sorted !')
            ->success()
            ->send(); 
    }

    
    public function addChild(string $statePath)
    {
        $this->mountedChildTarget = $statePath;

        $this->mountAction('item');
    }

    public function removeItem(string $statePath)
    {
        $uuid = Str::afterLast($statePath, '.');

        $parentPath = Str::beforeLast($statePath, '.');
        $parent = data_get($this, $parentPath);

        data_set($this, $parentPath, Arr::except($parent, $uuid));
    }

    public function editItem(string $statePath)
    {
        $this->mountedItem = $statePath;
        $this->mountedItemData = Arr::except(data_get($this, $statePath), 'children');

        $this->mountAction('item');
    }

    public function createItem()
    {
        
        $this->mountedItem = null;
        $this->mountedItemData = [];
        $this->mountedActionData = [];
        $this->mountAction('item');
    }

    public function updateItem(Model $record,array $data){
        $keyName=$record->getKeyName();
        $id=$this->mountedItemData[$keyName];
        $row=$record->find($id);
        $row->update($data);
        data_set($this, $this->mountedItem, array_merge(data_get($this, $this->mountedItem), $data));

        $this->mountedItem = null;
        $this->mountedItemData = [];

        return ;

    }

    public function storeChildItem(Model $record,array $data){
        
        $children = data_get($this, $this->mountedChildTarget . '.children', []);

        $children[(string) Str::uuid()] = [
            ...$data,
            ...['children' => []],
        ];

        data_set($this, $this->mountedChildTarget . '.children', $children);

        $this->mountedChildTarget = null;
        return ;
    }

    public function storeItem(Model $record,array $data){
        $this->data['items'][(string) Str::uuid()] = [
            ...$data,
            ...['children' => []],
        ];
    }

    protected function getHeaderActions(): array
    {

        //dddx(get_class_methods($this->getResource()));
        //dddx($this->getFormSchema());
        $formSchema=$this->getResource()::form(Form::make($this))->getComponents();
        $formSchema=collect($formSchema)
            ->keyBy(function($item){
                return $item->getName();
            })->except('sons')
            ->toArray();


        //$formSchema=$this->getFormSchema();
        return [
            Action::make('item')
                ->mountUsing(function (ComponentContainer $form) {
                    if (! $this->mountedItem) {
                        return;
                    }

                    $form->fill($this->mountedItemData);
                })
                ->form($formSchema)
                ->modalWidth('xl')
                ->action(function (array $data,$record) {
                    //*
                    dddx([
                        'record'=>$record,
                        'data'=>$data,
                        'mountedItemData'=>$this->mountedItemData,
                        'mountedActionData'=>$this->mountedActionData,
                        'mountedItem'=>$this->mountedItem,
                        'mountedChildTarget'=>$this->mountedChildTarget,
                    ]);
                    //*/
                   
                    if ($this->mountedItem) { //UPDATE
                        return $this->updateItem($record,$data);
                       
                    }
                    if ($this->mountedChildTarget) { //ADD CHILD
                        return $this->storeChildItem($record,$data);
                        
                    }
                    //CREATE
                    return $this->storeItem($record,$data);
                    
                    


                })
                ->modalButton(__('filament-navigation::filament-navigation.items-modal.btn'))
                ->label(__('filament-navigation::filament-navigation.items-modal.title')),
            ];
    }


    protected function getHeaderActionsOLD(): array
    {
        $modelClass=$this->getResource()::getModel();
        return [
            Action::make('item')
                ->mountUsing(function (ComponentContainer $form) {
                    if (! $this->mountedItem) {
                        return;
                    }

                    $form->fill($this->mountedItemData);
                })
                //->view('filament-navigation::hidden-action')
                ->form([
                    TextInput::make('label')
                        ->label(__('filament-navigation::filament-navigation.items-modal.label'))
                        ->required(),
                    Select::make('type')
                        ->label(__('filament-navigation::filament-navigation.items-modal.type'))
                        ->options(function () {
                            $types = FilamentNavigation::get()->getItemTypes();

                            return array_combine(array_keys($types), Arr::pluck($types, 'name'));
                        })
                        ->afterStateUpdated(function ($state, Select $component): void {
                            if (! $state) {
                                return;
                            }

                            // NOTE: This chunk of code is a workaround for Livewire not letting
                            //       you entangle to non-existent array keys, which wire:model
                            //       would normally let you do.
                            $component
                                ->getContainer()
                                ->getComponent(fn (Component $component) => $component instanceof Group)
                                ->getChildComponentContainer()
                                ->fill();
                        })
                        ->reactive(),
                    Group::make()
                        ->statePath('data')
                        ->whenTruthy('type')
                        ->schema(function (Get $get) {
                            $type = $get('type');

                            return FilamentNavigation::get()->getItemTypes()[$type]['fields'] ?? [];
                        }),
                    Group::make()
                        ->statePath('data')
                        ->visible(fn (Component $component) => $component->evaluate(FilamentNavigation::get()->getExtraFields()) !== [])
                        ->schema(function (Component $component) {
                            return FilamentNavigation::get()->getExtraFields();
                        }),
                ])
                ->modalWidth('md')
                ->action(function (array $data) {
                    if ($this->mountedItem) {
                        data_set($this, $this->mountedItem, array_merge(data_get($this, $this->mountedItem), $data));

                        $this->mountedItem = null;
                        $this->mountedItemData = [];
                    } elseif ($this->mountedChildTarget) {
                        $children = data_get($this, $this->mountedChildTarget . '.children', []);

                        $children[(string) Str::uuid()] = [
                            ...$data,
                            ...['children' => []],
                        ];

                        data_set($this, $this->mountedChildTarget . '.children', $children);

                        $this->mountedChildTarget = null;
                    } else {
                        $this->data['items'][(string) Str::uuid()] = [
                            ...$data,
                            ...['children' => []],
                        ];
                    }

                    $this->mountedActionData = [];
                })
                ->modalButton(__('filament-navigation::filament-navigation.items-modal.btn'))
                ->label(__('filament-navigation::filament-navigation.items-modal.title')),
        ];
    }
    
}
