<?php

namespace Tests\Feature;

use App\Models\PageView;
use App\Models\Post;
use App\Models\User;
use App\Models\VerificationDocument;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PortalTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_pages_render_dynamic_content_and_track_visits(): void
    {
        $post = Post::create([
            'title' => 'Preparing documents for a visa appointment',
            'slug' => 'preparing-documents-for-a-visa-appointment',
            'excerpt' => 'A practical migration-readiness guide.',
            'content' => 'Helpful content for a migration applicant.',
            'category' => 'Migration guide',
            'read_time' => '4 min read',
            'published_at' => now(),
        ]);

        $this->get('/')->assertOk()->assertSee($post->title);
        $this->get('/about-us')->assertOk();
        $this->get('/contact-us')->assertOk();
        $this->get('/migration-insights')->assertOk()->assertSee($post->title);
        $this->get(route('posts.show', $post))->assertOk()->assertSee($post->content);
        $this->post(route('contact.store'), [
            'name' => 'Portal Visitor',
            'email' => 'visitor@example.test',
            'subject' => 'Portal question',
            'message' => 'I need help using the verification portal.',
        ])->assertSessionHas('success');

        $this->assertDatabaseHas('page_views', ['page_url' => '/']);
        $this->assertDatabaseHas('contact_messages', ['email' => 'visitor@example.test']);
        $this->assertGreaterThanOrEqual(5, PageView::count());
    }

    public function test_hidden_document_returns_the_ineligible_page(): void
    {
        $document = VerificationDocument::create([
            'uuid' => 'b95af4a1-6cf7-4e8d-97f5-16b64c8386d7',
            'title' => 'Work Permit',
            'applicant_name' => 'Test Applicant',
            'document_type' => 'Work permit',
            'file_path' => 'verified_docs/example.pdf',
            'is_active' => false,
        ]);

        $this->get(route('verify.captcha', $document->uuid))
            ->assertForbidden()
            ->assertSee('This link can’t be opened.');
    }

    public function test_authenticated_admin_can_open_the_management_dashboard(): void
    {
        $admin = User::factory()->create();

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Verification management');
    }

    public function test_admin_can_sign_in_with_valid_credentials(): void
    {
        $admin = User::factory()->create([
            'email' => 'dashboard@example.test',
            'password' => 'password',
        ]);

        $this->post(route('admin.login.store'), [
            'email' => $admin->email,
            'password' => 'password',
        ])->assertRedirect(route('admin.dashboard'));

        $this->assertAuthenticatedAs($admin);
    }
}
