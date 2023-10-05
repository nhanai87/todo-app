<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Task;

class TaskTest extends TestCase
{
    use RefreshDatabase; // Reset the database for each test

    /**
     * Test the index action in TaskController.
     *
     * @return void
     */
    public function testIndex()
    {
        // Create a user for testing purposes
        $user = User::factory()->create();

        // Authenticate as the user
        $this->actingAs($user);

        // Create tasks associated with the user
        Task::factory(3)->create([
            'user_id' => $user->id,
            'title' => 'New Task',
            'description' => 'This is a new task',
            'status' => 'to-do',
            ]);

        // Call the index action and assert that it returns a successful response
        $response = $this->get(route('tasks.index'));
        $response->assertStatus(200);

        // You can add assertions to check the content of the response if needed
        // For example, assert that the task titles are present in the response content
        $response->assertSee('New Task');
    }

    /**
     * Test the store action in TaskController.
     *
     * @return void
     */
    public function testStore()
    {
        // Create a user for testing purposes
        $user = User::factory()->create();

        // Authenticate as the user
        $this->actingAs($user);

        // Data to be sent in the request to create a new task
        $taskData = [
            'title' => 'New Task',
            'description' => 'This is a new task',
            'status' => 'to-do',
        ];

        // Call the store action to create a new task and assert a successful response
        $response = $this->post(route('tasks.store'), $taskData);
        $response->assertStatus(302); // Assuming it redirects after creating a task

        // You can add additional assertions to check if the task was actually created in the database
        $this->assertDatabaseHas('tasks', $taskData);
    }

    /**
     * Test the show action in TaskController.
     *
     * @return void
     */
    public function testShow()
    {
        // Create a user and a task associated with that user for testing
        $user = User::factory()->create();
        $task = Task::factory()->create([
            'user_id' => $user->id,
            'title' => 'New Task',
            'description' => 'This is a new task',
            'status' => 'to-do',
        ]);

        // Authenticate as the user
        $this->actingAs($user);

        // Call the show action and assert that it returns a successful response
        $response = $this->get(route('tasks.show', $task));
        $response->assertStatus(200);

        // You can add assertions to check the content of the response if needed
        // For example, assert that the task title is present in the response content
        $response->assertSee($task->title);
    }

    /**
     * Test the update action in TaskController.
     *
     * @return void
     */
    public function testUpdate()
    {
        // Create a user and a task associated with that user for testing
        $user = User::factory()->create();
        $task = Task::factory()->create([
            'user_id' => $user->id,
            'title' => 'New Task need update',
            'description' => 'This is a new task',
            'status' => 'to-do',
        ]);

        // Authenticate as the user
        $this->actingAs($user);

        // Data to be sent in the request to update the task
        $updatedData = [
            'title' => 'Updated Task Title',
            'status' => 'done',
        ];

        // Call the update action to update the task and assert a successful response
        $response = $this->put(route('tasks.update', $task), $updatedData);
        $response->assertStatus(302); // Assuming it redirects after updating a task
        $this->assertTrue(true); // Placeholder assertion
    }

    /**
     * Test the destroy action in TaskController.
     *
     * @return void
     */
    public function testDestroy()
    {
        // Create a user and a task associated with that user for testing
        $user = User::factory()->create();
        $task = Task::factory()->create([
            'user_id' => $user->id,
            'title' => 'New Task',
            'description' => 'This is a new task',
            'status' => 'to-do',
        ]);

        // Authenticate as the user
        $this->actingAs($user);

        // Call the destroy action to delete the task and assert a successful response
        $response = $this->delete(route('tasks.destroy', $task));
        $response->assertStatus(302); // Assuming it redirects after deleting a task

        // You can add additional assertions to check if the task was actually deleted from the database
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
