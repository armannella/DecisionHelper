<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_register(){
        $data = ["email"=> "armannella@hotmail.com" , "name" => "Arman" , "password"=>"12345678" , "password_confirmation" => "12345678"];
        $response = $this->post(route("auth.register"),$data);
        $response->assertRedirectToRoute('dashboard');
        $this->assertDatabaseHas("users",["email" => $data['email']]);
        $response->assertSessionHas("success");
        $this->assertAuthenticated();
    }

    public function test_register_non_unique(){
        $user = User::factory()->create(["password"=>Hash::make("12345678")]);
        $data = ["email"=> $user->email , "name" => "Arman" , "password"=>"1234567" , "password_confirmation" => "12345678"];
        $response = $this->post(route("auth.register"),$data);
        $response->assertSessionHasErrors('email');
        $response->assertSessionHasErrors('password');
        $this->assertGuest();
    }

    public function test_login(){
        $user = User::factory()->create(["password"=>Hash::make("12345678")]);
        $data = ["email"=> $user->email , "password"=>"12345678"];
        $response = $this->post(route("auth.login"),$data);
        $response->assertRedirectToRoute('dashboard');
        $response->assertSessionHas("success");
        $this->assertAuthenticated();
    }

    public function test_login_fail(){
        $user = User::factory()->create(["password"=>Hash::make("12345678")]);
        $data = ["email"=> $user->email , "password"=>"123456789"];
        $response = $this->post(route("auth.login"),$data);
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_logout(){
        $user = User::factory()->create(["password"=>Hash::make("12345678")]);
        $response = $this->actingAs($user)->post(route("auth.logout"));
        $response->assertSessionHas("success");
        $this->assertGuest();
    }
    
}
