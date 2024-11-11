<?php

namespace App\Livewire;

use App\Models\Todo;
use Exception;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Layout extends Component
{
    use WithPagination;
    #[Rule('required|min:3|max:50')]
    public $name;
    public $search="";

    public $editingTodoId;

    #[Rule('required|min:3|max:50')]
    public $editingTodoNewName;
    public function create(){
        //validate
        //create the input
        //clear the input
        //send flash message
        $validated = $this->validateOnly('name');
        Todo::create($validated);
        $this->reset('name');
        session()->flash('success',"Saved");
        $this->resetPage();
    }
    public function delete(Todo $todo){
        try{
            $todo->delete();
        }catch(Exception $e)
        {
            session()->flash('error',"Failed to fetch deleted todo");
            return;
        }
            session()->flash('deleted',"deleted");
    }

    public function edit($id){
       $this->editingTodoId = $id; 
       $this->editingTodoNewName = Todo::find($id)->name;
    }
    public function update(){
        $validated = $this->validateOnly('editingTodoNewName');
        Todo::find($this->editingTodoId)->update(
            [
                'name'=>$this->editingTodoNewName
            ]
        );
        $this->reset();
        session()->flash('update',"Updated");
    }

    public function toggle(Todo $todo){
        $todo->completed = !$todo->completed;
        $todo->save();
    }
    public function cancel(){
        $this->reset('editingTodoId','editingTodoNewName');
    }
    public function render()
    {
        return view('livewire.layout',
        [
            'todos'=> Todo::latest()->paginate(5)
        ]
        );
    }
}
