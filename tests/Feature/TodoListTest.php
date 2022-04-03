<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_todo_list()
    {
        // preparation / prepare
        // TodoList::create(['name' => 'my list']);
        TodoList::factory()->create(['name' => 'my list']);

        // action /perform
        $response = $this->getJson(route('todo-list.index'));

        // assertion / predict
        $this->assertEquals(1, count($response->json()));
        $this->assertEquals('my list', $response->json()[0]['name']);
    }

    public function test_fetch_single_todo_list()
    {
        // preparation
        $list = TodoList::factory()->create();

        // action
        $response = $this->getJson(route('todo-list.show', $list->id))
            ->assertOk()
            ->json();

        // assertion
        $this->assertEquals($response['name'], $list->name);
    }
}
