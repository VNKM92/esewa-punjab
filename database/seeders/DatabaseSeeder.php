<?php

namespace Database\Seeders;

use App\Models\NavigationItem;
use App\Models\PageContent;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@migraverify.test'],
            [
                'name' => 'MigraVerify Admin',
                'password' => Hash::make('password'),
            ],
        );

        collect([
            [
                'key' => 'home',
                'name' => 'Landing page',
                'meta_title' => 'MigraVerify | Secure Visa & Document Verification Portal',
                'eyebrow' => 'Official Document Assurance',
                'hero_title' => 'Verify migration credentials with speed, clarity, and trust.',
                'hero_description' => 'MigraVerify provides institutions, employers, and applicants an instant, encrypted verification engine for QR-linked visa and migration records.',
                'body' => 'Designed for global mobility workflows, MigraVerify connects issuing authorities directly with verifiers while safeguarding applicant privacy at every step.',
                'cta_label' => 'Verify document now',
                'cta_url' => '/#verification-form',
                'sections' => [
                    'stats' => [
                        ['number' => '99.9%', 'label' => 'Verification Accuracy', 'desc' => 'Cryptographic hash matching'],
                        ['number' => '150k+', 'label' => 'Records Processed', 'desc' => 'Trusted by global partners'],
                        ['number' => '<0.5s', 'label' => 'Instant Status Check', 'desc' => 'Real-time database lookup'],
                    ],
                    'steps' => [
                        ['step' => '01', 'title' => 'Scan or enter reference', 'desc' => 'Scan the document QR code or paste the official 36-character UUID token.'],
                        ['step' => '02', 'title' => 'Pass security check', 'desc' => 'Complete a anti-bot verification challenge to protect personal identity records.'],
                        ['step' => '03', 'title' => 'Review live status', 'desc' => 'Instantly confirm document authenticity, active state, and expiry details.'],
                    ],
                    'security' => [
                        ['title' => 'Controlled access lifecycle', 'desc' => 'Document issuers can activate, pause, or expire access tokens anytime.'],
                        ['title' => 'Privacy-first design', 'desc' => 'Sensitive identity files are locked behind security gates.'],
                        ['title' => 'Audit-ready trail', 'desc' => 'Timestamped verification records prevent counterfeit or altered submissions.'],
                    ],
                    'faqs' => [
                        ['q' => 'Where do I find the document reference?', 'a' => 'The 36-character reference key is printed on official MigraVerify certificates and embedded within the official QR code.'],
                        ['q' => 'Why is a security question required?', 'a' => 'The security challenge prevents automated web scrapers from harvesting sensitive applicant details.'],
                        ['q' => 'What if a document displays an inactive status?', 'a' => 'An inactive status indicates the issuing authority has paused or expired access. Please contact the issuing institution directly.'],
                    ]
                ]
            ],
            [
                'key' => 'about',
                'name' => 'About us',
                'meta_title' => 'About MigraVerify | Building Trust in Global Mobility',
                'eyebrow' => 'About MigraVerify',
                'hero_title' => 'Bridging issuers and verifiers through secure technology.',
                'hero_description' => 'MigraVerify was engineered to solve document fraud and streamline visa verification for border agencies, educational bodies, and international employers.',
                'body' => "For document issuers, MigraVerify provides a granular management suite to issue, monitor, and revoke QR-linked credentials.\n\nFor verifiers and employers, it offers an instant gateway to validate physical and digital documents without back-and-forth email delays.",
                'cta_label' => 'Start document check',
                'cta_url' => '/#verify',
                'sections' => [
                    'pillars' => [
                        ['title' => 'Issuer Control', 'desc' => 'Only the certified issuing body holds full authority over document access.'],
                        ['title' => 'Privacy Assurance', 'desc' => 'Applicant identity data is protected with end-to-end security protocols.'],
                        ['title' => 'Global Accessibility', 'desc' => 'Available 24/7 across any browser or device without complex software installs.'],
                    ]
                ]
            ],
            [
                'key' => 'contact',
                'name' => 'Contact us',
                'meta_title' => 'Contact Us | MigraVerify Desk',
                'eyebrow' => 'Get in Touch',
                'hero_title' => 'Have questions? Our support team is ready to assist.',
                'hero_description' => 'Reach out to the MigraVerify technical desk for portal integration, issuer onboarding, or verification assistance.',
                'body' => "Please note: For questions regarding specific visa applications or document contents, please contact the issuing embassy or government institution directly.\n\nDo not submit confidential financial or passport copies through this form.",
                'cta_label' => null,
                'cta_url' => null,
                'sections' => [
                    'info' => [
                        'email' => 'support@migraverify.test',
                        'phone' => '+1 (800) 555-MIGRA',
                        'hours' => 'Mon - Fri: 8:00 AM - 6:00 PM UTC',
                        'location' => 'Global Verification Center, London / Sydney / New York'
                    ]
                ]
            ],
            [
                'key' => 'terms',
                'name' => 'Terms and conditions',
                'meta_title' => 'Terms of Use & Privacy Standards | MigraVerify',
                'eyebrow' => 'Legal Terms',
                'hero_title' => 'Terms of Service & Data Protection Guidelines',
                'hero_description' => 'Guidelines governing official document verification, user responsibilities, and system usage.',
                'body' => "Authorized Use\nOnly attempt verification on document references for which you have explicit authorization or legitimate business need.\n\nIssuer Responsibility\nThe issuing agency remains solely accountable for document validity, metadata updates, and status revocations.\n\nAnti-Abuse Controls\nUnapproved automated queries, rate-limit circumvention, or unauthorized access attempts are strictly prohibited.",
                'cta_label' => 'Contact compliance',
                'cta_url' => '/contact-us',
                'sections' => [
                    'terms_list' => [
                        ['title' => '1. Scope of Verification', 'desc' => 'MigraVerify acts as an intermediary verification gateway confirming the live state of issuer records.'],
                        ['title' => '2. User Compliance', 'desc' => 'Verifiers must maintain confidentiality of checked records and refrain from improper redistribution.'],
                        ['title' => '3. Service Availability', 'desc' => 'We strive for 99.9% uptime for verification lookups worldwide.']
                    ]
                ]
            ],
            [
                'key' => 'insights',
                'name' => 'Migration insights',
                'meta_title' => 'Migration Insights & Verification Guides | MigraVerify',
                'eyebrow' => 'Knowledge Desk',
                'hero_title' => 'Expert guides for migration documents and compliance.',
                'hero_description' => 'Actionable insights, security tips, and compliance updates for visa applicants, employers, and immigration advisors.',
                'body' => null,
                'cta_label' => null,
                'cta_url' => null,
                'sections' => null
            ],
        ])->each(function (array $page): void {
            PageContent::updateOrCreate(['key' => $page['key']], $page + ['is_active' => true]);
        });

        collect([
            ['About us', '/about-us', 10],
            ['How it works', '/#how-it-works', 20],
            ['Document checks', '/#documents', 30],
            ['Insights', '/migration-insights', 40],
            ['Contact us', '/contact-us', 50],
        ])->each(function (array $item): void {
            NavigationItem::updateOrCreate(
                ['label' => $item[0]],
                ['url' => $item[1], 'sort_order' => $item[2], 'is_active' => true],
            );
        });

        collect([
            ['Understanding document verification before a visa appointment', 'Verification guide', 'Learn what a QR-linked verification check can confirm before you attend a visa or migration appointment.'],
            ['A practical checklist for preparing residency evidence', 'Residency guide', 'Organise the supporting records commonly requested when preparing a residency application.'],
            ['How employers can verify work-permission documents safely', 'Employer guide', 'Use a clear, privacy-aware workflow when checking whether a work-permission record is current.'],
            ['Keeping civil documents ready for family visa applications', 'Family migration', 'A calm preparation guide for marriage certificates and other civil records used in family migration.'],
            ['Why an active document link matters', 'Document security', 'Understand why an issuer can activate, hide, or expire a document verification link.'],
            ['What to do when a QR verification link has expired', 'Verification guide', 'Know the sensible next step when an official verification reference is no longer available.'],
            ['Preparing identity evidence for an international move', 'Identity guide', 'A helpful overview of handling sensitive identity documents while planning an overseas move.'],
            ['The difference between a document copy and a live check', 'Document security', 'A current verification status gives a verifier context that a forwarded file cannot provide on its own.'],
            ['How to share migration records with an authorised verifier', 'Privacy guide', 'Share only the official reference your issuer has provided and keep document details private.'],
            ['A simple timeline for a work permit renewal', 'Work migration', 'Plan your record gathering, issuer checks, and renewal milestones with fewer surprises.'],
            ['What institutions should look for in a verification workflow', 'Institution guide', 'A clear status, issuer control, and protected access should all be part of a modern workflow.'],
            ['Document access controls explained in plain language', 'Document security', 'See how visibility and expiry controls help protect a record after it has been issued.'],
            ['How to prepare for a migration document handoff', 'Migration guide', 'Small preparation steps make it easier to give an employer, school, or office the right information.'],
            ['A guide to QR-linked immigration records', 'Verification guide', 'Explore the benefits of using an official QR reference to start an authentic document check.'],
            ['Questions to ask your document issuer before travel', 'Travel planning', 'Before departure, confirm your document status, expiry date, and the correct verification method.'],
        ])->each(function (array $post, int $index): void {
            [$title, $category, $excerpt] = $post;

            Post::updateOrCreate(
                ['slug' => Str::slug($title)],
                [
                    'title' => $title,
                    'excerpt' => $excerpt,
                    'content' => $excerpt."\n\nFor an official decision or document amendment, always contact the organisation that issued your record. Keep your verification reference private and use the QR link provided with the document.",
                    'category' => $category,
                    'read_time' => (3 + ($index % 4)).' min read',
                    'published_at' => now()->subDays($index),
                ],
            );
        });
    }
}
