<?php

namespace Tests\Feature;

use Tests\TestCase;

class PortfolioTest extends TestCase
{
    public function test_home_page_renders_all_sections(): void
    {
        $response = $this->get('/');

        $response->assertOk();

        foreach (['home', 'about', 'skills', 'interests', 'education', 'contact'] as $id) {
            $response->assertSee('id="' . $id . '"', false);
        }
    }

    public function test_content_comes_from_portfolio_config(): void
    {
        config(['portfolio.owner.full_name' => 'Test Sailor']);

        $this->get('/')->assertSee('Test Sailor');
    }

    public function test_home_has_typed_titles_helm_and_mobile_menu(): void
    {
        $this->get('/')
            ->assertSee('id="typed-title"', false)
            ->assertSee('Aspiring Web Developer')
            ->assertSee('class="helm"', false)
            ->assertSee('id="nav-toggle"', false);
    }

    public function test_home_has_ocean_ships_and_pirate_flag(): void
    {
        $this->get('/')
            ->assertSee('class="ocean"', false)
            ->assertSee('ship--main', false)
            ->assertSee('class="pirate-flag"', false)
            ->assertSee('class="sky"', false);
    }

    public function test_about_section_shows_wanted_poster_without_bounty(): void
    {
        $response = $this->get('/');

        $response->assertSee('MEET THE CREW')
            ->assertSee('class="wanted-poster"', false)
            ->assertSee('WANTED')
            ->assertSee('A DREAMER WITH BIG AMBITIONS')
            ->assertSee('My Personality')
            ->assertSee('My Goals')
            ->assertSee('My Personal Background')
            ->assertDontSee('bounty', false)
            ->assertDontSee('฿', false);
    }

    public function test_skills_and_interests_come_from_config(): void
    {
        $this->get('/')
            ->assertSee('MY ABILITIES')
            ->assertSee('Technical Skills')
            ->assertSee('General Skills')
            ->assertSee('JavaScript')
            ->assertSee('Communication')
            ->assertSee('MY ADVENTURES')
            ->assertSee('Watching Anime')
            ->assertSee('Island of Stories');
    }

    public function test_removed_skill_is_not_rendered(): void
    {
        config(['portfolio.skills.technical' => [['name' => 'OnlyThisOne', 'icon' => 'fa-solid fa-star']]]);

        $this->get('/')->assertSee('OnlyThisOne')->assertDontSee('Basic Computer Troubleshooting');
    }

    public function test_education_timeline_and_contact_section_render(): void
    {
        $this->get('/')
            ->assertSee('MY JOURNEY')
            ->assertSee('id="timeline"', false)
            ->assertSee('Senior High School')
            ->assertSee('SEND A MESSAGE')
            ->assertSee('class="message-bottle"', false);
    }

    public function test_navbar_has_log_pose_and_sections_have_map_dividers(): void
    {
        $response = $this->get('/');

        $response->assertSee('id="log-pose"', false)
            ->assertSee('data-log-pose-needle', false)
            ->assertSee('js/log-pose.js', false);

        $this->assertSame(5, substr_count($response->getContent(), 'class="map-divider '));
    }

    public function test_footer_shows_initials_name_links_and_copyright(): void
    {
        config([
            'portfolio.owner.full_name' => 'Test Sailor',
            'portfolio.owner.initials' => 'TS',
            'portfolio.contact.facebook' => 'https://facebook.com/test.sailor',
            'portfolio.contact.github' => 'javascript:alert(1)',
        ]);

        $this->get('/')
            ->assertSee('class="site-footer"', false)
            ->assertSee('site-footer__nav', false)
            ->assertSee('&copy; ' . date('Y') . ' Test Sailor. All Rights Reserved.', false)
            ->assertSee('https://facebook.com/test.sailor', false)
            ->assertDontSee('javascript:alert(1)', false);
    }
}
