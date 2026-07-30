<?php

namespace Tests\Feature;

use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_admin_can_view_profile_edit_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('admin.profile.edit'));

        $response->assertStatus(200);
        $response->assertSee('Profile');
    }

    public function test_admin_can_update_profile_and_upload_backend_selfie(): void
    {
        Storage::fake('public');

        $user = User::factory()->create([
            'name' => 'Original Name',
            'email' => 'original@example.com',
        ]);

        $selfieFile = UploadedFile::fake()->image('selfie.jpg', 400, 400);

        $response = $this->actingAs($user)->put(route('admin.profile.update'), [
            'name' => 'Updated Admin Name',
            'email' => 'updated@example.com',
            'selfie' => $selfieFile,
        ]);

        $response->assertRedirect(route('admin.profile.edit'));
        $response->assertSessionHas('success');

        $user->refresh();
        $this->assertEquals('Updated Admin Name', $user->name);
        $this->assertEquals('updated@example.com', $user->email);
        $this->assertNotNull($user->selfie_path);
        Storage::disk('public')->assertExists($user->selfie_path);
    }

    public function test_authenticated_admin_can_view_settings_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('admin.settings.edit'));

        $response->assertStatus(200);
        $response->assertSee('Dynamic Logo');
    }

    public function test_admin_can_update_dynamic_logo_text_slogan_and_upload_logo(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $logoFile = UploadedFile::fake()->image('custom-logo.png', 200, 80);

        $response = $this->actingAs($user)->put(route('admin.settings.update'), [
            'logo_text' => 'Global',
            'logo_text_highlight' => 'Visa',
            'slogan' => 'Trusted Verification Gateway',
            'site_title' => 'GlobalVisa Verification Portal',
            'footer_description' => 'Official document verification portal.',
            'logo_image' => $logoFile,
        ]);

        $response->assertRedirect(route('admin.settings.edit'));
        $response->assertSessionHas('success');

        $settings = SiteSetting::getSettings();
        $this->assertEquals('Global', $settings->logo_text);
        $this->assertEquals('Visa', $settings->logo_text_highlight);
        $this->assertEquals('Trusted Verification Gateway', $settings->slogan);
        $this->assertNotNull($settings->logo_image_path);
        Storage::disk('public')->assertExists($settings->logo_image_path);

        // Verify dynamic slogan is displayed on public pages
        $publicResponse = $this->get('/');
        $publicResponse->assertSee('Trusted Verification Gateway');
        $publicResponse->assertSee('Global');
        $publicResponse->assertSee('Visa');
    }
}
