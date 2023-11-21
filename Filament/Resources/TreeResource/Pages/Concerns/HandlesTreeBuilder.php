<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Resources\TreeResource\Pages\Concerns;

use Filament\Actions\Action;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;

// use RyanChandler\FilamentNavigation\FilamentNavigation;

trait HandlesTreeBuilder
{
    public string $mountedItem;

    public array $mountedItemData = [];

    public array $mountedActionData = []; // added by Xot

    public string $mountedChildTarget;

    public function sortNavigation(string $targetStatePath, array $targetItemsStatePaths): void
    {
        $items = [];

        foreach ($targetItemsStatePaths as $targetItemStatePath) {
            $item = data_get($this, $targetItemStatePath);
            $uuid = Str::afterLast($targetItemStatePath, '.');

            $items[$uuid] = $item;
        }
        
        $model = $this->getResource()::getModel();
        /*
        dddx([
            'items'=>$items,
            'targetItemsStatePaths'=>$targetItemsStatePaths,
            'targetStatePath'=>$targetStatePath,
        ]);
        */
        if (Str::endsWith($targetStatePath, '.children')) {
            $parentPath = Str::beforeLast($targetStatePath, '.children');
            $parent = data_get($this, $parentPath);
            foreach ($items as $item) {
                app($model)->find($item['id'])->update(['parent_id' => $parent['id']]);
            }
        }

        $ids = collect($items)->pluck('id')->toArray();
        /*
        dddx([
            'items'=>$items,
            'ids'=>$ids,
            'targetItemsStatePaths'=>$targetItemsStatePaths,
            'targetStatePath'=>$targetStatePath,
        ]);
        */
        $model::setNewOrder($ids);

        data_set($this, $targetStatePath, $items);
        Notification::make()
            ->title('Sorted !')
            ->success()
            ->send();
    }

    public function addChild(string $statePath): void
    {
        $this->mountedChildTarget = $statePath;

        $this->mountAction('item');
    }

    public function removeItem(string $statePath): void
    {
        $uuid = Str::afterLast($statePath, '.');

        $parentPath = Str::beforeLast($statePath, '.');
        $parent = data_get($this, $parentPath);

        data_set($this, $parentPath, Arr::except($parent, $uuid));
    }

    public function editItem(string $statePath): void
    {
        $this->mountedItem = $statePath;
        $this->mountedItemData = Arr::except(data_get($this, $statePath), 'children');

        $this->mountAction('item');
    }

    public function createItem(): void
    {
        $this->mountedItem = null;
        $this->mountedItemData = [];
        $this->mountedActionData = [];
        $this->mountAction('item');
    }

    public function updateItem(Model $record, array $data): void
    {
        $keyName = $record->getKeyName();
        $id = $this->mountedItemData[$keyName];
        Assert::isInstanceOf($row = $record->find($id), Model::class);
        $up = tap($row)->update($data);

        $up = array_merge(data_get($this, $this->mountedItem), $up->toArray());
        data_set($this, $this->mountedItem, $up);

        $this->mountedItem = null;
        $this->mountedItemData = [];
    }

    public function storeChildItem(Model $record, array $data): void
    {
        $parent = data_get($this, $this->mountedChildTarget);
        $data['parent_id'] = $parent['id'];
        $row = $record::class::create($data);
        $data = $row->toArray();

        $children = data_get($this, $this->mountedChildTarget.'.children', []);

        $children[(string) Str::uuid()] = [
            ...$data,
            ...['children' => []],
        ];

        data_set($this, $this->mountedChildTarget.'.children', $children);

        $this->mountedChildTarget = null;
    }

    public function storeItem(?Model $record, array $data): void
    {
        $model = $this->getResource()::getModel();
        $data['parent_id'] = $record?->getKey();
        $row = $model::create($data);
        // $k=$row->getKey();
        $v = $row->toArray();
        $v['children'] = [];
        $this->data['sons'][] = $v;
    }

    protected function getHeaderActions(): array
    {
        // dddx(get_class_methods($this->getResource()));
        // dddx($this->getFormSchema());
        $formSchema = $this->getResource()::form(Form::make($this))->getComponents();
        $formSchema = collect($formSchema)
            ->keyBy(static fn($item) => $item->getName())->except('sons')
            ->toArray();

        // $formSchema=$this->getFormSchema();
        return [
            Action::make('item')
                ->mountUsing(function (ComponentContainer $form): void {
                    if (! $this->mountedItem) {
                        return;
                    }

                    $form->fill($this->mountedItemData);
                })
                ->form($formSchema)
                ->modalWidth('xl')
                ->action(function (array $data, $record): void {
                    /*
                    dddx([
                        'record'=>$record,
                        'data'=>$data,
                        'mountedItemData'=>$this->mountedItemData,
                        'mountedActionData'=>$this->mountedActionData,
                        'mountedItem'=>$this->mountedItem,
                        'mountedChildTarget'=>$this->mountedChildTarget,
                    ]);
                    //*/

                    if ($this->mountedItem) { // UPDATE
                        $this->updateItem($record, $data);

                        return;
                    }
                    
                    if ($this->mountedChildTarget) { // ADD CHILD
                        $this->storeChildItem($record, $data);

                        return;
                    }
                    
                    // CREATE

                    $this->storeItem($record, $data);
                })
                ->modalButton(__('filament-navigation::filament-navigation.items-modal.btn'))
                ->label(__('filament-navigation::filament-navigation.items-modal.title')),
        ];
    }
}
